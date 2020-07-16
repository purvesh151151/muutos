<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\User;
use Validator;
use Mail;
use App\VerifyUser;
use App\Mail\VerifyMail;
use App\Mail\PasswordResetEmailSend;
use App\Helpers\CommanHelper;
use Auth;
use Spatie\Permission\Models\Role;
use Hash;

class VendorController extends Controller
{
    
    public function index()
    {
        
        return view('admin.vendor.index');
    }

    public function create()
    {
        return view('admin.vendor.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'email' => 'required|unique:users',
            'mobile' => 'required|unique:users',
            'profileimage' => 'required|mimes:jpeg,bmp,png,jpg',
        ]);
        
        $user = new User;
        $user->name = request('name');
        $user->lastname = request('lastname');
        $user->company = request('company');
        $user->email = request('email');
        $user->password = Hash::make('12345678');
        $user->address = request('address');
        $user->city = request('city');
        $user->bio = request('bio');
        // $user->phone = request('phone');
        $user->mobile = request('mobile');
        if ($request->file('profileimage')) {
            $image = $request->image;
            $path = $request->file('profileimage')->store('profileimage');
            $user->profileimage = isset($path) ? $path : '';
        }
        $user->save();
        $user->assignRole(2);
        try {
        // $user->passwordorignal = "12345678";
        // $user->utokan = $user->verifyUser->token;
        // Mail::to($request->email)->send(new VerifyMail($user));
        } catch (Exception $e) {

        }
        return redirect()->route('admin.vendor')->with("success","Vendor added successfully.");
    }

    

    public function edit($id)
    {   
        $encryid = Crypt::decryptString($id);
        $usersdata = User::find($encryid);
        return view('admin.vendor.edit',compact('usersdata'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'email' => 'required|email|unique:users,id,'.$id,
            'mobile' => 'required|unique:users,id,'.$id,
            'profileimage' => 'mimes:jpeg,bmp,png,jpg',
        ]);

        $user = User::find($id);
        $user->name = request('name');
        $user->lastname = request('lastname');
        $user->company = request('company');
        $user->password = Hash::make('12345678');
        $user->address = request('address');
        $user->city = request('city');
        $user->bio = request('bio');
        if ($request->file('profileimage')) {
            $image = $request->image;
            $path = $request->file('profileimage')->store('profileimage');
            $user->profileimage = isset($path) ? $path : '';
        }
        $user->save();
        return redirect()->route('admin.vendor')->with('success','Vendor updated successfully.');
    }

    public function delete($id)
    {
        $encryid = Crypt::decryptString($id);
        $user = User::find($encryid);
        if($user){
          $user->delete();
        }
        return redirect()->route('admin.vendor')->with('success','Vendor deleted successfully.');
	}

	public function arraydata(Request $request)
    {
            $response = [];
            $user = User::all();
            $user = User::whereHas('roles', function ($query) {
                $query->where('name', ['vendor']);
            })->get();
            foreach ($user as $n) {
                $sub   = [];
                $id    = $n->id;
                $encryptid = Crypt::encryptString($id);
                $sub[] = $id;
                $sub[] = "<img src=".$n->profileimage." class='listinfimgthumb' alt='Profile'>";
                $sub[] = $n->name;
                $sub[] = $n->email;
                $sub[] = $n->mobile;
                $sub[] = $n->city;
                $delete_url = route('admin.vendor.delete', ["id" => $encryptid]);
                $action = '';
                if(auth()->user()->can('vendor-edit')){
                    $action .= '<a class="edit" href="' . route('admin.vendor.edit', $encryptid) . '"><i class="far fa-edit"></i></a>' . ' ';
                }
                if(auth()->user()->can('vendor-delete')){
                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="far fa-trash-alt"></i>&nbsp;</a>';
                }
                    if($n->status==1)
                    {
                        $verified_url = route('admin.vendor.changestatus',["id" => $encryptid,"status"=>0]);
                        $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this vendor ?`)"  href="#"><label class="right badge badge-success" style="background-color:green">Active</label></a>' . ' ';
                    }
                    elseif($n->status==0)
                    {
                        $verified_url = route('admin.vendor.changestatus',["id" =>$encryptid,"status"=>1]);
                        
                        $sub[] = '<a data-toggle="tooltip" title="click here to active" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to activate this vendor ?`)"  href="#"><label class="right badge badge-danger"  style="background-color:red">In-Active</label></a>' . ' ';
                    }
                $sub[] = $action;

                // hiddendata
                $sub[] = $n->lastname;
                

                $response[] = $sub;
            }
            $userjson = json_encode(["data" => $response]);
            echo $userjson;
    }

    public function changestatus($id,$status)
    {
        $encryid = Crypt::decryptString($id);
        User::where('id',$encryid)->update(['status'=>$status]);
        if ($status == 1) {
                $msg = 'Vendor Active Successfully.';
        } elseif ($status == 0) {
                $msg = 'Vendor Inactive Successfully.';
        }
        return redirect()->route('admin.vendor')->with('success', $msg);
    }



}