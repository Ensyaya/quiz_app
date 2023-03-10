<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{$header_title}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $header }}
                </h2>
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if ($errors -> any())
                <div class="alert alert-danger" id="alert" role="alert">
                    @foreach ($errors->all() as $error)
                    <li class="list-item">
                        {{$error}}
                    </li>
                    @endforeach
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success" id="alert" role="alert">
                    <i class="fa fa-check"></i> {{session('success')}}
                </div>
                @endif

                {{ $slot }}
            </div>
        </div>
    </div>
    @stack('modals')
    @isset ($js)
    {{ $js }}
    @endif

    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        $("document").ready(function(){
            setTimeout(function(){
                $("#alert").remove();
            }, 30000 );

        });
    </script>

</body>

</html>