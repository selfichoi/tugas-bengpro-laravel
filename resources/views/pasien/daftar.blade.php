<x-layouts.app title="Daftar Poli">

    <div class="flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-3xl">
            <div class="card bg-base-100 shadow-sm border border-gray-200">
                <div class="card-body p-8">

                    <h2 class="text-2xl font-bold text-center mb-8 text-gray-800">
                        🏥 Pendaftaran Poli
                    </h2>

                    {{-- Notifikasi Sukses --}}
                    @if (session('message'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        <span>{{ session('message') }}</span>
                    </div>
                    @endif

                    {{-- Notifikasi Error --}}
                    @if ($errors->any())
                    <div class="alert alert-error mb-6 text-white p-4 rounded-lg bg-red-500">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('pasien.daftar.submit') }}" method="POST">
                        @csrf
                        {{-- FIX: Ganti $user->id jadi Auth::user()->id biar gak Undefined --}}
                        <input type="hidden" name="id_pasien" value="{{ Auth::user()->id }}">

                        {{-- Nomor RM --}}
                        <div class="mb-5">
                            <label class="font-bold block mb-2 text-gray-700">
                                Nomor Rekam Medis
                            </label>
                            {{-- FIX: Ganti $user->no_rm jadi Auth::user()->no_rm --}}
                            <input type="text" value="{{ Auth::user()->no_rm }}"
                                class="w-full border border-gray-300 rounded-xl p-3 bg-gray-50 text-gray-500 outline-none" readonly>
                        </div>

                        {{-- Pilih Poli --}}
                        <div class="mb-5">
                            <label class="font-bold block mb-2 text-gray-700">
                                Pilih Poli
                            </label>
                            <select name="id_poli" id="poliSelect" class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 outline-none" required>
                                <option value="">-- Pilih Poli --</option>
                                @foreach ($polis as $poli)
                                <option value="{{ $poli->id }}">
                                    {{ $poli->nama_poli }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Pilih Jadwal --}}
                        <div class="mb-5">
                            <label class="font-bold block mb-2 text-gray-700">
                                Pilih Jadwal Periksa
                            </label>
                            <select name="id_jadwal" id="jadwalSelect" class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 outline-none" required>
                                <option value="">-- Pilih Jadwal --</option>
                                @foreach ($jadwals as $jadwal)
                                <option value="{{ $jadwal->id }}" data-poli="{{ $jadwal->dokter->id_poli }}">
                                    {{ $jadwal->hari }} | {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }} | Dr. {{ $jadwal->dokter->nama ?? '--' }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Keluhan --}}
                        <div class="mb-8">
                            <label class="font-bold block mb-2 text-gray-700">
                                Keluhan
                            </label>
                            <textarea name="keluhan" rows="4" class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 outline-none"
                                placeholder="Tuliskan keluhan anda secara singkat..." required></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="w-full md:w-auto px-10 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-all active:scale-95">
                                Daftar Poli Sekarang
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            const poliSelect = document.getElementById("poliSelect")
            const jadwalSelect = document.getElementById("jadwalSelect")
            const jadwalOptions = jadwalSelect.querySelectorAll("option")

            poliSelect.addEventListener("change", function(){
                let poliId = this.value
                jadwalOptions.forEach(option => {
                    if(option.value === ""){
                        option.style.display = "block"
                        return
                    }
                    // Cocokkan data-poli dengan id_poli yang dipilih
                    if(option.dataset.poli == poliId){
                        option.style.display = "block"
                    }else{
                        option.style.display = "none"
                    }
                })
                jadwalSelect.value = ""
            })
        })
    </script>
    @endpush
</x-layouts.app>