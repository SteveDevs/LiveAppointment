<?php

namespace App\Http\Livewire\Admin\Employees;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class EditEmployee extends Component
{
    public $services;
    public $employee;
    public $chosenServices;
    public $initChosenServices;

    protected $listeners = ['updateServices', 'updateServices'];

    public function updateServices($value){
        $this->chosenServices = $value;
    }

    public function mount($id) : void
    {
        $this->employee = Employee::find($id);

        $this->initChosenServices = Employee::find($id)->services()->get()
            ->map(function (Service $model) {
                return strval($model->id);
            })->toArray();
        $this->initChosenServices = str_replace("\u0022","\\\\\"",json_encode( $this->initChosenServices,JSON_HEX_QUOT));

        $this->services = Service::get()
            ->map(function (Service $model) {
                return [
                    'label' => $model->name,
                    'value' => strval($model->id),
                ];
            })
            ->toArray();
        $this->services = str_replace("\u0022","\\\\\"",json_encode( $this->services,JSON_HEX_QUOT)); 
    }

    public function rules(): array
    {
        return [
            'employee.name' => 'required|string|max:255',
            'employee.email' => 'string|max:255',
            'employee.phone' => 'required|string|max:255',
            'chosenServices' => '',
        ];
    }

    public function messages()
    {
        return [
            'employee.name.required' => 'A Name is required.',
            'employee.name.string' => 'Valid name is required.',
            'employee.name.max' => 'Name is too long.',
            'employee.email.string' => 'A phone number is required.',
            'employee.email.max' => 'A valid phone number is required.',
            'employee.phone.required' => 'Minimum of 10 characters needed.',
            'employee.phone.string' => "That's not a valid phone number.",
            'employee.phone.max' => 'Phone number is too long.',
        ];
    }

    public function save(): void
    {
        $this->validate();

        $this->employee->save();
        $this->employee->services()->sync($this->chosenServices);

        redirect()->route('admin.employees');
    }

    public function render()
    {
        return view('livewire.admin.employees.edit')
            ->layout('components.layouts.auth', [
                'title' => trans('Edit Employee')
            ]);
    }
}
