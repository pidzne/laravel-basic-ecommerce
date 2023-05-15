<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <!-- Plugins CSS File -->
   @include('layouts.include.home-head')
    <!-- Customs CSS File -->
   @yield('css')
</head>
<body>
    <div class="page-wrapper">
        <main class="main">
           @yield('content')
        </main>
    </div>
    @include('layouts.include.home-jsimport')
</body>
</html>
