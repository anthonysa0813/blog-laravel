<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Anthony Sanchez | Developer FullStack</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')

    </head>
    <body class="antialiased">
        <div class="container mx-auto">
            <div class="">
                <h1>Welcome to my WEBSITE</h1>

                <a href="/projects/create">Crear un nuevo Proyecto</a>
            </div>

            @foreach ($projects as $item)
                <article>
                    <h1 class="text-red-500">
                        <a href="/projects/{{ $item->id }}">{{ $item->title }}</a>
                    </h1>
                    <p>{{ $item->description }}</p>
                </article>
            @endforeach
        </div>
    </body>
</html>
