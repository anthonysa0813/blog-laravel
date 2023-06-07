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
            <a href="/">Inicio</a>
            <h1 class="text-3xl text-blue-500 ">Edita un Proyecto</h1>
            <form action="/projects/{{ $project->id}}" method="POST">
                @csrf
                @method("PATCH")
                <div class="flex flex-col gap-2">
                    <label for="" >Titulo: {{ $project->title }}</label>
                    <input type="text" value={{ $project->title }} name="title" id="title" class="px-3 py-2 border border-2 border-blue-500 rounded rounded-lg">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">ImageUrl:</label>
                    <input type="text" value={{ $project->image }} name="image" id="image" class="px-3 py-2 border border-2 border-blue-500 rounded rounded-lg">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="px-3 py-2 border border-2 border-blue-500 rounded rounded-lg">{{ $project->description }}</textarea>
                </div>
                <button class="font-bold uppercase" type="submit">Editar</button>
            </form>
        </div>
    </body>
</html>

