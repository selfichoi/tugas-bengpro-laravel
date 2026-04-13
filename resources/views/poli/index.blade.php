<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Poli Poliklinik</h2>
        <button class="btn btn-primary bg-blue-600 text-white px-4 py-2 rounded">Tambah Poli</button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="border p-3 text-left">No</th>
                    <th class="border p-3 text-left">Nama Poli</th>
                    <th class="border p-3 text-left">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($polis as $p)
                <tr class="hover:bg-gray-50">
                    <td class="border p-3 text-center">{{ $loop->iteration }}</td>
                    <td class="border p-3 font-semibold">{{ $p->nama_poli }}</td>
                    <td class="border p-3 text-gray-600">{{ $p->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>