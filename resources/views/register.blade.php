@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de Usuarios</div>

                <div class="card-body">
                    @include('auth/register')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection