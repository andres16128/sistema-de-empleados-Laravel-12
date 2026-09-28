@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/empleados') }}" class="btn btn-secondary mb-3">Listar Empleados</a>

    <form action="{{ url('/empleados') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('empleados.form', ['modo' => 'Crear'])
    </form>
</div>
@endsection