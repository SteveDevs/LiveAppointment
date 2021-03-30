<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;

use App\Models\Appointment;
use Illuminate\View\View;
use App\Http\Livewire\DataTables\Column;
use App\Http\Livewire\DataTables\DateColumn;
use App\Http\Livewire\DataTables\NumberColumn;
use App\Http\Livewire\DataTables\Http\Livewire\LivewireDatatable;

class TableAppointment extends LivewireDatatable
{
    
    public $model = Appointment::class;
    public $newLink = 'admin.appointments.create';
    public $exportable = true;
    public $hideable = 'select';
    public $tableName = 'Appointments';
    public $deleteTitle = 'Delete Appointment';
    public $showDeleteModal = false;

    public function __construct(){
        $this->tableName = trans($this->tableName);
    }
    public function builder()
    {
        
        return Appointment::query()
                ->join('clients', 'appointments.client_id', '=', 'clients.id')
                ->join('employees', 'appointments.employee_id', '=', 'employees.id');
        
    }
    
    public function columns()
    {
        return [
            Column::checkbox(),
            Column::name('clients.name')
            ->filterable()
            ->label(trans('Client Name'))
            ->searchable(),
            Column::name('employees.name')
            ->truncate()
            ->filterable()
            ->label(trans('Employee Name'))
            ->searchable(),
            DateColumn::name('start_time')
            ->filterable()
            ->label(trans('Start Time'))
            ->searchable(),
            DateColumn::name('finish_time')
            ->filterable()
            ->label(trans('Finish Time'))
            ->searchable(),
            
            NumberColumn::name('price')
            ->filterable()
            ->searchable()
            ->label(trans('Price') . config('currency')['symbol_native'] ),
            Column::name('comments')
            ->filterable()
            ->label(trans('Comments'))
            ->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.appointments.table-actions', ['id' => $id]);
            })
        ];
    }
}