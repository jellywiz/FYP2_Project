<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="../../assets/img/favicon/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="../../assets/img/favicon/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="../../assets/img/favicon/favicon-16x16.png" sizes="16x16" type="image/png">

  <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#563d7c">
  <link rel="icon" href="../../assets/img/favicon/favicon.ico">
  <meta name="msapplication-config" content="../../assets/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#563d7c">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

  <!-- Apex Charts -->
  {{-- <link type="text/css" href="{{ asset('assets/img/brand/dark.svg') }}" rel="stylesheet"> --}}

    <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Datepicker -->
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css"> --}}
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker-bs4.min.css"> --}}

  <!-- Fontawesome -->
  <link type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  
  <!-- Sweet Alert -->
  <link type="text/css" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css.css') }}" rel="stylesheet">

  <!-- Notyf -->
  {{-- <link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css') }}" rel="stylesheet"> --}}

  <!-- Volt CSS -->
  <link type="text/css" href="{{ asset('css/volt.css') }}" rel="stylesheet">
  @livewireStyles

  <title>{{ config('app.name') }} | @yield("title")</title>
</head>

<body>

  {{-- Nav --}}
  @include('layouts.nav')
  {{-- SideNav --}}
  @include('layouts.sidenav')
  <main class="content">
    {{-- TopBar --}}
    <livewire:top-bar />
    @yield("content")
  </main>

  @livewireScripts

  <!-- Core -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

  <!-- Vendor JS -->
  <script src="{{ asset('assets/js/on-screen.umd.min.js') }}"></script>
  
  <!-- Slider -->
  {{-- <script src="{{ asset('assets/js/nouislider.min.js') }}"></script> --}}

  <!-- Smooth scroll -->
  <script src="{{ asset('assets/js/smooth-scroll.polyfills.min.js') }}"></script>

  <!-- Apex Charts -->
  {{-- <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script> --}}

  <!-- Charts -->
  {{-- <script src="{{ asset('assets/js/chartist.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/js/chartist-plugin-tooltip.min.js') }}"></script> --}}

  <!-- Datepicker -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker.min.js"></script> --}}

  <!-- Moment JS -->
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script> --}}

  <!-- Notyf -->
  {{-- <script src="{{ asset('vendor/notyf/notyf.min.js') }}"></script> --}}

  <!-- Simplebar -->
  {{-- <script src="{{ asset('assets/js/simplebar.min.js') }}"></script> --}}

  <!-- Github buttons -->
  {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}

  <!-- Volt JS -->
  <script src="{{ asset('assets/js/volt.js') }}"></script>

  {{-- sweetalert2 --}}
  <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

  @stack('scripts')
  {{-- sweetalert2 message --}}
  @if (Session::has('message'))
    <script>
      Swal.fire({
        timer: 2500,
        icon: "{{ Session::get('icon') }}",
        title: "{{ Session::get('title') }}",
        text: "{{ Session::get('message') }}",
      })
    </script>
  @endif

</body>

</html>

{{-- <x-layouts.base>


    @if (in_array(
        request()->route()->getName(),
        ['dashboard', 'profile', 'profile-example', 'users', 'bootstrap-tables', 'transactions', 'buttons', 'forms', 'modals', 'notifications', 'typography', 'upgrade-to-pro'],
    ))



    @elseif(in_array(request()->route()->getName(), ['register', 'register-example', 'login',
    'login-example',
    'forgot-password', 'forgot-password-example', 'reset-password','reset-password-example']))

    {{ $slot }}
    @include('layouts.footer2')


    @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock']))

    {{ $slot }}

    @endif
</x-layouts.base> --}}
