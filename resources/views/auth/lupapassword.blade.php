<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-700 mb-4 text-center">Reset Password</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-2 mb-4 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('reset.submit') }}">
            @csrf

            <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" required class="w-full px-4 py-2 border rounded mb-4">

            <label class="block mb-2 text-sm font-medium text-gray-700">Password Baru</label>
            <input type="password" name="password" required class="w-full px-4 py-2 border rounded mb-4">

            <label class="block mb-2 text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border rounded mb-6">

            <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
                Reset Password
            </button>
        </form>

        <a href="/login" class="block mt-4 text-center text-sm text-yellow-600 hover:underline">Kembali ke Login</a>
    </div>
</body>
</html>
