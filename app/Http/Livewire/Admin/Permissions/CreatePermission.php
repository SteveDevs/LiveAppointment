<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use App\Models\Permission;

class CreatePermission extends Component
{
    public Permission $permission;
    public $permissions;

    public function __construct(){
    }

    public function mount(): void
    {
        $this->permission = Permission::make();
    }

    public function rules(): array
    {
        return [
            'permission.title' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'permission.title.required' => 'A Title is required.',
            'permission.title.string' => 'Valid title is required.',
            'permission.title.max' => 'Title is too long.',
        ];
    }

    public function save(): void
    {
        $this->validate();

        $this->permission->save();

        redirect()->route('admin.permissions');
    }

    public function render()
    {
        return view('livewire.admin.permissions.create')
            ->layout('components.layouts.auth', [
                'title' => trans('New Permission')
            ]);
    }
}
