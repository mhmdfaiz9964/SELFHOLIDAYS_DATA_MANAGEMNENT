<x-app-layout>
    <x-slot name="header">
        Add New Bank
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="rounded-[2.5rem] bg-white p-10 lg:p-16 shadow-sm border border-slate-100">
            <div class="mb-10 text-center">
                <h3 class="text-3xl font-black text-slate-900 tracking-tight">Register Bank</h3>
                <p class="mt-2 text-slate-400 font-medium">Add bank details to the system repository</p>
            </div>

            <form action="{{ route('banks.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <!-- Bank Name -->
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Bank Name</label>
                        <input type="text" name="name" required placeholder="e.g. Commercial Bank" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 placeholder:text-slate-300 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Bank Code -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Bank Code (Optional)</label>
                        <input type="text" name="code" placeholder="e.g. COMB" class="block w-full rounded-2xl border-0 bg-slate-50 py-4 px-6 text-slate-900 ring-1 ring-inset ring-slate-200 focus:ring-2 focus:ring-inset focus:ring-[#10b981] sm:text-sm sm:leading-6 transition-all duration-200">
                        <x-input-error :messages="$errors->get('code')" class="mt-2" />
                    </div>

                    <!-- Logo -->
                    <div class="space-y-4" x-data="{ imageUrl: null }">
                        <label class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Bank Logo (Optional)</label>
                        <div class="flex items-center gap-6">
                            <div class="h-[150px] w-[150px] overflow-hidden rounded-[2rem] border-2 border-dashed border-slate-200 bg-slate-50 flex items-center justify-center relative">
                                <template x-if="imageUrl">
                                    <img :src="imageUrl" class="h-full w-full object-contain p-4">
                                </template>
                                <template x-if="!imageUrl">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-300"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                </template>
                            </div>
                            <div class="flex-1">
                                <input type="file" name="logo" @change="imageUrl = URL.createObjectURL($event.target.files[0])" class="block w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-black file:uppercase file:tracking-widest file:bg-slate-100 file:text-slate-600 hover:file:bg-slate-200 transition-all">
                                <p class="mt-2 text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Recommended: Square PNG with transparent background</p>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>
                </div>

                <div class="pt-6 flex gap-4">
                    <button type="submit" class="flex-1 rounded-2xl bg-[#0a0a0a] py-4 text-sm font-black text-white shadow-xl shadow-slate-200/50 hover:bg-slate-900 active:scale-95 transition-all">Save Bank</button>
                    <a href="{{ route('banks.index') }}" class="flex items-center justify-center rounded-2xl bg-slate-100 px-8 py-4 text-sm font-bold text-slate-600 hover:bg-slate-200 transition-all">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
