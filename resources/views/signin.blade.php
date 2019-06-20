<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <title>Laravel/VueJs coding challenge</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div id="page">
            <div id="app">
                <Signin></Signin>
            </div>        
        </div>
        
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>