<!DOCTYPE html>
<html>
<head>
    <title>My App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-6xl mx-auto">
        @yield('content')
    </div>

</body>
</html>