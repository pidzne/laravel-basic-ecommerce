<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Plugins CSS File -->
   @include('layouts.include.home-head')
    <!-- Customs CSS File -->
   @yield('css')
</head>
<body>
    <div class="page-wrapper">
       @include('layouts.include.home-header')
        <main class="main">
           @yield('content')
        </main>
        
        @include('layouts.include.home-footer')
    </div><!-- End .page-wrapper -->
    
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    @include('layouts.include.home-mbmenu')
    <!-- Plugins JS File -->
    @include('layouts.include.home-jsimport')
    @include('layouts.include.home-swalert')
    <!-- Customs JS File -->
    @yield('scripts')
</body>
</html>
