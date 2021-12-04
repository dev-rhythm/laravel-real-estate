<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'tbl_invoices';
    protected $guarded =[];

    public function getPaidAttribute() {
    	if ($this->payment_status == 'Invalid') {
    		return false;
    	}
    	return true;
    }

   public function users()
   {
       return $this->hasMany('App\User', 'id', 'user_id');
   }

   public function plan()
   {
       return $this->hasOne('App\Plan', 'id', 'plan_id');
   }
}
