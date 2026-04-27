<x-layouts.app>
    <div class="p-6">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Halo, Admin Aya! 👋</h2>
            <p class="text-gray-500">Selamat datang kembali di Dashboard Sistem Poliklinik.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- CARD TOTAL OBAT --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="p-4 bg-blue-100 text-blue-600 rounded-xl">
                    <i class="fas fa-pills fa-2x"></i>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total Obat</h3>
                    <p class="text-2xl font-bold text-gray-800">Cek Data</p>
                    <a href="{{ route('obat.index') }}" class="text-blue-600 text-xs hover:underline">Lihat Detail →</a>
                </div>
            </div>

            {{-- CARD TOTAL POLI --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="p-4 bg-indigo-100 text-indigo-600 rounded-xl">
                    <i class="fas fa-hospital fa-2x"></i>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total Poli</h3>
                    <p class="text-2xl font-bold text-gray-800">Cek Data</p>
                    <a href="{{ route('polis.index') }}" class="text-indigo-600 text-xs hover:underline">Lihat Detail →</a>
                </div>
            </div>

            {{-- CARD TOTAL DOKTER --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="p-4 bg-purple-100 text-purple-600 rounded-xl">
                    <i class="fas fa-user-md fa-2x"></i>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total Dokter</h3>
                    <p class="text-2xl font-bold text-gray-800">Cek Data</p>
                    <a href="{{ route('dokter.index') }}" class="text-purple-600 text-xs hover:underline">Lihat Detail →</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>