{{-- Formulario que tendrá los datos para crear o actualizar los empleados --}}
<h1 class="mb-4">{{ $modo ?? '' }} Empleado</h1>

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="Nombres" class="form-label">Nombres</label>
        <input class="form-control" type="text" name="Nombres" id="Nombres"
               value="{{ isset($empleado->Nombres) ? $empleado->Nombres : old('Nombres') }}"
               placeholder="Introduzca Nombre">
    </div>

    <div class="col-md-6 mb-3">
        <label for="PrimerApel" class="form-label">Primer Apellido</label>
        <input class="form-control" type="text" name="PrimerApel" id="PrimerApel"
               value="{{ isset($empleado->PrimerApel) ? $empleado->PrimerApel : old('PrimerApel') }}"
               placeholder="Introduzca Primer Apellido">
    </div>

    <div class="col-md-6 mb-3">
        <label for="SegundoApel" class="form-label">Segundo Apellido</label>
        <input class="form-control" type="text" name="SegundoApel" id="SegundoApel"
               value="{{ isset($empleado->SegundoApel) ? $empleado->SegundoApel : old('SegundoApel') }}"
               placeholder="Introduzca Segundo Apellido">
    </div>

    <div class="col-md-6 mb-3">
        <label for="Correo" class="form-label">Email</label>
        <input class="form-control" type="text" name="Correo" id="Correo"
               value="{{ isset($empleado->Correo) ? $empleado->Correo : old('Correo') }}"
               placeholder="Introduzca Email">
    </div>

    <div class="col-md-12 mb-3">
        <label for="Foto" class="form-label">Foto</label>
        @if(isset($empleado->Foto))
            <div class="mb-2">
                <img src="{{ asset('storage/' . $empleado->Foto) }}" width="120" class="img-thumbnail" alt="Foto">
            </div>
        @endif
        <input class="form-control" type="file" name="Foto" id="Foto">
    </div>
</div>

<input class="btn btn-primary" type="submit" value="{{ $modo ?? '' }} Registro">