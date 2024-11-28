<div class="login-container">
    <form wire:submit.prevent="login">
        @csrf

        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" wire:model="username" placeholder="Enter your username">
            @error('username') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" wire:model="password" placeholder="Enter your password">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        </div>

        <button type="submit">Login</button>
    </form>
</div>
