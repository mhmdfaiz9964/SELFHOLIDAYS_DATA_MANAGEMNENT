<x-app-layout>
    <x-slot name="header">
        Edit Bank: {{ $bank->name }}
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="rounded-[2.5rem] bg-white p-10 lg:p-16 shadow-sm border border-slate-100">
            <div class="mb-10 text-center">
                <h3 class="text-3xl font-black text-slate-900 tracking-tight">Update Bank</h3>
                <p class="mt-2 text-slate-400 font-medium">Modify bank credentials in the database</p>
            </div>

            <form action="{{ route('banks.update', $bank) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Bank Name</label>
                        <input type="text" name="name" value="{{ $bank->name }}" required class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Bank Code</label>
                        <input type="text" name="code" value="{{ $bank->code }}" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('code')" class="mt-2" />
                    </div>

                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Bank Logo</label>
                        <input type="file" name="logo" class="block w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-black file:uppercase file:tracking-widest file:bg-slate-100 file:text-slate-600 hover:file:bg-slate-200 transition-all">
                        @if($bank->logo)
                            <p class="mt-2 text-[10px] font-bold text-slate-400">Current Logo attached</p>
                        @endif
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>
                </div>

                <div class="pt-6 flex gap-4">
                    <button type="submit" class="flex-1 rounded-2xl bg-[#0a0a0a] py-4 text-sm font-black text-white shadow-xl shadow-slate-200/50 hover:bg-slate-900 active:scale-95 transition-all">Update Bank</button>
                    <a href="{{ route('banks.index') }}" class="flex items-center justify-center rounded-2xl bg-slate-100 px-8 py-4 text-sm font-bold text-slate-600 hover:bg-slate-200 transition-all">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
