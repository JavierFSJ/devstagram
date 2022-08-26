<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('titulo')</title>
</head>

<body>

    <header class="p-5 border-b bg-white shadow">

        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                Devstagram
            </h1>

            <nav class="flex gap-4 items-center">
                <a href="" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                <a href="" class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
            </nav>
        </div>
    </header>


    <main class="container mx-auto mt-10">

      <h2 class="font-black text-center text-3xl mt-10">@yield('titulo')</h2>
      @yield('contenido')

    </main>


    <footer class="text-center p-5 text-gray-500 font-bold uppercase">
      DevStagram - Todos los derechos reservados {{ now('Y') }}
    </footer>

</body>

</html>
