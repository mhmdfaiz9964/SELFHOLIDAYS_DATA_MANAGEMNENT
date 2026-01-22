<x-app-layout>
    <x-slot name="header">
        Dashboard Overview
    </x-slot>

    <div class="space-y-10">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <!-- Stat Card 1 -->
            <div class="group relative overflow-hidden rounded-[2rem] bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200/50 border border-slate-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Total Balance</p>
                        <h3 class="mt-2 text-3xl font-black text-slate-900">$2,00,000</h3>
                        <p class="mt-1 text-[11px] font-semibold text-slate-400">In the past 12 months</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-[#10b981]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17"/><path d="m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.8-2.8L13 15"/><circle cx="12" cy="12" r="10"/></svg>
                    </div>
                </div>
            </div>

            <!-- Stat Card 2 -->
            <div class="group relative overflow-hidden rounded-[2rem] bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200/50 border border-slate-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Deposits</p>
                        <h3 class="mt-2 text-3xl font-black text-slate-900">$12,000</h3>
                        <p class="mt-1 text-[11px] font-semibold text-slate-400">In the past 12 months</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="m5 15 7 7 7-7"/><path d="M12 22V8"/></svg>
                    </div>
                </div>
            </div>

            <!-- Stat Card 3 -->
            <div class="group relative overflow-hidden rounded-[2rem] bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200/50 border border-slate-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Withdrawals</p>
                        <h3 class="mt-2 text-3xl font-black text-slate-900">$80,000</h3>
                        <p class="mt-1 text-[11px] font-semibold text-slate-400">In the past 12 months</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-50 text-rose-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22V2"/><path d="m5 9 7-7 7 7"/><path d="M12 2v14"/></svg>
                    </div>
                </div>
            </div>

            <!-- Stat Card 4 -->
            <div class="group relative overflow-hidden rounded-[2rem] bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200/50 border border-slate-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Pending Cheques</p>
                        <h3 class="mt-2 text-3xl font-black text-slate-900">42</h3>
                        <p class="mt-1 text-[11px] font-semibold text-slate-400">Requiring attention</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-amber-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/><path d="M7 15h.01"/><path d="M11 15h2"/></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Middle Section: Chart and Categories -->
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Cashflow Chart Placeholder -->
            <div class="lg:col-span-2 rounded-[2.5rem] bg-white p-10 shadow-sm border border-slate-100 flex flex-col justify-between min-h-[450px]">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">Financial Trends</h3>
                    <select class="rounded-xl border-none bg-slate-50 px-4 py-2 text-sm font-bold text-slate-600 focus:ring-2 focus:ring-[#10b981]/10">
                        <option>Monthly</option>
                        <option>Weekly</option>
                    </select>
                </div>
                
                <div class="relative mt-8 flex-1 flex items-center justify-center">
                    <!-- Modern Gradient Area Chart SVG -->
                    <svg viewBox="0 0 1000 300" class="w-full h-full">
                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" style="stop-color:#10b981;stop-opacity:0.2" />
                                <stop offset="100%" style="stop-color:#10b981;stop-opacity:0" />
                            </linearGradient>
                        </defs>
                        <path d="M0,250 Q100,200 200,220 T400,150 T600,180 T800,100 T1000,120 L1000,300 L0,300 Z" fill="url(#gradient)" />
                        <path d="M0,250 Q100,200 200,220 T400,150 T600,180 T800,100 T1000,120" fill="none" stroke="#10b981" stroke-width="4" stroke-linecap="round" />
                        
                        <!-- Dots -->
                        <circle cx="200" cy="220" r="6" fill="white" stroke="#10b981" stroke-width="3" />
                        <circle cx="400" cy="150" r="6" fill="white" stroke="#10b981" stroke-width="3" />
                        <circle cx="600" cy="180" r="6" fill="white" stroke="#10b981" stroke-width="3" />
                        <circle cx="800" cy="100" r="6" fill="white" stroke="#10b981" stroke-width="3" />
                        
                        <!-- Tooltip Label -->
                        <rect x="380" y="100" width="80" height="30" rx="8" fill="#000" />
                        <text x="420" y="120" text-anchor="middle" fill="#fff" font-size="14" font-weight="bold">$57,000</text>
                    </svg>
                </div>

                <div class="mt-8 flex justify-between px-2 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                    <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span><span>Jun</span><span>Jul</span><span>Aug</span><span>Sep</span><span>Oct</span>
                </div>
            </div>

            <!-- Expense Categories -->
            <div class="rounded-[2.5rem] bg-white p-10 shadow-sm border border-slate-100">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">Categories</h3>
                    <button class="text-xs font-bold text-[#10b981] hover:underline">View All</button>
                </div>

                <div class="space-y-6">
                    <!-- Cat Item 1 -->
                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-12 rounded-2xl bg-indigo-50 text-indigo-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">Premium Packages</p>
                                <p class="text-xs font-medium text-slate-400">4:03 PM</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-black text-slate-900">-$2,428</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">0.4286 ETH</p>
                        </div>
                    </div>

                    <!-- Cat Item 2 -->
                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-[#10b981] flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1v22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">Visa Services</p>
                                <p class="text-xs font-medium text-slate-400">Small balances</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-black text-slate-900">$0.98</p>
                        </div>
                    </div>

                    <!-- Cat Item 3 -->
                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">Guest Accommodation</p>
                                <p class="text-xs font-medium text-slate-400">3:54 PM</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-black text-slate-900">$4,000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Transactions Table -->
        <div class="rounded-[2.5rem] bg-white p-10 shadow-sm border border-slate-100 overflow-hidden">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">Recent Transactions</h3>
                <div class="flex gap-4">
                    <div class="flex items-center bg-slate-50 rounded-xl px-4 py-2 border border-slate-100 focus-within:ring-2 focus-within:ring-[#10b981]/20 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                        <input type="text" placeholder="Transaction ID..." class="bg-transparent border-none focus:ring-0 text-xs font-bold placeholder:text-slate-400 w-48">
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 pl-4">Currency</th>
                            <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Transaction ID</th>
                            <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Date/Time</th>
                            <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 pr-4 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <tr class="group hover:bg-slate-50 transition-colors duration-200">
                            <td class="py-6 pl-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600 group-hover:bg-emerald-100 group-hover:text-emerald-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 7 10 10"/><path d="M17 7v10H7"/></svg>
                                    </div>
                                    <span class="text-sm font-bold text-slate-800">Deposit Wallet</span>
                                </div>
                            </td>
                            <td class="py-6 font-semibold text-slate-500 text-sm">#876543</td>
                            <td class="py-6 font-semibold text-slate-500 text-sm">Jan 21 2024 @ 7:29PM</td>
                            <td class="py-6 pr-4 text-right">
                                <p class="text-sm font-black text-slate-900">15.00 USDT</p>
                                <p class="text-[10px] font-bold text-slate-400">Balance: 15.15 USDT</p>
                            </td>
                        </tr>
                        <tr class="group hover:bg-slate-50 transition-colors duration-200">
                            <td class="py-6 pl-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600 group-hover:bg-rose-100 group-hover:text-rose-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m17 17-10-10"/><path d="M7 17V7h10"/></svg>
                                    </div>
                                    <span class="text-sm font-bold text-slate-800">Withdrawal</span>
                                </div>
                            </td>
                            <td class="py-6 font-semibold text-slate-500 text-sm">#987123</td>
                            <td class="py-6 font-semibold text-slate-500 text-sm">Jan 21 2024 @ 7:45PM</td>
                            <td class="py-6 pr-4 text-right">
                                <p class="text-sm font-black text-slate-900">150.00 USDT</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
