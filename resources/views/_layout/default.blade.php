<!doctype html>
<html lang="en">
<head>
    @include('_layout.head')
    @yield('headtags')
    <title>Hello, world!</title>
</head>
<body>

@yield('content')

@include('_layout.footer')
@yield('foottags')
</body>
</html>
