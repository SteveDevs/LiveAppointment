<?php

namespace App\Http\Livewire\Admin\Employees;

use App\Models\Employee;
use Illuminate\View\View;
use App\Http\Livewire\DataTables\Column;
use App\Http\Livewire\DataTables\DateColumn;
use App\Http\Livewire\DataTables\NumberColumn;
use App\Http\Livewire\DataTables\Http\Livewire\LivewireDatatable;
use Illuminate\Auth\Middleware\Authorize;

class TableEmployee extends LivewireDatatable
{
    public $model = Employee::class;
    public $newLink = 'admin.employees.create';
    public $exportable = true;
    public $hideable = 'select';
    public $tableName = 'Employees';

    public function __construct(){
        $this->tableName = trans($this->tableName);
    }

    public function builder()
    {
        return Employee::query();
            //->join('employee_service', 'employees.id', 'employee_service.employee_id')
            //->join('services', 'employee_service.service_id', 'services.id');
    }

    public function columns()
    {
        return [
            Column::checkbox(),
            Column::name('employees.name')
                ->filterable()
                ->label(trans('Name'))
                ->searchable(),
            Column::name('employees.email')
                ->truncate()
                ->filterable()
                ->label(trans('Email'))
                ->searchable(),
            Column::name('employees.phone')
                ->filterable()
                ->label(trans('Phone'))
                ->searchable(),
            Column::callback(['employees.id'], function ($id) {
                return view('livewire.admin.employees.table-actions', ['id' => $id]);
            })
        ];
    }
}
