<x-layouts.app>
    <div class="p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Tambah Poli Baru</h2>
            <p class="text-gray-500 text-sm">Silakan masukkan data unit layanan poliklinik</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-2xl">
            <form action="{{ route('polis.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Poli</label>
                    <input type="text" name="nama_poli" required 
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all" 
                           placeholder="Contoh: Poli Mata">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Keterangan</label>
                    <textarea name="keterangan" rows="3" 
                              class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all" 
                              placeholder="Deskripsi singkat mengenai poli ini (opsional)"></textarea>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-blue-200 transition-all">
                        Simpan Poli
                    </button>
                    <a href="{{ route('polis.index') }}" class="px-8 py-3 text-gray-500 font-bold hover:bg-gray-100 rounded-xl transition-all">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>