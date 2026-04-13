<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login - Poliklinik' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #1e2d6b 0%, #2d4499 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="w-full max-w-md p-6">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden p-8">
            {{-- Slot ini tempat isi konten login/register kamu --}}
            {{ $slot }}
        </div>
        
        <p class="text-center text-white/60 text-sm mt-8">
            Copyright &copy; {{ now()->year }} - <b>Poliklinik</b>. All rights reserved.
        </p>
    </div>
</body>
</html>