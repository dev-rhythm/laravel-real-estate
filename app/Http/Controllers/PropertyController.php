<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\PropertyDetails;
use App\VOH;
use App\Floor;
use App\PropertyPhotos;
use App\PropertyTheme;
use App\Theme;
use App\Virtual;
use App\Lead;
use App\Advance;
use App\Invoice;
use App\Plan;
use App\Registration;
use App\User;
use App\Video;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function __contruct()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
    }

    public function publishProperty(Request $request)
    {

        $user_id =    $user_id = Auth::user()->invited_by == 0 ? Auth::user()->id : Auth::user()->invited_by;

        $invoice = Invoice::where('user_id', $user_id)->first();


        if ($request->status == 1) {

            // publish condition.
            if ($invoice != null) {
                $plan           = Plan::findOrFail($invoice->plan_id);
                $active_listing = $plan->active_listing;

                $user_published_property = Property::where([
                    ['user_id', '=', $user_id],
                    ['delete', '=', '0'],
                    ['published', '=', '1'],
                ])->get()->count();

                if ($user_published_property < $active_listing) {
                    $property               = Property::find($request->id);
                    $property->published    = $request->status;
                    $property->update();
                    // return json_encode($property);
                    return 1;
                } else {
                    // with errors
                    return 0;
                }
            } else {
                // free trial user.
                $user_published_property = Property::where([
                    ['user_id', '=', $user_id],
                    ['delete', '=', '0'],
                    ['published', '=', '1'],
                ])->get()->count();

                if ($user_published_property == 0) {
                    // publish only 1 property for free trial user.
                    $property               = Property::find($request->id);
                    $property->published    = $request->status;
                    $property->update();
                    return 1;
                } else {
                    return 3; // 3 for free plan
                }
            }
        } else {
            // unpublish condition
            $property               = Property::find($request->id);
            $property->published    = $request->status;
            $property->update();
            return 1;
        }

        return 0;
    }



    public function propertySave(Request $request)
    {
        $request->validate([
            'zipcode'   => 'required',
            'street'    => 'required',
            'city'      => 'required',
            'state'     => 'required',
            'country'   => 'required',
            // 'email'  => 'required|string|email|max:255|unique:users',
        ]);
        $property           = new Property();
        $property->user_id  = $user_id = Auth::user()->invited_by == 0 ? Auth::user()->id : Auth::user()->invited_by;
        $property->country  = $request->country;
        $property->state    = $request->state;
        $property->city     = $request->city;
        $property->zipcode  = $request->zipcode;
        $property->street   = $request->street;
        $save               = $property->save();

        if ($property->id != "") {
            $id = $property->id;
            return \Redirect::route('getproperty', $id);
        }
    }

    public function getPropertyData($id)
    {
        $details        = Property::where('id', $id)->with('propertydetails')->with('propertyTheme')->first();
        $deails['c']    = \DB::table("countries")->select('name')->where("id", $details['country'])->first();
        $details['s']   = \DB::table("states")->select('name')->where("id", $details['state'])->first();
        $details['ct']  = \DB::table("cities")->select('name')->where("id", $details['city'])->first();
        $details['share_url']  = route('property_details', $id);


        return $details;
    }

    public function getProperty($id)
    {

        $details = propertyDetails::where('property_id', $id)->first();
        if ($details == null) {
            return view('frontend.property.add', compact('id'));
        } else {
            return view('frontend.property.edit', compact('id', 'details'));
        }
    }
    public function searchProperty($term)
    {
        $properties = \DB::table('tbl_properties')
            // ->with('propertydetails')
            // ->with('propertyVOH')->with('propertyVirtual')
            ->where('tbl_properties.delete', '0')
            ->where('tbl_properties.user_id', '=',  Auth::user()->id)
            ->where(function ($query) use ($term) {
                $query->where('tbl_properties.street', 'LIKE', '%' . $term . '%');
                $query->orWhere('tbl_properties.zipcode', 'LIKE', '%' . $term . '%');
            })
            // ->join('tbl_property_details', 'tbl_properties.id', '=', 'tbl_property_details.property_id')
            // ->where('tbl_property_details.name', 'LIKE', '%' . $term . '%')
            ->get();
        // dd($properties);
        return view('frontend.partials.ajax-home-menu', compact('properties'));
    }

    protected function showRegistrationForm()
    {
        $timezone = array();
        $timestamp = time();

        foreach (timezone_identifiers_list(\DateTimeZone::ALL) as $key => $t) {
            date_default_timezone_set($t);
            $timezone[$key]['zone'] = $t;
            $timezone[$key]['GMT_difference'] =  date('P', $timestamp);
            // $timezone[$key]['GMT_difference'] =  ;
        }
        $timezone = collect($timezone)->sortBy('GMT_difference');

        return $timezone;
    }

    public function voh($id)
    {
        $voh = VOH::where('property_id', $id)->with('registrations')->get();
        // $tz = $this->showRegistrationForm();
        // dd($tz);

        // dd($voh);
        return view('frontend.property.voh', compact('voh'));
    }

    public function editVoh($id)
    {
        $voh = VOH::find($id);
        return $voh;
    }

    public function register_voh(Request $request)
    {
        $registration_data = array(
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'voh_id' => $request->voh_id,
        );

        $data =   Registration::firstOrCreate(
            $registration_data
        );
    }

    public function deleteVoh($id)
    {
        $voh = VOH::find($id);
        $voh->delete();
    }

    public function address($id)
    {
        $details    = [];
        $details    = Property::where('id', $id)->first();
        $country    = $details->country ?: '231';
        $state      = $details->state ?: '3919';
        $city       = $details->country ?: '0';
        $countries  = \DB::table("countries")->get();
        $states     = \DB::table("states")->where("country_id", $country)->get();
        $cities     = \DB::table("cities")->where("state_id", $state)->get();

        return view('frontend.property.address', compact('details', 'countries', 'states', 'cities'));
    }

    public function saveAddress(Request $request)
    {
        $property           = Property::where('id', $request->property_id)->first();
        $property->user_id  = $user_id = Auth::user()->invited_by == 0 ? Auth::user()->id : Auth::user()->invited_by;
        $property->country  = $request->country;
        $property->state    = $request->state;
        $property->city     = $request->city;
        $property->zipcode  = $request->zipcode;
        $property->street   = $request->street;
        $save               = $property->update();
        return back();
    }

    public function advance($id)
    {
        $emails     = [];
        $data       = Advance::where('id', $id)->first();
        if ($data) {
            $emails = explode(",", $data->emails);
        }
        return view('frontend.property.advance', compact('emails', 'data'));
    }

    public function saveAdvance(Request $request)
    {
        $emails = implode(",", $request->email);

        $lead = Advance::updateOrCreate(['id' => $request->property_id], [
            'emails'                => $emails,
            'fb_pixel_id'           => $request->fb_pixel_id,
            'google_analytics_id'   => $request->google_analytics_id,
            'property_id'           => $request->property_id
        ]);
        return back();
    }

    public function vohPost(Request $request)
    {
        if ($request->voh_id == null) {
            $voh = new VOH();
        } else {
            $voh = VOH::where('id', $request->voh_id)->first();
        }
        $voh->property_id   = $request->property_id;
        $voh->title         = $request->title;
        $voh->type          = $request->type;
        $voh->registration  = $request->register ?: '0';
        $voh->date          = $request->date;
        $voh->start_time    = date('H:i:s', strtotime($request->start_time));
        $voh->end_time      = date('H:i:s', strtotime($request->end_time));
        $voh->link          = $request->link;
        $voh->link_title    = $request->link_title;
        $voh->video_url     = $request->video_url;
        $voh->timezone      = $request->timezone;

        if ($request->voh_id == null) {
            $voh->save();
        } else {
            $voh->update();
        }
        return back();
    }

    public function theme($id)
    {
        $templates  = Theme::all();
        $theme      = PropertyTheme::where('property_id', $id)->with('template')->first();
        if ($theme == null) {
            $theme = Theme::first();
        }

        return view('frontend.property.theme', compact('theme', 'templates'));
    }


    public function lead($id)
    {
        return view('frontend.property.lead');
    }

    public function leadPhoto($id)
    {
        return view('frontend.property.lead-photo');
    }

    public function saveLeadPhoto(Request $request)
    {
        $arr = [];
        foreach ($request->all() as $file) {
            if (is_file($file)) {
                $string     = str_random(16);
                $ext        = $file->guessExtension();
                $file_name  = $string . '.' .  $ext;
                $file->move(public_path('uploads/lead/' . $request->property_id), $file_name);
            }
        }

        $lead = Lead::updateOrCreate(['id' => request()->property_id], [
            'image'         => $file_name,
            'property_id'   => $request->property_id
        ]);

        return $arr;
    }





    public function domain($id)
    {
        return view('frontend.property.domains');
    }


    public function Video($id)
    {
        $virtuals = Video::where('property_id', $id)->get();
        $property_id = $id;
        return view('frontend.property.video', compact('virtuals', 'property_id'));
    }

    public function saveVideo(Request $request)
    {
        // dd($request);

        if ($request->hasFile('video')) {
            $file           = $request->file('video');
            $string         = str_random(16);
            $ext            = $file->getClientOriginalExtension();
            $file_name      = $string . '.' .  $ext;


            $file->move(public_path('uploads/' . $request->property_id), $file_name);

            $virtual = Video::create([
                'video_link'    => $file_name,
                'video_title' => $request->virtual_title,
                'property_id'   => $request->property_id,
                'virtual_link'  => '',
                // 'type'          => $request->type
            ]);
        } else {

            $virtual = Video::create([
                'virtual_link'          => $request->virtual_link,
                'video_title'         => $request->virtual_title,
                'property_id'           => $request->property_id,
                // 'type'                  => $request->type,
                // 'youtube_vimeo_link'    => $request->youtube_vimeo_link
            ]);
        }
        return   redirect()->back()->with('message', 'Added Successfully');
    }

    public function updateVideoType(Request $request)
    {
        $virtual                = Video::find($request->virtual_id);
        $virtual->visibility    = $request->type;
        $virtual->update();
    }

    public function deleteVideo($id)
    {
        $virtual = Video::find($id);
        if ($virtual->video_link != '') {
            $destinationPath    = public_path() . '/uploads/' . $virtual->property_id . '/';
            $deleted = File::delete($destinationPath . $virtual->video_link);
        }
        $virtual->delete();
    }




    public function virtual($id)
    {
        $virtuals = Virtual::where('property_id', $id)->get();
        $property_id = $id;
        return view('frontend.property.virtual', compact('virtuals', 'property_id'));
    }

    public function saveVirtual(Request $request)
    {
        // dd($request);

        if ($request->hasFile('video')) {
            $file           = $request->file('video');
            $string         = str_random(16);
            $ext            = $file->getClientOriginalExtension();
            $file_name      = $string . '.' .  $ext;


            $file->move(public_path('uploads/' . $request->property_id), $file_name);

            $virtual = Virtual::create([
                'video_link'    => $file_name,
                'virtual_title' => $request->virtual_title,
                'property_id'   => $request->property_id,
                'virtual_link'  => '',
                // 'type'          => $request->type
            ]);
        } else {

            $virtual = Virtual::create([
                'virtual_link'          => $request->virtual_link,
                'virtual_title'         => $request->virtual_title,
                'property_id'           => $request->property_id,
                // 'type'                  => $request->type,
                // 'youtube_vimeo_link'    => $request->youtube_vimeo_link
            ]);
        }
        return   redirect()->back()->with('message', 'Added Successfully');
    }

    public function updateVirutalType(Request $request)
    {
        $virtual                = Virtual::find($request->virtual_id);
        $virtual->visibility    = $request->type;
        $virtual->update();
    }

    public function deleteVirtual($id)
    {
        $virtual = Virtual::find($id);
        if ($virtual->video_link != '') {
            $destinationPath    = public_path() . '/uploads/' . $virtual->property_id . '/';
            $deleted = File::delete($destinationPath . $virtual->video_link);
        }
        $virtual->delete();
    }



    public function saveTheme(Request $request)
    {
        $propertytheme = PropertyTheme::updateOrCreate(['id' => request()->property_id], [
            'theme_id'      => $request->theme_id,
            'property_id'   => $request->property_id
        ]);
    }

    public function uploadLogo(Request $request)
    {
        $arr = [];
        foreach ($request->all() as $file) {
            if (is_file($file)) {
                $string         = str_random(16);
                $ext            = $file->guessExtension();
                $file_name      = $string . '.' .  $ext;
                $file->move(public_path('uploads/logo/' . $request->property_id), $file_name);
            }
        }

        $propertytheme = PropertyTheme::updateOrCreate(['id' => request()->property_id], [
            'logo'          => $file_name,
            'property_id'   => $request->property_id
        ]);



        return $arr;
    }

    public function deleteLogo(Request $request)
    {
        $propertytheme = PropertyTheme::updateOrCreate(['id' => request()->property_id], [
            'logo' => ""
        ]);
    }

    public function uploadBackground(Request $request)
    {
        $arr = [];
        foreach ($request->all() as $file) {
            if (is_file($file)) {
                $string         = str_random(16);
                $ext            = $file->guessExtension();
                $file_name      = $string . '.' .  $ext;
                $file->move(public_path('uploads/back_image/' . $request->property_id), $file_name);
            }
        }

        $propertytheme = PropertyTheme::updateOrCreate(['id' => request()->property_id], [
            'main_image'    => $file_name,
            'property_id'   => $request->property_id
        ]);



        return $arr;
    }

    public function deleteBackground(Request $request)
    {
        $propertytheme = PropertyTheme::updateOrCreate(['id' => request()->property_id], [
            'main_image' => ""
        ]);
    }

    public function floor($id)
    {
        $floors = Floor::where('property_id', $id)->get();
        return view('frontend.property.floor', compact('floors'));
    }


    public function editFloor($id)
    {
        $floors = Floor::where('id', $id)->get();
        return response()->json($floors, 200);
    }

    public function updateFloor(Request $request)
    {
        $file       = Floor::find($request->id);
        $newpath    = str_replace('\\', '/', public_path());
        $visible    = ($request->visible == true) ? '1' : '0';
        // rename(public_path('\\uploads\\floor\\'.$file->property_id.'\\'.$file->file),public_path('\\uploads\\floor\\'.$file->property_id.'\\'.$request->file));
        rename(public_path('/uploads/floor/' . $file->property_id . '/' . $file->file), public_path('/uploads/floor/' . $file->property_id . '/' . $request->file));
        $file->file     = $request->file;
        $file->visible  = $visible;
        $file->update();
    }




    public function saveFloor(Request $request)
    {
        $arr = [];
        foreach ($request->all() as $file) {
            if (is_file($file)) {
                $string     = str_random(16);
                $ext        = $file->guessExtension();
                $file_name  = $string . '.' .  $ext;
                $filepath   = 'uploads/floor/' . \Auth::user()->id . '/' . $file_name;
                $file->move(public_path('uploads/floor/' . $request->property_id), $file_name);
                //   $file->storeAs(('uploads/' . Auth::user()->id), $file_name);
                array_push($arr, [$file_name, $filepath]);
            }
        }

        foreach ($arr as $key => $file) {
            $floor              = new Floor();
            $floor->property_id = $request->property_id;
            $floor->type        = $request->type;
            $floor->file        = $file[0];
            $floor->save();
        }
        return $arr;
    }

    public function deleteDocsAjax(Request $request)
    {
        $delete = Floor::find($request->photo_id);
        $delete->delete();
        return json_decode("Success");
    }



    public function photos($id)
    {
        $photos = PropertyPhotos::where('property_id', $id)->get();
        return view('frontend.property.photos', compact('photos'));
    }


    public function propertyFloor($id)
    {
        return view('frontend.property.docs_floor');
    }

    public function deleteImageAjax(Request $request)
    {
        $delete = PropertyPhotos::where('id', $request->photo_id)->delete();
        //    dd($delete);
        return json_decode("Success");
        //    $delete->delete();
        //    dd($delete);
        //    return "true";
    }

    public function uploadPhoto(Request $request)
    {
        $arr = [];
        foreach ($request->all() as $file) {
            if (is_file($file)) {
                $string     = str_random(16);
                $ext        = $file->guessExtension();
                $file_name  = $string . '.' .  $ext;
                $filepath   = 'uploads/' . \Auth::user()->id . '/' . $file_name;
                $file->move(public_path('uploads/' . $request->property_id), $file_name);
                array_push($arr, [$file_name, $filepath]);
            }
        }



        foreach ($arr as $key => $photo) {

            $propertyphoto              = new PropertyPhotos();
            $propertyphoto->property_id = $request->property_id;
            $propertyphoto->images      = $photo[0];
            $propertyphoto->save();
        }
        return $arr;
    }


    public function propertyDetails(Request $request)
    {
        $currencies = \DB::table("currencies")->where('country', $request->currency)->first();
        $currency_symbol = $currencies->symbol;

        $this->validate($request, [
            'list_price'    => 'numeric',
            'bedrooms'      => 'nullable|numeric',
            'list_price'    => 'numeric',
            'display_price' => 'numeric',
            'bathrooms'     => 'nullable|numeric',
            'half_baths'    => 'nullable|numeric',
            'lot_size'      => 'nullable|numeric',
            'year_built'    => 'nullable|numeric',
            'parking_space' => 'nullable|numeric',

        ]);
        $property_details                       = new PropertyDetails();
        $property_details->property_id          = $request->property_id;
        $property_details->currency             = $currency_symbol;
        $property_details->currency_country     = $request->currency;
        $property_details->name                 = $request->name;
        $property_details->description          = $request->description;
        $property_details->amenties             = $request->amenties;
        $property_details->listing_status       = $request->listing_status;
        $property_details->type                 = $request->type;
        $property_details->list_price           = $request->list_price;
        $property_details->display_price        = $request->display_price;
        $property_details->year_built           = $request->year_built;
        $property_details->bedrooms             = $request->bedrooms;
        $property_details->bathrooms            = $request->bathrooms;
        $property_details->half_baths           = $request->half_baths;
        $property_details->sqr_foot             = $request->sqr_foot;
        $property_details->sqr_foot_metric      = $request->sqr_foot_metric;
        $property_details->lot_size             = $request->lot_size;
        $property_details->metric               = $request->metric;
        $property_details->stories              = $request->stories;
        $property_details->parking_space        = $request->parking_space;
        $save                                   = $property_details->save();

        if ($property_details->id != "") {
            $id = $property_details->id;
            return redirect()->back()->with('message', 'Added Successfully');
        }
    }


    public function propertyDetailsUpdate(Request $request)
    {
        $currencies = \DB::table("currencies")->where('country', $request->currency)->first();
        $currency_symbol = $currencies->symbol;

        // dd($request->all());
        $this->validate($request, [
            'list_price'    => 'numeric',
            'bedrooms'      => 'nullable|numeric',
            'list_price'    => 'numeric',
            'display_price' => 'numeric',
            'bathrooms'     => 'nullable|numeric',
            'half_baths'    => 'nullable|numeric',
            'lot_size'      => 'nullable|numeric',
            'year_built'    => 'nullable|numeric',
            'parking_space' => 'nullable|numeric',
        ]);


        $property_details                   = PropertyDetails::find($request->property_id);
        $property_details->name             = $request->name;
        $property_details->currency         = $currency_symbol;
        $property_details->currency_country = $request->currency;
        $property_details->description      = $request->description;
        $property_details->amenties         = $request->amenties;
        $property_details->listing_status   = $request->listing_status;
        $property_details->type             = $request->type;
        $property_details->list_price       = $request->list_price;
        $property_details->display_price    = $request->display_price;
        $property_details->year_built       = $request->year_built;
        $property_details->bedrooms         = $request->bedrooms;
        $property_details->bathrooms        = $request->bathrooms;
        $property_details->half_baths       = $request->half_baths;
        $property_details->sqr_foot         = $request->sqr_foot;
        $property_details->sqr_foot_metric  = $request->sqr_foot_metric;
        $property_details->lot_size         = $request->lot_size;
        $property_details->metric           = $request->metric;
        $property_details->stories          = $request->stories;
        $property_details->garage           = $request->garage;
        $property_details->parking_space    = $request->parking_space;
        $save                               = $property_details->update();

        if ($property_details->id != "") {
            $id = $property_details->id;
            return redirect()->back()->with('message', 'Saved Successfully');
        }
    }

    public function propertyDelete($id)
    {
        $property = Property::find($id)->update([
            'delete' => '1',
            'listing_id' => null
        ]);

        return json_encode($property);
    }

    public function leadContact(Request $request)
    {

        $data = \DB::table('tbl_contact')->insert(
            [
                'email'     => $request->email, 'name' => $request->name, 'property_id' => $request->property_id,
                'message'   => $request->message,
                'user_id'   => $request->user_id
            ]
        );

        $advance = Advance::where('property_id', $request->property_id)->first();
        $details = Property::where('id', $request->property_id)->with('propertyOwner')->first();


        if ($advance != null) {
            $emails = explode(',', $advance->emails);
            $emails = array_filter($emails);
            $emails = array_push($emails, $details->email);

            try {
                \Mail::send('frontend.emails.lead', ['data' => $request], function ($message) use ($emails) {
                    $message->to($emails);
                    $message->subject('Lead Notification');
                });
            } catch (Exception $ex) {

                dd($ex);
                // Debug via $ex->getMessage();
                return "We've got errors!";
            }
        } else {
            try {
                $emails = $details->propertyOwner->email;
                \Mail::send('frontend.emails.lead', ['data' => $request], function ($message) use ($emails) {
                    $message->to($emails);
                    $message->subject('Lead Notification');
                });
            } catch (Exception $ex) {

                dd($ex);
                // Debug via $ex->getMessage();
                return "We've got errors!";
            }
        }

        return json_encode($data);
    }

    public function sendReply(Request $request)
    {
        $leadUser = User::where('email', $request->email)->first();
        $request['lead_name'] = $leadUser->fname;

        try {
            \Mail::send(['html' => 'frontend.emails.lead'], ['data' => $request], function ($message) use ($request) {
                // $message->to($request->email);
                $message->to('akh@narola.email');
                $message->from($request->from);
                $message->subject('Reply');
            });
        } catch (Exception $ex) {
            dd($ex);
            // Debug via $ex->getMessage();
            return "We've got errors!";
        }
        return json_encode("Success");
    }
}
