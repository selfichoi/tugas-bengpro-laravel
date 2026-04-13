<x-layouts.guest>
    <div class="flex flex-col items-center mb-8">
        <div class="bg-blue-100 p-5 rounded-full text-blue-600 mb-4 shadow-inner shadow-blue-200 border-4 border-blue-50">
            <i class="fas fa-user-plus text-5xl"></i>
        </div>
        <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Daftar Pasien</h2>
        <p class="text-gray-500 text-sm mt-1">Buat akun untuk mulai berkonsultasi</p>
    </div>

    <form action="{{ route('register.submit') }}" method="POST" class="space-y-5">
        @csrf
        
        {{-- Nama --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1 ml-1">Nama Lengkap</label>
            <input type="text" name="nama" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Nama lengkap">
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1 ml-1">Email</label>
            <input type="email" name="email" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="nama@email.com">
        </div>

        {{-- Alamat --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1 ml-1">Alamat</label>
            <textarea name="alamat" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" rows="2" placeholder="Alamat lengkap"></textarea>
        </div>

        {{-- Password --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1 ml-1">Password</label>
            <input type="password" name="password" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="••••••••">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg transition-all">
            Daftar Sekarang
        </button>

        <div class="text-center mt-6">
            <p class="text-gray-500 text-sm">Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Masuk</a>
            </p>
        </div>
    </form>
</x-layouts.guest>