<?php
namespace App\Helpers;


use DB;
use App\User;
use App\Claimdetail;
use App\Investigation;
use Carbon\Carbon;
use Auth;
use App\Client;
use App\Setting;


class CommanHelper {

    public static function SendSms($number,$message,$countrycode){
        $countrycode=isset($countrycode)?$countrycode:'966';
        $fields = array(
                'api_id'=>'API460582567559',
                'api_password'=>'Lvqe72RcNB',
                'phonenumber' =>$countrycode.$number,
                'textmessage' => $message,
                'sms_type'=>'P',
                'encoding'=>'T',
                'sender_id'=>'TSTALA'
            );
        $headers = array(
        //         'Authorization: key=AAAARdcQZVA:APA91bGH-tG2aWuKr2kdTY7EoHISqqZ8I9vFtM8iHOqmev2XwKrSKXRyq9oGYtXq6MHUbqPQjXZyLO5THpb2bALeCpp3wN6zVmxRiJengvKhPdJimyeTGuhKBz-cyjRsNEL7qBNTBj0r',
                 'Content-Type: application/json'
             );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.smsala.com/api/SendSMS');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

	public static function dateformatYmd($date) {
        $formatdate = date("Y-m-d",strtotime($date));
        return $formatdate;
    }
    
    //Date Time
    public static function dateformatdmY($date) {
        $formatdate = date("d-m-Y",strtotime($date));
        return $formatdate;
    }

    public static function dateformatmmddY($date) {
        $formatdate = date("m-d-Y",strtotime($date));
        return $formatdate;
    }
    
    public static function dateformatMdY($date) {
        $formatdate = date("M d, Y",strtotime($date));
        return $formatdate;
    }


    public static function dateformatIndian($date) {
        $formatdate = date("d-m-Y H:i:s",strtotime($date));
        return $formatdate;
    }
    

    public static function timeampm($time) {
        $formatdate = date("h:i A",strtotime($time));
        return $formatdate;
    }

    public static function getpendinginvoice()
    {

        $role = Auth::user()->roles->first()->id;
        $claimdetail = Claimdetail::where('status','=',1)->where('claimstatus_id','=',2)->whereNotNull('invoicepath')->where('paymentstatus','=',0)->orderBy('updated_at', 'desc')->limit(5)->get();
        return $claimdetail;
    }

    public static function getbyidclaim($id) {
        $data = Client::find($id);
        $setting = Setting::first();
        $total  = 0;
        if($data->amount)
        {
            $amounts = $data->amount;
            $cgst = $setting->cgst;
            $sgst = $setting->sgst;
            //calculate cgst
            $cgstamount = $amounts * $cgst / 100;
            $sgstamount = $amounts * $sgst / 100;
            $total =  $amounts + $cgstamount + $sgstamount;
        }
        return $total;
    }

    public static function getrecetlyclaims()
    {

        $role = Auth::user()->roles->first()->id;
        if($role == 1){
            $claimdetail = Claimdetail::where('status','=',1)->orderBy('created_at', 'desc')->limit(5)->get();
        }elseif($role == 3){
            $claimdetail = Claimdetail::where('status','=',1)->where('officer_name','=',Auth::user()->id)->orderBy('updated_at', 'desc')->limit(5)->get();
        }else{
            $claimdetail = Claimdetail::where('status','=',1)->where('claimowner_id','=',Auth::user()->id)->orderBy('updated_at', 'desc')->limit(5)->get();
        }
        
        return $claimdetail;
    }

    public static function getallclaims()
    {   
        $role = Auth::user()->roles->first()->id;
        if($role == 1){
            $getallclaims = Claimdetail::where('status','=',1)->count();
        }elseif($role == 3){
            $getallclaims = Claimdetail::where('status','=',1)->where('officer_name','=',Auth::user()->id)->count();
        }else{
            $getallclaims = Claimdetail::where('status','=',1)->where('claimowner_id','=',Auth::user()->id)->count();
        }
        return $getallclaims;
    }

    public static function getcompletedclaims()
    {
        $role = Auth::user()->roles->first()->id;
        if($role == 1){
            $getcompletedclaims = Investigation::where('investigationstatus','=',3)->whereMonth('completiondate', '=', date('m'))->whereYear('completiondate', '=', date('Y'))->count();
        }elseif($role == 3){
            $getcompletedclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.investigationstatus','=',3)->whereMonth('investigation.completiondate', '=', date('m'))->whereYear('investigation.completiondate', '=', date('Y'))->where('claimdetail.officer_name','=',Auth::user()->id)->count();
        }else{
            $getcompletedclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.investigationstatus','=',3)->whereMonth('investigation.completiondate', '=', date('m'))->whereYear('investigation.completiondate', '=', date('Y'))->where('claimdetail.claimowner_id','=',Auth::user()->id)->count();
        }
        
        return $getcompletedclaims;
    }

    public static function getnewmonthlyclaims()
    {
        $role = Auth::user()->roles->first()->id;
        if($role == 1){
        $getnewmonthlyclaims = Claimdetail::where('status','=',1)->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        }elseif($role == 3){
        $getnewmonthlyclaims = Claimdetail::where('status','=',1)->where('officer_name','=',Auth::user()->id)->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        } else{
        $getnewmonthlyclaims = Claimdetail::where('status','=',1)->where('claimowner_id','=',Auth::user()->id)->whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=', date('Y'))->count();
        }            
        return $getnewmonthlyclaims;
    }

    public static function getoutoftatclaims()
    {
        // $getoutoftatclaims = Claimdetail::where('status','=',1)->whereDate('tat_date_fo', '>', Carbon::today()->toDateString())->count();
        $role = Auth::user()->roles->first()->id;
        if($role == 1){
        $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->whereMonth('investigation.created_at', '=', date('m'))->whereYear('investigation.created_at', '=', date('Y'))->count();
        }elseif($role == 3){
        $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('claimdetail.officer_name','=',Auth::user()->id)->whereMonth('investigation.created_at', '=', date('m'))->whereYear('investigation.created_at', '=', date('Y'))->count();
        }else{
        $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('claimdetail.claimowner_id','=',Auth::user()->id)->whereMonth('investigation.created_at', '=', date('m'))->whereYear('investigation.created_at', '=', date('Y'))->count();
        }
        return $getoutoftatclaims;
    }



    public static function getavgoutoftatclaims()
    {
        
        $role = Auth::user()->roles->first()->id;
        $avg = 0;
        if($role == 1){
            $getoutoftatclaimsss = Investigation::select(DB::raw("count(investigation.id) as iid"),DB::raw('YEAR(investigation.created_at) year, MONTH(investigation.created_at) month'))->leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->groupBy('month','year')->get();
            // dd($getoutoftatclaimsss);
                // use for get month record    
            $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->whereMonth('investigation.created_at', '=', date('m'))->whereYear('investigation.created_at', '=', date('Y'))->count();
            // dd($getoutoftatclaims);
            if($getoutoftatclaims){
                if($getoutoftatclaimsss->count() == 0){
                    $count = 1;
                }else{
                    $count = $getoutoftatclaimsss->count();
                }
                $avg = $getoutoftatclaims / $count;
            }
        }elseif($role == 3){
            // use for get number of month
            $getoutoftatclaimsss = Investigation::select(DB::raw("count(investigation.id) as iid"),DB::raw('YEAR(investigation.created_at) year, MONTH(investigation.created_at) month'))->leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('claimdetail.officer_name','=',Auth::user()->id)->groupBy('month','year')->get();
            // dd($getoutoftatclaimsss);

            // use for get month record    
            $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('claimdetail.claimowner_id','=',Auth::user()->id)->whereMonth('investigation.created_at', '=', date('m'))->whereYear('investigation.created_at', '=', date('Y'))->count();
            if($getoutoftatclaims){
                if($getoutoftatclaimsss->count() == 0){
                    $count = 1;
                }else{
                    $count = $getoutoftatclaimsss->count();
                }
                $avg = $getoutoftatclaims / $count;
            }   

        }else{
            // use for get number of month
            $getoutoftatclaimsss = Investigation::select(DB::raw("count(investigation.id) as iid"),DB::raw('YEAR(investigation.created_at) year, MONTH(investigation.created_at) month'))->leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('claimdetail.claimowner_id','=',Auth::user()->id)->groupBy('month','year')->get();
            // dd($getoutoftatclaimsss);

            // use for get month record    
            $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('claimdetail.claimowner_id','=',Auth::user()->id)->whereMonth('investigation.created_at', '=', date('m'))->whereYear('investigation.created_at', '=', date('Y'))->count();
            if($getoutoftatclaims){
                if($getoutoftatclaimsss->count() == 0){
                    $count = 1;
                }else{
                    $count = $getoutoftatclaimsss->count();
                }
                $avg = $getoutoftatclaims / $count;
            }   

        }
        
        return ceil($avg);
    }

    public static function getlistoutoftatclaims()
    {
        $role = Auth::user()->roles->first()->id;
        if($role == 1){
            $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->orderBy('investigation.created_at', 'desc')->limit(6)->get(); 
        }elseif($role == 3){
            $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('claimdetail.officer_name','=',Auth::user()->id)->orderBy('investigation.created_at', 'desc')->limit(6)->get();
        }else{
            $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('claimdetail.claimowner_id','=',Auth::user()->id)->orderBy('investigation.created_at', 'desc')->limit(6)->get();
        }
        // dd($getoutoftatclaims);

        return $getoutoftatclaims;
    }


    public static function getcountoutoftatclaims()
    {
        $role = Auth::user()->roles->first()->id;
        if($role == 1){
            $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('investigation.investigationstatus' ,"=", 3)->count();
        }elseif($role == 3){
            $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('investigation.investigationstatus' ,"=", 3)->where('claimdetail.officer_name' ,"=",Auth::user()->id)->count();
        }else{
            $getoutoftatclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigation.completiondate' ,">", DB::raw("claimdetail.tat_date_fo"))->where('investigation.investigationstatus' ,"=", 3)->where('claimdetail.claimowner_id' ,"=",Auth::user()->id)->count();
        }
        return $getoutoftatclaims;
    }

    public static function getcountopenclaims()
    {
        $role = Auth::user()->roles->first()->id;
        if($role == 1){
        $getcountopenclaims = Investigation::where('investigationstatus' ,"=", 1)->count();
        }elseif($role == 3){
        $getcountopenclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigationstatus' ,"=", 1)->where('claimdetail.officer_name','=',Auth::user()->id)->count();
        }else{
        $getcountopenclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigationstatus' ,"=", 1)->where('claimdetail.claimowner_id','=',Auth::user()->id)->count();
        }
        return $getcountopenclaims;
    }

    public static function getcountcloseclaims()
    {
        $role = Auth::user()->roles->first()->id;
        if($role == 1){
            $getcountopenclaims = Investigation::where('investigationstatus' ,"=", 2)->count();
        }elseif($role == 3){
            $getcountopenclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigationstatus' ,"=", 2)->where('claimdetail.officer_name','=',Auth::user()->id)->count();
        }else{
            $getcountopenclaims = Investigation::leftjoin('claimdetail','investigation.claim_id','=','claimdetail.id')->where('investigationstatus' ,"=", 2)->where('claimdetail.claimowner_id','=',Auth::user()->id)->count();
        }
        return $getcountopenclaims;
    }



    public static function userrole($id)
    {
        // $getoutoftatclaims = Claimdetail::where('status','=',1)->whereDate('tat_date_fo', '>', Carbon::today()->toDateString())->count();
        $u = User::where('id',"=",$id)->first();
        $role = $u->roles->first()->id;
        return $role;
    }
    
}