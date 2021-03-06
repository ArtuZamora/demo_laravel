@extends('layout.template')

@section('title', 'Lista de editoriales')

@section('content')
    <div class="row">
        <h3>Lista de editoriales</h3>
    </div>
    <div class="row">
        <div class="col-md-10">
            <a type="button" class="btn btn-primary btn-md" href="{{ route('editoriales.create') }}"> Nuevo editorial</a>
            <br><br>
            <table class="table table-striped table-bordered table-hover" id="tabla">
                <thead>
                    <tr>
                        <th>Codigo del editorial</th>
                        <th>Nombre del editorial</th>
                        <th>Contacto</th>
                        <th>Telefono</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($editoriales as $editorial)
                        <tr>
                            <td>{{ $editorial->codigo_editorial }}</td>
                            <td>{{ $editorial->nombre_editorial }}</td>
                            <td>{{ $editorial->contacto }}</td>
                            <td>{{ $editorial->telefono }}</td>
                            <td>
                                <a style="cursor: pointer; text-decoration: none;" class="btn-sm btn-danger deleteOpt"
                                    data-href="{{ route('editoriales.destroy', $editorial->id) }}">Eliminar</a>
                                <a style="text-decoration: none;" class="btn-sm btn-success"
                                    href="{{ route('editoriales.edit', $editorial->id) }}">Editar</a>
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