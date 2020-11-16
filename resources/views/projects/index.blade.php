<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        <h1>Projects</h1>

        <ul>
            @foreach ($projects as $project)
                <li>{{ $project->title }}: {{ $project->description }}</li>
            @endforeach
        </ul>
    </body>
</html>