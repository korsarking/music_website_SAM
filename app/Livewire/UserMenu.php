<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserMenu extends Component
{
public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function getListeners()
    {
        return [
            'refreshUserMenu' => 'refreshUser',
        ];
    }

    public function refreshUser()
    {
        $this->user = Auth::user();
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        
        $this->dispatch('refreshUserMenu');
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.user-menu');
    }
}
