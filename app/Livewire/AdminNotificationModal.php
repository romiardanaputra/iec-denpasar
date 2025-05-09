<?php

namespace App\Livewire;

use App\Models\Schedule\ClassSchedule;
use Livewire\Component;

class AdminNotificationModal extends Component
{
    public $schedules = [];

    public $hasUnapprovedSchedules = false;

    protected $listeners = ['refreshNotifiedSchedules' => '$refresh'];

    public function mount()
    {
        // Ambil jadwal penuh yang belum diberitahukan kepada admin
        $this->schedules = ClassSchedule::where('slot_status', 'full')
            ->where('notified_admin', false)
            ->with(['program', 'day', 'time'])
            ->get();
    }

    public function approve($scheduleId)
    {
        // Mark schedule as notified
        ClassSchedule::where('class_schedule_id', $scheduleId)
            ->update(['notified_admin' => true]);

        // Remove the approved schedule from the list
        $this->schedules = $this->schedules->reject(function ($schedule) use ($scheduleId) {
            return $schedule->class_schedule_id === $scheduleId;
        });

        // Emit event to refresh the widget if needed
        $this->dispatch('refreshNotifiedSchedules');
    }

    public function render()
    {
        return view('livewire.admin-notification-modal');
    }
}
