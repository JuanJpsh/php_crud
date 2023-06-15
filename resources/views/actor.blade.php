<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>
<body>
<h1 class="text-center p-3">Peliculas por actor</h1>
    <div class="p-5 table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope:"col">NOMBRE ACTOR</th>
                    <th scope:"col">Nombre Pais</th>
                    <th scope:"col">Titulo Pelicula</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($peliculas as $pel)
                <tr>
                    <th scope="row">{{$pel->NombreActor}}</th>
                    <td>{{$pel->NombrePais}}</td>
                    <td>{{$pel->TituloPelicula}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous">
</script>
</body>

</html>