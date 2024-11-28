<h1>Welcome to the Dashboard</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

<a href="{{ route('profile') }}">
    <button>Go to Profile</button>
</a>
