<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public $timestamps = false;

    protected $table = "registration";

    protected $guarded  = [];

    public function vohdata()
    {
        return $this->belongsTo(VOH::class, 'id', 'voh_id');
    }
}