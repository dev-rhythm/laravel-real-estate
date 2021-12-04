<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = "tbl_properties";

    protected $guarded  = [];
    protected $appends  = ['paddress'];


    /**
     * Get property address
     */
    public function getPaddressAttribute()
    {
        $country  = \DB::table("countries")->where('id', $this->country)->first();
        $state    = \DB::table("states")->where("id", $this->state)->first();
        $city     = \DB::table("cities")->where("id", $this->city)->first();

        return $city->name . ', ' . $state->name . ', ' . $country->name . ', ' . $this->zipcode;
    }

    /**
     * Get location ID's
     */
    public static function getLocationIds($countryName = 'United States', $stateName, $cityName){

        $country = \DB::table("countries")->where(["name" => $countryName])->first();
        $state = \DB::table("states")->where(["name" => $stateName, "country_id" => $country->id])->first();
        $city = \DB::table("cities")->where(["name" => $cityName, "state_id" => $state->id])->first();

        $countryId = $country->id ?? null;
        $stateId = $state->id ?? null;
        $cityId = $city->id ?? null;

        $location = compact("countryId", "stateId", "cityId");

        return $location;
    }

    public function propertydetails()
    {
        return $this->hasOne(PropertyDetails::class, 'property_id', 'id');
    }

    public function propertyTheme()
    {
        return $this->hasOne(PropertyTheme::class, 'property_id', 'id');
    }

    public function propertyPhoto()
    {
        return $this->hasMany(PropertyPhotos::class, 'property_id', 'id');
    }

    public function propertyVirtual()
    {
        return $this->hasMany(Virtual::class, 'property_id', 'id');
    }

    public function propertyVideo()
    {
        return $this->hasMany(Video::class, 'property_id', 'id');
    }


    public function propertyVOH()
    {
        return $this->hasMany(VOH::class, 'property_id', 'id');
    }

    public function propertyFloor()
    {
        return $this->hasMany(Floor::class, 'property_id', 'id');
    }

    public function propertyAdvance()
    {
        return $this->hasOne(Advance::class, 'property_id', 'id');
    }

    public function propertyOwner()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}