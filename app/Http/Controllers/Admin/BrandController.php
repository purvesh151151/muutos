<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\User;
use Validator;
use Mail;
use App\Helpers\CommanHelper;
use Auth;
use App\Productcategory;
use App\Brand;

class BrandController extends Controller
{
    
    public function index()
    {
        
        return view('admin.brand.index');
    }

    public function create()
    {
        return view('admin.brand.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
        ]);
        
        $brand = new Brand;
        $brand->name = request('name');
        if ($request->file('brandlogo')) {
            $image = $request->image;
            $path = $request->file('brandlogo')->store('brandlogo');
            $brand->brandlogo = isset($path) ? $path : '';
        }
        $brand->save();
        return redirect()->route('admin.brand')->with("success","Brand added successfully.");
    }

    

    public function edit($id)
    {   
        $encryid = Crypt::decryptString($id);
        $branddata = Brand::find($encryid);
        return view('admin.brand.edit',compact('branddata'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'name' => 'required',
        ]);

        $brand = Brand::find($id);
        $brand->name = request('name');
        if ($request->file('brandlogo')) {
            $image = $request->image;
            $path = $request->file('brandlogo')->store('brandlogo');
            $brand->brandlogo = isset($path) ? $path : '';
        }
        $brand->save();
        return redirect()->route('admin.brand')->with('success','Brand updated successfully.');
    }

    public function delete($id)
    {
        $encryid = Crypt::decryptString($id);
        $brand = Brand::find($encryid);
        if($brand){
          $brand->delete();
        }
        return redirect()->route('admin.brand')->with('success','Brand deleted successfully.');
	}

	public function arraydata(Request $request)
    {
            $response = [];
            $brand = Brand::all();
            foreach ($brand as $n) {
                $sub   = [];
                $id    = $n->id;
                $encryptid = Crypt::encryptString($id);
                $sub[] = $id;
                $sub[] = "<img src=".$n->brandlogo." class='listinfimgthumb' alt='Profile'>";
                $sub[] = $n->name;
                $delete_url = route('admin.brand.delete', ["id" => $encryptid]);
                $action = '';
                if(auth()->user()->can('brand-edit')){
                $action .= '<a class="edit" href="' . route('admin.brand.edit', $encryptid) . '"><i class="far fa-edit"></i></a>' . ' ';
                }
                if(auth()->user()->can('brand-delete')){
                $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="far fa-trash-alt"></i>&nbsp;</a>';
                }
                if($n->status==1)
                {
                    $verified_url = route('admin.brand.changestatus',["id" => $encryptid,"status"=>0]);
                    $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this brand ?`)"  href="#"><label class="right badge badge-success" style="background-color:green">Active</label></a>' . ' ';
                }
                elseif($n->status==0)
                {
                    $verified_url = route('admin.brand.changestatus',["id" =>$encryptid,"status"=>1]);
                    
                    $sub[] = '<a data-toggle="tooltip" title="click here to active" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to activate this brand  ?`)"  href="#"><label class="right badge badge-danger"  style="background-color:red">In-Active</label></a>' . ' ';
                }
                $sub[] = $action;
                $response[] = $sub;
            }
            $userjson = json_encode(["data" => $response]);
            echo $userjson;
    }

    public function changestatus($id,$status)
    {
        $encryid = Crypt::decryptString($id);
        Brand::where('id',$encryid)->update(['status'=>$status]);
        if ($status == 1) {
                $msg = 'Brand Active Successfully.';
        } elseif ($status == 0) {
                $msg = 'Brand Inactive Successfully.';
        }
        return redirect()->route('admin.brand')->with('success', $msg);
    }



}