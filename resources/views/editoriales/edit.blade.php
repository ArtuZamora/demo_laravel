@extends('layout.template')

@section('title', 'Editar editorial')

@section('content')

    <h1>Modificando los datos del editorial con id {{ $id }}</h1>
    <h3>Nombre del editorial: <?= $nombre ?></h3>

    @if ($edad >= 18)
        <h4>Eres mayor de edad</h4>
    @else
        <h4>Eres menor de edad</h4>
    @endif
@endsection
