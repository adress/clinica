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
                            <span class="card-title">Show Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Back</a>
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
                            {{ $empleado->sexo }}
                        </div>
                        <div class="form-group">
                            <strong>Area Id:</strong>
                            {{ $empleado->area_id }}
                        </div>
                        <div class="form-group">
                            <strong>Boletin:</strong>
                            {{ $empleado->boletin }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $empleado->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
