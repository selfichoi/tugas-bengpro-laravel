<x-layouts.app>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Poli Poliklinik</h2>
            {{-- REVISI: Ubah button jadi tag <a> dan arahkan ke route polis.create --}}
            <a href="{{ route('polis.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700 transition-all shadow-lg flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Poli
            </a>
        </div>
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">No</th>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">Nama Poli</th>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">Keterangan</th>
                        <th class="p-4 text-center text-sm font-bold text-gray-600 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($polis as $p)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center text-gray-600 border-b">{{ $loop->iteration }}</td>
                        <td class="p-4 font-semibold text-gray-800 border-b">{{ $p->nama_poli }}</td>
                        <td class="p-4 text-gray-600 border-b">{{ $p->keterangan ?? '-' }}</td>
                        <td class="p-4 border-b text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('polis.edit', $p->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('polis.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus poli ini?')">
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
                        <td colspan="4" class="p-8 text-center text-gray-500 italic">
                            Belum ada data poli. Silakan tambah data baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>