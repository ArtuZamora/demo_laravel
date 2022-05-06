@extends('layout.template')

@section('title', 'Nuevo editorial')

@section('content')<div class="row">
        <h3>Nuevo editorial</h3>
    </div>
    <div class="row">
        <div class=" col-md-7">
            <form role="form" action="{{ route('editoriales.store') }}" method="POST">
                @csrf
                <input type="hidden" name="op" value="insertar" />
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos
                        requeridos</strong></div>
                <div class="form-group">
                    <label for="codigo">Codigo del editorial:</label>
                    <div class="input-group">
                        <input type="text" value="{{ old('codigo_editorial') }}" class="form-control" name="codigo_editorial" id="codigo"
                            placeholder="Ingresa el codigo de la editorial">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    @error('codigo_editorial')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre del editorial:</label>
                    <div class="input-group">
                        <input type="text" value="{{ old('nombre_editorial') }}" class="form-control" name="nombre_editorial" id="nombre"
                            placeholder="Ingresa el nombre del editorial">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    @error('nombre_editorial')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contacto">Contacto:</label>
                    <div class="input-group">
                        <input type="text" value="{{ old('contacto') }}" class="form-control" id="contacto" name="contacto"
                            placeholder="Ingresa el nombre del contacto">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    @error('contacto')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <div class="input-group">
                        <input type="tel" value="{{ old('telefono') }}" class="form-control" id="telefono" name="telefono"
                            placeholder="Ingresa el telefono del contacto">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                    @error('telefono')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                <a class="btn btn-danger" href="{{ route('editoriales.index') }}">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
