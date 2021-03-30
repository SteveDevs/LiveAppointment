<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use Illuminate\View\View;
use App\Http\Livewire\DataTables\Column;
use App\Http\Livewire\DataTables\DateColumn;
use App\Http\Livewire\DataTables\NumberColumn;
use App\Http\Livewire\DataTables\Http\Livewire\LivewireDatatable;

class TableRole extends LivewireDatatable
{
    public $model = Role::class;
    public $newLink = 'admin.roles.create';
    public $exportable = true;
    public $hideable = 'select';
    public $tableName = 'Roles';

    public function __construct(){
        $this->tableName = trans($this->tableName);
    }


    public function builder()
    {
        return Role::query();
    }

    public function columns()
    {
        return [
            Column::checkbox(),
            Column::name('title')
                ->filterable()
                ->label(trans('Title'))
                ->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.roles.table-actions', ['id' => $id]);
            })
        ];
    }
}
