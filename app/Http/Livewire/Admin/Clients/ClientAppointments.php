<?php

namespace App\Http\Livewire\Admin\Clients;

use Livewire\Component;
use App\Models\Client;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class ClientAppointments extends Component
{

    public $services;
    public Client $client;
    public Collection $appointments;
    public Service $service;
    public Collection $appointments_day;
    public $currentMonth;
    public $endCurrentMonth;

    public $nextMonth;
    public $previousMonth;

    public function __construct(){
    }

    public function mount() : void
    {
 
        $id = $_GET['id'];
        
        $start_of_month = $_GET['start_of_month'];
        $this->client = Client::find($id);

        $this->services = Service::all();
        $this->appointments = Appointment::where('appointments.client_id', $id)
        ->join('employees', 'appointments.employee_id', 'employees.id')
        ->join('employee_service', 'employees.id', 'employee_service.employee_id')
        ->join('services', 'employee_service.service_id', 'services.id')
        ->join('clients', 'appointments.client_id', 'clients.id')
            ->get();

        $presentMonthStart = Carbon::createFromTimestamp($start_of_month)->toDateTimeString(); 
        $presentMonthEnd = Carbon::createFromTimestamp($start_of_month)->endOfMonth()->toDateTimeString();

        $this->appointments_day = Appointment::where('client_id', $id)
            ->join('employees', 'appointments.employee_id', 'employees.id')
            ->join('clients', 'appointments.client_id', 'clients.id')
            ->whereBetween('start_time', 
                [
                    $presentMonthStart, 
                    $presentMonthEnd
                ])
            ->select('appointments.id', 'appointments.employee_id', 'appointments.client_id','employees.name as employee_name', 'clients.name as client_name', 'start_time','finish_time')
            ->get();

        $this->employees = Appointment::where(
            [
                'client_id' => $id
            ])->join('employees', 'appointments.employee_id', 'employees.id')->get();
        
        $this->currentMonth = $presentMonthStart;
        $this->endCurrentMonth = $presentMonthEnd;

        $this->nextMonth = Carbon::createFromFormat('Y-m-d H:m:s', $presentMonthStart)->addMonth()->timestamp;

        $this->previousMonth = Carbon::createFromFormat('Y-m-d H:m:s', $presentMonthStart)->startOfMonth()->subMonth()->timestamp;
     
    }

    public function rules(): array
    {
        return [
            'client.name' => 'required|string|max:255',
            'client.email' => 'string|max:255',
            'client.phone' => 'required|string|max:255',
            'client.id' => '',
        ];
    }

    public function render()
    {
        return view('livewire.admin.clients.appointments')
            ->layout('components.layouts.auth', [
                'title' => trans('Client Appointments')
            ]);
    }
}
