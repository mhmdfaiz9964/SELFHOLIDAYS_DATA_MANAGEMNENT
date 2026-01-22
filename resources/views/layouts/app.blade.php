<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SELF HOLIDAYS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .sidebar-link-active {
            background: #f1f5f9;
            color: #10b981;
            box-shadow: inset 4px 0 0 0 #10b981;
        }
    </style>
</head>
<body class="h-full antialiased font-sans text-slate-900 overflow-x-hidden" x-data="{ sidebarOpen: false }">
    
    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="transition-opacity ease-linear duration-300" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0" 
         @click="sidebarOpen = false"
         class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-sm lg:hidden"></div>

    <!-- Sidebar Wrapper -->
    <div class="fixed inset-y-0 left-0 z-50 w-72 transform bg-white transition duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0"
         :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        
        <div class="flex h-full flex-col border-r border-slate-200">
            <!-- Sidebar Header -->
            <div class="flex flex-shrink-0 items-center gap-3 px-8 py-8">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#10b981] text-white shadow-lg shadow-[#10b981]/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <span class="text-xl font-extrabold tracking-tight text-slate-900">SELF <span class="text-[#10b981]">HOLIDAYS</span></span>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 space-y-2 px-4 py-4 overflow-y-auto custom-scrollbar">
                <div class="px-4 mb-4 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">Main Menu</div>
                
                <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200 {{ request()->routeIs('dashboard') ? 'sidebar-link-active' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform group-hover:scale-110"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                    Dashboard
                </a>

                <a href="{{ route('users.index') }}" class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200 {{ request()->routeIs('users.*') ? 'sidebar-link-active' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform group-hover:scale-110"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Users Management
                </a>

                <div class="px-4 mb-2 mt-8 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">Financials</div>

                <div x-data="{ open: {{ request()->routeIs('cheques.*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="group flex w-full items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200 {{ request()->routeIs('cheques.*') ? 'text-[#10b981]' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform group-hover:scale-110"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                            Cheques
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" :class="open ? 'rotate-180' : ''" class="transition-transform duration-200"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div x-show="open" x-collapse class="ml-9 mt-1 space-y-1">
                        <a href="{{ route('cheques.index') }}" class="block rounded-lg px-4 py-2 text-xs font-semibold {{ request()->routeIs('cheques.index') ? 'text-[#10b981]' : 'text-slate-400 hover:text-slate-900' }}">All Cheques</a>
                        <a href="{{ route('cheques.create') }}" class="block rounded-lg px-4 py-2 text-xs font-semibold {{ request()->routeIs('cheques.create') ? 'text-[#10b981]' : 'text-slate-400 hover:text-slate-900' }}">Create New</a>
                    </div>
                </div>

                <div class="px-4 mb-2 mt-8 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">Settings</div>

                <a href="{{ route('banks.index') }}" class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200 {{ request()->routeIs('banks.*') ? 'sidebar-link-active' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform group-hover:scale-110"><path d="M3 21h18"/><path d="M3 10h18"/><path d="M5 6h14"/><path d="M4 10v11"/><path d="M20 10v11"/><path d="M8 14v3"/><path d="M12 14v3"/><path d="M16 14v3"/></svg>
                    Banks
                </a>

                <div class="px-4 mb-2 mt-8 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">Account</div>
                
                <a href="{{ route('profile.edit') }}" class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all duration-200 {{ request()->routeIs('profile.*') ? 'sidebar-link-active' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform group-hover:scale-110"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    Settings
                </a>
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-slate-100">
                <button @click="confirmLogout" class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-bold text-red-500 transition-all duration-200 hover:bg-red-50 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform group-hover:translate-x-1"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                    Logout
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex flex-1 flex-col overflow-hidden">
        <!-- Header -->
        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 lg:px-12 sticky top-0 z-30">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="p-2 -ml-2 text-slate-500 hover:bg-slate-50 rounded-lg lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </button>
                <h2 class="text-xl font-bold text-slate-800">
                    @isset($header)
                        {{ $header }}
                    @else
                        Dashboard Overview
                    @endisset
                </h2>
            </div>

            <div class="flex items-center gap-6">
                <!-- Search -->
                <div class="hidden md:flex items-center bg-slate-100 rounded-full px-4 py-2 focus-within:ring-2 focus-within:ring-[#10b981]/20 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input type="text" placeholder="Search property..." class="bg-transparent border-none focus:ring-0 text-sm placeholder:text-slate-400 w-64">
                </div>

                <!-- User Profile -->
                <div class="flex items-center gap-4 border-l border-slate-100 pl-6">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-slate-800">{{ Auth::user()->name }}</p>
                        <p class="text-[11px] font-medium text-slate-400 uppercase tracking-wider">Super Administrator</p>
                    </div>
                    <div class="h-12 w-12 rounded-2xl bg-[#10b981]/10 text-[#10b981] flex items-center justify-center font-bold text-lg border-2 border-[#10b981]/20">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Workspace -->
        <main class="flex-1 overflow-y-auto p-8 lg:p-12 custom-scrollbar">
            {{ $slot }}
        </main>
    </div>

    <!-- Hidden Logout Form -->
    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
        @csrf
    </form>

    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out of your session.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Yes, logout!',
                cancelButtonText: 'No, stay',
                borderRadius: '1.5rem',
                customClass: {
                    popup: 'rounded-3xl border-0 shadow-2xl',
                    confirmButton: 'rounded-xl px-6 py-3 font-bold',
                    cancelButton: 'rounded-xl px-6 py-3 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        }

        // Show toast messages from session
        window.addEventListener('load', () => {
            @if(session('success'))
                toast("{{ session('success') }}", 'success');
            @endif
            @if(session('error'))
                toast("{{ session('error') }}", 'error');
            @endif
        });
    </script>
</body>
</html>
