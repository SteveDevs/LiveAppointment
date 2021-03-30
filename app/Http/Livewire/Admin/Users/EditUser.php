<?php

namespace App\Http\Livewire\Admin\Users;

use Hash;
use DB;
use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class EditUser extends Component
{
    public User $user;
    public $roles;
    public $role;
    public $password = '';
    public $initEmail;

    protected $listeners = [
        'updateRole' => 'updateRole',
    ];

    public function messages()
    {
        return [
            'user.name.required' => 'The Name cannot be empty.',
            'user.name.string' => 'A valid name is required.',
            'user.name.max' => 'Name is too long.',
            'user.email.string' => 'The Email Address has to be valid.',
            'user.email.required' => 'The Email Address cannot be empty.',
            'user.email.email' => 'A valid email address is required.',
            'password.required' => 'A password must be provided.',
            'password.string' => 'A valid password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password max value must be less than or equal to 15.',
            'role.required' => 'Role is required.',
        ];
    }

    public function updateRole($value){
        $this->role = $value;
    }

    public function mount($id): void
    {
        if(isset(RoleUser::where('user_id', $id)->first()->role_id)){
            $this->role = strval(RoleUser::where('user_id', $id)->first()->role_id);
        }
        
        $this->user = User::find($id);
        $this->initEmail = $this->user->email;
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
            'user.name' => 'required|string|max:255',
            'user.email' => 'string|required|email',
            'password' => 'required|string|min:8|max:15',
            'role' => 'required',
        ];
    }

    private function checkValidEmail() : bool 
    {
        if($this->initEmail == $this->user->email){
            return true;
        }
        if (User::where('email', '=', $this->user->email)->exists()) {
            return false;
        }
        return true;
    }

    public function save(): void
    {
        $this->validate();

        if(!$this->checkValidEmail()){
           
            $this->addError('user.email', trans('That email address exists.'));
        }else{
            DB::beginTransaction();
            try {
                User::where('id', $this->user->id)
                ->update([
                    'email' => $this->user->email,
                    'name' => $this->user->name,
                    'password' => Hash::make($this->password),
                ]);

                RoleUser::where('user_id', $this->user->id)
                ->update([
                    'role_id' => $this->role,
                ]);

                DB::commit();
            } catch (\Exception $ex) {
                DB::rollback();
                $this->dispatchBrowserEvent('notify', trans('User record was not saved!') . " " . $ex->getMessage());
            }
            redirect()->route('admin.users');
        }
    }

    public function render()
    {
        return view('livewire.admin.users.edit')
        ->layout('components.layouts.auth', [
            'title' => trans('Edit User'),
        ]);
    }
}
