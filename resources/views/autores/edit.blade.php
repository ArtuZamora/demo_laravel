@extends('layout.template')

@section('title', 'Nuevo autor')

@section('content')<div class="row">
        <h3>Nuevo autor</h3>
    </div>
    <div class="row">
        <div class=" col-md-7">
            <form role="form" action="{{ route('autores.update', $autor->id) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $autor->id }}" />
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos
                        requeridos</strong></div>
                <div class="form-group">
                    <label for="codigo">Codigo del autor:</label>
                    <div class="input-group">
                        <input type="text" value="{{ $autor->codigo_autor }}" class="form-control" name="codigo_autor" id="codigo"
                            placeholder="Ingresa el codigo del autor">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    @error('codigo_autor')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre del autor:</label>
                    <div class="input-group">
                        <input type="text" value="{{ $autor->nombre_autor }}" class="form-control" name="nombre_autor" id="nombre"
                            placeholder="Ingresa el nombre del autor">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    @error('nombre_autor')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <div class="input-group">
                        <input type="text" value="{{ $autor->nacionalidad }}" class="form-control" id="nacionalidad" name="nacionalidad"
                            placeholder="Ingresa la nacionalidad">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    @error('nacionalidad')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                <a class="btn btn-danger" href="{{ route('autores.index') }}">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
