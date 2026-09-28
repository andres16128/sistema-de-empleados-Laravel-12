<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = empleado::paginate(5);
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = [
            'Nombres'     => 'required|string|max:90',
            'PrimerApel'  => 'required|string|max:90',
            'SegundoApel' => 'required|string|max:90',
            'Correo'      => 'required|email|max:90',
            'Foto'        => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $msj = [
            'required'      => 'El :attribute es requerido',
            'Foto.required' => 'La Foto es requerida',
        ];

        $request->validate($validation, $msj);

        $datosEmpleado = $request->except('_token');

        if ($request->hasFile('Foto')) {
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        empleado::insert($datosEmpleado);

        return redirect('empleados')->with('mensaje', 'Registro ingresado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = [
            'Nombres'     => 'required|string|max:90',
            'PrimerApel'  => 'required|string|max:90',
            'SegundoApel' => 'required|string|max:90',
            'Correo'      => 'required|email|max:90',
        ];

        $msj = [
            'required' => 'El :attribute es requerido',
        ];

        $request->validate($validation, $msj);

        $datos = $request->except(['_token', '_method']);

        if ($request->hasFile('Foto')) {
            $empleado = empleado::findOrFail($id);
            Storage::delete('public/' . $empleado->Foto);
            $datos['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        empleado::where('id', '=', $id)->update($datos);

        return redirect('empleados')->with('mensaje', 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = empleado::findOrFail($id);

        if (Storage::delete('public/' . $empleado->Foto)) {
            empleado::destroy($id);
        }

        return redirect('empleados')->with('mensaje', 'Registro eliminado exitosamente');
    }
}