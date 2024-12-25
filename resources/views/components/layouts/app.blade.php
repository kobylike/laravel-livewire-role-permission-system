<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Spatie' }}</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    @livewireStyles
</head>
<body>
    <!-- Include Navbar only on authenticated pages -->


    <div class="container-fluid">
        {{-- <div class="row">
            <!-- Include Sidebar only on authenticated pages -->
            @livewire('partials.sidebar') --}}

            <!-- Main content -->
            <main >
                {{ $slot }}
            </main>
        {{-- </div> --}}
    </div>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>
