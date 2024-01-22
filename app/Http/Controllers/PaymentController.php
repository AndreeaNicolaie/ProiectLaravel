<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(){
        return view('index');
    }

    public function checkout(Request $request){
        Stripe::setApiKey(config('stripe.sk'));

        $cart = Session::get('cart', []);
        $total = 0;

        if(is_array($cart) && !empty($cart)) {
            foreach ($cart as $id => $details) {
                $total += $details['price'] * $details['quantity'];

                // Save each cart item to the database
                Cart::create([
                    'user_id' => Auth::id(),
                    'ticket_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                ]);
            }
        } else {
            // Redirect back or show an error message if cart is empty
            return redirect()->route('index')->withErrors('Cart is empty.');
        }

        // Create Stripe Checkout Session
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $total * 100, // Stripe expects amounts in cents
                    'product_data' => [
                        'name' => 'Total Cart Value',
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('index'),
        ]);

        // After creating the session, you can clear the cart session
        Session::forget('cart');

        return redirect()->away($session->url);
    }

    public function success(){
        // Implement the logic to handle successful checkout here
        // Clear the cart session here if you haven't done it in the checkout method
        // Session::forget('cart');

        return view('success', ['message' => 'Payment successful!']);
    }
}
