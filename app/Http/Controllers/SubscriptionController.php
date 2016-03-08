<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SubscriptionController extends Controller
{
    protected function subscribeToStripe($creditCardToken, User $user)
    {
        $user->newSubscription('starter', 'starter')
            ->create($creditCardToken);
    }

    protected function registerAndSubscribeToStripe(Request $request) {
        $creditCardToken = $request->input('stripeToken');

        $user = null;

        $this->subscribeToStripe($creditCardToken,$user);

    }
}
