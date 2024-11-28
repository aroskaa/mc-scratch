<div>
    <h1>Forgot Password</h1>
    <form wire:submit.prevent="sendResetLink">
        <label for="email">Email</label>
        <input type="email" id="email" wire:model="email" required>
        @error('email') <span>{{ $message }}</span> @enderror

        <button type="submit">Send Reset Link</button>
    </form>

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif
</div>
