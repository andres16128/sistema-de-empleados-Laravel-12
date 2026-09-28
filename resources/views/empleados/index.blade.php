@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Empleados</h1>
        <a href="{{ url('/empleados/create') }}" class="btn btn-success">➕ Registrar Nuevo Empleado</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>P. Apellido</th>
                    <th>S. Apellido</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $empleado->Foto) }}" width="60" class="img-thumbnail" alt="Foto">
                        </td>
                        <td>{{ $empleado->Nombres }}</td>
                        <td>{{ $empleado->PrimerApel }}</td>
                        <td>{{ $empleado->SegundoApel }}</td>
                        <td>{{ $empleado->Correo }}</td>
                        <td>
                            <a href="{{ url('/empleados/' . $empleado->id . '/edit') }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                            <form action="{{ url('/empleados/' . $empleado->id) }}" method="POST" style="display:inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger btn-sm"
                                       onclick="return confirm('¿Deseas eliminar este registro?')"
                                       value="🗑️ Eliminar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {!! $empleados->links() !!}

</div>
@endsection