<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <center>
        <div id="header">
            @include('includes.header')
        </div>
        <div id="main">
           @yield('content')
        </div>
        <div id="footer">
            @include('includes.footer')
        </div>
    </center>
</body>
</html>