<!DOCTYPE html>
<html lang="en">

<style>
    html,
    body {
        height: 100%;
        margin: 0;
    }

    * {
        font-family: 'Roboto', sans-serif;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Chat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />
</head>

<body>
    {{ $slot }}
</body>

</html>