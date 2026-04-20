<x-layouts.app>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Obat</h2>
            <a href="{{ route('obat.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700 transition-all shadow-lg flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Obat
            </a>
        </div>

        @if(session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="table-auto w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">Nama Obat</th>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">Kemasan</th>
                        <th class="p-4 text-left text-sm font-bold text-gray-600 border-b">Harga</th>
                        <th class="p-4 text-center text-sm font-bold text-gray-600 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obats as $obat)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-semibold text-gray-800 border-b">{{ $obat->nama_obat }}</td>
                        <td class="p-4 text-gray-600 border-b">{{ $obat->kemasan }}</td>
                        <td class="p-4 text-gray-600 border-b">Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                        <td class="p-4 border-b text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('obat.edit', $obat->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" onsubmit="return confirm('Hapus obat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
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
</x-layouts.app>