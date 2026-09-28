@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/empleados') }}" class="btn btn-secondary mb-3">Listar Empleados</a>

    <form action="{{ url('/empleados/' . $empleado->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('empleados.form', ['modo' => 'Actualizar'])
    </form>
</div>
@endsection