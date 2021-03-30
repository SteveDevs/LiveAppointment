<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;

class CreateRole extends Component
{
    public Role $role;
    public $permissions;
    public $chosenPermissions;

    protected $listeners = ['updatePermissions', 'updatePermissions'];

    public function mount(): void
    {
        $this->role = Role::make();

        $this->permissions = Permission::get()
            ->map(function (Permission $model) {
                return [
                    'label' => $model->title,
                    'value' => strval($model->id),
                ];
            })
            ->toArray();
        $this->permissions = str_replace("\u0022","\\\\\"",json_encode( $this->permissions,JSON_HEX_QUOT)); 
    }

    public function rules(): array
    {
        return [
            'role.title' => 'required|string|max:255',
            'chosenPermissions' => ''
        ];
    }

    public function messages()
    {
        return [
            'role.title.required' => 'A Role is required.',
            'role.title.string' => 'Valid Role is required.',
            'role.title.max' => 'Role is too long.',
        ];
    }

    public function updatePermissions($value){
        $this->chosenPermissions = $value;
    }

    public function save(): void
    {
       
        $this->validate();

        $this->role->save();
        $this->role->permissions()->sync($this->chosenPermissions);

        redirect()->route('admin.roles');
    }

    public function render()
    {
        return view('livewire.admin.roles.create')
            ->layout('components.layouts.auth', [
                'title' => trans('New Role')
            ]);
    }
}
