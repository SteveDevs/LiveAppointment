<?php

namespace App\Http\Livewire\Admin\Users;

use Hash;
use DB;
use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;


class CreateUser extends Component
{
    public $roles;
    public $role;
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    protected $listeners = [
        'updateRole' => 'updateRole',
    ];

    public function updateRole($value){
        $this->role = $value;
    }

    public function mount(): void
    {
        $this->user = User::make();

        $this->roles = Role::get()
            ->map(function (Role $model) {
                return [
                    'label' => $model->title,
                    'value' => strval($model->id),
                ];
            })
            ->toArray();
        $this->roles = str_replace("\u0022","\\\\\"",json_encode( $this->roles,JSON_HEX_QUOT)); 
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'string|required|email|unique:users',
            'password' => 'required|string|min:8|max:15',
            'role' => 'required|min:1'
        ];
    }

    public function messages()
    {
        return [
            'user.name.required' => 'The Name cannot be empty.',
            'user.name.string' => 'A valid name is required.',
            'user.name.max' => 'Name is too long.',
            'user.email.string' => 'The Email Address has to be valid.',
            'user.email.required' => 'The Email Address cannot be empty.',
            'user.email.email' => 'A valid email address is required.',
            'user.email.unique' => 'Email Address exists.',
            'password.required' => 'A password must be provided.',
            'password.string' => 'A valid password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password max value must be less than or equal to 15.',
            'role.required' => 'Role is required.',
        ];
    }

    public function save(): void
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $user = User::create([
                'email' => $this->email,
                'name' => $this->name,
                'password' => Hash::make($this->password),
            ]);

            $user->roles()->sync([$this->role]);
            DB::commit();
            $this->dispatchBrowserEvent('notify', trans('User saved successfully!'));
        } catch (\Exception $ex) {
            DB::rollback();
            $this->dispatchBrowserEvent('notify', trans('User record was not saved!') . $ex->getMessage());
        }
        redirect()->route('admin.users');
    }

    public function render()
    {
        return view('livewire.admin.users.create')
            ->layout('components.layouts.auth', [
                'title' => trans('New User')
            ]);
    }
}
