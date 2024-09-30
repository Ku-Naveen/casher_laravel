<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class purchaseController extends Controller
{
    public static function getAction(Request $request)
    {
        if (Auth::check()) {
            $user = auth()->user();
            return view('purchase.view', [
                'product' => Products::findOrFail($request->route('id')),
                'intent' => $user->createSetupIntent()
            ]);
        } else {
            return view('auth.login');
        }
    }

    public static function getProductDetail(Request $request)
    {
        return view('products.detail', [
            'product' => Products::findOrFail($request->route('id'))
        ]);
    }

    public function orderPost(Request $request)
    {

        $user = User::find(auth()->user()->id);
        $input = $request->all();
        $paymentMethod = $request->payment_method;


        try {
            $product = Products::findOrFail($request->product_id);

            $user->createOrGetStripeCustomer();
            $amount = ($product->product_price) * 100;
            $paymentMethod = $user->addPaymentMethod($paymentMethod);

            //$purchase = $user->charge($amount, $paymentMethod->id);
            try {
                $purchase =   $user->charge($amount, $paymentMethod->id);
                // $purchase = $user->charge($product->product_price * 100, [
                //     'currency' => 'inr',
                //     'source' => $token
                //     ]
                // );
            } catch (\Exception $e) {
               
                return back()->with('error', $e->getMessage());
            }
            if ($purchase->status == 'succeeded') {
                Purchase::insert([
                    'user_id' => auth()->user()->id,
                    'product_id' => $request->product_id,
                    'stripe_id' => $purchase->id,
                    'stripe_status' => $purchase->status,
                    'stripe_customer' => '',
                    'stripe_price' => $purchase->amount,
                    'stripe_transaction' => $purchase->balance_transaction,
                    'stripe_currency' => $purchase->currency,
                    'stripe_payment_method' => $purchase->payment_method,
                    'stripe_receipt_url' => $purchase->receipt_url,
                    'quantity' => 1
                ]);
                return back()->with('success', 'Subscription is completed.');
            } else {
                return back()->with('error', 'Some error occured, Try again later.');
            }
        } catch (Exception $e) {
            return back()->with('success', $e->getMessage());
        }
    }
}
