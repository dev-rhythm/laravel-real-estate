<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Plan;
use App\Property;
use App\PropertyDetails;
use App\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::user()->user_role == 1) {
                return redirect('admin/dashboard');
            } else {
                return redirect('dashboard');
            }
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'invalid' => 'Invalid Email Or Password.',
            ]);
        }
    }

    public function dashboard()
    {
        return view('admin.template');
    }

    public function user()
    {

        $users = User::all();
        return view('admin.user.list', compact('users'));
    }

    public function editUser($id)
    {

        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function viewUser($id)
    {

        $user = User::find($id);
        return view('admin.user.view', compact('user'));
    }

    public function inactiveUser($id, $status)
    {

        $user = User::find($id);
        $user->active = $status;
        $user->update();
        return json_encode($user);
    }

    public function updateUser(Request $request)
    {

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users',
        ]);

        $id = $request->id;
        User::where('id', $id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'user_role' => $request->user_role,
        ]);

        return back()->with('status', 'User Updated!');
    }

    public function createUser()
    {
        return view('admin.user.add');
    }


    public function addUser(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);


        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_role' => $request->select,
        ]);

        return back()->with('status', 'User saved!');
    }
    public function plan()
    {

        $plans = Plan::all();
        return view('admin.plan.list', compact('plans'));
    }

    public function editPlan($id)
    {

        $plan = Plan::find($id);
        return view('admin.plan.edit', compact('plan'));
    }

    public function viewPlan($id)
    {

        $plan = Plan::find($id);
        return view('admin.plan.view', compact('plan'));
    }

    public function deletePlan($id)
    {

        $plan = Plan::find($id);
        $plan->delete();
        return json_encode($plan);
    }

    public function updatePlan(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'active_listing' => 'required|numeric',
            'active_listing' => 'required|numeric',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            // 'email' => 'required|string|email|max:255|unique:users',
        ]);

        $id = $request->id;
        Plan::where('id', $id)->update([
            'name' => $request->name,
            'active_listing' => $request->active_listing,
            'listing_agent' => $request->listing_agent,
            'price' => $request->price,
            'type' => $request->type,
        ]);

        return back()->with('status', 'Plan Updated!');
    }

    public function createPlan()
    {
        return view('admin.plan.add');
    }


    public function addPlan(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active_listing' => 'required|numeric',
            'listing_agent' => 'required|numeric',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ]);

        Plan::create([
            'name' => $request->name,
            'active_listing' => $request->active_listing,
            'listing_agent' => $request->listing_agent,
            'price' => $request->price,
            'type' => $request->type,
        ]);

        return back()->with('status', 'Plan Saved!');
    }


    public function getProperties($user_id)
    {
        $properties = Property::where([['user_id', '=', $user_id], ['delete', '=', '0']])->with('propertydetails')->get();

        // $pro = Property::where('user_id', $user_id)->with('propertydetails')->first();

        return view('admin.property.list', compact('properties'));
    }

    public function makePublish($id, $status)
    {
        $property = Property::find($id);
        $property->published = $status;
        $property->update();
        return json_encode($property);
    }

    public function getProperty($id)
    {
        $details = PropertyDetails::where('property_id', $id)->first();
        $type = "1";
        return view('frontend.property.edit', compact('id', 'details', 'type'));
    }

    public function getSubscription()
    {
        $subscriptions  = Invoice::with('users')->with('plan')->get();
        return view('admin.subscription.list', compact('subscriptions'));
    }

    public function changePassword()
    {
        if (Auth::check()) {
            return view('admin.change-password');
        } else {
            return redirect('/');
        }
    }

    public function updatePassword(Request $request)
    {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return redirect()->back()->with('error', 'Current password does not match');
        }

        if (strcmp($request->get('old_password'), $request->get('new_password')) == 0) {
            return redirect()->back()->with('error', 'New Password cannot be same as your current password');
        }

        // //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return redirect()->back()->with('success', 'Password Changed Successfully');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}