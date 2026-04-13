<x-layouts.app>
    <div class="p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Data Poli</h2>
            <p class="text-gray-500 text-sm">Perbarui informasi unit layanan poliklinik</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-2xl">
            <form action="{{ route('polis.update', $poli->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT') {{-- PENTING: Untuk Update harus pakai method PUT --}}
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Poli</label>
                    <input type="text" name="nama_poli" value="{{ $poli->nama_poli }}" required 
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Keterangan</label>
                    <textarea name="keterangan" rows="3" 
                              class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all">{{ $poli->keterangan }}</textarea>
                </div>

                            <div class="flex gap-3 pt-4">
                {{-- Pastikan ada tulisan "Update Data" di dalam tag button --}}
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-blue-200 transition-all">
                    Update Data
                </button>
                
                <a href="{{ route('polis.index') }}" class="px-8 py-3 text-gray-500 font-bold hover:bg-gray-100 rounded-xl transition-all">
                    Batal
                </a>
            </div>
            </form>
        </div>
    </div>
</x-layouts.app>