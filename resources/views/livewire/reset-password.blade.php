<div>
    <h1>Reset Password</h1>
    <form wire:submit.prevent="resetPassword">
        <input type="hidden" wire:model="token">

        <label for="email">Email</label>
        <input type="email" id="email" wire:model="email" required>
        @error('email') <span>{{ $message }}</span> @enderror

        <label for="password">New Password</label>
        <input type="password" id="password" wire:model="password" required>
        @error('password') <span>{{ $message }}</span> @enderror

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" wire:model="password_confirmation" required>
        @error('password_confirmation') <span>{{ $message }}</span> @enderror

        <button type="submit">Reset Password</button>
    </form>

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif
</div>
