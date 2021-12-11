<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>My First Project</title>
        @include('website.include.stylesheet')
    </head>
    @stack('scopedCss')
    <body>
        @include('website.include.header')
        @yield('content')
        @include('website.include.footer')
        @include('website.include.script')
        
        @stack('scopedJs')
    </body>
</html>