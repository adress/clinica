@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? 'Show Empleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Empleado: {{$empleado->nombre}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $empleado->email }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $empleado->sexoName() }}
                        </div>
                        <div class="form-group">
                            <strong>Area</strong>
                            {{ $empleado->area->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Boletin:</strong>
                            {{ $empleado->boletin }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $empleado->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Roles:</strong>
                            <br>
                            @foreach($empleado->roles as $rol)
                                {{ ucwords($rol->nombre) }} <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
