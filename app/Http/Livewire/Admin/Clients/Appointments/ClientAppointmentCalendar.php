<?php

namespace App\Http\Livewire\Admin\Clients\Appointments;

use Livewire\Component;
use App\Http\Livewire\Calendar\LivewireCalendar;
use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Support\Collection;

class ClientAppointmentCalendar extends LivewireCalendar
{
    public $client_id;

    public function events(): Collection{
        $collect = [];
        $appointments = Appointment::query()
        ->whereDate('start_time', '>=', $this->gridStartsAt)
        ->whereDate('start_time', '<=', $this->gridEndsAt)
        ->where('client_id', $this->userId)
        ->join('employees', 'appointments.employee_id', 'employees.id')
        ->join('clients', 'appointments.client_id', 'clients.id')
        ->select('appointments.id', 'appointments.employee_id', 'appointments.client_id','employees.name as employee_name', 'clients.name as client_name', 'start_time','finish_time')
        ->get();

        foreach ($appointments as $key => $value) {
            $title = $value->employee_name . " has an appointment with " . $value->client_name;
            $collect[] = [
                'id' => $value->id,
                'title' => $title,
                'description' => $value->comments,
                'date' => $value->start_time,
                'finish_time' => $value->finish_time,
            ];
        }

        return collect($collect);
    }
}
