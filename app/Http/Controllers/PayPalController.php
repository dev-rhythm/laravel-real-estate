<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Plan;
use App\User;
use App\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{

    protected $provider;
    public function __construct()
    {
        $this->provider = new ExpressCheckout();
    }

    public function payment(Request $request)
    {
        $invoice_id     = rand();
        $cart           = $this->getCart(true, $invoice_id, $request->plan_id, $request->coupon_id);
        $response       = $this->provider->setExpressCheckout($cart, true, $request->plan_id);

        if (!$response['paypal_link']) {
            return redirect('/billing')->with('error', 'Error in processing Paypal Payment!');
        }
        return redirect($response['paypal_link']);
    }


    private function getCart($recurring, $invoice_id, $plan_id, $coupon_id = null)
    {
        $plan       = Plan::findOrFail($plan_id);
        $invoice    = Invoice::where('user_id', Auth::user()->id)->first();

        if (isset($invoice->id)) {
            $invoice->user_id       = Auth::user()->id;
            $invoice->plan_id       = $plan_id;
            $invoice->invoice_id    = $invoice_id;
            $invoice->update();
        } else {
            $invoice                = new Invoice();
            $invoice->user_id       = Auth::user()->id;
            $invoice->plan_id       = $plan_id;
            $invoice->invoice_id    = $invoice_id;
            $invoice->save();
        }

        $coupon_discount = null;
        // discount price:
        if ($coupon_id != null) {
            $coupon             = Coupon::find($coupon_id);
            $coupon_discount    = $coupon->coupon_amount;
        }

        // discount in minus
        $discount       = ($coupon_discount != null) ? '-' . $coupon_discount : 0;


        return [
            'items' => [
                [
                    'name'  => $plan->name . "Realysta" . ' #' . $invoice_id,
                    'price' => $plan->price,
                    'qty'   => 1,
                ],
            ],
            'return_url'            => route('payment.success'),
            'subscription_desc'     => $plan->name . 'Realysta' . ' #' . $invoice_id,
            'invoice_id'            => "Realysta" . '_' . $invoice_id,
            'invoice_description'   => "Order #" . $invoice_id . " Invoice",
            'cancel_url'            => url('/'),
            'total'                 => $plan->price,
            'shipping_discount'     => $discount, // discount
        ];
    }

    public function success(Request $request)
    {
        $recurring      = true;
        $token          = $request->get('token');
        $PayerID        = $request->get('PayerID');
        $response       = $this->provider->getExpressCheckoutDetails($token);

        // dd($response);
        if (!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return redirect('/')->with(['code' => 'danger', 'message' => 'Error processing PayPal payment']);
        }

        $invoice_id     = explode('_', $response['INVNUM'])[1];
        $invoice        = Invoice::where('user_id', Auth::user()->id)->first();
        $cart           = $this->getCart(true, $invoice_id, $invoice->plan_id);
        $plan           = Plan::findOrFail($invoice->plan_id);

        if ($plan->type == '1') { // monthly
            $response       = $this->provider->createMonthlySubscription($response['TOKEN'], $response['AMT'], $cart['subscription_desc']);
        } else if ($plan->type ==  '2') { // anually
            $response       = $this->provider->createYearlySubscription($response['TOKEN'], $response['AMT'], $cart['subscription_desc']);
        }

        $response1      = $this->provider->getRecurringPaymentsProfileDetails($response['PROFILEID']);


        $invoice->recurring_id      = $response['PROFILEID'];
        $invoice->payment_date      = date('Y-m-d');
        $months_to_add              = ($plan->type == 1) ? '1' : '12';
        $invoice->expire_date       = date('Y-m-d h:m:s', strtotime(date('Y-m-d h:m:s') . '+' . $months_to_add . ' months'));
        $invoice->payment_status    = $response['ACK'];
        $update                     = $invoice->update();

        if ($update) {
            return redirect('/billing')->with('success', 'Plan has been upgraded');
        }

        return redirect('/billing')->with('error', 'Error in processing Paypal Payment!');
    }

    public function cancelSubscription($profileid)
    {
        // Cancel recurring payment profile
        $response = $this->$provider->cancelRecurringPaymentsProfile($profileid);

        // Suspend recurring payment profile
        $response = $this->$provider->suspendRecurringPaymentsProfile($profileid);

        // Reactivate recurring payment profile
        $response = $this->$provider->reactivateRecurringPaymentsProfile($profileid);
    }
}