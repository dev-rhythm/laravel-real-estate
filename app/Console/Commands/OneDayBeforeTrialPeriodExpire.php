<?php

namespace App\Console\Commands;

use App\Mail\TestEmail;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OneDayBeforeTrialPeriodExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:onedaybeforetrialexpire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends email to users one days before trial expires';

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
                Carbon::now()->addDays(1)->subHour(1), // subtract 1 hour.
                Carbon::now()->addDays(1)
            ])
            ->get();

        // Mail::to('mak.narola@gmail.com')->send(new TestEmail());
        // Mail::plain('Hello  welcome to Laravel!', ['user' => 'John Doe'], function ($message) {
        //     $message
        //         ->to('akh@narola.email')
        //         ->subject('Test from cron');
        // });

        // mail("mak.narola@gmail.com", "My subject PHP Mail", 'test');

        if ($all_users != null) {
            foreach ($all_users as $user_key => $user) {
                $user_email = '';
                try {
                    Log::info("Sending Email To", ["context" => $user->email]);
                    // $sent = Mail::send('frontend.emails.trial.one_day_before', ['user' => $user], function ($message) use ($user, $user_email) {
                    //     $message->to($user->email);
                    //     // $message->to($user_email);
                    //     $message->subject('Trial Expiring In 1 Day!');

                    //     Log::info("Inside of mail function", ["emailcontent" => json_encode($message)]);
                    // });
                    // mail("mak.narola@gmail.com", "My subject", 'test');
                    // Log::info("Sending Email To", ["context" => $sent]);
                    // User::where('id', $user->id)->update(['trial_expire_date' => null]);

                    $to             = $user->email;
                    $user_name      = $user->fname;
                    $billing_route  = route('billing');
                    $from_email     = env('MAIL_FROM_ADDRESS');
                    $subject        = 'Trial Expiring In 1 Day!';
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
                                Your Realysta free membeship will expire in 1 day! If you like how your pages look you can activate your paid
                                membership and keep showcasing you properties by clicking <a href="' . $billing_route . '">this link</a>:
                            </p>

                            <p>
                                If you need any assistance please don’t hesitate to contact us, we’ll be happy to help!
                            </p>


                            <p>Best,</p>
                            <p>The Realysta Team</p>
                        </body>

                    </html>';


                    mail($to, $subject, $message, $headers);
                } catch (Exception $ex) {

                    dd($ex);
                    // Debug via $ex->getMessage();
                    return "We've got errors!";
                }
            }
        }
    }
}