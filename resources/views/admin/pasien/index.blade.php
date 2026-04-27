<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold">Data Pasien</h3>
                    {{-- Sesuai Modul 8: Route pakai pasien.create --}}
                    <a href="{{ route('pasien.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all flex items-center gap-2">
                        <i class="fas fa-plus"></i> Tambah Pasien
                    </a>
                </div>

                @if(session('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Pasien</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">No. KTP</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">No. HP</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Alamat</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($pasiens as $pasien)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-700">{{ $pasien->nama }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $pasien->email }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $pasien->no_ktp ?? '-' }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $pasien->no_hp ?? '-' }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $pasien->alamat ?? '-' }}</td>
                                <td class="px-4 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('pasien.edit', $pasien->id) }}" class="bg-orange-400 hover:bg-orange-500 text-white text-xs py-1 px-3 rounded flex items-center gap-1">
                                            <i class="fas fa-edit text-[10px]"></i> Edit
                                        </a>
                                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" onsubmit="return confirm('Hapus data pasien?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs py-1 px-3 rounded flex items-center gap-1">
                                                <i class="fas fa-trash text-[10px]"></i> Hapus
                                            </button>
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