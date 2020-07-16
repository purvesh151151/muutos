<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\CommanHelper;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    

    public function index()
    {
        return view('admin.role.index');
    }

    public function create()
    {
        $permission = Permission::get();
        return view('admin.role.add',compact('permission'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'title' => 'required',
        ]);
        // dd($request->input('permission'));
        // dd($request->input('permission'));
        $role = new Role;
        $role->name = strtolower(request('title'));
        $role->guard_name = 'web';
        $role->save();
        // if($request->input('permission')){
            $role->syncPermissions($request->input('permission'));
        // }
        return redirect()->route('admin.role')->with("success","Role added successfully.");
    }

    

    public function edit($id)
    {   
        
        $encryid = Crypt::decryptString($id);
        $roledata = Role::find($encryid);
        $permission = Permission::get();
            
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$encryid)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
        return view('admin.role.edit',compact('roledata','permission','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'title' => 'required',
        ]);
        // dd($request->input('permission'));
        $role = Role::find($id);
        $role->name = strtolower(request('title'));
        $role->guard_name = 'web';
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.role')->with('success','Role updated successfully.');
    }

    public function delete($id)
    {
        if (!Entrust::can('role-delete')) {
            abort(403);
        }
    	$encryid = Crypt::decryptString($id);
        $role = Role::find($encryid);
        if($role){
          $role->delete();
        }
        return redirect()->route('admin.role')->with('success','Role deleted successfully.');
	}

	public function arraydata(Request $request)
    {
            $response = [];
            $role = Role::all();
            foreach ($role as $n) {
                $sub   = [];
                $id    = $n->id;
                $sub[] = $id;
                $sub[] = $n->name;
                // $sub[] = $n->display_name;
                $sub[] = ($n->created_at) ? CommanHelper::dateformatdmY($n->created_at) : '-';
                $encryptid = Crypt::encryptString($id);
                $delete_url = route('admin.role.delete', ["id" => $encryptid]);
                $action = '<div class="btn-part"><a class="edit" href="' . route('admin.role.edit', $encryptid) . '"><i class="far fa-edit"></i></a>' . ' ';
                $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="far fa-trash-alt"></i>&nbsp;</a></div>';
                    // if($n->status==1)
                    // {   
                    //     $verified_url = route('admin.role.changestatus',["id" => $encryptid,"status"=>0]);
                    //     $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this page ?`)"  href="#"><label class="right badge badge-success" style="background-color:green">Active</label></a>' . ' ';
                    // }
                    // elseif($n->status==0)
                    // {
                    //     $verified_url = route('admin.role.changestatus',["id" =>$encryptid,"status"=>1]);
                        
                    //     $sub[] = '<a data-toggle="tooltip" title="click here to active" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to activate this page ?`)"  href="#"><label class="right badge badge-danger" style="background-color:red">In-Active</label></a>' . ' ';
                    // }
                $sub[] = $action;
                $response[] = $sub;
            }
            $userjson = json_encode(["data" => $response]);
            echo $userjson;
    }

    public function changestatus($id,$status)
    {
        $encryid = Crypt::decryptString($id);
        Role::where('id',$encryid)->update(['status'=>$status]);
        if ($status == 1) {
                $msg = 'Role Active Successfully.';
        } elseif ($status == 0) {
                $msg = 'Role Inactive Successfully.';
        }
        return redirect()->route('admin.role')->with('success', $msg);
    }
}