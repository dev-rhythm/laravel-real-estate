<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Plan;
use App\Property;
use App\PropertyTheme;
use App\Theme;
use App\Invoice;
use App\Mail\TestEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    protected $provider;
    public function __construct()
    {
        $this->provider = new ExpressCheckout();
    }

    public function index()
    {

        // if (Auth::check()) {
        //     return view('frontend.dashboard');
        // } else {
        $monthly_plan = Plan::where('type', '1')->get();
        $annual_plan = Plan::where('type',  '2')->get();
        return view('pages.index', compact('monthly_plan', 'annual_plan'));
        // }
    }


    public function template($id = null)
    {
        $pro        = Property::where([['id', '=', $id], ['published', '=', '1']])->first();

        if (!empty($pro)) {
            // $user_id    = Auth::user()->invited_by == 0 ? Auth::user()->id : Auth::user()->invited_by;
            $pro        = Property::
                // where('user_id', $user_id)
                where('id', $id)
                ->with('propertydetails')
                ->with('propertyVOH')
                ->with('propertyVirtual')
                ->with('propertyVideo')
                ->where('delete', '0')
                ->with('propertyPhoto')
                ->with('propertyFloor')
                ->with('propertyTheme')
                ->with('propertyOwner')
                ->with('propertyAdvance')->first();

            $theme_id   = isset($pro->propertyTheme) ? $pro->propertyTheme->theme_id : '1';
            $template   = Theme::find($theme_id);
            $view       = 'pages.template' . $template->id;


            // broker landing page.
            $company = $pro->propertyOwner->company;
            $user_id = $pro->propertyOwner->id;
            $landing_page = route('broker_landing_page', ['company_name' => $company, 'id' => $user_id]);


            // logo
            $property_logo = null;
            if (isset($pro->propertyTheme->logo) && $pro->propertyTheme->logo != '') {
                $property_logo =    asset("uploads/logo/$pro->id/" . $pro->propertyTheme->logo);
            } elseif (isset($pro->propertyOwner->custom_logo) && $pro->propertyOwner->custom_logo != '') {
                $property_logo = asset("uploads/profile/" . $pro->propertyOwner->id . '/' . $pro->propertyOwner->custom_logo);
            }

            $social_share = $this->getSocialLinks($id);


            // dd($property_logo);
            return view($view, compact('pro', 'property_logo', 'social_share', 'landing_page'));
        } else {


            return redirect()->route('preview_property', $id);
            // return redirect('/');
        }
    }

    public function preview_property($id)
    {
        $pro        = Property::where([['id', '=', $id], ['published', '=', '0']])->first();
        if (!empty($pro)) {
            $pro        = Property::
                // where('user_id', $user_id)
                where('id', $id)
                ->with('propertydetails')
                ->with('propertyVOH')
                ->with('propertyVirtual')
                ->where('delete', '0')
                ->with('propertyPhoto')
                ->with('propertyFloor')
                ->with('propertyTheme')
                ->with('propertyOwner')
                ->with('propertyAdvance')->first();

            $theme_id   = isset($pro->propertyTheme) ? $pro->propertyTheme->theme_id : '1';
            $template   = Theme::find($theme_id);
            $view       = 'pages.template' . $template->id;

            // logo
            $property_logo = null;
            if (isset($pro->propertyTheme->logo) && $pro->propertyTheme->logo != '') {
                $property_logo =    asset("uploads/logo/$pro->id/" . $pro->propertyTheme->logo);
            } elseif (isset($pro->propertyOwner->custom_logo) && $pro->propertyOwner->custom_logo != '') {
                $property_logo = asset("uploads/profile/" . $pro->propertyOwner->id . '/' . $pro->propertyOwner->custom_logo);
            }

            $social_share = $this->getSocialLinks($id);


            // dd($property_logo);
            return view($view, compact('pro', 'property_logo', 'social_share'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Social links genrator
     */
    public function getSocialLinks($id)
    {

        $property_url = route('property_details', $id);
        $social_array = array(
            'facebook'  => '//web.facebook.com/sharer/sharer.php?u=' . $property_url,
            'twitter'   => '//twitter.com/share?url=' . $property_url,
            'linkedin'  => '//www.linkedin.com/shareArticle?mini=true&url=' . $property_url,
            'pintrest'  => '//www.pinterest.com/pin/create/button/?url=' . $property_url,
        );

        return $social_array;
    }

    // public function template2($id = null){
    //     $user_id =    $user_id = Auth::user()->invited_by == 0 ? Auth::user()->id : Auth::user()->invited_by;
    //     $pro = Property::where('user_id',$user_id)->where('id',$id)->with('propertydetails')->with('propertyVOH')->with('propertyVirtual')->where('delete','0')->with('propertyPhoto')->first();
    //     return view('pages.template2',compact('pro'));

    // }

    // public function template3($id = null){
    //     $user_id =    $user_id = Auth::user()->invited_by == 0 ? Auth::user()->id : Auth::user()->invited_by;
    //     $pro = Property::where('user_id',$user_id)->where('id',$id)->with('propertydetails')->with('propertyVOH')->with('propertyVirtual')->where('delete','0')->with('propertyPhoto')->first();
    //     return view('pages.template3',compact('pro'));
    // }

    public function template1($id = null)
    {
        $pro = [];
        return view('frontend.demo.template1', compact('pro'));
    }
    public function template2($id = null)
    {
        $pro = [];
        return view('frontend.demo.template2', compact('pro'));
    }
    public function template3($id = null)
    {
        $pro = [];
        return view('frontend.demo.template3', compact('pro'));
    }
    public function template4($id = null)
    {
        $pro = [];
        return view('frontend.demo.template4', compact('pro'));
    }


    public function register()
    {
        return view('pages.register');
    }

    public function forgotPassword()
    {
        return view('pages.forgot');
    }

    public function password(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        // dd($user);
        if ($user) {
            $token = str_random(32);
            User::where('id', $user->id)->update([
                'reset_password_token' => $token
            ]);
            // $user->update();
            $this->sendEmail($user, $token);
            return redirect()->back()->with(['success' => 'Reset Code Sent to Your Email Address']);
        } else {
            return redirect()->back()->with(['error' => 'Email Not Found']);
        }
    }

    public function sendEmail($user, $token)
    {

        try {
            \Mail::send('frontend.emails.forgot', ['user' => $user, 'token' => $token], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Hello User Change your Password');
            });
        } catch (Exception $ex) {

            dd($ex);
            // Debug via $ex->getMessage();
            return "We've got errors!";
        }
    }

    public function getVerifyToken($email, $token)
    {
        return view('pages.changepassword');
    }

    public function resetPassword(Request $request)
    {
        $password   = $request->password;
        $user       = User::where('email', $request->email)->first();
        if (!$user)
            return redirect()->back()->with(['error' => 'User Not Found']);

        $user->password = Hash::make($password);
        $user->update(); //or $user->save();
        return redirect()->back()->with(['success' => 'Password Changed Successfully']);
    }




    public function login(Request $request)
    {

        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->active == 0) {
                Auth::logout();
                return ['success' => false, 'message' => 'Account is not Activated!!'];
            } else {

                return ['success' => true, 'message' => 'Successfully Login!!', 'user_role' => Auth::user()->user_role];
            }
        } else {
            return ['success' => false, 'message' => 'Invalid Login!!'];
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('frontend.dashboard');
        } else {
            return redirect('/');
        }
    }

    public function billing()
    {
        $monthly    = Plan::where('type', '1')->get();
        $yearly     = Plan::where('type', '2')->get();
        $invoices   = Invoice::where('user_id', Auth::user()->id)->get();

        if (count($invoices) > 0) {
            $invoice    = Invoice::where('user_id', Auth::user()->id)->first();
            $response   = $this->provider->getRecurringPaymentsProfileDetails($invoice->recurrring_id);
        } else {
            $invoice    = "";
            $response   = [];
        }


        if (Auth::check()) {
            return view('frontend.billing', compact('monthly', 'yearly', 'invoices', 'response', 'invoice'));
        } else {
            return redirect('/');
        }
    }

    public function profile()
    {

        if (Auth::check()) {
            $ct = is_numeric(Auth::user()->country) ? Auth::user()->country : 212;
            $st = is_numeric(Auth::user()->state) ? Auth::user()->state : 3424;
            $ci = is_numeric(Auth::user()->city) ? Auth::user()->city : '';

            $countries  = \DB::table("countries")->get();
            $states     = \DB::table("states")->where("country_id", $ct)->get();
            $cities     = \DB::table("cities")->where("state_id", $st)->get();

            return view('frontend.profile', compact('countries', 'states', 'cities', 'ct', 'st', 'ci'));
        } else {
            return redirect('/');
        }
    }

    public function changePassword()
    {
        if (Auth::check()) {
            return view('frontend.change-password');
        } else {
            return redirect('/');
        }
    }

    public function updatePassword(Request $request)
    {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return redirect()->back()->with('error', 'Current password does not match');
            // return response()->json(['error' => ['current'=> ['Current password does not match']]], 422);
        }

        if (strcmp($request->get('old_password'), $request->get('new_password')) == 0) {
            return redirect()->back()->with('error', 'New Password cannot be same as your current password');
            // return response()->json(['errors' => ['current'=> ['New Password cannot be same as your current password']]], 422);
        }
        // $validatedData = $request->validate([
        //     'old_password' => 'required',
        //     'new_password' => 'required|string|min:6|confirmed',
        // ]);
        // //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return redirect()->back()->with('success', 'Password Changed Successfully');
    }

    public function getStates($id)
    {
        $states = \DB::table("states")
            ->where("country_id", $id)
            ->pluck("name", "id");
        return response()->json($states);
    }

    //For fetching cities
    public function getCities($id)
    {
        $cities = \DB::table("cities")
            ->where("state_id", $id)
            ->pluck("name", "id");
        return response()->json($cities);
    }

    public function client()
    {
        if (Auth::check()) {
            $invoice = \App\Invoice::where('user_id', Auth::user()->id)->first();

            if ($invoice) {
                $exp_date = \Carbon\Carbon::createFromFormat('Y-m-d h:m:s', $invoice->expire_date)->isPast();
            } else {
                $exp_date = true;
            }
            if ($exp_date == false) {
                return view('frontend.property.client');
            } {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function addClient(Request $request)
    {
        $invoice = \App\Invoice::where('user_id', Auth::user()->id)->with('plan')->first();
        $agent_limit = $invoice->plan->listing_agent;
        $invited = User::where('invited_by', Auth::user()->id)->where('active', '1')->count();

        // dd($agent_limit);
        if ($agent_limit == $invited) {
            return redirect()->back()->with(['error' => "Maximum Limit For ($agent_limit Invitation) Reached"]);
        }

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        $password   = str_random(8);
        $user_role  = 3;

        $user = User::create([
            'fname'         => $request->fname,
            'lname'         => $request->lname,
            'email'         => $request->email,
            'password'      => Hash::make($password),
            'user_role'     => $user_role,
            'invited_by'    => Auth::user()->id,
        ]);


        try {
            \Mail::send('frontend.emails.client', ['user' => $user, 'password' => $password], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Hello ' . Auth::user()->fname . "Invited you to Realysta");
            });

            return redirect()->back()->with(['success' => 'User Invited']);
        } catch (Exception $ex) {

            dd($ex);
            // Debug via $ex->getMessage();
            return "We've got errors!";
            // return redirect()->back()->with(['success'=> 'Reset Code Sent to Your Email Address']);
        }
    }

    public function listClient()
    {

        // dd(date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d') . ' +12 months')));
        $users = User::where('invited_by', Auth::user()->id)->where('active', '1')->get();
        return view('frontend.property.list', compact('users'));
    }

    public function property($id = null)
    {

        if (Auth::check()) {
            $user_id =    $user_id = Auth::user()->invited_by == 0 ? Auth::user()->id : Auth::user()->invited_by;
            $properties = Property::where('user_id', $user_id)->with('propertydetails')->with('propertyVOH')->with('propertyVirtual')->where('delete', '0')->get();
            if ($id == null) {
                $pro = Property::where('user_id', $user_id)->with('propertydetails')->with('propertyVOH')->with('propertyVirtual')->where('delete', '0')->first();
                $theme = Theme::first();
            } else {
                $pro = Property::where('user_id', $user_id)->where('id', $id)->with('propertydetails')->with('propertyVOH')->with('propertyVirtual')->where('delete', '0')->first();
                $theme = PropertyTheme::where('property_id', $id)->with('template')->first();
                if ($theme == null) {
                    $theme = Theme::first();
                }
            }
            $type = 0;

            if ($pro != null) {
                $countries      = \DB::table("countries")->get();
                $states         = \DB::table("states")->where("country_id", '212')->get();
                $cities         = \DB::table("cities")->where("state_id", '3424')->get();
                $propertyid     = isset($pro->id) ? $pro->id : '0';
                $propertyLeads  = \DB::table('tbl_contact')->where('property_id', $propertyid)->get();
                $user_signature = \Auth::user()->email_signature;

                return view('frontend.property', compact('properties', 'pro', 'type', 'theme', 'countries', 'states', 'cities', 'propertyLeads', 'user_signature'));
            } else {
                $cntry      = (old('country') != '') ? old('country') : '231';
                $state_dtl  = (old('state') != '') ? old('state') : '3424';
                $city_dtl   = (old('city') != '') ? old('city') : '';

                $countries  = \DB::table("countries")->get();
                $states     = \DB::table("states")->where("country_id", $cntry)->get(); // 231 = America
                $cities     = \DB::table("cities")->where("state_id", $state_dtl)->get();

                return view('frontend.new', compact('countries', 'cities', 'states', 'cntry', 'state_dtl', 'city_dtl'));
            }
        } else {
            return redirect('/');
        }
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'zipcode' => 'required|numeric',
            'about_us' => 'required|string',
            'country' => 'required|numeric',
            'state' => 'required|numeric',
            'address' => 'required|string',
            // 'email' => 'required|string|email|max:255|unique:users',
        ]);

        $id =    $user_id = Auth::user()->id;
        User::where('id', $id)->update([
            'email'             => $request->email,
            'fname'             => $request->fname,
            'lname'             => $request->lname,
            'company'           => $request->company,
            'website'           => $request->website,
            'facebook'          => $request->facebook,
            'phone'             => $request->phone,
            'country'           => $request->country,
            'address'           => $request->address,
            'city'              => $request->city,
            'state'             => $request->state,
            'zipcode'           => $request->zipcode,
            'email_signature'   => $request->email_signature,
            'about_us'          => $request->about_us,
        ]);

        return back()->with('status', 'User Updated!');
    }

    public function uploadPhoto(Request $request)
    {
        $arr = [];
        foreach ($request->all() as $file) {
            if (is_file($file)) {
                $string = str_random(16);
                $ext = $file->guessExtension();
                $file_name = $string . '.' .  $ext;
                $file->move(public_path('uploads/profile/' . Auth::user()->id), $file_name);
            }
        }

        $user = User::where('id', Auth::user()->id)->first();
        $user->photo = $file_name;
        $user->update();

        return $arr;
    }

    /**
     * Upload custom logo for broker user
     */
    public function upload_custom_logo(Request $request)
    {
        $arr = [];
        foreach ($request->all() as $file) {
            if (is_file($file)) {
                $string = str_random(16);
                $ext = $file->guessExtension();
                $file_name = $string . '.' .  $ext;
                $file->move(public_path('uploads/profile/' . Auth::user()->id), $file_name);
            }
        }

        $user = User::where('id', Auth::user()->id)->first();
        $user->custom_logo = $file_name;
        $user->update();

        return $arr;
    }

    public function checkout(Request $request)
    {

        // $plan_id    = $request->id ? $request->id : 1;
        $plan       = Plan::find($request->id);

        if ($plan != null) {
            return view('frontend.checkout', compact('plan'));
        } else {
            return redirect()->route('billing')->with(['error' => 'Please select proper plan']);
        }
    }

    /**
     * Extend validity of the user to another week.
     */
    public function extend_validity()
    {
        $date_now = \Carbon\Carbon::now();
        $expire_date = $date_now->addDays(7);

        $user = Auth::user();
        $user->trial_count = 2;
        $user->trial_expire_date = $expire_date;
        $user->save();
    }


    /**
     * Two days before trial expire
     * Test route
     */
    public function two_days_before()
    {
        // get users which doesn't have active plans.
        $all_users = User::whereDoesntHave('active_invoices', function (Builder $query) {
            $query->where('payment_status', '=', 'Success');
        })
            ->where(
                [
                    ['user_role',   '=', '2'],
                    ['invited_by',  '=', '0'],
                    ['active',      '=', '1'],
                ]
            )
            ->whereBetween('trial_expire_date', [
                Carbon::now()->addDays(2)->subHour(1), // subtract 1 hour.
                Carbon::now()->addDays(2)
            ])
            ->get();




        dd(Carbon::now(), Carbon::now()->addDays(2), Carbon::now()->addDays(2)->subHour(1), Carbon::now()->addDays(2),  $all_users);

        if ($all_users != null) {
            foreach ($all_users as $user_key => $user) {
                $user_email = 'mak.narola@gmail.com';
                try {
                    \Mail::send('frontend.emails.trial.two_days_before', ['user' => $user], function ($message) use ($user, $user_email) {
                        // $message->to($user->email);
                        $message->to($user_email);
                        $message->subject('Trial Expiring In 2 Days!');
                    });
                } catch (Exception $ex) {

                    dd($ex);
                    // Debug via $ex->getMessage();
                    return "We've got errors!";
                }
            }
        }
    }


    /**
     * One Day before trial expire
     * Test route
     */
    public function one_day_before()
    {
        // get users which doesn't have active plans.
        $all_users = User::whereDoesntHave('active_invoices', function (Builder $query) {
            $query->where('payment_status', '=', 'Success');
        })
            ->where(
                [
                    ['user_role',   '=', '2'],
                    ['invited_by',  '=', '0'],
                    ['active',      '=', '1'],
                ]
            )
            ->whereBetween('trial_expire_date', [
                Carbon::now()->addDays(1)->subHour(1), // subtract 1 hour.
                Carbon::now()->addDays(1)
            ])
            ->get();





        // Mail::to('mak.narola@gmail.com')->send(new TestEmail());

        // $mail_sent =  Mail::to('mak.narola@gmail.com')->send(new TestEmail());
        // dd(new TestEmail());


        // dd(Carbon::now(), Carbon::now()->addDays(1), Carbon::now()->addDays(1)->subHour(1), Carbon::now()->addDays(1),  $all_users);

        if ($all_users != null) {
            foreach ($all_users as $user_key => $user) {

                $user_email = 'mak.narola@gmail.com';
                try {
                    \Mail::send('frontend.emails.trial.one_day_before', ['user' => $user], function ($message) use ($user, $user_email) {
                        // $message->to($user->email);
                        $message->to($user_email);
                        $message->subject('Trial Expiring In 1 Day');
                        dd($message);
                    });
                } catch (Exception $ex) {

                    dd($ex);
                    // Debug via $ex->getMessage();
                    return "We've got errors!";
                }
            }
        }
    }


    /**
     * Trial end
     * Test route
     */
    public function trial_end()
    {
        // get users which doesn't have active plans.
        $all_users = User::whereDoesntHave('active_invoices', function (Builder $query) {
            $query->where('payment_status', '=', 'Success');
        })
            ->where(
                [
                    ['user_role',   '=', '2'],
                    ['invited_by',  '=', '0'],
                    ['active',      '=', '1'],
                ]
            )
            ->whereBetween('trial_expire_date', [
                Carbon::now()->subHour(1), // subtract 1 hour.
                Carbon::now()
            ])
            ->get();

        dd(Carbon::now(),  Carbon::now()->subHour(1), Carbon::now(), $all_users);


        if ($all_users != null) {
            foreach ($all_users as $user_key => $user) {
                $user_email = 'akh@narola.email';
                try {
                    \Mail::send('frontend.emails.trial.trial_end', ['user' => $user], function ($message) use ($user, $user_email) {
                        // $message->to($user->email);
                        $message->to($user_email);
                        $message->subject('Trial Expired!');
                    });
                } catch (Exception $ex) {

                    dd($ex);
                    // Debug via $ex->getMessage();
                    return "We've got errors!";
                }
            }
        }
    }

    /**
     * two days after trial expire
     * test route.
     */
    public function two_day_after_expire()
    {
        // get users which doesn't have active plans.
        $all_users = User
            ::whereDoesntHave('active_invoices', function (Builder $query) {
                $query->where('payment_status', '=', 'Success');
            })
            ->where(
                [
                    ['user_role',   '=', '2'],
                    ['invited_by',  '=', '0'],
                    ['active',      '=', '1'],
                ]
            )
            ->whereBetween('trial_expire_date', [
                Carbon::now()->subDays(2)->subHour(1), // subtract 1 hour.
                Carbon::now()->subDays(2),
            ])
            ->get();

        dd(Carbon::now(), Carbon::now()->subDays(2), Carbon::now()->subDays(2)->subHour(1), Carbon::now()->subDays(2),  $all_users);


        if ($all_users != null) {
            foreach ($all_users as $user_key => $user) {
                $user_email = 'akh@narola.email';
                try {
                    \Mail::send('frontend.emails.trial.after_two_days', ['user' => $user], function ($message) use ($user, $user_email) {
                        // $message->to($user->email);
                        $message->to($user_email);
                        $message->subject('Its Been A While Upgrade Your Account Now!');
                    });
                } catch (Exception $ex) {
                    dd($ex);
                    // Debug via $ex->getMessage();
                    return "We've got errors!";
                }
            }
        }
    }

    /**
     * Broker Landing page.
     */
    public function broker_landing_page($company_name, $user_id)
    {
        $user_info = User::where([
            ['id', '=', $user_id],
            ['company', '=', $company_name],
            ['active', '=', '1'],
            ['user_role', '=', '2'], // 2 is broker
        ])->first();

        if ($user_info != null) {
            $properties = [];
            if ($user_info->address != '') {
                $country  = \DB::table("countries")->where('id', $user_info->country)->first();
                $state    = \DB::table("states")->where("id", $user_info->state)->first();
                $city     = \DB::table("cities")->where("id", $user_info->city)->first();

                $zipcode    = $user_info->zipcode;
                $address = $user_info->address;
                $full_address = "<p>$address</p>
                    <p>$city->name, $state->name</p>
                    <p>$country->name: $zipcode</p>
                ";

                $properties = Property::where([
                    ['user_id', '=', $user_id],
                    ['published', '=', 1],
                    ['delete', '=', 0]
                ])
                    ->with('propertydetails')
                    ->with('propertyTheme')
                    ->with('propertyPhoto')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(6);



                $user_info['full_address'] = $full_address;
            }
            return view('frontend.broker-landing-page', compact('user_info', 'properties'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Ajax loadmore properties.
     */
    public function load_more_properties(Request $request)
    {
        if ($request->ajax()) {
            $skip = ($request->skip) ? $request->skip : "1";
            $broker_id = ($request->broker_id) ? $request->broker_id : "1";

            $properties = Property::where([
                ['user_id', '=', $broker_id],
                ['published', '=', 1],
                ['delete', '=', 0]
            ])
                ->with('propertydetails')
                ->with('propertyTheme')
                ->with('propertyPhoto')
                ->skip($skip)
                ->orderBy('created_at', 'DESC')
                ->take(6)
                ->get();

            return view('frontend.property_ajax', compact('properties'));
        } else {
            return redirect('/');
        }
    }


    /**
     * Landing page contact form
     */
    public function broker_contact_form(Request $request)
    {
        $broker         = User::findOrFail($request->broker_id);
        $broker_name    = $broker->fname;
        $broker_email   = $broker->email;
        $fname          = $request->fname;

        try {
            \Mail::send('frontend.emails.landingpage_contact', ['data' => $request, 'broker_name' => $broker_name], function ($message) use ($broker_email, $fname) {
                $message->to($broker_email);
                $message->subject('Landing Page Contact Form submited by ' . $fname);
            });
        } catch (Exception $ex) {

            // dd($ex);
            // Debug via $ex->getMessage();
            return "We've got errors!";
        }
    }
}
