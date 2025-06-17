<html lang="en">

<x-head />

<body>

    <!-- Header Start -->
    <x-header />
    <!-- Header End -->

    {{ $slot }}

    <!-- Footer Start -->
    <x-footer />
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary px-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <x-scripts />
</body>

</html>
