<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;
use App\ManageApi;
use App\Property;
use App\PropertyDetails;
use App\VOH;
use App\PropertyPhotos;
use App\Virtual;
use App\User;


class ImportPropertyController extends Controller {   

    /**
    * function to display IDX listings.
    *
    */
    public function idxListing(){

        $user_id = Auth::user()->id;
        $manageApi = ManageApi::where(['user_id' => $user_id, 'api_id' => 'idx'])->first();

        if(!empty($manageApi)){

            $accessKey = $manageApi->api_key;

            $properties = self::getIdxListing($user_id, $accessKey);

            if(!empty($properties)){

                $listing_ids = [];
                $property = Property::where(['user_id' => $user_id])->where('listing_id', '<>', '')->get();

                if(!empty($property)){
                    foreach($property as $p){
                        $listing_ids[] =  $p->listing_id;
                    }
                }

                return view('frontend.import-property.index', compact('properties', 'listing_ids'));
            }
        }
        
        return view('frontend.import-property.index');
    }


    /**
    * function to import property listings from IDX.
    *
    */
    public function importListing(Request $request){

        $processFlag = true;
        $properties = [];

        $user_id = Auth::user()->id;
        $manageApi = ManageApi::where(['user_id' => $user_id, 'api_id' => 'idx'])->first();
        $accessKey = $manageApi->api_key;

        $listing_ids = $request->listings_idx;

        if(!empty($listing_ids)) {

            $listings = self::getIdxListing($user_id, $accessKey);

            foreach ($listings as $listing){

                if(in_array($listing['listingID'], $listing_ids)){

                    $properties[$listing['listingID']] = $listing;          
                }
            }

        }else {
            $processFlag = false;
        }

        if($processFlag){

            foreach($properties as $prop){

                $propertyExist = Property::where(['listing_id' => $prop['listingID'], 'user_id' => $user_id])->first();

                if(empty($propertyExist)){

                    $location = Property::getLocationIds('United States', $prop['state'], $prop['cityName']);

                    /*********** Save Property ************/
                    $property = new Property();
                    $property->user_id = $user_id;
                    $property->listing_id = $prop['listingID'];
                    $property->is_imported = 'y';
                    $property->country = $location['countryId'];
                    $property->state = $location['stateId'];
                    $property->city = $location['cityId'];
                    $property->zipcode = $prop['zipcode'];
                    $property->street = $prop['streetName'];
                    $propertySaved = $property->save();

                    if($propertySaved){
                        
                        $currencies = \DB::table("currencies")->where('country', 'United States of America')->first();
                        $currency_symbol = $currencies->symbol;

                        $amenties = null;
                        if(isset($prop['advanced']['associationAmenities'])){
                            $amenties = implode(',', $prop['advanced']['associationAmenities']);
                        }

                        /*********** Save Property Details ************/
                        $property_details = new PropertyDetails();
                        $property_details->property_id      = $property->id;
                        $property_details->currency         = $currency_symbol;
                        $property_details->currency_country = 'United States of America';
                        $property_details->name             = $prop['address'];
                        $property_details->description      = $prop['remarksConcat'] ?? '';
                        $property_details->amenties         = $amenties;
                        $property_details->listing_status   = $prop['propStatus'];
                        $property_details->type             = $prop['idxPropType'];
                        $property_details->list_price       = preg_replace('/[^0-9]+/', '', $prop['listingPrice']);
                        $property_details->display_price    = preg_replace('/[^0-9]+/', '', $prop['listingPrice']);
                        $property_details->year_built       = $prop['yearBuilt'] ?? null;
                        $property_details->bedrooms         = $prop['bedrooms'] ?? null;
                        $property_details->bathrooms        = $prop['totalBaths'] ?? null;
                        $property_details->half_baths       = $prop['partialBaths'] ?? null;
                        $property_details->sqr_foot         = $prop['sqFt'] ?? null;
                        $property_details->sqr_foot_metric  = isset($prop['sqFt']) ? 'sqft' : 'sqmt';
                        $property_details->lot_size         = $prop['acres'] ?? null;
                        $property_details->metric           = isset($prop['acres']) ? 'acre' : null;
                        $property_details->stories          = $prop['advanced']['stories'] ?? null;
                        $property_details->garage           = $prop['advanced']['garageType'][0] ?? null;
                        $property_details->parking_space    = $prop['advanced']['garageOrParkingSpaces'] ?? null;
                        $propertyDetailSaved = $property_details->save();

                        if($propertyDetailSaved){

                            /*********** Save Virtual Tour Videos ************/
                            if(isset($prop['vtCount']) && $prop['vtCount']){

                                foreach($prop['mediaData']['vt'] as $vt){

                                    if(!empty($vt['url']) && preg_match("/(vimeo|youtube)/i", $vt['url'])){

                                        $embedData = self::convertLinkToEmbed($vt['url']);

                                        if(!empty($embedData['link'])){
                                            $virtualTour = new Virtual();
                                            $virtualTour->property_id =  $property->id;
                                            $virtualTour->virtual_title = $embedData['source'].'_'.$vt['id'];
                                            $virtualTour->virtual_link = $embedData['link'];
                                            $virtualTour->save();
                                        }
                                    }
                                }
                            }

                            /*********** Save Property Images ************/
                            $image_urls = [];
                            $arr = [];

                            if(isset($prop['image'])){

                                foreach ($prop['image'] as $i) {

                                    if(count($image_urls) <= 4){
                                        $image_urls[] = $i['url'];
                                    }
                                }

                                foreach($image_urls as $url){

                                    $response = self::saveImage($url, $property->id);

                                    if($response['processFlag']){
                                        array_push($arr, [$response['file_name']]);
                                    }
                                }

                                foreach ($arr as $key => $photo) {
                                    $propertyphoto              = new PropertyPhotos();
                                    $propertyphoto->property_id = $property->id;
                                    $propertyphoto->images      = $photo[0];
                                    $propertyphoto->save();
                                }
                            }
                        }
                    }

                }else{
                    // do nothing
                } 
            }

            return redirect()->back()->with('success', 'Listing imported successfully.');
        }
        
        return redirect()->back();
    }


   /**
    * function to convert video url into embbed link.
    *
    */
    private static function convertLinkToEmbed($videoLink) {

        $embed = [];

        if (preg_match('/https:\/\/(?:www.)?(youtube).com\/watch\\?v=(.*?)/', $videoLink)) {
            $embed['link'] = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "www.youtube.com/embed/$1", $videoLink);
            $embed['source'] = 'youtube';
        }
            
        if (preg_match('/https:\/\/vimeo.com\/(\\d+)/', $videoLink, $regs)){
            
            $embed['link'] = 'http://player.vimeo.com/video/' . $regs[1];
            $embed['source'] = 'vimeo';
        }

        return $embed;
    }


    /**
    * function to get image extension from S3 url & save the image.
    *
    */
    private static function saveImage($imageUrl, $propertyId){

        $processFlag = false;
        $file_name = ''; 

        if(!empty($imageUrl)){

            $client = new Client();
            $response = $client->get($imageUrl);
            $mimeType = $response->getHeaderLine('Content-Type');

            $extension = explode('/', $mimeType)[1];

            if (! File::exists(public_path('uploads/'.$propertyId))) {
                File::makeDirectory(public_path('uploads/'.$propertyId));
            }

            $string = str_random(16);
            $file_name  = $string.'.'.$extension;
            
            $image = file_get_contents($imageUrl);

            file_put_contents(public_path('uploads/'.$propertyId.'/'.$file_name), $image);

            $processFlag = true;
        }

        return ['processFlag' => $processFlag, 'file_name' => $file_name];
    }


    /**
    * function to get property listings from IDX API.
    *
    */
    private static function getIdxListing($user_id, $accessKey){

        $properties = [];
       
        $client = new Client(['base_uri' => 'https://api.idxbroker.com/clients/']);

        $headers = [
            'accesskey' => $accessKey, 
            'outputtype' => 'json'
        ];
        
        try{
            $response = $client->request('GET', 'featured/1?disclaimers=true', ['headers' => $headers]);

            if($response->getStatusCode() == '200'){

                $response = json_decode($response->getBody(), true);
                $properties = $response['data'] ?? $response;
            }

        }catch(\Exception $e){
            //do nothing
            //dd($e->getMessage());
        }

        return $properties;
    }

}
