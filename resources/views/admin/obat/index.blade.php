<x-layouts.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Data Obat</h3>
                    {{-- Sesuai Modul 9: Route pakai obat.create --}}
                    <a href="{{ route('obat.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all flex items-center gap-2">
                        <i class="fas fa-plus"></i> Tambah Obat
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
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Obat</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kemasan</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Harga</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Stok</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($obats as $obat)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-700 font-medium">{{ $obat->nama_obat }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $obat->kemasan }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600">Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                
                                <td class="px-4 py-4 text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <span class="font-medium text-gray-800">{{ $obat->stok }}</span>
                                        
                                        @if($obat->stok == 0)
                                            <span class="bg-red-100 text-red-700 border border-red-200 px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wide">
                                                Stok Habis
                                            </span>
                                        @elseif($obat->stok <= 5)
                                            <span class="bg-amber-100 text-amber-700 border border-amber-200 px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wide">
                                                Stok Menipis
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        {{-- Sesuai Modul 9: Route pakai obat.edit --}}
                                        <a href="{{ route('obat.edit', $obat->id) }}" class="bg-orange-400 hover:bg-orange-500 text-white text-xs py-1 px-3 rounded flex items-center gap-1">
                                            <i class="fas fa-edit text-[10px]"></i> Edit
                                        </a>
                                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" onsubmit="return confirm('Hapus data obat?')">
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