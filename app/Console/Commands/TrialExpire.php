<?php

namespace App\Console\Commands;

use App\Property;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class TrialExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:trialexpire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends email to users on trial expire';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
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


        if ($all_users != null) {
            foreach ($all_users as $user_key => $user) {
                $user_email = '';
                try {
                    // \Mail::send('frontend.emails.trial.trial_end', ['user' => $user], function ($message) use ($user, $user_email) {
                    //     $message->to($user->email);
                    //     // $message->to($user_email);
                    //     $message->subject('Trial Expired!');
                    // });



                    $to             = $user->email;
                    $user_name      = $user->fname;
                    $billing_route  = route('billing');
                    $user_dashboard = route('user_dashbaord');
                    $from_email     = env('MAIL_FROM_ADDRESS');
                    $subject        = 'Trial Expired!';
                    $headers        = "From: Realysta <" . $from_email . ">\r\n";
                    $headers        .= "Reply-To: " . $from_email . "\r\n";
                    $headers        .= "MIME-Version: 1.0\r\n";
                    $headers        .= "Content-Type: text/html; charset=UTF-8\r\n";

                    $message = '<!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Client</title>
                    </head>

                    <body>
                        <h3 style="text-align:left;">Dear ' . $user_name . '</h3>

                        <p>
                            Your Realysta free membeship is expired! But don’t worry, your pages are not lost! If you like how your pages
                            looked you can activate your paid membership and keep showcasing you properties by clicking <a
                                href="' . $billing_route . '">this link</a>:
                        </p>

                        <p>
                            Didn’t have enough time to check it out? You can also reactivate a 1 week free membership by clicking <a
                                href="' . $user_dashboard . '">this link</a>:
                        </p>

                        <p>
                            If you need any assistance please don’t hesitate to contact us, we’ll be happy to help!
                        </p>


                        <p>Best,</p>
                        <p>The Realysta Team</p>
                    </body>

                    </html>';


                    mail($to, $subject, $message, $headers);

                    // set property as unpublished
                    $user_id        = $user->id;
                    Property::where([
                        ['user_id',     '=', $user_id],
                        ['delete',      '=', 0],
                        ['published',   '=', 1],
                    ])
                        ->update(['published' => 0]);
                } catch (Exception $ex) {

                    dd($ex);
                    // Debug via $ex->getMessage();
                    return "We've got errors!";
                }
            }
        }
    }
}