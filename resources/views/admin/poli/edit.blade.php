<x-layouts.app title="Edit Poli">
    <div class="p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-800">Edit Data Poli</h1>
        </div>

        <div class="max-w-4xl bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('polis.update', $poli->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        {{-- Nama Poli --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wide">Nama Poli</label>
                            <input type="text" name="nama_poli" value="{{ old('nama_poli', $poli->nama_poli) }}" 
                                   class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                                   required>
                        </div>

                        {{-- Keterangan --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wide">Keterangan</label>
                            <textarea name="keterangan" rows="5" 
                                      class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">{{ old('keterangan', $poli->keterangan) }}</textarea>
                        </div>

                        {{-- Action --}}
                        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg shadow-blue-200 transition-all">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('polis.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold py-3 px-8 rounded-lg transition-all">
                                Kembali
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>