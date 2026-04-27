<x-layouts.app>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex items-center gap-2 mb-6">
                    <a href="{{ route('pasien.index') }}" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h2 class="text-2xl font-bold">Tambah Pasien</h2>
                </div>

                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pasien *</label>
                            <input type="text" name="nama" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Masukkan nama pasien" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="pasien@gmail.com" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">No. KTP *</label>
                            <input type="text" name="no_ktp" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Masukkan No. KTP" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">No. HP *</label>
                            <input type="text" name="no_hp" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Masukkan No. HP" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat *</label>
                        <textarea name="alamat" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Masukkan alamat" required></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password *</label>
                        <input type="password" name="password" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="****" required>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md shadow-md transition-all">
                            Simpan
                        </button>
                        <a href="{{ route('pasien.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-md transition-all">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>