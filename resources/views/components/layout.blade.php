<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Chat</title>
    <link href="{{ asset('assets/icons/chat.ico') }}" rel="shortcut icon" type="imagex/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery/spinner/jquery.spinner.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app/layout.css') }}" />
</head>

<body id="page-top">
    {{ $slot }}
</body>

<script src="{{ asset('js/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery/spinner/jquery.spinner.min.js') }}"></script>
<script src="{{ asset('js/jquery/spinner/spinner.js') }}"></script>
<script src="{{ asset('js/bootbox/bootbox.js') }}"></script>
<script src="{{ asset('js/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('js/ajax/request.js') }}"></script>
<script src="{{ asset('js/app/common.js') }}"></script>

</html>