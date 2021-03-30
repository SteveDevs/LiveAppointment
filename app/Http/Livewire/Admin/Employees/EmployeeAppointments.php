<?php

namespace App\Http\Livewire\Admin\Employees;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class EmployeeAppointments extends Component
{

    public $services;
    public Employee $employee;
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
        $this->employee = Employee::find($id);

        $this->services = Service::all();
        $this->appointments = Appointment::where('appointments.employee_id', $id)
        ->join('employees', 'appointments.employee_id', 'employees.id')
        ->join('employee_service', 'employees.id', 'employee_service.employee_id')
        ->join('services', 'employee_service.service_id', 'services.id')
        ->join('clients', 'appointments.client_id', 'clients.id')
            ->get();

        $presentMonthStart = Carbon::createFromTimestamp($start_of_month)->toDateTimeString(); 
        $presentMonthEnd = Carbon::createFromTimestamp($start_of_month)->endOfMonth()->toDateTimeString();

        $this->appointments_day = Appointment::where('employee_id', $id)
            ->join('employees', 'appointments.employee_id', 'employees.id')
            ->join('clients', 'appointments.client_id', 'clients.id')
            ->whereBetween('start_time', 
                [
                    $presentMonthStart, 
                    $presentMonthEnd
                ])
            ->select('appointments.id', 'appointments.employee_id', 'appointments.client_id','employees.name as employee_name', 'clients.name as client_name', 'start_time','finish_time')
            ->get();

        $this->clients = Appointment::where(
            [
                'employee_id' => $id
            ])->join('clients', 'appointments.client_id', 'clients.id')->get();
        
        $this->currentMonth = $presentMonthStart;
        $this->endCurrentMonth = $presentMonthEnd;

        $this->nextMonth = Carbon::createFromFormat('Y-m-d H:m:s', $presentMonthStart)->addMonth()->timestamp;

        $this->previousMonth = Carbon::createFromFormat('Y-m-d H:m:s', $presentMonthStart)->startOfMonth()->subMonth()->timestamp;
     
    }

    public function rules(): array
    {
        return [
            'employee.name' => 'required|string|max:255',
            'employee.email' => 'string|max:255',
            'employee.phone' => 'required|string|max:255',
            'service.id' => '',
        ];
    }

    public function render()
    {
        return view('livewire.admin.employees.appointments')
            ->layout('components.layouts.auth', [
                'title' => trans('Employee Appointments')
            ]);
    }
}
