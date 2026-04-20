<x-layouts.app>
    <div class="p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Tambah Poli</h2>
            <p class="text-gray-500 text-sm">Input data unit layanan poliklinik baru</p>
        </div>

        <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('polis.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-bold text-gray-700">Nama Poli</label>
                    <input type="text" name="nama_poli" placeholder="Contoh: Poli Umum / Poli Gigi" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-bold text-gray-700">Keterangan</label>
                    <textarea name="keterangan" rows="3" placeholder="Jelaskan singkat tentang poli ini..." 
                              class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>
                </div>

                <div class="flex items-center gap-4 pt-4">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg transition-all">
                        Simpan Poli
                    </button>
                    <a href="{{ route('polis.index') }}" class="text-gray-500 hover:text-gray-700 font-medium">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>