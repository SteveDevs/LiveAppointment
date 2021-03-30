<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Service;
use Illuminate\View\View;
use App\Http\Livewire\DataTables\Column;
use App\Http\Livewire\DataTables\DateColumn;
use App\Http\Livewire\DataTables\NumberColumn;
use App\Http\Livewire\DataTables\Http\Livewire\LivewireDatatable;

class TableService extends LivewireDatatable
{
    
    public $model = Service::class;
    public $newLink = 'admin.services.create';
    public $exportable = true;
    public $hideable = 'select';
    public $tableName = 'Services';
    
    public function __construct(){
        $this->tableName = trans($this->tableName);
    }


    public function builder()
    {
        return Service::query();
    }

    public function columns()
    {
        return [
            Column::checkbox(),
            Column::name('name')
                ->filterable()
                ->label(trans('Name'))
                ->searchable(),
            NumberColumn::name('price')
                ->truncate()
                ->filterable()
                ->searchable()->label(trans('Price') . ' ' . config('currency')['symbol_native'] ),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.services.table-actions', ['id' => $id]);
            })
        ];
    }
}