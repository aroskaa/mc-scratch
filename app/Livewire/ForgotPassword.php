<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $email;

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Send the password reset link
        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('message', 'Password reset link sent to your email.');
        } else {
            session()->flash('error', 'Unable to send password reset link.');
        }
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
