<?php

namespace App\Http\Controllers;

use App\Area;
use App\Empleado;
use App\Role;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::paginate();

        return view('empleado.index', compact('empleados'))
            ->with('i', (request()->input('page', 1) - 1) * $empleados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado();
        $areas = Area::all();
        $roles = Role::all();
        return view('empleado.create')->with([
            'areaid' => 0,
            'empleado' => $empleado,
            'areas' => $areas,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Empleado::$reglas);
        $empleado = Empleado::create($request->all());
        
        $roles = $request->roles;

        foreach ($roles as $rol) {
            $rol = Role::findOrFail($rol);
            $empleado->roles()->attach($rol);
        }

        //$empleado->categories()->attach($categorias);
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $areas = Area::all();
        $roles = Role::all();
        $roles_user = $empleado->roles->pluck('id')->toArray();
        //dd();
        return view('empleado.edit')->with([
            'roles_user' => $roles_user,
            'areaid' => $empleado->area->id,
            'empleado' => $empleado,
            'areas' => $areas,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        request()->validate(Empleado::$reglas);

        $empleado->fill($request->only([
            'nombre',
            'email',
            'boletin',
            'sexo',
            'area_id',
            'descripcion',
        ]));
        
        if (!$request->has('boletin')){
            $empleado->boletin = '0';
        }

        $empleado->save();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado deleted successfully');
    }
}
