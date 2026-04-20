<x-layouts.app>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Pasien</h2>
            {{-- Tombol tambah mengarah ke pasien.create [cite: 417] --}}
            <a href="{{ route('pasien.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700 transition-all shadow-lg flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Pasien
            </a>
        </div>

        @if(session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">No</th>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">Nama Pasien</th>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">Email</th>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">No. KTP</th>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">No. HP</th>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">Alamat</th>
                        <th class="p-4 text-center text-sm font-bold text-gray-600 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pasiens as $pasien)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center text-gray-600 border-b">{{ $loop->iteration }}</td>
                        <td class="p-4 font-semibold text-gray-800 border-b">{{ $pasien->nama }}</td>
                        <td class="p-4 text-gray-600 border-b">{{ $pasien->email }}</td>
                        <td class="p-4 text-gray-600 border-b">{{ $pasien->no_ktp ?? '-' }}</td>
                        <td class="p-4 text-gray-600 border-b">{{ $pasien->no_hp ?? '-' }}</td>
                        <td class="p-4 text-gray-600 border-b">{{ $pasien->alamat ?? '-' }}</td>
                        <td class="p-4 border-b text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('pasien.edit', $pasien->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" onsubmit="return confirm('Hapus pasien ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-8 text-center text-gray-500 italic">
                            Belum ada data pasien.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>