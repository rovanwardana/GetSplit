<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/image/logo.png') }}">
    <title>@yield('title') | GetSplit</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-[#EEF1F9]">

    <!-- Navbar -->
    <nav
        class="fixed top-6 left-1/2 -translate-x-1/2 
           w-[92%] max-w-[1400px] h-[72px]
           bg-gradient-to-b from-white/90 to-white/70
           backdrop-blur-lg
           rounded-full shadow-lg
           flex items-center justify-between
           px-10 z-20">

        <!-- Left: Logo -->
        <div class="flex items-center">
            <img src="/assets/image/logo1.png" alt="logo" class="w-[70px] object-contain">
        </div>

        <!-- Center / Right: Menu -->
        <div class="flex items-center gap-3">

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="relative px-5 py-2 text-[#071739] font-medium
                   transition-all duration-200
                   {{ request()->routeIs('dashboard') ? 'font-bold' : '' }}
                   hover:font-bold group">
                Dashboard
                <!-- Underline -->
                <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[2px] bg-[#071739] transition-all duration-200
                    {{ request()->routeIs('dashboard') ? 'w-3/4' : 'w-0 group-hover:w-3/4' }}">
                </span>
            </a>

            <!-- Transaction -->
            <a href="{{ route('transaction.index') }}"
                class="relative px-5 py-2 text-[#071739] font-medium
                   transition-all duration-200
                   {{ request()->routeIs('transaction.*') ? 'font-bold' : '' }}
                   hover:font-bold group">
                Transaction
                <!-- Underline -->
                <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[2px] bg-[#071739] transition-all duration-200
                    {{ request()->routeIs('transaction.*') ? 'w-3/4' : 'w-0 group-hover:w-3/4' }}">
                </span>
            </a>

            <!-- New Bill (Primary) -->
            <a href="{{ route('bills.create') }}"
                class="px-6 py-2 rounded-full
                   bg-[#071739] text-white font-medium
                   transition-all duration-200
                   hover:-translate-y-0.5 hover:shadow-lg hover:shadow-[#071739]/30">
                New Bill
            </a>

            <!-- Profile Dropdown -->
            <div class="relative ml-2">
                <button id="profileDropdownBtn"
                    class="flex items-center gap-2 px-4 py-2 rounded-full
                       text-[#071739]
                       hover:bg-[#071739] hover:text-white
                       transition-all duration-200">

                    <!-- User Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-[26px] h-[26px] fill-current">
                        <path
                            d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                    </svg>

                    <!-- Arrow -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="transition-transform duration-200" id="dropdownIcon">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>

                <div id="profileDropdown"
                    class="hidden absolute right-0 mt-4 w-[200px]
           bg-white rounded-2xl shadow-xl py-2
           border border-gray-100
           transition-all duration-200
           origin-top-right">

                    <!-- Profile -->
                    <a href="{{ route('profile') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                        </svg>
                        <span>Profile</span>
                    </a>

                    <!-- Help -->
                    <a href="{{ route('help') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.02 2.575-2.438 2.88-.786.17-1.562.813-1.562 1.62V15" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01" />
                        </svg>
                        <span>Help</span>
                    </a>

                    <hr class="my-2 border-gray-200">

                    <!-- Logout -->
                    <button id="logoutBtn"
                        class="w-full flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 transition-colors">
                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 17l5-5-5-5" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H3" />
                        </svg>
                        <span class="font-medium">Logout</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Blur layer -->
    <div id="scrollBlur"
        class="fixed top-0 left-0 w-full h-[109px]
            pointer-events-none
            backdrop-blur-xl
            bg-gradient-to-b
            from-white/70
            via-white/40
            to-white/0
            opacity-0
            transition-opacity duration-300
            z-10">
    </div>

    <!-- Logout Popup -->
    @include('layouts.logout_popup')

    <!-- Main Content -->
    <main class="pt-[110px]">
        @yield('content')
    </main>

    @stack('scripts')
</body>

</html>