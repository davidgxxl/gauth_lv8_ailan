{{-- Plantilla --}}
@extends('plantillas.plantilla')

{{-- Contenido --}}
@section('contenido')

    {{-- Formulario de verificacion --}}
    <form action="" method="POST" class="mt-5">
        @csrf

        {{-- Alerta --}}
        <div class="alert alert-warning mb-5">
            Se le ha enviado un código de verificación a su correo, por favor revise su buzón para continuar.
        </div>

        {{-- Código de verificación --}}
        <label for="{{$n = "remember_token"}}" class="m-0 text-white">Código de acceso</label>
        <input name="{{$n}}" class="form-control" value="{{old($n)}}">
        @if($errors->has($n))
            <div class="alert alert-danger">{{ $errors->first($n) }}</div>
        @endif

        {{-- Botones --}}
        <div class="text-center mt-5">
            <button class="btn btn-primary">Enviar</button>
        </div>
    </form>
@endsection