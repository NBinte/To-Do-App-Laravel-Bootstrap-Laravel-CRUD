<!DOCTYPE html>
<html lang="en">

<head>

    {{-- csrf-token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" media="all" />
    
    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">


    <title>ToDo App</title>
</head>

<body>

    @yield('content')

    {{-- scripts --}}
    <script type="text/javascript" src="{{ asset('js/app.js') }}"> </script>
</body>

</html>
