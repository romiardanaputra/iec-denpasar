<?php

namespace App\Observers;

use App\Models\Transaction\Registration;
use Illuminate\Support\Facades\Cache;

class RegistrationObserver
{
    protected function forgetUserCache(Registration $registration)
    {
        $userId = $registration->user_id ?? null;

        if ($userId) {
            Cache::forget("iecdenpasar:dashboard:user:{$userId}:program");
            Cache::forget("iecdenpasar:dashboard:user:{$userId}:student");
        }
    }

    /**
     * Handle the Registration "created" event.
     */
    public function created(Registration $registration): void
    {
        $this->forgetUserCache($registration);
    }

    /**
     * Handle the Registration "updated" event.
     */
    public function updated(Registration $registration): void
    {
        $this->forgetUserCache($registration);
    }

    /**
     * Handle the Registration "deleted" event.
     */
    public function deleted(Registration $registration): void
    {
        $this->forgetUserCache($registration);
    }

    /**
     * Handle the Registration "restored" event.
     */
    public function restored(Registration $registration): void
    {
        $this->forgetUserCache($registration);
    }

    /**
     * Handle the Registration "force deleted" event.
     */
    public function forceDeleted(Registration $registration): void
    {
        $this->forgetUserCache($registration);
    }
}
