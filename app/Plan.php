<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name','price', 'active_listing', 'listing_agent'
    ];
}
