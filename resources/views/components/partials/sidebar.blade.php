<div class="flex flex-col h-full bg-blue-900 min-h-screen">
    {{-- LOGO --}}
    <div class="p-6 mb-2">
        <div class="flex items-center gap-3">
            <span class="text-2xl font-bold text-white tracking-tight">Poliklinik</span>
        </div>
    </div>

    {{-- MENU ITEMS --}}
    <div class="flex-1 px-4 py-2 space-y-1 overflow-y-auto">
        
        {{-- MENU KHUSUS ADMIN (MODUL 7, 8, 9) --}}
        @if(Auth::user()->role == 'admin')
            <small class="text-white/40 uppercase text-[10px] font-bold tracking-widest px-4 mb-2 block">Admin Menu</small>
            
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin/dashboard') ? 'bg-white/10 text-white' : 'text-white/80' }} hover:bg-white/10 rounded-xl transition-all">
                <i class="fas fa-th-large w-5 text-center"></i>
                <span class="text-sm font-medium">Dashboard Admin</span>
            </a>

            <a href="{{ route('dokter.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('dokter.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10">
                <i class="fas fa-user-md w-5 text-center"></i>
                <span class="font-medium text-sm">Manajemen Dokter</span>
            </a>

            <a href="{{ route('pasien.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('pasien.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10">
                <i class="fas fa-bed-pulse w-5 text-center"></i>
                <span class="font-medium text-sm">Manajemen Pasien</span>
            </a>

            <a href="{{ route('obat.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('obat.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10">
                <i class="fas fa-pills w-5 text-center"></i>
                <span class="font-medium text-sm">Manajemen Obat</span>
            </a>
        @endif

        {{-- MENU KHUSUS DOKTER (MODUL 12, 13, 14) --}}
        @if(Auth::user()->role == 'dokter')
            <small class="text-white/40 uppercase text-[10px] font-bold tracking-widest px-4 mb-2 block">Dokter Menu</small>
            
            <a href="{{ route('dokter.dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->is('dokter/dashboard') ? 'bg-white/10 text-white' : 'text-white/80' }} rounded-xl transition-all hover:bg-white/10">
                <i class="fas fa-th-large w-5 text-center"></i>
                <span class="text-sm font-medium">Dashboard Dokter</span>
            </a>

            <a href="{{ route('jadwal-periksa.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('jadwal-periksa.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10">
                <i class="fas fa-calendar-alt w-5 text-center"></i>
                <span class="font-medium text-sm">Jadwal Periksa</span>
            </a>

            <a href="{{ route('periksa-pasien.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('periksa-pasien.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10">
                <i class="fas fa-stethoscope w-5 text-center"></i>
                <span class="font-medium text-sm">Periksa Pasien</span>
            </a>

            <a href="{{ route('riwayat-pasien.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('riwayat-pasien.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10">
                <i class="fas fa-history w-5 text-center"></i>
                <span class="font-medium text-sm">Riwayat Pasien</span>
            </a>
        @endif

        {{-- MENU KHUSUS PASIEN (MODUL 10 & 11) --}}
        @if(Auth::user()->role == 'pasien')
            <small class="text-white/40 uppercase text-[10px] font-bold tracking-widest px-4 mb-2 block">Pasien Menu</small>
            
            <a href="{{ route('pasien.dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->is('pasien/dashboard') ? 'bg-white/10 text-white' : 'text-white/80' }} rounded-xl transition-all hover:bg-white/10">
                <i class="fas fa-th-large w-5 text-center"></i>
                <span class="text-sm font-medium">Dashboard Pasien</span>
            </a>

            <a href="{{ route('pasien.daftar') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('pasien.daftar') ? 'bg-white/10 text-white' : 'text-white/80' }} rounded-xl transition-all hover:bg-white/10">
                <i class="fas fa-notes-medical w-5 text-center"></i>
                <span class="text-sm font-medium">Daftar Poli</span>
            </a>
        @endif

    </div>

    {{-- LOGOUT --}}
    <div class="mt-auto border-t border-white/10 p-4">
        <a href="{{ route('logout') }}" class="flex items-center gap-3 py-3 px-4 text-white/50 hover:text-red-400 transition-colors group">
            <i class="fas fa-power-off text-xs w-5 text-center group-hover:scale-110 transition-transform"></i>
            <span class="text-sm font-medium tracking-wide">Logout</span>
        </a>
    </div>
</div>