<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @include('backend.include.stylesheet')
</head>
<body>
    @include('backend.include.header')
        @yield('section')
    @include('backend.include.footer')
    @include('backend.include.script')
</body>  
</html>     