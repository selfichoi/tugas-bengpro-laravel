<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Poliklinik' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="app-wrapper">
        {{-- SIDEBAR --}}
        <div id="appSidebar" class="sidebar-fixed">
            @include('components.partials.sidebar')
        </div>

        {{-- OVERLAY (Buat Mobile) --}}
        <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

        {{-- MAIN CONTENT --}}
        <div class="main-content">
            @include('components.partials.header')
            
            <div class="main-scroll">
                {{-- Slot isi konten halaman kamu --}}
                {{ $slot }}
            </div>

            @include('components.partials.footer')
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('appSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('open');
            if (overlay) {
                overlay.style.display = sidebar.classList.contains('open') ? 'block' : 'none';
            }
        }
    </script>
</body>
</html>