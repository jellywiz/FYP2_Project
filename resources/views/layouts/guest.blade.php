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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fontawesome -->
  <link type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

  <!-- Volt CSS -->
  <link type="text/css" href="{{ asset('css/volt.css') }}" rel="stylesheet">

  <title>{{ config('app.name') }} | @yield("title")</title>

  @livewireStyles
</head>

<body>
  {{-- {{ $slot }} --}}
  @yield("content")
  @livewireScripts

  <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
