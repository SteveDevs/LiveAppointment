<?php

namespace App\Http\Livewire\Admin\Clients;

use Livewire\Component;

use App\Models\Client;
use Illuminate\View\View;
use App\Http\Livewire\DataTables\Column;
use App\Http\Livewire\DataTables\DateColumn;
use App\Http\Livewire\DataTables\NumberColumn;
use App\Http\Livewire\DataTables\Http\Livewire\LivewireDatatable;

class TableClient extends LivewireDatatable
{
    
    public $model = Client::class;
    public $newLink = 'admin.clients.create';
    public $exportable = true;
    public $hideable = 'select';
    public $tableName = 'Clients';

    public function _construct(){
       $this->tableName = trans($this->tableName); 
    }

    public function builder()
    {
        return Client::query();
    }
    
    public function columns()
    {
        return [
            Column::checkbox(),
            Column::name('name')
                ->filterable()
                ->label(trans('Name'))
                ->searchable(),
            Column::name('phone')
                ->truncate()
                ->filterable()
                ->label(trans('Phone'))
                ->searchable(),
            Column::name('email')
                ->filterable()
                ->label(trans('Email'))
                ->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.clients.table-actions', ['id' => $id]);
            })
        ];
    }
}