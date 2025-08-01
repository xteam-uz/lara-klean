<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Klean - Cleaning Services Website Template' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Klean" name="keywords">
    <meta content="Klean" name="description">

    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Tagify styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

    <!-- Tagify script -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
