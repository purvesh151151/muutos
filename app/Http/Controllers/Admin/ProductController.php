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
use App\Product;
use App\Brand;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    
    public function index()
    {
        
        return view('admin.product.index');
    }

    public function create()
    {
        $brands = Brand::where('status',1)->get();
        return view('admin.product.add',compact('brands'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => "required|unique:products,name",
        ]);
        
        $product = new Product;
        $product->name = request('name');
        $product->slug = Str::slug(request('name'), '-');
        $product->details = request('details');
        $product->price = request('price');
        $product->description = request('description');
        $product->price = request('price');
        $product->brand_id = request('brand');
        if ($request->file('productimage')) {
            $image = $request->image;
            $path = $request->file('productimage')->store('productimage');
            $product->productimage = isset($path) ? $path : '';
        }
        $product->save();
        return redirect()->route('admin.product')->with("success","Product added successfully.");
    }

    

    public function edit($id)
    {   
        $encryid = Crypt::decryptString($id);
        $productdata = Product::find($encryid);
        $brands = Brand::where('status',1)->get();
        return view('admin.product.edit',compact('productdata','brands'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'name' => "required|unique:products,name,".$id,
        ]);

        $product = Product::find($id);
        $product->name = request('name');
        // $product->slug = Str::slug(request('name'), '-');
        $product->details = request('details');
        $product->price = request('price');
        $product->description = request('description');
        $product->price = request('price');
        $product->brand_id = request('brand');
        if ($request->file('productimage')) {
            $image = $request->image;
            $path = $request->file('productimage')->store('productimage');
            $product->productimage = isset($path) ? $path : '';
        }
        $product->save();
        return redirect()->route('admin.product')->with('success','Product updated successfully.');
    }

    public function delete($id)
    {
        $encryid = Crypt::decryptString($id);
        $product = Product::find($encryid);
        if($product){
          $product->delete();
        }
        return redirect()->route('admin.product')->with('success','Product deleted successfully.');
	}

	public function arraydata(Request $request)
    {
            $response = [];
            $product = Product::all();
            foreach ($product as $n) {
                $sub   = [];
                $id    = $n->id;
                $encryptid = Crypt::encryptString($id);
                $sub[] = $id;
                $sub[] = "<img src=".$n->productimage." class='listinfimgthumb' alt='Profile'>";
                $sub[] = $n->name;
                $sub[] = $n->price;
                $sub[] = $n->brand->name;
                $delete_url = route('admin.product.delete', ["id" => $encryptid]);
                $action = '';
                if(auth()->user()->can('product-edit')){
                    $action .= '<a class="edit" href="' . route('admin.product.edit', $encryptid) . '"><i class="far fa-edit"></i></a>' . ' ';
                }
                if(auth()->user()->can('product-delete')){
                    $action .= '<a class="delete" onclick="return confirm(`' . $delete_url . '`,`Are you sure you want to delete this record?`)"  ><i class="far fa-trash-alt"></i>&nbsp;</a>';
                }
                    if($n->status==1)
                    {
                        $verified_url = route('admin.product.changestatus',["id" => $encryptid,"status"=>0]);
                        $sub[] = '<a data-toggle="tooltip" title="click here to inactive" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to inactivate this product ?`)"  href="#"><label class="right badge badge-success" style="background-color:green">Active</label></a>' . ' ';
                    }
                    elseif($n->status==0)
                    {
                        $verified_url = route('admin.product.changestatus',["id" =>$encryptid,"status"=>1]);
                        
                        $sub[] = '<a data-toggle="tooltip" title="click here to active" style="color:red" onclick="return confirm(`' . $verified_url . '`,`Are you sure you want to activate this product  ?`)"  href="#"><label class="right badge badge-danger"  style="background-color:red">In-Active</label></a>' . ' ';
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
        Product::where('id',$encryid)->update(['status'=>$status]);
        if ($status == 1) {
                $msg = 'Product Active Successfully.';
        } elseif ($status == 0) {
                $msg = 'Product Inactive Successfully.';
        }
        return redirect()->route('admin.product')->with('success', $msg);
    }



}