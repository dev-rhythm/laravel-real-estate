<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ManageApi extends Authenticatable
{
    
    protected $table = "manage_apis";

    protected $fillable = [
        'api_key', 'api_id'
    ];

    protected $guarded = [];

}