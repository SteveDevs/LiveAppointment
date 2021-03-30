<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;

class EditRole extends Component
{
    public Role $role;
    public $permissions;
    public $chosenPermissions;
    public $chosenIds;

    protected $listeners = ['updatePermissions', 'updatePermissions'];

    public function mount($id): void
    {
        $this->role = Role::find($id);

        $this->permissions = Permission::get()
            ->map(function (Permission $model) {
                return [
                    'label' => $model->title,
                    'value' => strval($model->id),
                ];
            })
            ->toArray();
        $this->permissions = str_replace("\u0022","\\\\\"",json_encode( $this->permissions,JSON_HEX_QUOT));

        $this->chosenPermissions = Role::find($id)->permissions()->get()
            ->map(function (Permission $model) {
                return strval($model->id);
            })
            ->toArray();
        $this->chosenIds = $this->chosenPermissions;

        $this->chosenPermissions = str_replace("\u0022","\\\\\"",json_encode( $this->chosenPermissions,JSON_HEX_QUOT));

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
        $this->chosenIds = $value;
    }

    public function save(): void
    {   
        $this->validate();

        $this->role->save();
        $this->role->permissions()->sync($this->chosenIds);

        redirect()->route('admin.roles');
    }

    public function render()
    {
        return view('livewire.admin.roles.edit')
            ->layout('components.layouts.auth', [
                'title' => trans('Edit Role')
            ]);
    }
}
