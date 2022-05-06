@extends('layout.template')

@section('title', 'Lista de autores')

@section('content')
    <div class="row">
        <h3>Lista de autores</h3>
    </div>
    <div class="row">
        <div class="col-md-10">
            <a type="button" class="btn btn-primary btn-md" href="{{ route('autores.create') }}"> Nuevo autor</a>
            <br><br>
            <table class="table table-striped table-bordered table-hover" id="tabla">
                <thead>
                    <tr>
                        <th>Codigo del autor</th>
                        <th>Nombre del autor</th>
                        <th>Nacionalidad</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autores as $autor)
                        <tr>
                            <td>{{ $autor->codigo_autor }}</td>
                            <td>{{ $autor->nombre_autor }}</td>
                            <td>{{ $autor->nacionalidad }}</td>
                            <td>
                                <a style="cursor: pointer; text-decoration: none;" class="btn-sm btn-danger deleteOpt"
                                    data-href="{{ route('autores.destroy', $autor->id) }}">Eliminar</a>
                                <a style="text-decoration: none;" class="btn-sm btn-success"
                                    href="{{ route('autores.edit', $autor->id) }}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $("#tabla").DataTable();
        $('#tabla').on('click', 'a.deleteOpt', function() {
            Swal.fire({
                title: '¿Está seguro de querer eliminar este registro?',
                showDenyButton: true,
                confirmButtonText: 'Sí',
                denyButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = $(this).attr('data-href');
                }
            })
        });
    </script>
    @if (session('status') != null)
        <script>
            alertify.success("{{session('status')}}");
        </script>
    @endif
@endsection