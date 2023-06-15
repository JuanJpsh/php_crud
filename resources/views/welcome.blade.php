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
    <h1 class="text-center p-3">Actores</h1>


    @if (session("Correcto"))
    <div class=alert alert-success>{{session("Correcto")}}</div>
    @endif

    @if (session("Incorrecto"))
    <div class=alert alert-danger>{{session("Incorrecto")}}</div>
    @endif

    <div class="p-5 table-responsive">
        <a href="" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-success">Añadir Actor</a>

        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir datos del actor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('crud.create')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Código del actor</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="txtid_actor">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre del actor</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="txtnombres">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Apellidos del
                                    actor</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="txtapellidos">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Género del actor</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="txtgenero">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Edad del actor</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="txtedad">
                            </div>
                            <div class="mb-3">
                <label for="selectPais" class="form-label">País</label>
                <select class="form-select" id="selectPais" name="txtid_pais_fk">
                    @foreach($paises as $pais)
                        <option value="{{ $pais->id_pais }}">{{ $pais->nombre }}</option>
                    @endforeach
                </select>
            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope:"col">ID</th>
                    <th scope:"col">NOMBRES</th>
                    <th scope:"col">APELLIDOS</th>
                    <th scope:"col">GENERO</th>
                    <th scope:"col">EDAD</th>
                    <th scope:"col">PAIS</th>
                    <th scope:"col">ACCIONES</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                <tr>
                    <th scope="row">{{$item->id_actor}}</th>
                    <td>{{$item->nombres}}</td>
                    <td>{{$item->apellidos}}</td>
                    <td>{{$item->genero}}</td>
                    <td>{{$item->edad}}</td>
                    <td>{{$item->nombre_pais}}</td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id_actor}}"
                            class="btn btn-primary">Editar</a>
                        <a href="{{route('crud.delete',$item->id_actor)}}" class="btn btn-danger">Eliminar</a>
                        <a href="{{route('crud.actor',$item->id_actor)}}" class="btn btn-warning">Ver detalle</a>
                    </td>
                    <div class="modal fade" id="editModal{{$item->id_actor}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos del actor</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('crud.update')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Código del actor</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtid_actor"
                                                value="{{$item->id_actor}}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nombre del actor</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtnombres"
                                                value="{{$item->nombres}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Apellidos del
                                                actor</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtapellidos"
                                                value="{{$item->apellidos}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Género del actor</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtgenero" value="{{$item->genero}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Edad del actor</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtedad" value="{{$item->edad}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Modificar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                               
                        </div>
                    </div>
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