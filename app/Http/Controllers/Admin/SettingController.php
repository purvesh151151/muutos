<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Setting;

class SettingController extends Controller
{
    
    public function index()
    { 
        return view('admin.setting.index');
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'adminemail' => 'required',
            'supportemail' => 'required',
            'smtpdriver' => 'required',
            'smtphost' => 'required',
            'smtpport' => 'required',
            'smtpusername' => 'required',
            'smtppassword' => 'required',
            'smtpencrption' => 'required'
        ]);
        $setting = new Setting;
        $setting->adminemail = request('adminemail');
        $setting->supportemail = request('supportemail');
        $setting->smtpdriver = request('smtpdriver');
        $setting->smtphost = request('smtphost');
        $setting->smtpport = request('smtpport');
        $setting->smtpusername = request('smtpusername');
        $setting->smtppassword = request('smtppassword');
        $setting->smtpencrption = request('smtpencrption');
        $setting->status = 1;
        $setting->save();
        return redirect()->route('admin.setting')->with("success","Setting added successfully.");
    }

    

    public function edit($id)
    {   
        $encryid = Crypt::decryptString($id);
        $setting = Setting::find($encryid);
        return view('admin.setting.edit',['settingdata'=>$setting]);
    }

    public function update(Request $request, $id)
    {
        // dd("Asd");
    	$this->validate($request, [
            'adminemail' => 'required',
            'supportemail' => 'required',
            'smtpdriver' => 'required',
            'smtphost' => 'required',
            'smtpport' => 'required',
            'smtpusername' => 'required',
            'smtppassword' => 'required',
            'smtpencrption' => 'required',
        ]);
        $setting = Setting::find($id);
        $setting->adminemail = request('adminemail');
        $setting->supportemail = request('supportemail');
        $setting->smtpdriver = request('smtpdriver');
        $setting->smtphost = request('smtphost');
        $setting->smtpport = request('smtpport');
        $setting->smtpusername = request('smtpusername');
        $setting->smtppassword = request('smtppassword');
        $setting->smtpencrption = request('smtpencrption');
        $setting->save();
        return redirect()->route('admin.setting')->with('success','Setting updated successfully.');
    }

    public function delete($id)
    {
        $encryid = Crypt::decryptString($id);
        $product = Product::find($encryid);
        if($product){
          // $product->delete();
        }
        return redirect()->route('admin.product')->with('success','Product deleted successfully.');
	}

	public function arraydata(Request $request)
    {
            $response = [];
            $setting = Setting::all();
            foreach ($setting as $n) {
                $sub   = [];
                $id    = $n->id;
                $sub[] = $id;
                $sub[] = $n->adminemail;
                $sub[] = $n->supportemail;
                $sub[] = $n->smtpdriver;
                $sub[] = $n->smtpusername;
                $sub[] = $n->smtphost;
                $sub[] = $n->smtpport;
                $sub[] = $n->smtpencrption;
                if(auth()->user()->can('setting-edit')){
                    $encryptid = Crypt::encryptString($id);
                    $action = '<div class="btn-part"><a class="edit" href="' . route("admin.setting.edit", $encryptid) . '"><i class="far fa-edit"></i></a></div>';
                    $sub[] = $action;
                }
                $response[] = $sub;
            }
            $userjson = json_encode(["data" => $response]);
            echo $userjson;
    }

    public function changestatus($id,$status)
    {
        $encryid = Crypt::decryptString($id);
        Setting::where('id',$encryid)->update(['status'=>$status]);
        if ($status == 1) {
                $msg = 'Setting Active Successfully.';
        } elseif ($status == 0) {
                $msg = 'Setting Inactive Successfully.';
        }
        return redirect()->route('admin.setting')->with('success', $msg);
    }
}