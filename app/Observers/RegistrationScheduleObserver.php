<?php

namespace App\Observers;

use App\Models\Feature\RegistrationSchedule;
use Illuminate\Support\Facades\Cache;

class RegistrationScheduleObserver
{
    private function forgetUserScheduleCache(RegistrationSchedule $registrationSchedule)
    {
        $userId = $registrationSchedule->registration->user_id ?? null;

        if ($userId) {
            Cache::forget("iecdenpasar:dashboard:user:{$userId}:schedule");
        }
    }

    /**
     * Handle the RegistrationSchedule "created" event.
     */
    public function created(RegistrationSchedule $registrationSchedule): void
    {
        $this->forgetUserScheduleCache($registrationSchedule);
        $registrationSchedule->classSchedule->updateSlotStatus();
    }

    /**
     * Handle the RegistrationSchedule "updated" event.
     */
    public function updated(RegistrationSchedule $registrationSchedule): void
    {
        $this->forgetUserScheduleCache($registrationSchedule);
        $registrationSchedule->classSchedule->updateSlotStatus();
    }

    /**
     * Handle the RegistrationSchedule "deleted" event.
     */
    public function deleted(RegistrationSchedule $registrationSchedule): void
    {
        $this->forgetUserScheduleCache($registrationSchedule);
        $registrationSchedule->classSchedule->updateSlotStatus();
    }

    /**
     * Handle the RegistrationSchedule "restored" event.
     */
    public function restored(RegistrationSchedule $registrationSchedule): void
    {
        $this->forgetUserScheduleCache($registrationSchedule);
        $registrationSchedule->classSchedule->updateSlotStatus();
    }

    /**
     * Handle the RegistrationSchedule "force deleted" event.
     */
    public function forceDeleted(RegistrationSchedule $registrationSchedule): void
    {
        $this->forgetUserScheduleCache($registrationSchedule);
        $registrationSchedule->classSchedule->updateSlotStatus();
    }
}
