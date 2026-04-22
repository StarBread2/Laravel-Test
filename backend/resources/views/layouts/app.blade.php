<!DOCTYPE html>
<html>
<head>
    <title>My App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-end gap-4">
            <a href="/animals"
            class="px-4 py-2 bg-black text-white rounded">
                View Animal List
            </a>

            <a href="/animals/create"
            class="px-4 py-2 bg-blue-700 text-white rounded">
                Add Animal
            </a>

            <a href="/animals/edit"
            class="px-4 py-2 bg-blue-700 text-white rounded">
                Edit Animal List
            </a>

        </div>
    </header>

    <div class="max-w-7xl mx-auto p-6">
        @yield('content')
    </div>
</body>

</html>