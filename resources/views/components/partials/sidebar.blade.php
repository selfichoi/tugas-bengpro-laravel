<div class="flex flex-col h-full">
    {{-- LOGO --}}
    <div class="p-6 mb-2">
        <div class="flex items-center gap-3">
            <div class="bg-white/10 p-2 rounded-lg backdrop-blur-md border border-white/5">
                <i class="fas fa-hospital-user text-white text-xl opacity-90"></i>
            </div>
            <span class="text-2xl font-bold text-white tracking-tight" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                Poliklinik
            </span>
        </div>
    </div>

    {{-- MENU ITEMS --}}
    <div class="flex-1 px-4 py-2 space-y-1 overflow-y-auto">
        <small class="text-white/40 uppercase text-[10px] font-bold tracking-widest px-4 mb-2 block">Main Menu</small>
        
        <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin/dashboard') ? 'bg-white/10 text-white' : 'text-white/80' }} hover:bg-white/10 hover:text-white rounded-xl transition-all group">
            <i class="fas fa-th-large w-5 text-center group-hover:scale-110 transition-transform"></i>
            <span class="text-sm font-medium">Dashboard</span>
        </a>

        <a href="{{ route('polis.index') }}" 
           class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('polis.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10 hover:text-white group">
            <i class="fas fa-hospital w-5 text-center group-hover:scale-110 transition-transform text-sm"></i>
            <span class="font-medium text-sm">Manajemen Poli</span>
        </a>

        <a href="{{ route('dokter.index') }}" 
           class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('dokter.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10 hover:text-white group">
            <i class="fas fa-user-md w-5 text-center group-hover:scale-110 transition-transform text-sm"></i>
            <span class="font-medium text-sm">Manajemen Dokter</span>
        </a>

        <a href="{{ route('pasien.index') }}" 
           class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('pasien.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10 hover:text-white group">
            <i class="fas fa-bed-pulse w-5 text-center group-hover:scale-110 transition-transform text-sm"></i>
            <span class="font-medium text-sm">Manajemen Pasien</span>
        </a>

        {{-- REVISI MODUL 9: MANAJEMEN OBAT --}}
        <a href="{{ route('obat.index') }}" 
           class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('obat.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10 hover:text-white group">
            <i class="fas fa-pills w-5 text-center group-hover:scale-110 transition-transform text-sm"></i>
            <span class="font-medium text-sm">Manajemen Obat</span>
        </a>
    </div>

    {{-- FOOTER SIDEBAR --}}
    <div class="mt-auto border-t border-white/10 p-4">
        <div class="bg-white/5 rounded-xl p-4 text-center mb-2">
            <p class="text-[10px] text-white/40">Versi 1.0.0</p>
        </div>
        <a href="{{ route('logout') }}" 
           class="flex items-center gap-3 py-3 px-4 text-white/50 hover:text-red-400 transition-colors cursor-pointer group">
            <i class="fas fa-power-off text-xs w-5 text-center group-hover:scale-110 transition-transform"></i>
            <span class="text-sm font-medium tracking-wide">Logout</span>
        </a>
    </div>
</div>