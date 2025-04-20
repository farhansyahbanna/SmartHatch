<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'SmartHatch Dashboard')</title>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  @vite('resources/js/dashboard.js')
  @vite('resources/css/app.css')
  <style>
    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
      background: #FF9B17;
      border-radius: 3px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #FCB454;
    }
  </style>
</head>
<body class="flex h-screen bg-gray-100 font-sans" x-data="{sidebarOpen: false}">
  <!-- Mobile menu button (hidden on desktop) -->

  <!-- Sidebar -->
  <aside 
    class="bg-[#FF9B17] w-64 fixed lg:static h-full z-40 transform transition-transform duration-300 ease-in-out"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    x-data="{ sidebarOpen: window.innerWidth >= 1024 }"
    @resize.window="sidebarOpen = window.innerWidth >= 1024"
  >
    <div class="flex flex-col h-full">
      <!-- Logo -->
      <div class="p-4 border-b border-[#FCB454] flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
          <path fill="#fff" d="M12 2L2 7v10l10 5l10-5V7L12 2m0 2.8L20 9v6l-8 4l-8-4V9l8-4.2M12 12l-5 2v3.3l5 2.5l5-2.5V14l-5-2z"/>
        </svg>
        <span class="font-bold text-lg text-white ml-2">SmartHatch</span>
      </div>
      
      <!-- Navigation -->
      <nav class="flex-1 overflow-y-auto py-4 px-2 space-y-2">
        <!-- Dashboard -->
        <a href="{{route('dashboard')}}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#FCB454] transition-colors duration-200 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
            <path fill="currentColor" d="M16.612 2.214a1.01 1.01 0 0 0-1.242 0L1 13.419l1.243 1.572L4 13.621V26a2.004 2.004 0 0 0 2 2h20a2.004 2.004 0 0 0 2-2V13.63L29.757 15L31 13.428ZM18 26h-4v-8h4Zm2 0v-8a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v8H6V12.062l10-7.79l10 7.8V26Z"/>
          </svg>
          <span>Dashboard</span>
        </a>
        
        <!-- Settings -->
        <a href="{{route('settings')}}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#FCB454] transition-colors duration-200 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
            <path fill="currentColor" d="M27 16.76v-1.53l1.92-1.68A2 2 0 0 0 29.3 11l-2.36-4a2 2 0 0 0-1.73-1a2 2 0 0 0-.64.1l-2.43.82a11 11 0 0 0-1.31-.75l-.51-2.52a2 2 0 0 0-2-1.61h-4.68a2 2 0 0 0-2 1.61l-.51 2.52a11.5 11.5 0 0 0-1.32.75l-2.38-.86A2 2 0 0 0 6.79 6a2 2 0 0 0-1.73 1L2.7 11a2 2 0 0 0 .41 2.51L5 15.24v1.53l-1.89 1.68A2 2 0 0 0 2.7 21l2.36 4a2 2 0 0 0 1.73 1a2 2 0 0 0 .64-.1l2.43-.82a11 11 0 0 0 1.31.75l.51 2.52a2 2 0 0 0 2 1.61h4.72a2 2 0 0 0 2-1.61l.51-2.52a11.5 11.5 0 0 0 1.32-.75l2.42.82a2 2 0 0 0 .64.1a2 2 0 0 0 1.73-1l2.28-4a2 2 0 0 0-.41-2.51ZM25.21 24l-3.43-1.16a8.9 8.9 0 0 1-2.71 1.57L18.36 28h-4.72l-.71-3.55a9.4 9.4 0 0 1-2.7-1.57L6.79 24l-2.36-4l2.72-2.4a8.9 8.9 0 0 1 0-3.13L4.43 12l2.36-4l3.43 1.16a8.9 8.9 0 0 1 2.71-1.57L13.64 4h4.72l.71 3.55a9.4 9.4 0 0 1 2.7 1.57L25.21 8l2.36 4l-2.72 2.4a8.9 8.9 0 0 1 0 3.13L27.57 20Z"/>
            <path fill="currentColor" d="M16 22a6 6 0 1 1 6-6a5.94 5.94 0 0 1-6 6m0-10a3.91 3.91 0 0 0-4 4a3.91 3.91 0 0 0 4 4a3.91 3.91 0 0 0 4-4a3.91 3.91 0 0 0-4-4"/>
          </svg>
          <span>Pengaturan</span>
        </a>

        <a href="{{route('riwayat')}}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#FCB454] transition-colors duration-200 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M5.079 5.069c3.795-3.79 9.965-3.75 13.783.069c3.82 3.82 3.86 9.993.064 13.788s-9.968 3.756-13.788-.064a9.81 9.81 0 0 1-2.798-8.28a.75.75 0 1 1 1.487.203a8.31 8.31 0 0 0 2.371 7.017c3.245 3.244 8.468 3.263 11.668.064c3.199-3.2 3.18-8.423-.064-11.668c-3.243-3.242-8.463-3.263-11.663-.068l.748.003a.75.75 0 1 1-.007 1.5l-2.546-.012a.75.75 0 0 1-.746-.747L3.575 4.33a.75.75 0 1 1 1.5-.008zm6.92 2.18a.75.75 0 0 1 .75.75v3.69l2.281 2.28a.75.75 0 1 1-1.06 1.061l-2.72-2.72V8a.75.75 0 0 1 .75-.75" clip-rule="evenodd"/></svg>
          <span>Riwayat</span>
        </a>
      </nav>

      <!-- Logout Button -->
      <div class="p-4 border-t border-[#FCB454]">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="flex items-center gap-3 w-full p-3 rounded-lg hover:bg-[#FCB454] transition-colors duration-200 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path fill="currentColor" d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h7v2H5v14h7v2H5Zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5l-5 5Z"/>
            </svg>
            <span>Logout</span>
          </button>
        </form>
      </div>
    </div>
  </aside>

  

  <!-- Main Content -->
  <div class="flex-1 flex flex-col overflow-hidden ">
    <!-- Navbar -->
    <header class="bg-white shadow-sm py-4 px-6 flex items-center justify-between ">

      <div x-data="{ mobileMenuOpen: false }">
        <!-- Mobile Menu Button -->
        <button @click="mobileMenuOpen = true" class="lg:hidden z-50 p-1 bg-[#FF9B17] rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
            <path fill="#fff" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
          </svg>
        </button>
      
        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen" 
             @click.away="mobileMenuOpen = false"
             class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
             x-transition.opacity>
        </div>
      
        <!-- Mobile Menu Content -->
        <div x-show="mobileMenuOpen"
             class="fixed top-0 left-0 h-full w-64 bg-[#FF9B17] z-50 shadow-xl transform transition-transform duration-300"
             :class="mobileMenuOpen ? 'translate-x-0' : '-translate-x-full'">
          
          <div class="p-4 border-b flex justify-between items-center">
            <div class="p-1 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                <path fill="#fff" d="M12 2L2 7v10l10 5l10-5V7L12 2m0 2.8L20 9v6l-8 4l-8-4V9l8-4.2M12 12l-5 2v3.3l5 2.5l5-2.5V14l-5-2z"/>
              </svg>
              <span class="font-bold text-lg text-white ml-2">SmartHatch</span>
            </div>
            <button @click="mobileMenuOpen = false" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z"/>
              </svg>
            </button>
          </div>
          
          <nav class="p-4 space-y-2">
            <!-- Menu Items Same as Sidebar -->
            <a href="{{route('dashboard')}}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#FCB454] transition-colors duration-200 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                <path fill="currentColor" d="M16.612 2.214a1.01 1.01 0 0 0-1.242 0L1 13.419l1.243 1.572L4 13.621V26a2.004 2.004 0 0 0 2 2h20a2.004 2.004 0 0 0 2-2V13.63L29.757 15L31 13.428ZM18 26h-4v-8h4Zm2 0v-8a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v8H6V12.062l10-7.79l10 7.8V26Z"/>
              </svg>
              <span>Dashboard</span>
            </a>
            
            <!-- Settings -->
            <a href="{{route('settings')}}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#FCB454] transition-colors duration-200 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                <path fill="currentColor" d="M27 16.76v-1.53l1.92-1.68A2 2 0 0 0 29.3 11l-2.36-4a2 2 0 0 0-1.73-1a2 2 0 0 0-.64.1l-2.43.82a11 11 0 0 0-1.31-.75l-.51-2.52a2 2 0 0 0-2-1.61h-4.68a2 2 0 0 0-2 1.61l-.51 2.52a11.5 11.5 0 0 0-1.32.75l-2.38-.86A2 2 0 0 0 6.79 6a2 2 0 0 0-1.73 1L2.7 11a2 2 0 0 0 .41 2.51L5 15.24v1.53l-1.89 1.68A2 2 0 0 0 2.7 21l2.36 4a2 2 0 0 0 1.73 1a2 2 0 0 0 .64-.1l2.43-.82a11 11 0 0 0 1.31.75l.51 2.52a2 2 0 0 0 2 1.61h4.72a2 2 0 0 0 2-1.61l.51-2.52a11.5 11.5 0 0 0 1.32-.75l2.42.82a2 2 0 0 0 .64.1a2 2 0 0 0 1.73-1l2.28-4a2 2 0 0 0-.41-2.51ZM25.21 24l-3.43-1.16a8.9 8.9 0 0 1-2.71 1.57L18.36 28h-4.72l-.71-3.55a9.4 9.4 0 0 1-2.7-1.57L6.79 24l-2.36-4l2.72-2.4a8.9 8.9 0 0 1 0-3.13L4.43 12l2.36-4l3.43 1.16a8.9 8.9 0 0 1 2.71-1.57L13.64 4h4.72l.71 3.55a9.4 9.4 0 0 1 2.7 1.57L25.21 8l2.36 4l-2.72 2.4a8.9 8.9 0 0 1 0 3.13L27.57 20Z"/>
                <path fill="currentColor" d="M16 22a6 6 0 1 1 6-6a5.94 5.94 0 0 1-6 6m0-10a3.91 3.91 0 0 0-4 4a3.91 3.91 0 0 0 4 4a3.91 3.91 0 0 0 4-4a3.91 3.91 0 0 0-4-4"/>
              </svg>
              <span>Pengaturan</span>
            </a>
    
            <a href="{{route('riwayat')}}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#FCB454] transition-colors duration-200 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M5.079 5.069c3.795-3.79 9.965-3.75 13.783.069c3.82 3.82 3.86 9.993.064 13.788s-9.968 3.756-13.788-.064a9.81 9.81 0 0 1-2.798-8.28a.75.75 0 1 1 1.487.203a8.31 8.31 0 0 0 2.371 7.017c3.245 3.244 8.468 3.263 11.668.064c3.199-3.2 3.18-8.423-.064-11.668c-3.243-3.242-8.463-3.263-11.663-.068l.748.003a.75.75 0 1 1-.007 1.5l-2.546-.012a.75.75 0 0 1-.746-.747L3.575 4.33a.75.75 0 1 1 1.5-.008zm6.92 2.18a.75.75 0 0 1 .75.75v3.69l2.281 2.28a.75.75 0 1 1-1.06 1.061l-2.72-2.72V8a.75.75 0 0 1 .75-.75" clip-rule="evenodd"/></svg>
              <span>Riwayat</span>
            </a>

            
            <!-- ... other menu items ... -->
          </nav>
           <!-- Logout Button -->
          <div class="p-4 border-t border-[#FCB454]">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="flex items-center gap-3 w-full p-3 rounded-lg hover:bg-[#FCB454] transition-colors duration-200 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h7v2H5v14h7v2H5Zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5l-5 5Z"/>
                </svg>
                <span>Logout</span>
              </button>
            </form>
          </div>
        </div>
      </div>

      <h1 class="text-xl font-semibold text-gray-800">@yield('h1', 'Dashboard')</h1>
      <div class="flex items-center space-x-4">
        <!-- User Profile -->
        <div class="relative">
          <a class="flex items-center  p-1 rounded-full bg-[#FF9B17]" href="{{route('notifikasi')}}" >
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="#fff" d="M26 16.586V14h-2v3a1 1 0 0 0 .293.707L27 20.414V22H5v-1.586l2.707-2.707A1 1 0 0 0 8 17v-4a7.985 7.985 0 0 1 12-6.917V3.846a9.9 9.9 0 0 0-3-.796V1h-2v2.05A10.014 10.014 0 0 0 6 13v3.586l-2.707 2.707A1 1 0 0 0 3 20v3a1 1 0 0 0 1 1h7v1a5 5 0 0 0 10 0v-1h7a1 1 0 0 0 1-1v-3a1 1 0 0 0-.293-.707ZM19 25a3 3 0 0 1-6 0v-1h6Z"/><circle cx="26" cy="8" r="4" fill="#fff"/></svg>
          </a>
        </div>
      </div>
      
    </header>

    <!-- Page Content -->
    <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-50">
      @yield('content')
    </main>
  </div>

  <script>
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
      const sidebar = document.querySelector('aside');
      const mobileMenuButton = document.querySelector('.lg\\:hidden button');
      
      if (window.innerWidth < 1024 && 
          !sidebar.contains(event.target) && 
          event.target !== mobileMenuButton && 
          !mobileMenuButton.contains(event.target)) {
        Alpine.store('sidebarOpen', false);
      }
    });
  </script>
</body>
</html>