<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;

class Setting extends Model
{
    protected $table = 'settings';
    
    protected $fillable = [
      'adminemail',
      'supportemail',
      'smtpdriver',
      'smtphost',
      'smtport',
      'smtpusername',
      'smtppassword',
      'smtpencrption',
      'cino',
      'panno',
      'gstn',
      'servicecode',
      'cgst',
      'sgst',
      'backaccno',
      'backname',
      'ifsccode',
      'status'
   	];
   	

}
