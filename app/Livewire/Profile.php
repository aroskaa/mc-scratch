<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $username;
    public $old_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        // Prefill the username with the logged-in user's username
        $this->username = Auth::user()->username;
    }

    public function updateUsername()
    {
        // Validate the new username
        $this->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
        ]);

        // Update username
        $user = Auth::user();
        $user->username = $this->username;
        $user->save();

        session()->flash('message', 'Username updated successfully.');
    }

    public function updatePassword()
    {
        // Validate the password inputs
        $this->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Verify the old password
        if (!Hash::check($this->old_password, Auth::user()->password)) {
            $this->addError('old_password', 'The provided password does not match your current password.');
            return;
        }

        // Update the password
        $user = Auth::user();
        $user->password = Hash::make($this->new_password);
        $user->save();

        session()->flash('message', 'Password updated successfully.');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
