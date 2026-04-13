<x-layouts.app>
    <div class="p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Tambah Poli</h2>
            <p class="text-gray-500 text-sm">Input unit layanan poliklinik baru</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-2xl">
            <form action="{{ route('polis.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Poli</label>
                    <input type="text" name="nama_poli" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Masukkan nama poli (contoh: Poli Umum)">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                    <textarea name="keterangan" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" rows="3" placeholder="Tambahkan keterangan singkat (opsional)"></textarea>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="btn btn-primary px-8">Simpan Data</button>
                    <a href="{{ route('polis.index') }}" class="btn btn-ghost">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>