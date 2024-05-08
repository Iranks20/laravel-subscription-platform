<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Website;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request, $websiteId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $website = Website::findOrFail($websiteId);

        $subscription = Subscription::firstOrCreate([
            'user_id' => $request->user_id,
            'website_id' => $website->id
        ]);

        return response()->json([
            'message' => 'Subscription successful',
            'subscription' => $subscription
        ], 201);
    }
}

