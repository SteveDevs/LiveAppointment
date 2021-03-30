<?php

namespace App\Http\Livewire\Admin\Clients\Appointments;

use Livewire\Component;
use App\Http\Livewire\TimeGrid\LivewireResourceTimeGrid;
use Carbon\Carbon;
use App\Models\Appointment;

class ClientAppointmentToday extends LivewireResourceTimeGrid
{
    public $appointments;
    public $employees;
    public $client_id;
    public $modelEvent;

    public function resources()
    {
        $collect = [];
        foreach ($this->modelResource as $key => $value) {
            $collect[] = [
                'id' => $value->id,
                'title' => $value->name
            ];
        }
        return collect( $collect);
    }

    public function events()
    {
        
        $collect = [];
        foreach ($this->modelEvent as $key => $value) {
            $servicesString = "";
            $services = Appointment::find($value->id)->services()->get()->toArray();
            $names = [];
            foreach ($services as $key => $service) {
              
                $names[] = $service["name"];
            }

            $servicesString = implode(",", $names);
            $title = $value->employee_name . " has an appointment with " . $value->client_name . "\n" . "Services: \n" . $servicesString;
            $collect[] = [
                'id' => $value->id,
                'title' => $title,
                'starts_at' => $value->start_time,
                'ends_at' => $value->finish_time,
                'resource_id' => $value->employee_id,
            ];
        }
        return collect($collect);
    }
}
