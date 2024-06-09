<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <a href="{{ route('dashboard') }}" class="text-white font-semibold text-lg">Dashboard</a>
        </div>
        <div>
@auth
    <span class="text-gray-300 text-sm mr-4">Welcome, {{ Auth::user()->name }}</span>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="text-gray-300 hover:text-white">Logout</button>
    </form>
    @endauth
    </div>
    </div>
    </nav>
