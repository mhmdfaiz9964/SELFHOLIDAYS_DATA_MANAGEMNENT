<x-app-layout>
    <x-slot name="header">
        Cheque Details: {{ $cheque->cheque_number }}
    </x-slot>

    <div class="space-y-10" x-data="paymentModule()">
        <!-- Summary Dashboard -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Cheque Info -->
            <div class="rounded-[2.5rem] bg-white p-10 shadow-sm border border-slate-100 lg:col-span-2">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="inline-flex items-center rounded-xl bg-slate-50 px-4 py-2 text-[11px] font-black uppercase tracking-widest text-slate-400 ring-1 ring-inset ring-slate-100">
                             {{ $cheque->bank->name }} ({{ $cheque->bank->code }})
                        </div>
                        <h3 class="mt-4 text-4xl font-black text-slate-900 tracking-tight">{{ $cheque->cheque_number }}</h3>
                        <p class="mt-2 text-lg font-bold text-slate-400">{{ $cheque->payer_name }}</p>
                    </div>
                    
                    @if($cheque->bank->logo)
                        <img src="{{ asset('storage/'.$cheque->bank->logo) }}" class="h-20 w-20 rounded-3xl object-contain bg-slate-50 p-3 border border-slate-100">
                    @else
                        <div class="h-20 w-20 rounded-3xl bg-[#10b981]/5 text-[#10b981] flex items-center justify-center font-black text-3xl border-2 border-[#10b981]/10 uppercase">
                            {{ substr($cheque->bank->name, 0, 1) }}
                        </div>
                    @endif
                </div>

                <div class="mt-12 grid grid-cols-2 gap-8 md:grid-cols-4">
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Issue Date</p>
                        <p class="mt-1 text-sm font-bold text-slate-800">{{ \Carbon\Carbon::parse($cheque->cheque_date)->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Purpose</p>
                        <p class="mt-1 text-sm font-bold text-slate-800">{{ $cheque->reason->name }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Status</p>
                        <div class="mt-1">
                            @if($cheque->status === 'paid')
                                <span class="text-xs font-black uppercase tracking-widest text-[#10b981]">Fully Cleared</span>
                            @elseif($cheque->status === 'partial_paid')
                                <span class="text-xs font-black uppercase tracking-widest text-amber-500">Partially Resolved</span>
                            @else
                                <span class="text-xs font-black uppercase tracking-widest text-slate-400">Pending</span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Created At</p>
                        <p class="mt-1 text-sm font-bold text-slate-800">{{ $cheque->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Financial Breakdown -->
            <div class="rounded-[2.5rem] bg-[#0a0a0a] p-10 shadow-2xl shadow-slate-300 text-white relative overflow-hidden">
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <p class="text-[11px] font-black uppercase tracking-widest text-slate-500">Financial Breakdown</p>
                        <div class="mt-8 space-y-6">
                            <div class="flex justify-between items-end border-b border-white/10 pb-4">
                                <span class="text-sm font-bold text-slate-400">Total Obligation</span>
                                <span class="text-xl font-black italic">Rs. {{ number_format($cheque->amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-end border-b border-white/10 pb-4">
                                <span class="text-sm font-bold text-slate-400">Paid Amount</span>
                                <span class="text-xl font-black italic text-[#10b981]">Rs. {{ number_format($cheque->paid_amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center pt-2">
                                <span class="text-sm font-black text-slate-200 uppercase tracking-widest">Balance</span>
                                <span class="text-3xl font-black text-rose-500 underline decoration-4 decoration-rose-500/20 underline-offset-8 italic">
                                    Rs. {{ number_format($cheque->balance_amount, 2) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    @if($cheque->balance_amount > 0)
                        <button @click="openPaymentModal()" class="mt-10 group flex w-full items-center justify-center gap-3 rounded-2xl bg-white/5 py-5 text-sm font-black text-white ring-1 ring-white/20 hover:bg-[#10b981] hover:ring-0 transition-all active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:rotate-90 transition-transform"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                            Register Payment
                        </button>
                    @else
                        <div class="mt-10 flex items-center justify-center gap-3 rounded-2xl bg-[#10b981]/10 py-5 text-[#10b981] ring-1 ring-[#10b981]/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span class="text-sm font-black uppercase tracking-widest">Fully Satisfied</span>
                        </div>
                    @endif
                </div>

                <!-- Abstract Shapes -->
                <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-emerald-500/10 blur-3xl"></div>
                <div class="absolute -left-16 -bottom-16 h-48 w-48 rounded-full bg-rose-500/5 blur-3xl"></div>
            </div>
        </div>

        <!-- Payments Log -->
        <div class="rounded-[2.5rem] bg-white p-10 shadow-sm border border-slate-100 overflow-hidden">
            <div class="flex items-center justify-between mb-10">
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">Payment Ledger</h3>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-50 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                </div>
            </div>

            <div class="overflow-x-auto -mx-10 px-10">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 pl-4">Internal Ref</th>
                            <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Paid On</th>
                            <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Notes / Remarks</th>
                            <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 pr-4 text-right">Amount Paid</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-[13px] font-semibold text-slate-600">
                        @forelse($cheque->payments as $payment)
                        <tr class="group hover:bg-slate-50 transition-all duration-300">
                            <td class="py-6 pl-4 font-black text-slate-400 italic">TXN-{{ 1000 + $payment->id }}</td>
                            <td class="py-6">{{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') }}</td>
                            <td class="py-6 max-w-xs truncate">{{ $payment->note ?? 'Standard installment' }}</td>
                            <td class="py-6 pr-4 text-right">
                                <p class="font-black text-slate-900 italic">Rs. {{ number_format($payment->amount, 2) }}</p>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-20 text-center font-bold text-slate-400 italic">No payments recorded against this instrument.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Payment Modal -->
        <div x-show="showPaymentModal" 
             class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @keydown.escape.window="showPaymentModal = false"
             style="display: none;">
            
            <div class="bg-white rounded-[3rem] shadow-2xl w-full max-w-xl overflow-hidden" @click.away="showPaymentModal = false">
                <form action="{{ route('cheque_payments.store', $cheque) }}" method="POST" class="p-12 lg:p-16">
                    @csrf
                    <div class="text-center mb-10">
                        <div class="mx-auto h-16 w-16 mb-4 flex items-center justify-center rounded-3xl bg-[#10b981]/10 text-[#10b981]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17"/><path d="m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.8-2.8L13 15"/><circle cx="12" cy="12" r="10"/></svg>
                        </div>
                        <h3 class="text-3xl font-black text-slate-900 tracking-tight">Record Payment</h3>
                        <p class="mt-2 text-slate-400 font-medium">Entering transaction into the digital ledger</p>
                    </div>

                    <div class="space-y-8">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Payment Date</label>
                                <input type="date" name="payment_date" required value="{{ date('Y-m-d') }}" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-sm ring-1 ring-inset ring-slate-200">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Paid Amount (LKR)</label>
                                <input type="number" step="0.01" name="amount" required max="{{ $cheque->balance_amount }}" placeholder="0.00" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-sm font-black ring-1 ring-inset ring-slate-200 focus:ring-[#10b981]">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Transaction Notes</label>
                            <textarea name="note" rows="3" placeholder="Additional details..." class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-sm ring-1 ring-inset ring-slate-200 focus:ring-[#10b981]"></textarea>
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="flex-1 rounded-2xl bg-[#0a0a0a] py-4 text-xs font-black text-white shadow-xl hover:bg-slate-900 active:scale-95 transition-all uppercase tracking-widest">Execute Payment</button>
                            <button type="button" @click="showPaymentModal = false" class="rounded-2xl bg-slate-100 px-8 py-4 text-xs font-bold text-slate-500 hover:bg-slate-200 transition-all uppercase tracking-widest">Abort</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function paymentModule() {
            return {
                showPaymentModal: false,
                openPaymentModal() {
                    this.showPaymentModal = true;
                }
            }
        }
    </script>
</x-app-layout>
