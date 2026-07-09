<x-layouts.app title="Edit Jadwal Periksa">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('jadwal-periksa.index') }}" class="flex items-center justify-center w-9 h-9 rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200 transition">
            <i class="fas fa-arrow-left text-xs"></i>
        </a>
        <h2 class="text-xl font-bold text-slate-800">Edit Jadwal Periksa</h2>
    </div>

    <div class="card bg-base-100 shadow-md rounded-2xl border border-slate-200">
        <div class="card-body p-8">
            <form action="{{ route('jadwal-periksa.update', $jadwalPeriksa->id) }}" method="POST">
                @csrf @method('PUT')
                
                <div class="form-control mb-5">
                    <label class="label"><span class="text-sm font-semibold text-gray-700">Hari <span class="text-red-500">*</span></span></label>
                    <select name="hari" class="select select-bordered border-2 w-full rounded-lg" required>
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                            <option value="{{ $day }}" {{ old('hari', $jadwalPeriksa->hari) == $day ? 'selected' : '' }}>{{ $day }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-6 mb-5">
                    <div class="form-control">
                        <label class="label"><span class="text-sm font-semibold text-gray-700">Jam Mulai <span class="text-red-500">*</span></span></label>
                        <input type="time" name="jam_mulai" value="{{ old('jam_mulai', $jadwalPeriksa->jam_mulai) }}" class="input input-bordered border-2 rounded-lg" required>
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="text-sm font-semibold text-gray-700">Jam Selesai <span class="text-red-500">*</span></span></label>
                        <input type="time" name="jam_selesai" value="{{ old('jam_selesai', $jadwalPeriksa->jam_selesai) }}" class="input input-bordered border-2 rounded-lg" required>
                    </div>
                </div>

                <div class="form-control mb-8">
                    <label class="label"><span class="text-sm font-semibold text-gray-700">Status <span class="text-red-500">*</span></span></label>
                    <div class="flex gap-4">
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="status" value="1" class="radio radio-primary radio-sm" {{ old('status', $jadwalPeriksa->status) == '1' ? 'checked' : '' }} required />
                            <span class="label-text">Aktif</span>
                        </label>
                        <label class="label cursor-pointer gap-2">
                            <input type="radio" name="status" value="0" class="radio radio-primary radio-sm" {{ old('status', $jadwalPeriksa->status) == '0' ? 'checked' : '' }} required />
                            <span class="label-text">Tidak Aktif</span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn bg-[#2d4499] hover:bg-[#1e2d6b] text-white border-none rounded-lg px-8">
                    <i class="fas fa-save"></i> Update
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>