<x-layouts.app>
    <div class="p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Tambah Dokter</h2>
        </div>

        <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            {{-- FIX: Ganti dokters.store jadi dokter.store sesuai modul --}}
            <form action="{{ route('dokter.store') }}" method="POST" class="space-y-5">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-700">Nama Dokter</label>
                        <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="dokter@gmail.com" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-700">No. HP</label>
                        <input type="text" name="no_hp" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="08..." required>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-700">No. KTP</label>
                        <input type="text" name="no_ktp" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="No. KTP" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-700">Poliklinik</label>
                        <select name="id_poli" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none" required>
                            <option value="">-- Pilih Poli --</option>
                            @foreach($polis as $poli)
                                <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-700">Password</label>
                        <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Minimal 6 karakter" required>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700">Alamat</label>
                    <textarea name="alamat" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Alamat Lengkap"></textarea>
                </div>

                <div class="pt-4 flex gap-2">
                    <button type="submit" class="bg-blue-600 text-white px-10 py-3 rounded-xl font-bold shadow-lg hover:bg-blue-700 transition-all flex items-center gap-2">
                        <i class="fas fa-save"></i> Simpan Dokter
                    </button>
                    <a href="{{ route('dokter.index') }}" class="bg-gray-100 text-gray-600 px-10 py-3 rounded-xl font-bold text-center">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>