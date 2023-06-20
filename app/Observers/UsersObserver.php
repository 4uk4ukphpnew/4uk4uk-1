<?php

namespace App\Observers;

use App\Helpers\PaymentHelper;
use App\User;
use Illuminate\Support\Facades\Log;

class UsersObserver
{
    /**
     * Listen to the User deleting event.
     *
     * @param User $user
     * @return void
     */
    public function deleting(User $user)
    {
        $paymentHelper = new PaymentHelper();
        foreach ($user->activeSubscriptions()->get() as $subscription) {
            try {
                $cancelSubscription = $paymentHelper->cancelSubscription($subscription);
                if (!$cancelSubscription) {
                    Log::error("Failed cancelling subscription for id: " . $subscription->id);
                }
            } catch (\Exception $exception) {
                Log::error("Failed cancelling subscription for id: " . $subscription->id . " error: " . $exception->getMessage());
            }
        }
    }

    /**
     * Listen to the User created event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user) {
        //
    }

    /**
     * Listen to the User updating event.
     *
     * @param User $user
     * @return void
     */
    public function updating(User $user) {
        //
    }
}
