<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;

class IndexUser extends Component
{
    public User $user;
    public bool $showDeleteModal = false;
    public string $modalHeadingText = '';

    public function __construct(){
    }

    public function mount(): void
    {
        $this->user = User::make();
    }

    public function render()
    {
        return view('livewire.admin.users.index');
    }
}
