<x-layouts.guest title="Login">
    <div class="flex flex-col items-center mb-8">
        <div class="flex flex-col items-center mb-8">
    {{-- Ikon Medical Gantiin Gambar Logo --}}
    <div class="bg-blue-100 p-5 rounded-full text-blue-600 mb-4 shadow-inner shadow-blue-200 border-4 border-blue-50">
        <i class="fas fa-hospital-user text-5xl"></i>
    </div>
    
    <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Poliklinik</h2>
    <p class="text-gray-500 text-sm mt-1">Silahkan masuk ke akun Anda</p>
</div>

    {{-- Tampilkan Error kalau Email/Password salah --}}
    @if ($errors->any())
        <div class="bg-red-50 text-red-500 p-4 rounded-xl mb-6 text-sm border border-red-100">
            <i class="fas fa-exclamation-circle mr-2"></i> {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                    <i class="fas fa-envelope"></i>
                </span>
                <input type="email" name="email" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-sm" placeholder="Masukkan email..." required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none text-sm" placeholder="Masukkan password..." required>
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-200 transition-all flex items-center justify-center gap-2 mt-4">
            <i class="fas fa-sign-in-alt"></i> Login
        </button>
    </form>

    <div class="mt-8 text-center">
        <p class="text-gray-500 text-sm">Belum punya akun? 
            <a href="{{ route('register') }}" class="text-blue-600 font-bold hover:underline">Register</a>
        </p>
    </div>
</x-layouts.guest>