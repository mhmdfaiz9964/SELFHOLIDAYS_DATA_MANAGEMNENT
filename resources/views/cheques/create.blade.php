<x-app-layout>
    <x-slot name="header">
        Create New Cheque
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="rounded-[2.5rem] bg-white p-10 lg:p-16 shadow-sm border border-slate-100">
            <div class="mb-10 text-center">
                <h3 class="text-3xl font-black text-slate-900 tracking-tight">Issue Digital Cheque</h3>
                <p class="mt-2 text-slate-400 font-medium">Please provide accurate financial details below</p>
            </div>

            <form action="#" method="POST" class="space-y-8" @submit.prevent="toast('Cheque issued successfully!', 'success'); setTimeout(() => window.location.href = '{{ route('cheques.index') }}', 1000)">
                @csrf
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <!-- Cheque Number -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Cheque Number</label>
                        <input type="text" placeholder="CHQ-0000-000" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 placeholder:text-slate-300 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                    </div>

                    <!-- Date -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Issue Date</label>
                        <input type="date" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                    </div>

                    <!-- Payee -->
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Payee Name</label>
                        <input type="text" placeholder="Enter recipient name" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                    </div>

                    <!-- Amount -->
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Amount (LKR)</label>
                        <div class="relative">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 font-black">LKR</span>
                            <input type="number" placeholder="0.00" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 pl-20 pr-6 text-2xl font-black text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:leading-6 transition-all duration-200">
                        </div>
                    </div>
                </div>

                <div class="pt-6 flex gap-4">
                    <button type="submit" class="flex-1 rounded-2xl bg-[#10b981] py-4 text-sm font-black text-white shadow-xl shadow-emerald-200/50 hover:bg-emerald-600 active:scale-95 transition-all">Generate Cheque</button>
                    <a href="{{ route('cheques.index') }}" class="flex items-center justify-center rounded-2xl bg-slate-100 px-8 py-4 text-sm font-bold text-slate-600 hover:bg-slate-200 transition-all">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
