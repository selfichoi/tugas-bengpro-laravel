<div class="flex flex-col h-full">
    {{-- LOGO - Direvisi jadi lebih estetik & formal --}}
    <div class="p-6 mb-2">
    <div class="flex items-center gap-3">
        {{-- Ikon dibuat lebih subtle --}}
        <div class="bg-white/10 p-2 rounded-lg backdrop-blur-md border border-white/5">
            <i class="fas fa-hospital-user text-white text-xl opacity-90"></i>
        </div>
        {{-- Font diganti ke Sans-Serif Bold biar mirip Siloam --}}
        <span class="text-2xl font-bold text-white tracking-tight" style="font-family: 'Plus Jakarta Sans', sans-serif;">
            Poliklinik
        </span>
    </div>
</div>

    {{-- MENU ITEMS --}}
    <div class="flex-1 px-4 py-2 space-y-1 overflow-y-auto">
        <small class="text-white/40 uppercase text-[10px] font-bold tracking-widest px-4 mb-2 block">Main Menu</small>
        
        <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 text-white/80 hover:bg-white/10 hover:text-white rounded-xl transition-all group">
            <i class="fas fa-th-large w-5 text-center group-hover:scale-110 transition-transform"></i>
            <span class="text-sm font-medium">Dashboard</span>
        </a>

        <a href="{{ route('polis.index') }}" 
        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('polis.*') ? 'bg-white/10 text-white' : 'text-white/70' }} rounded-xl transition-all hover:bg-white/10 hover:text-white group">
            <i class="fas fa-hospital text-sm group-hover:scale-110 transition-transform"></i>
            <span class="font-medium text-sm">Manajemen Poli</span>
        </a>

        <a href="/obat" class="flex items-center gap-3 px-4 py-3 text-white/80 hover:bg-white/10 hover:text-white rounded-xl transition-all group">
            <i class="fas fa-pills w-5 text-center group-hover:scale-110 transition-transform"></i>
            <span class="text-sm font-medium">Data Obat</span>
        </a>
    </div>

    {{-- FOOTER SIDEBAR --}}
    <div class="p-4 border-t border-white/10">
        <div class="bg-white/5 rounded-xl p-4 text-center">
            <p class="text-[10px] text-white/40">Versi 1.0.0</p>
        </div>
    </div>
</div>
<div class="mt-auto border-t border-white/5 mx-6">
    <a href="{{ route('logout') }}" 
       class="flex items-center gap-3 py-4 text-white/50 hover:text-red-400 transition-colors cursor-pointer">
        <i class="fas fa-power-off text-xs w-5 text-center"></i>
        <span class="text-sm font-medium tracking-wide">Logout</span>
    </a>
</div>