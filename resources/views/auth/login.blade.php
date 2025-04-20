<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartHatch - Login</title>
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Gambar di sebelah kiri (hidden di mobile) -->
        <div class="md:w-1/2 bg-[#FF9B17] hidden md:flex items-center justify-center p-12">
            <div class="max-w-md text-center text-white">
                <div class="px-24 py-2 flex items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                      <path fill="#fff" d="M12 2L2 7v10l10 5l10-5V7L12 2m0 2.8L20 9v6l-8 4l-8-4V9l8-4.2M12 12l-5 2v3.3l5 2.5l5-2.5V14l-5-2z"/>
                    </svg>
                    <span class="font-bold text-lg text-white ml-2 items-center">SmartHatch</span>
                </div>
                  
                <img src="images/telur-bebek(1).jpeg" 
                     alt="Telur Bebek" 
                     class="rounded-lg shadow-xl mb-8 mx-auto w-full max-w-xs">
                <p class="text-lg">Sistem Monitoring Telur Bebek Berbasis IoT</p>
            </div>
        </div>

        <!-- Form login di sebelah kanan -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6">
            <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
                <div class="md:hidden mb-8 text-center">
                    <h1 class="text-2xl font-bold text-orange-300 mb-2">SmartHatch
                    <p class="text-gray-600">Sistem Monitoring Telur Bebek</p>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-6">Login</h2>
                
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FCB454]">
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FCB454]">
                    </div>

                    <div class="flex items-center justify-between mb-6">
                       
                        <a href="{{ route('reset.form') }}" class="text-sm text-[#FCB454] hover:text-[#FF9B17]">Lupa password?</a>
                    </div>

                    <button type="submit" 
                            class="w-full bg-[#FF9B17] hover:bg-[#FCB454] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150">
                        Masuk
                    </button>
                </form>

                
            </div>
        </div>
    </div>
</body>
</html>