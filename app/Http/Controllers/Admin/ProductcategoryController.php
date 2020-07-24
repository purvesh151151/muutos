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

class ProductcategoryController extends Controller
{
    
    public function index()
    {
        
        return view('admin.productcategory.index');
    }

    public function create()
    {
        return view('admin.productcategory.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
        ]);
        
        $productcategory = new Productcategory;
        $productcategory->name = request('name');
        $productcategory->description = request('description');
        if ($request->file('categoryimage')) {
            $image = $request->image;
            $path = $request->file('categoryimage')->store('categoryimage');
            $productcategory->categoryimage = isset($path) ? $path : '';
        }
        $productcategory->save();
        return redirect()->route('admin.productcategory')->with("success","Product Category added successfully.");
    }

    

    public function edit($id)
    {   
        $encryid = Crypt::decryptString($id);
        $productcategorydata = Productcategory::find($encryid);
        return view('admin.productcategory.edit',compact('productcategorydata'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'name' => 'required',
        ]);

        $productcategory = Productcategory::find($id);
        $productcategory->name = request('name');
        $productcategory->description = request('description');
        if ($request->file('categoryimage')) {
            $image = $request->image;
            $path = $request->file('categoryimage')->store('categoryimage');
            $productcategory->categoryimage = isset($path) ? $path : '';
        }
        $productcategory->save();
        return redirect()->route('admin.productcategory')->with('success','Product Category updated successfully.');
    }

    public function delete($id)
    {
        $encryid = Crypt::decryptString($id);
        $productcategory = Productcategory::find($encryid);
        if($productcategory){
          $productcategory->isdelete = 1;
          $productcategory->save();
        }
        return redirect()->route('admin.productcategory')->with('success','Product Category deleted successfully.');
	}

	public function arraydata(Request $request)
    {
            $response = [];
            $productcategory = Productcategory::where('isdelete','0')->get();
            foreach ($productcategory as $n) {
                $sub   = [];
                $id    = $n->id;
                $encryptid = Crypt::encryptString($id);
                $sub[] = $id;
                $sub[] = "<img src=".$n->categoryimage." class='listinfimgthumb' alt='Profile'>";
                $sub[] = $n->name;
                $delete_url = route('admin.productcategory.delete', ["id" => $encryptid]);
                $action = '';
                if(auth()->user()->can('productcategory-edit')){
                    $action .= '<a class="edit" href="' . route('admin.productcategory.edit', $encryptid) . '"><i class="far fa-edit"></i></a>' . ' ';
                }
                if(auth()->user()->can('productcategory-delete')){
                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="far fa-trash-alt"></i>&nbsp;</a>';
                }
                if($n->status==1)
                {
                    $verified_url = route('admin.productcategory.changestatus',["id" => $encryptid,"status"=>0]);
                    $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this product category ?`)"  href="#"><label class="right badge badge-success" style="background-color:green">Active</label></a>' . ' ';
                }
                elseif($n->status==0)
                {
                    $verified_url = route('admin.productcategory.changestatus',["id" =>$encryptid,"status"=>1]);
                    
                    $sub[] = '<a data-toggle="tooltip" title="click here to active" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to activate this Product category  ?`)"  href="#"><label class="right badge badge-danger"  style="background-color:red">In-Active</label></a>' . ' ';
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
        Productcategory::where('id',$encryid)->update(['status'=>$status]);
        if ($status == 1) {
                $msg = 'Product Category Active Successfully.';
        } elseif ($status == 0) {
                $msg = 'Product Category Inactive Successfully.';
        }
        return redirect()->route('admin.productcategory')->with('success', $msg);
    }



}