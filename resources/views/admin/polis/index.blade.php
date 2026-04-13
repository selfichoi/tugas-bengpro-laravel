<x-layouts.app>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Poli</h2>
                <p class="text-gray-500 text-sm">Kelola data unit layanan poliklinik</p>
            </div>
            <a href="{{ route('polis.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg shadow-blue-200 transition-all flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Poli
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 flex items-center gap-3">
                <i class="fas fa-check-circle"></i>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">No</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Nama Poli</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Keterangan</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($polis as $index => $poli)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-800">{{ $poli->nama_poli }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 italic">{{ $poli->keterangan ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('polis.edit', $poli->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('polis.destroy', $poli->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus poli ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-hospital-alt text-5xl text-gray-200 mb-4"></i>
                                <p class="text-gray-400 font-medium">Belum ada data poli.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>