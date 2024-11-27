<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Login extends Component
{
    public $username;
    public $password;

    public function login()
    {
        $this->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $attemptsKey = 'login_attempts_' . $this->username;

        if (!Cache::has($attemptsKey)) {
            Cache::put($attemptsKey, 0, now()->addMinutes(10));
        }

        if (Cache::get($attemptsKey, 0) >= 5) {
            session()->flash('error', 'Too many login attempts. Please try again in 5 minutes.');
            return;
        }

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {

            Cache::forget($attemptsKey);
            session()->regenerate();
            return redirect()->to('/dashboard');
        } else {

            $attempts = Cache::increment($attemptsKey);
            Cache::put($attemptsKey, $attempts, now()->addMinutes(5));
            session()->flash('error', 'Invalid username or password.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
