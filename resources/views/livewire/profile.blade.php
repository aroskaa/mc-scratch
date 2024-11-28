<div>
    <h1>Profile Management</h1>

    <!-- Flash Message -->
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <!-- Update Username -->
    <form wire:submit.prevent="updateUsername">
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" wire:model="username">
            @error('username') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Update Username</button>
    </form>

    <!-- Update Password -->
    <form wire:submit.prevent="updatePassword">
        <div>
            <label for="old_password">Old Password</label>
            <input type="password" id="old_password" wire:model="old_password">
            @error('old_password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" wire:model="new_password">
            @error('new_password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="new_password_confirmation">Confirm New Password</label>
            <input type="password" id="new_password_confirmation" wire:model="new_password_confirmation">
        </div>

        <button type="submit">Update Password</button>
    </form>
</div>
