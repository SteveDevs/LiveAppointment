<?php

namespace App\Http\Livewire\Admin\EmployeeCategory;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Service;

class CreateEmployee extends Component
{
    public $services;
    public Employee $employee;
    public Service $service;

    public function mount(): void
    {
        $this->employee = Employee::make();
        $this->service = Service::make();
        $this->services = Service::all();
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
        $this->employee->services()->sync([$this->service->id]);

        redirect()->route('admin.employee-categories');
    }

    public function render()
    {
        return view('livewire.admin.employees.create')
            ->layout('components.layouts.auth', [
                'title' => trans('Create Employee Category')
            ]);
    }
    
}
