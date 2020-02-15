<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{app('request')->getSchemeAndHttpHost()}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="vendors/fontawesome-pro-5.7.1/css/all.min.css">
    <link rel="stylesheet" href="vendors/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/sarkoot.css">
    <link rel="stylesheet" href="css/style.css">

    <title>{{$title ?? 'Title'}}</title>
</head>

<body data-xhr="body">
    @yield('body-content')

    <script src="vendors/jquery-3.4.1.min.js"></script>
    <script src="vendors/popper.min.js"></script>
    <script src="vendors/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="vendors/particles.js/particles.js"></script>
    <script src="js/dashio.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>
