<x-app-layout>
    <x-slot name="header">
        Users Management
    </x-slot>

    <div class="rounded-[2.5rem] bg-white p-10 shadow-sm border border-slate-100 overflow-hidden">
        <div class="flex items-center justify-between mb-8">
            <h3 class="text-2xl font-black text-slate-900 tracking-tight">System Users</h3>
            <button onclick="toast('Adding new user...', 'info')" class="flex items-center gap-2 rounded-2xl bg-[#0a0a0a] px-6 py-3 text-sm font-bold text-white hover:bg-slate-900 transition-all active:scale-95 shadow-xl shadow-slate-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                Add New User
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-slate-100">
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 pl-4">User Details</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Role</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Recent Login</th>
                        <th class="pb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400 pr-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <tr class="group hover:bg-slate-50 transition-all duration-200">
                        <td class="py-6 pl-4">
                            <div class="flex items-center gap-4">
                                <div class="h-12 w-12 rounded-2xl bg-indigo-50 text-indigo-500 font-bold flex items-center justify-center border-2 border-white shadow-sm ring-1 ring-indigo-100">JD</div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">John Doe</p>
                                    <p class="text-xs font-medium text-slate-400 lowercase">john.doe@selfholidays.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-6">
                            <span class="inline-flex items-center rounded-lg bg-emerald-50 px-3 py-1 text-[10px] font-black uppercase tracking-widest text-[#10b981] ring-1 ring-inset ring-[#10b981]/10">Administrator</span>
                        </td>
                        <td class="py-6 font-semibold text-slate-500 text-sm">2 hours ago</td>
                        <td class="py-6 pr-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 text-slate-400 hover:text-[#10b981] transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg></button>
                                <button onclick="confirmDelete()" class="p-2 text-slate-400 hover:text-red-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Are you sure?',
                text: "This user will be permanently removed.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    toast('User deleted successfully', 'success');
                }
            })
        }
    </script>
</x-app-layout>
