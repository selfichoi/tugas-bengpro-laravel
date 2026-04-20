<x-layouts.app>
    <div class="p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Tambah Pasien</h2>
            <p class="text-gray-500 text-sm">Input data pasien baru untuk pendaftaran sistem</p>
        </div>

        <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            
            {{-- REVISI: Tambahkan blok ini untuk melihat apa yang error --}}
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                    <p class="font-bold">Aduhh, ada yang salah nih:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pasien.store') }}" method="POST" class="space-y-5">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-700">Nama Pasien</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-700">Email (Username)</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 outline-none focus:ring-2 focus:ring-blue-500" placeholder="pasien@gmail.com" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-700">No. KTP</label>
                        <input type="text" name="no_ktp" value="{{ old('no_ktp') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 outline-none focus:ring-2 focus:ring-blue-500" placeholder="16 digit" required>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-700">No. HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 outline-none focus:ring-2 focus:ring-blue-500" placeholder="08..." required>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-gray-300 outline-none focus:ring-2 focus:ring-blue-500" placeholder="Minimal 6 karakter" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700">Alamat</label>
                    <textarea name="alamat" class="w-full px-4 py-3 rounded-xl border border-gray-300 outline-none focus:ring-2 focus:ring-blue-500" placeholder="Alamat Lengkap" required>{{ old('alamat') }}</textarea>
                </div>

                <div class="pt-4 flex gap-2">
                    <button type="submit" class="bg-blue-600 text-white px-10 py-3 rounded-xl font-bold shadow-lg hover:bg-blue-700 transition-all flex items-center gap-2">
                        <i class="fas fa-save"></i> Simpan Pasien
                    </button>
                    <a href="{{ route('pasien.index') }}" class="bg-gray-100 text-gray-600 px-10 py-3 rounded-xl font-bold hover:bg-gray-200 transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>