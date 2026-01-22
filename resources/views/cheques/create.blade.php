<x-app-layout>
    <x-slot name="header">
        Issue New Cheque
    </x-slot>

    <div class="max-w-4xl mx-auto" x-data="chequeForm()">
        <div class="rounded-[2.5rem] bg-white p-10 lg:p-16 shadow-sm border border-slate-100">
            <div class="mb-10 text-center">
                <h3 class="text-3xl font-black text-slate-900 tracking-tight">Financial Instrument</h3>
                <p class="mt-2 text-slate-400 font-medium">Issue a physical cheque record to the system</p>
            </div>

            <form action="{{ route('cheques.store') }}" method="POST" class="space-y-8">
                @csrf
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <!-- Cheque Number -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Cheque Number</label>
                        <input type="text" name="cheque_number" required placeholder="CHQ-0000-000" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 placeholder:text-slate-300 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('cheque_number')" class="mt-2" />
                    </div>

                    <!-- Date -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Cheque Date</label>
                        <input type="date" name="cheque_date" required class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('cheque_date')" class="mt-2" />
                    </div>

                    <!-- Bank -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Issuing Bank</label>
                        <select name="bank_id" required class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                            <option value="">Select Bank</option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('bank_id')" class="mt-2" />
                    </div>

                    <!-- Amount -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Amount (LKR)</label>
                        <div class="relative">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 font-black">LKR</span>
                            <input type="number" step="0.01" name="amount" required placeholder="0.00" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 pl-20 pr-6 text-xl font-bold text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:leading-6 transition-all duration-200">
                        </div>
                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                    </div>

                    <!-- Payer Name -->
                    <div class="md:col-span-1 space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Payer Name</label>
                        <input type="text" name="payer_name" required placeholder="Enter payer name" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('payer_name')" class="mt-2" />
                    </div>

                    <!-- Reason -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Reason / Purpose</label>
                        <div class="flex gap-2">
                            <select name="reason_id" id="reason_id" required class="flex-1 rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                                <option value="">Select Reason</option>
                                @foreach($reasons as $reason)
                                    <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" @click="showReasonModal = true" class="flex h-[56px] w-[56px] items-center justify-center rounded-2xl bg-slate-100 text-slate-600 hover:bg-slate-200 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('reason_id')" class="mt-2" />
                    </div>
                </div>

                <div class="pt-6 flex gap-4">
                    <button type="submit" class="flex-1 rounded-2xl bg-[#10b981] py-4 text-sm font-black text-white shadow-xl shadow-emerald-200/50 hover:bg-emerald-600 active:scale-95 transition-all">Generate Record</button>
                    <a href="{{ route('cheques.index') }}" class="flex items-center justify-center rounded-2xl bg-slate-100 px-8 py-4 text-sm font-bold text-slate-600 hover:bg-slate-200 transition-all">Cancel</a>
                </div>
            </form>
        </div>

        <!-- Reason Modal -->
        <div x-show="showReasonModal" 
             class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @keydown.escape.window="showReasonModal = false"
             style="display: none;">
            
            <div class="bg-white rounded-[2rem] shadow-2xl w-full max-w-md overflow-hidden" @click.away="showReasonModal = false">
                <div class="p-8">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">Add New Reason</h3>
                    <p class="mt-1 text-slate-400 text-sm font-medium">Define a new purpose for payments</p>
                    
                    <div class="mt-8 space-y-6">
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Reason Name</label>
                            <input type="text" x-model="newReasonName" placeholder="e.g. Monthly Rent" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-inset focus:ring-[#10b981] transition-all">
                        </div>
                        
                        <div class="flex gap-3">
                            <button @click="saveReason()" class="flex-1 rounded-xl bg-[#10b981] py-3 text-xs font-black text-white shadow-lg shadow-emerald-100 hover:bg-emerald-600 transition-all">Create Reason</button>
                            <button @click="showReasonModal = false" class="rounded-xl bg-slate-100 px-6 py-3 text-xs font-bold text-slate-500 hover:bg-slate-200 transition-all">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function chequeForm() {
            return {
                showReasonModal: false,
                newReasonName: '',
                async saveReason() {
                    if (!this.newReasonName) return;
                    
                    try {
                        const response = await fetch("{{ route('reasons.store') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ name: this.newReasonName })
                        });
                        
                        const result = await response.json();
                        
                        if (result.success) {
                            const select = document.getElementById('reason_id');
                            const option = new Option(result.data.name, result.data.id, true, true);
                            select.add(option);
                            
                            this.showReasonModal = false;
                            this.newReasonName = '';
                            toast('Reason added successfully', 'success');
                        } else {
                            toast(result.message || 'Error occurred', 'error');
                        }
                    } catch (error) {
                        toast('Failed to save reason', 'error');
                    }
                }
            }
        }
    </script>
</x-app-layout>
