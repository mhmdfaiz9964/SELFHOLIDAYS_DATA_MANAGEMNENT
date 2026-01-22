<x-app-layout>
    <x-slot name="header">
        Edit Cheque: {{ $cheque->cheque_number }}
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="rounded-[2.5rem] bg-white p-10 lg:p-16 shadow-sm border border-slate-100">
            <div class="mb-10 text-center">
                <h3 class="text-3xl font-black text-slate-900 tracking-tight">Modify Record</h3>
                <p class="mt-2 text-slate-400 font-medium">Update existing cheque details in the system</p>
            </div>

            <form action="{{ route('cheques.update', $cheque) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <!-- Cheque Number -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Cheque Number</label>
                        <input type="text" name="cheque_number" value="{{ $cheque->cheque_number }}" required class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('cheque_number')" class="mt-2" />
                    </div>

                    <!-- Date -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Cheque Date</label>
                        <input type="date" name="cheque_date" value="{{ $cheque->cheque_date }}" required class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('cheque_date')" class="mt-2" />
                    </div>

                    <!-- Bank -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Issuing Bank</label>
                        <select name="bank_id" required class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                            @foreach($banks as $bank)
                                <option value="{{ $bank->id }}" {{ $cheque->bank_id == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('bank_id')" class="mt-2" />
                    </div>

                    <!-- Amount -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Amount (LKR)</label>
                        <input type="number" step="0.01" name="amount" value="{{ $cheque->amount }}" required class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-xl font-bold text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Payment Status</label>
                        <select name="status" required class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                            <option value="pending" {{ $cheque->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="partial_paid" {{ $cheque->status == 'partial_paid' ? 'selected' : '' }}>Partial Paid</option>
                            <option value="paid" {{ $cheque->status == 'paid' ? 'selected' : '' }}>Fully Paid</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <!-- Payer Name -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Payer Name</label>
                        <input type="text" name="payer_name" value="{{ $cheque->payer_name }}" required placeholder="Enter payer name" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('payer_name')" class="mt-2" />
                    </div>
                </div>

                <div class="pt-6 flex gap-4">
                    <button type="submit" class="flex-1 rounded-2xl bg-[#0a0a0a] py-4 text-sm font-black text-white shadow-xl shadow-slate-200/50 hover:bg-slate-900 active:scale-95 transition-all">Update Record</button>
                    <a href="{{ route('cheques.index') }}" class="flex items-center justify-center rounded-2xl bg-slate-100 px-8 py-4 text-sm font-bold text-slate-600 hover:bg-slate-200 transition-all">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
