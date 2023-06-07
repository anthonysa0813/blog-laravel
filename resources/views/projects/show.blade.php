<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Anthony Sanchez | Crear un nuevo proyecto</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')

    </head>
    <body class="">
        <div class="container py-3 mx-auto my-5">
            <h1 class="text-3xl text-red-500 ">{{ $project->title }}</h1>
            <p>{{ $project->description }}</p>
            <div class="w-1/3 ">
                <img src="{{ $project->image }}" class="w-full h-48 rounded rounded-md mt-7" alt="">
            </div>
            <a href="/"><< regresar</span>
            <a href="/projects/{{ $project->id }}/edit">Editar</a>

            <form action="/projects/{{ $project->id }}" method="POST">
                @csrf
                @method("DELETE")
                  <button type="submit" onclick="return confirm('estás seguro de eliminar este proyecto?')">Eliminar</button>
            </form>

            <div class="">
                <h1>Comentarios</h1>
                @foreach ($comments as $comment)
                    <div class="w-1/2 p-2 border border-b-2 border-gray-500">
                        <p class="text-2xl">{{ $comment->name }}</p>
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </body>
</html>

