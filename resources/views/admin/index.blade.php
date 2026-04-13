<x-layouts.app>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Poli</h2>
                <p class="text-gray-500 text-sm">Kelola data unit layanan poliklinik</p>
            </div>
            <a href="{{ route('polis.create') }}" class="btn btn-primary shadow-lg">
                <i class="fas fa-plus mr-2"></i> Tambah Poli
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success mb-4 shadow-sm">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="table w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-gray-600 font-semibold py-4">No</th>
                        <th class="text-gray-600 font-semibold py-4">Nama Poli</th>
                        <th class="text-gray-600 font-semibold py-4">Keterangan</th>
                        <th class="text-gray-600 font-semibold py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($polis as $index => $poli)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="py-4">{{ $index + 1 }}</td>
                        <td class="font-medium text-gray-800">{{ $poli->nama_poli }}</td>
                        <td class="text-gray-500 italic">{{ $poli->keterangan ?? '-' }}</td>
                        <td class="flex justify-center gap-2 py-4">
                            <a href="{{ route('polis.edit', $poli->id) }}" class="btn btn-ghost btn-sm text-blue-600 hover:bg-blue-50">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('polis.destroy', $poli->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus poli ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-ghost btn-sm text-red-600 hover:bg-red-50">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-12">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-hospital-alt text-4xl text-gray-200 mb-2"></i>
                                <p class="text-gray-400">Belum ada data poli.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>