<?php

namespace App\Livewire\Users;

use App\Models\Business;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{
    public $name, $email, $password, $confirm_password, $allRoles, $allBusinesses, $business_id;

    public $roles = [];
    public $permissions = [];
    public $businesses = [];


    public function mount()
    {
        $this->allRoles = Role::all(); // Fetch roles if applicable
        $this->allBusinesses = Business::all();
    }


    public function render()
    {
        return view('livewire.users.user-create');
    }

    public function submit()
    {
        $this->validate([
            "name" => "required",
            "email" => "required|email",
            "roles" => "required",
            "business_id" => "required|exists:businesses,id",
            "password" => "required|same:confirm_password",
        ]);

        $user = User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => Hash::make($this->password),
            "business_id" => $this->business_id,
        ]);

        $user->syncRoles($this->roles);


        return to_route("users.index");
    }
}
