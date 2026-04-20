<header class="bg-white border-b border-base-300 px-6 py-3 sticky top-0 z-30 flex items-center justify-between shadow-sm">
    <div class="flex items-center gap-4">
        <button onclick="toggleSidebar()" class="btn btn-ghost btn-sm lg:hidden">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <h2 class="text-lg font-semibold text-base-content hidden md:block">Dashboard Poliklinik</h2>
    </div>

    <div class="flex items-center gap-3">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar border border-base-300">
                <div class="w-10 rounded-full">
                    <img src="https://ui-avatars.com/api/?name=Aya&background=0D8ABC&color=fff" />
                </div>
            </label>
            <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52 border border-base-200">
                <li class="px-4 py-2 border-b border-base-100 mb-1">
                    <span class="font-bold text-gray-700">Halo, {{ Auth::user()->nama }}</span>
                </li>
                <li><a class="py-3 hover:bg-blue-50"><i class="fas fa-user mr-2"></i> Profile</a></li>
                {{-- Tombol KELUAR dihapus dari sini karena sudah ada di Sidebar --}}
            </ul>
        </div>
    </div>
</header>