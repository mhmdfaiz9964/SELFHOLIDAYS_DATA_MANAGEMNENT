<x-app-layout>
    <x-slot name="header">
        Cheques Repository
    </x-slot>

    <!-- Filters Section -->
    <div class="mb-8 rounded-[2rem] bg-white p-8 shadow-sm border border-slate-100">
        <form action="{{ route('cheques.index') }}" method="GET" class="grid grid-cols-1 gap-6 md:grid-cols-4 lg:grid-cols-5 items-end">
            <!-- Search -->
            <div class="md:col-span-2 space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 ml-1">Search Keywords</label>
                <div class="relative group">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 transition-colors group-focus-within:text-[#10b981]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cheque # or Payer Name..." class="block w-full rounded-2xl border-0 bg-slate-50 py-3.5 pl-12 pr-4 text-sm text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] transition-all">
                </div>
            </div>

            <!-- Status Filter -->
            <div class="space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 ml-1">Payment Status</label>
                <select name="status" class="block w-full rounded-2xl border-0 bg-slate-50 py-3.5 px-4 text-sm text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] transition-all">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="partial_paid" {{ request('status') == 'partial_paid' ? 'selected' : '' }}>Partial Paid</option>
                    <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Fully Paid</option>
                </select>
            </div>

            <!-- Date Filter -->
            <div class="space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 ml-1">Cheque Date</label>
                <input type="date" name="date" value="{{ request('date') }}" class="block w-full rounded-2xl border-0 bg-slate-50 py-3.5 px-4 text-sm text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] transition-all">
            </div>

            <!-- Filter Button -->
            <div class="flex gap-2">
                <button type="submit" class="flex-1 rounded-2xl bg-[#0a0a0a] py-3.5 text-xs font-black text-white shadow-xl shadow-slate-200 hover:bg-slate-900 transition-all active:scale-95">Apply filters</button>
                <a href="{{ route('cheques.index') }}" class="rounded-2xl bg-slate-100 p-3.5 text-slate-500 hover:bg-slate-200 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
                </a>
            </div>
        </form>
    </div>

    <div class="rounded-[2.5rem] bg-white p-10 shadow-sm border border-slate-100 overflow-hidden">
        <div class="flex items-center justify-between mb-10">
            <h3 class="text-2xl font-black text-slate-900 tracking-tight">Financial Records</h3>
            <a href="{{ route('cheques.create') }}" class="flex items-center gap-2 rounded-2xl bg-[#10b981] px-6 py-3 text-sm font-bold text-white hover:bg-emerald-600 transition-all active:scale-95 shadow-xl shadow-emerald-100/50">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                Issue Cheque
            </a>
        </div>

        <div class="overflow-x-auto -mx-10 px-10">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-slate-100">
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 pl-4">Cheque #</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Payer & Bank</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 text-center">Date</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 text-center">Status</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 pr-4 text-right">Amount / Balance</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($cheques as $cheque)
                    <tr class="group hover:bg-slate-50 transition-all duration-300">
                        <td class="py-7 pl-4">
                            <a href="{{ route('cheques.show', $cheque) }}" class="text-sm font-black text-[#10b981] hover:underline decoration-2 transition-all">
                                {{ $cheque->cheque_number }}
                            </a>
                            <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-tighter">{{ $cheque->reason->name }}</p>
                        </td>
                        <td class="py-7">
                            <p class="text-sm font-bold text-slate-800">{{ $cheque->payer_name }}</p>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-[11px] font-semibold text-slate-400 italic">{{ $cheque->bank->name }}</span>
                            </div>
                        </td>
                        <td class="py-7 text-center">
                            <p class="text-[13px] font-bold text-slate-500">{{ \Carbon\Carbon::parse($cheque->cheque_date)->format('M d, Y') }}</p>
                        </td>
                        <td class="py-7 text-center">
                            @if($cheque->status === 'paid')
                                <span class="inline-flex items-center rounded-xl bg-emerald-50 px-3.5 py-1.5 text-[10px] font-black uppercase tracking-widest text-[#10b981] ring-1 ring-inset ring-[#10b981]/20">Fully Paid</span>
                            @elseif($cheque->status === 'partial_paid')
                                <span class="inline-flex items-center rounded-xl bg-amber-50 px-3.5 py-1.5 text-[10px] font-black uppercase tracking-widest text-amber-500 ring-1 ring-inset ring-amber-500/20">Partial Paid</span>
                            @else
                                <span class="inline-flex items-center rounded-xl bg-slate-50 px-3.5 py-1.5 text-[10px] font-black uppercase tracking-widest text-slate-400 ring-1 ring-inset ring-slate-400/20">Pending</span>
                            @endif
                        </td>
                        <td class="py-7 pr-4 text-right">
                            <p class="text-sm font-black text-slate-900 italic">Rs. {{ number_format($cheque->amount, 2) }}</p>
                            @if($cheque->balance_amount > 0 && $cheque->status !== 'pending')
                                <p class="text-[10px] font-bold text-rose-500 mt-1 uppercase">Bal: Rs. {{ number_format($cheque->balance_amount, 2) }}</p>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="h-20 w-20 rounded-full bg-slate-50 flex items-center justify-center text-slate-300 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                                </div>
                                <p class="text-slate-400 font-bold">No financial records matching your criteria.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-10">
            {{ $cheques->links() }}
        </div>
    </div>
</x-app-layout>
