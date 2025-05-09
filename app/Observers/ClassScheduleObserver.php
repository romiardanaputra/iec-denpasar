<?php

namespace App\Observers;

use App\Models\Schedule\ClassSchedule;

class ClassScheduleObserver
{
    /**
     * Handle the ClassSchedule "created" event.
     */
    public function created(ClassSchedule $classSchedule): void
    {
        $classSchedule->updateSlotStatus();
    }

    /**
     * Handle the ClassSchedule "updated" event.
     */
    public function updated(ClassSchedule $classSchedule): void
    {
        // Jika field penting berubah (seperti 'slot'), update status
        if ($classSchedule->isDirty('slot')) {
            $classSchedule->updateSlotStatus();
        }
    }

    /**
     * Handle the ClassSchedule "deleted" event.
     */
    public function deleted(ClassSchedule $classSchedule): void
    {
        // Hapus relasi dari tabel pivot (opsional)
        $classSchedule->registrations()->detach();

        // Atau soft delete semua registrasi terkait (jika ada model RegistrationSchedule)
        // RegistrationSchedule::where('class_schedule_id', $classSchedule->class_schedule_id)->delete();
    }

    /**
     * Handle the ClassSchedule "restored" event.
     */
    public function restored(ClassSchedule $classSchedule): void
    {
        $classSchedule->updateSlotStatus();
    }

    /**
     * Handle the ClassSchedule "force deleted" event.
     */
    public function forceDeleted(ClassSchedule $classSchedule): void
    {
        // Hapus permanen semua relasi di tabel pivot
        $classSchedule->registrations()->detach();

        // Jika ada model RegistrationSchedule, hapus permanen
        // RegistrationSchedule::where('class_schedule_id', $classSchedule->class_schedule_id)->forceDelete();
    }
}
