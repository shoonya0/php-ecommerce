<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{

    // function to logout
    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirect after logout
    }

    public function render()
    {
        return view('livewire.header');
    }
}
