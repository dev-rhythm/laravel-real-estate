<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ],
            [
                'fname.required'    => 'First Name field is required.',
                'lname.required'    => 'Last Name field is required.',
                'password.required'    => 'Password field is required.',

            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


        $expire_columns = [];
        if (!isset($data['user_role'])) {
            $user_role = 2; // this is for Broker role.

            $date_now = \Carbon\Carbon::now();
            $expire_date = $date_now->addDays(7);

            // set 7 day trial period
            $expire_columns = [
                'trial_count'       => '1',
                'trial_expire_date' => $expire_date
            ];
        }


        $user_data = [
            'fname'         => $data['fname'],
            'lname'         => $data['lname'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'user_role'     => $user_role,
            'email_token'   => bin2hex(openssl_random_pseudo_bytes(30)),
        ];

        $all_user_info = array_merge($user_data, $expire_columns);

        return User::create($all_user_info);
    }

    protected function register(Request $request)
    {


        $data = array(
            'fname'         => $request->fname,
            'lname'         => $request->lname,
            'email'         => $request->email,
            'password'      => $request->password,
        );

        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($data)));

        try {
            \Mail::send('frontend.emails.registration', ['user' => $user, 'token' => $user->email_token], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Welcome to Realysta! Please verify your email!');
            });
        } catch (Exception $ex) {

            dd($ex);
            // Debug via $ex->getMessage();
            return "We've got errors!";
        }

        return redirect()->back()->with('success', 'Registration successful, please check your email to verify');
    }


    /**
     * Verify token.
     */
    public function verify($token)
    {
        if (!$token) {
            return  redirect('/')->with('message', 'Email Verification Token not provided!');
        }


        $user = User::where('email_token', $token)->first();


        if (!$user) {
            return  redirect('/')->with('message', 'Invalid Email Verification Token!');
        }

        $user->active = 1;

        if ($user->save()) {
            return redirect('/')->with('success', 'Verification successful please login');
        }
    }
}
