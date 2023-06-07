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
        <div class="container mx-auto my-5 py-3">
            <a href="/">Inicio</a>
            <h1 class="text-blue-500 text-3xl ">Crea un nuevo Proyecto</h1>
            <form action="/projects" method="POST">
                @csrf
                <div class="flex flex-col gap-2">
                    <label for="" >Titulo:</label>
                    <input type="text" name="title" id="title" class="border border-blue-500 border-2 rounded rounded-lg py-2 px-3">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">ImageUrl:</label>
                    <input type="text" name="image" id="image" class="border border-blue-500 border-2 rounded rounded-lg py-2 px-3">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="border border-blue-500 border-2 rounded rounded-lg py-2 px-3"></textarea>
                </div>
                <button class="uppercase font-bold" type="submit">crear</button>
            </form>
        </div>
    </body>
</html>

