<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Permission;
use Illuminate\View\View;
use App\Http\Livewire\DataTables\Column;
use App\Http\Livewire\DataTables\DateColumn;
use App\Http\Livewire\DataTables\NumberColumn;
use App\Http\Livewire\DataTables\Http\Livewire\LivewireDatatable;

class TablePermission extends LivewireDatatable
{
    
    public $model = Permission::class;
    public $newLink = 'admin.permissions.create';
    public $exportable = true;
    public $hideable = 'select';
    public $tableName = 'Permissions';

    public function __construct(){
        $this->tableName = trans($this->tableName);
    }


    public function builder()
    {
        return Permission::query();
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
                return view('livewire.admin.permissions.table-actions', [
                        'id' => $id
                    ]);
            })
        ];
    }
}
