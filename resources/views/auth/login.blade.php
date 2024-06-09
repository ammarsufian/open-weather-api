<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 h-screen flex justify-center items-center">
<div class="bg-white p-8 rounded-lg shadow-md w-full sm:w-96">
    <h2 class="text-2xl font-semibold mb-4">Login</h2>
    @if ($errors->any())
        <div class="bg-red-100 text-red-500 p-2 rounded mb-4">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-600">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-600">Password:</label>
            <input type="password" name="password" id="password" class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
    </form>
</div>
</body>
</html>
