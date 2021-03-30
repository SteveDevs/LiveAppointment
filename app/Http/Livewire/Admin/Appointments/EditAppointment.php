<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Service;
//use App\Repositories\AppointmentRepository;
use Carbon\Carbon;

class EditAppointment extends Component
{
    public Appointment $appointment;
    public $clients;
    public $employees;
    public $employeeServices = [];
    public $chosenServices;
    public $initChosenServices;

    protected $listeners = [
        'updateServices' => 'updateServices',
        'changeEmployee' => 'updateEmployeeServices',
        'employeeUpdate' => 'employeeUpdate',
        'clientUpdate' => 'clientUpdate',
        'startDateUpdate' => 'startDateUpdate',
        'finishDateUpdate' => 'finishDateUpdate',
        'statusUpdate' => 'statusUpdate',
    ];

    public function statusUpdate($value){
        $this->appointment->status = $value;
    }

    public function startDateUpdate($value){
        $this->appointment->start_time = $value;
    }

    public function finishDateUpdate($value){
        $this->appointment->finish_time = $value;
    }

    public function clientUpdate($value){
        $this->appointment->client_id = $value;
    }

    public function employeeUpdate($value){
        $this->employeeServices = Employee::find($value)->services()->get()
            ->map(function (Service $model) {
                return [
                    'label' => $model->name,
                    'value' => strval($model->id),
                ];
            });
        $this->appointment->employee_id = $value;
        $this->employeeServices = str_replace("\u0022","\\\\\"",json_encode( $this->employeeServices,JSON_HEX_QUOT));
        $this->chosenServices = [];
        $this->emit('changeEmployee', $this->employeeServices);
    }

    public function updateServices($value){
        $this->chosenServices = $value;
    }

    public function updateEmployeeServices($employeeServices){}

    /*public function checkAppointmentAvailabilty() : bool
    {
        $appointmentsExist = (new AppointmentRepository())->checkAvailability($this->appointment->start_time, $this->appointment->finish_time, $this->appointment->employee_id, $this->appointment->client_id, $this->appointment->id);

        if(!$appointmentsExist){
            return false;
        }
        return true;
    }*/

    public function mount($id): void
    {
        $this->appointment = Appointment::find($id);
        $this->appointment->client_id = strval($this->appointment->client_id);
        $this->appointment->employee_id = strval($this->appointment->employee_id);
        $this->clients = Client::all();

        $this->employees = Employee::get()
            ->map(function (Employee $model) {
                return [
                    'label' => $model->name,
                    'value' => strval($model->id),
                ];
            })
            ->toArray();
        $this->employees = str_replace("\u0022","\\\\\"",json_encode( $this->employees,JSON_HEX_QUOT)); 

        $this->clients = Client::get()
            ->map(function (Client $model) {
                return [
                    'label' => $model->name,
                    'value' => strval($model->id),
                ];
            })
            ->toArray();
        $this->clients = str_replace("\u0022","\\\\\"",json_encode( $this->clients,JSON_HEX_QUOT));

        $this->employeeServices = Employee::find($this->appointment->employee_id)->services()->get()
            ->map(function (Service $model) {
                return [
                    'label' => $model->name,
                    'value' => strval($model->id),
                ];
            });
        $this->employeeServices = str_replace("\u0022","\\\\\"",json_encode( $this->employeeServices,JSON_HEX_QUOT));

        $this->chosenServices = $this->appointment->services()->get()
        ->map(function (Service $model) {
                return [
                    strval($model->id),
                ];
            })
            ->toArray();
        //$this->chosenServices = array_values($this->chosenServices);
        $this->initChosenServices = str_replace("\u0022","\\\\\"",json_encode( $this->chosenServices,JSON_HEX_QUOT));
    }

    public function rules(): array
    {
        return [
            'appointment.start_time' => '',
            'appointment.finish_time' => '',
            'appointment.price' => '',
            'appointment.client_id' => '',
            'appointment.employee_id' => '',
            'appointment.comments' => '',
            'appointment.status' => '',
            'appointment.confirmed' => '',
        ];
    }

    public function save(): void
    {
        $this->validate();  
        //Before save check if time is available
        
        /*if(!$this->checkAppointmentAvailabilty()){
            $this->dispatchBrowserEvent('notify', trans('Appointments exist within the time given'));
            return;
        }*/
        $this->appointment->confirmed = ($this->appointment->confirmed) ? 1: 0;

        $this->appointment->save();
        if(isset($this->chosenServices) && count($this->chosenServices) > 0){
            $this->appointment->services()->sync($this->chosenServices);
        }
        redirect()->route('admin.appointments');
    }

    public function render()
    {
        return view('livewire.admin.appointments.edit')
            ->layout('components.layouts.auth', [
                'title' => trans('Edit Appointment')
            ]);
    }
}
