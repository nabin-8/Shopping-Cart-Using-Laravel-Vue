<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    //
    public function payByStripe(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $checkout_session=Session::create([
               'line_items' => [[
                   'price_data' => [
                       'currency' => 'usd',
                       'product_data' => [
                           'name'=>'Vue Shope Orders'
                       ],
                       'unit_amount'=>$this->calculateOrderTotal($request->cartItems)
                   ],
                   'quantity' => 1
               ]],
                'mode' => 'payment',
                'success_url' => $request->success_url
            ]);
            return response()->json(['url'=>$checkout_session->url]);
        }catch (\ErrorException $e){
            response()->json([
                'error'=>$e->getMessage()
            ]);
        }
    }

    public function calculateOrderTotal($cartItems)
    {
        $total = 0;
        foreach($cartItems as $cartItem){
            $total += $this->calculateTotal($cartItem['product_price'], $cartItem['quantity']);
            return $total *100;
        }
    }

    function calculateTotal($price, $quantity)
    {
        $total =$price*$quantity;
        return $total;
    }
}
