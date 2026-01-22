<x-app-layout>
    <x-slot name="header">
        Cheques Management
    </x-slot>

    <div class="rounded-[2.5rem] bg-white p-10 shadow-sm border border-slate-100 overflow-hidden">
        <div class="flex items-center justify-between mb-8">
            <h3 class="text-2xl font-black text-slate-900 tracking-tight">System Cheques</h3>
            <a href="{{ route('cheques.create') }}" class="flex items-center gap-2 rounded-2xl bg-[#0a0a0a] px-6 py-3 text-sm font-bold text-white hover:bg-slate-900 transition-all active:scale-95 shadow-xl shadow-slate-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                Issue New Cheque
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-slate-100">
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 pl-4">Cheque Number</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Payee</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Date</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Status</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 pr-4 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <tr class="group hover:bg-slate-50 transition-all duration-200">
                        <td class="py-6 pl-4 font-black text-slate-900">CHQ-1001-923</td>
                        <td class="py-6 font-semibold text-slate-800 italic underline decoration-[#10b981]/30">Apex Web Innovation</td>
                        <td class="py-6 font-semibold text-slate-500 text-sm">Oct 24, 2024</td>
                        <td class="py-6">
                            <span class="inline-flex items-center rounded-lg bg-emerald-50 px-3 py-1 text-[10px] font-black uppercase tracking-widest text-[#10b981] ring-1 ring-inset ring-[#10b981]/10">Cleared</span>
                        </td>
                        <td class="py-6 pr-4 text-right">
                            <p class="text-sm font-black text-slate-900">LKR 450,000.00</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
