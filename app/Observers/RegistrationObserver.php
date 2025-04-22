<?php

namespace App\Observers;

use App\Models\Transaction\Registration;
use Illuminate\Support\Facades\Cache;

class RegistrationObserver
{
    /**
     * Handle the Registration "created" event.
     */
    public function created(Registration $registration): void
    {
        $authId = auth()->user()->id;
        // cache for schedule
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:schedule");

        // cache for program
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:program");

        // cache for student
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:student");
    }

    /**
     * Handle the Registration "updated" event.
     */
    public function updated(Registration $registration): void
    {
        $authId = auth()->user()->id;
        // cache for schedule
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:schedule");

        // cache for program
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:program");

        // cache for student
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:student");
    }

    /**
     * Handle the Registration "deleted" event.
     */
    public function deleted(Registration $registration): void
    {
        $authId = auth()->user()->id;
        // cache for schedule
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:schedule");

        // cache for program
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:program");

        // cache for student
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:student");
    }

    /**
     * Handle the Registration "restored" event.
     */
    public function restored(Registration $registration): void
    {
        $authId = auth()->user()->id;
        // cache for schedule
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:schedule");

        // cache for program
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:program");

        // cache for student
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:student");
    }

    /**
     * Handle the Registration "force deleted" event.
     */
    public function forceDeleted(Registration $registration): void
    {
        $authId = auth()->user()->id;
        // cache for schedule
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:schedule");

        // cache for program
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:program");

        // cache for student
        Cache::forget("iecdenpasar:dashboard:user:{$authId}:student");
    }
}
