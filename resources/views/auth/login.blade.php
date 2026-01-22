<x-guest-layout>
    <div class="fixed inset-0 flex items-center justify-center bg-slate-100 p-4 md:p-6 lg:p-8">
        <div class="flex w-full max-w-5xl flex-col overflow-hidden rounded-[2.5rem] bg-white shadow-2xl md:flex-row min-h-[600px]">
            
            <!-- Left Panel (Brand) -->
            <div class="relative flex w-full flex-col justify-between bg-[#0a0a0a] p-8 text-white md:w-[45%] lg:p-12">
                <div class="z-10 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#10b981] text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-[#10b981]">SELF <span class="text-white">HOLIDAYS</span></span>
                </div>

                <div class="z-10 mt-12 md:mt-0">
                    <h1 class="text-5xl font-black leading-tight tracking-tight lg:text-6xl">
                        Admin<br/>
                        Command<br/>
                        <span class="text-[#10b981]">Center</span>
                    </h1>
                    <p class="mt-6 text-lg text-slate-400 leading-relaxed max-w-xs">
                        Manage your premium travel packages, visa consultations, and guest experiences from one powerful interface.
                    </p>
                </div>

                <div class="z-10 mt-8 border-t border-white/10 pt-8">
                    <p class="text-xs font-medium uppercase tracking-[0.2em] text-slate-500">
                        Powered by Self Holidays Tech
                    </p>
                </div>
                
                <!-- Decorative Elements -->
                <div class="absolute -bottom-24 -left-24 h-64 w-64 rounded-full bg-[#10b981]/10 blur-3xl"></div>
                <div class="absolute -right-24 -top-24 h-64 w-64 rounded-full bg-blue-500/10 blur-3xl"></div>
            </div>

            <!-- Right Panel (Form) -->
            <div class="relative flex w-full flex-col justify-center p-8 md:w-[55%] lg:p-16">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="mb-10">
                    <h2 class="text-3xl font-bold text-slate-900">Welcome Back</h2>
                    <p class="mt-2 text-slate-500">Please enter your credentials to access the console.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <label for="email" class="text-xs font-bold uppercase tracking-widest text-slate-400">Email Address</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            </div>
                            <input id="email" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 pl-12 pr-4 text-slate-900 ring-1 ring-inset ring-slate-200 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="admin@selfholidays.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="text-xs font-bold uppercase tracking-widest text-slate-400">Secret Password</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </div>
                            <input id="password" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 pl-12 pr-12 text-slate-900 ring-1 ring-inset ring-slate-200 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <button type="button" class="text-slate-400 hover:text-slate-600 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0z"/><circle cx="12" cy="12" r="3"/></svg>
                                </button>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded-md border-slate-300 text-[#10b981] shadow-sm focus:ring-[#10b981]" name="remember">
                            <span class="ml-2 text-sm font-medium text-slate-500">Stay logged in on this session</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-semibold text-[#10b981] hover:text-[#059669]" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="flex w-full items-center justify-center gap-3 rounded-2xl bg-[#0a0a0a] py-4 text-sm font-bold text-white shadow-xl shadow-slate-200 hover:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-[#0a0a0a] focus:ring-offset-2 transition-all duration-200 active:scale-[0.98]">
                            <span>Access Console</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
