<x-layouts.app>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Dokter</h2>
                <p class="text-gray-500 text-sm">Daftar dokter yang bertugas di poliklinik</p>
            </div>
            <a href="{{ route('dokters.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg transition-all flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Dokter
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-r-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">No</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Nama Dokter</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Poliklinik</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">No. HP</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($dokters as $index => $dokter)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-800">{{ $dokter->nama }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold">
                                {{ $dokter->poli->nama_poli ?? 'Tanpa Poli' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $dokter->no_hp }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('dokters.edit', $dokter->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('dokters.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Hapus dokter ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center text-gray-400">Belum ada data dokter.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>