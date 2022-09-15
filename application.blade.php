<!-- resources/views/layouts/application.blade.php -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">

<body>
    @section('navbar')
        @include('includes.navbar')
    @show

    <div class="container">
        
        @yield('content')
    </div>

    
</body>
