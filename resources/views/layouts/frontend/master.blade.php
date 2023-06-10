<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.frontend.partials.style')
</head>

<body>
    <!-- Navbar -->
    @include('layouts.frontend.partials.navbar')
    <!-- End Navbar -->
    @yield('content')
    <!-- Footer -->
    @include('layouts.frontend.partials.footer')
    <!-- End Footer -->
    @include('layouts.frontend.partials.script')
</body>

</html>
