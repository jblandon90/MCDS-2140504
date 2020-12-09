<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">

</head>
<body>
    @include('layouts.navbar')
    <main class="container mt-5">
        @yield('content')
    </main>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive:{
                    0:{
                        items: 1
                    },
                    600:{
                        items: 2
                    },
                    1000:{
                        items: 3
                    }
                }
            });
            /* - - -*/
            @if (session('message'))
                Swal.fire({
                    title: 'Felicitaciones',
                    text: '{{ session('message') }}',
                    icon: 'success',
                    confirmButtonColor: '#1e5f74',
                    confirmButtonText: 'Aceptar'
                });
            @endif
            /* - - -*/
            @if (session('error'))
                Swal.fire({
                  position: 'top-end',
                  icon: 'error',
                  title: 'Acceso Denegado',
                  text: '{{ session('error') }}',
                  showConfirmButton: false,
                  timer: 2500
                });
            @endif
            /* - - -*/
            $('.btn-delete').click(function(event) {
                Swal.fire({
                    title: 'Esta usted seguro ?',
                    text: 'Desea eliminar este registro',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonColor: '#d0211c',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#1e5f74',
                    confirmButtonText: 'Aceptar',  
                }).then((result) => {
                    if(result.value) {
                        $(this).parent().submit();
                    }
                });
            });
            /* - - -*/
            $('#photo').change(function(event) {
               let reader = new FileReader();
               reader.onload = function(event) {
                    $('#preview').attr('src', event.target.result);
               }
               reader.readAsDataURL(this.files[0]);
            });
            /* - - -*/
            $('.btn-excel').click(function(event) {
                $('#file').click();
            });
            $('#file').change(function(event) {
                $(this).parent().submit();
            });
            /* - - -*/
            $('body').on('keyup','#qsearch', function(event) {
                event.preventDefault();
                $q = $(this).val();
                $t = $('input[name=_token]').val();
                $m = $('#tmodel').val();
                //if($(this).val().length > 0) {
                    $('.loader').removeClass('d-none');
                    $('.table').hide();
                    $sto = setTimeout(function(){
                        clearTimeout($sto);
                        $.post($m+'/search', {q: $q, _token: $t}, function(data) {
                            $('.loader').addClass('d-none');
                            $('#content').html(data);
                            $('.table').fadeIn('slow');
                        });
                    }, 2000);
                //}
            });
            /* - - -*/
        });
    </script>
</body>
</html>