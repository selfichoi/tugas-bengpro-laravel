<x-layouts.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-slate-800">Daftar Dokter</h3>
                    <a href="{{ route('dokter.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-all shadow-md">
                        + Tambah Dokter
                    </a>
                </div>

                @if(session('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b">
                                <th class="px-4 py-3 text-left text-slate-600 uppercase text-xs">Nama Dokter</th>
                                <th class="px-4 py-3 text-left text-slate-600 uppercase text-xs">Email</th>
                                <th class="px-4 py-3 text-left text-slate-600 uppercase text-xs">No. KTP</th>
                                <th class="px-4 py-3 text-left text-slate-600 uppercase text-xs">Poli</th>
                                <th class="px-4 py-3 text-center text-slate-600 uppercase text-xs">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($dokters as $dokter)
                            <tr class="hover:bg-slate-50 transition-all">
                                <td class="px-4 py-4 font-semibold text-slate-700">{{ $dokter->nama }}</td>
                                <td class="px-4 py-4 text-slate-600">{{ $dokter->email }}</td>
                                <td class="px-4 py-4 text-slate-600">{{ $dokter->no_ktp ?? '-' }}</td>
                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-bold">
                                        {{ $dokter->poli->nama_poli ?? 'Tanpa Poli' }}
                                    </span>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex justify-center gap-3">
                                        <a href="{{ route('dokter.edit', $dokter->id) }}" class="text-blue-500 hover:text-blue-700 font-bold">Edit</a>
                                        <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Yakin hapus dokter ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>