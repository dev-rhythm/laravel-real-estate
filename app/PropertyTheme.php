<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyTheme extends Model
{
    protected $table = 'tbl_property_theme';

    protected $guarded = [];

    public function template()
    {
        return $this->belongsTo('App\Theme', 'theme_id', 'id');
    }
}
