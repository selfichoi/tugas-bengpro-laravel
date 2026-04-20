<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Data Obat</h2>
        <div class="max-w-xl bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('obat.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700">Nama Obat</label>
                    <input type="text" name="nama_obat" class="w-full px-4 py-3 rounded-xl border border-gray-300 outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700">Kemasan</label>
                    <input type="text" name="kemasan" placeholder="Contoh: Tablet 500mg" class="w-full px-4 py-3 rounded-xl border border-gray-300 outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700">Harga</label>
                    <input type="number" name="harga" class="w-full px-4 py-3 rounded-xl border border-gray-300 outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="pt-4 flex gap-2">
                    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-700 transition-all">Simpan</button>
                    <a href="{{ route('obat.index') }}" class="bg-gray-100 text-gray-600 px-8 py-3 rounded-xl font-bold hover:bg-gray-200 transition-all">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>