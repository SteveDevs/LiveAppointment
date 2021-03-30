<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\View\View;
use App\Http\Livewire\DataTables\Column;
use App\Http\Livewire\DataTables\DateColumn;
use App\Http\Livewire\DataTables\NumberColumn;
use App\Http\Livewire\DataTables\Http\Livewire\LivewireDatatable;

class TableUser extends LivewireDatatable
{
    public $model = User::class;
    public $newLink = 'admin.users.create';
    public $exportable = true;
    public $hideable = 'select';
    public $tableName = 'Users';

    public function __construct(){
        $this->tableName = trans($this->tableName);
    }


    public function builder()
    {
        return User::query();
    }

    public function columns()
    {
        return [
            Column::checkbox(),
            Column::name('name')
                ->filterable()
                ->label(trans('Name'))
                ->searchable(),
            Column::name('email')
                ->truncate()
                ->filterable()
                ->label(trans('Email'))
                ->searchable(),
            Column::name('created_at')
                ->filterable()
                ->label(trans('Created At'))
                ->searchable(),
            Column::name('updated_at')
                ->filterable()
                ->label(trans('Updated At'))
                ->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.users.table-actions', ['id' => $id]);
            })
        ];
    }
}