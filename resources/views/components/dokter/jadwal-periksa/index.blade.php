<x-layouts.app title="Jadwal Periksa">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Jadwal Periksa</h2>
        <a href="{{ route('jadwal-periksa.create') }}" class="btn bg-[#2d4499] hover:bg-[#1e2d6b] text-white border-none rounded-lg px-5">
            <i class="fas fa-plus"></i> Tambah Jadwal Periksa
        </a>
    </div>

    @if (session('message'))
    <div class="alert alert-success mb-4 rounded-xl shadow-sm bg-green-500 text-white" role="alert">
        <i class="fas fa-circle-check"></i>
        <span>{{ session('message') }}</span>
    </div>
    @endif

    <div class="card bg-base-100 shadow-md rounded-2 border">
        <div class="card-body p-0">
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead class="bg-slate-100 text-slate-500 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Hari</th>
                            <th class="px-6 py-4">Jam Mulai</th>
                            <th class="px-6 py-4">Jam Selesai</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwalPeriksas as $jadwalPeriksa)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 text-slate-500">{{ $jadwalPeriksa->id }}</td>
                            <td class="px-6 py-4 font-semibold text-slate-800">{{ $jadwalPeriksa->hari }}</td>
                            <td class="px-6 py-4 text-slate-500">{{ \Carbon\Carbon::parse($jadwalPeriksa->jam_mulai)->format('H:i') }}</td>
                            <td class="px-6 py-4 text-slate-500">{{ \Carbon\Carbon::parse($jadwalPeriksa->jam_selesai)->format('H:i') }}</td>
                            <td class="px-6 py-4">
                                @if($jadwalPeriksa->status == 1)
                                    <span class="badge badge-success text-white py-3 px-4">Aktif</span>
                                @else
                                    <span class="badge badge-error text-white py-3 px-4">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('jadwal-periksa.edit', $jadwalPeriksa->id) }}" class="btn btn-sm bg-amber-500 hover:bg-amber-600 text-white border-none rounded-lg px-4">
                                        <i class="fas fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('jadwal-periksa.destroy', $jadwalPeriksa->id) }}" method="POST" class="inline-block">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm bg-red-500 hover:bg-red-600 text-white border-none rounded-lg px-4">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-14 text-slate-400">Belum ada Jadwal Periksa</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>