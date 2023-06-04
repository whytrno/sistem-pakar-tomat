<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class User extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.admin.user', compact('users'));
    }
}
