<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VOH extends Model
{
    protected  $table = 'tbl_voh';

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'voh_id', 'id');
    }
}