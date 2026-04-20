<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold">Daftar Dokter</h3>
                    <a href="{{ route('dokter.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Tambah Dokter
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">Nama Dokter</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">No. HP</th>
                            <th class="px-4 py-2 text-left">Alamat</th>
                            <th class="px-4 py-2 text-left">Poli</th>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dokters as $dokter)
                        <tr class="border-b">
                            {{-- REVISI: Ganti name jadi nama --}}
                            <td class="px-4 py-2 font-semibold">{{ $dokter->nama }}</td>
                            <td class="px-4 py-2">{{ $dokter->email }}</td>
                            <td class="px-4 py-2">{{ $dokter->no_hp ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $dokter->alamat ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs">
                                    {{ $dokter->poli->nama_poli ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('dokter.edit', $dokter->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Hapus dokter ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
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
</x-layouts.app>