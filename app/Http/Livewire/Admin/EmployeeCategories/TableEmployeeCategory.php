<?php

namespace App\Http\Livewire\Admin\EmployeeCategories;

use App\Models\Employee;
use Illuminate\View\View;
use App\Http\Livewire\DataTables\Column;
use App\Http\Livewire\DataTables\DateColumn;
use App\Http\Livewire\DataTables\NumberColumn;
use App\Http\Livewire\DataTables\Http\Livewire\LivewireDatatable;

class TableEmployeeCategory extends LivewireDatatable
{
    
    public $model = Employee::class;
    public $newLink = 'admin.employees.create';
    public $exportable = true;
    public $hideable = 'select';
    public $tableName = 'Employees Categories';

    public function _construct(){
       $this->tableName = trans($this->tableName); 
    }

    public function builder()
    {
        return Employee::query();
    }

    public function columns()
    {
        return [
            Column::checkbox(),
            Column::name('employees.name')->filterable()->searchable(),
            Column::name('employees.email')->truncate()->filterable()->searchable(),
            Column::name('employees.phone')->filterable()->searchable(),
            //Column::name('services.name')->filterable()->searchable()->label('Service'),
            Column::callback(['employees.id'], function ($id) {
                return view('livewire.admin.employees.table-actions', ['id' => $id]);
            })
        ];
    }
}
