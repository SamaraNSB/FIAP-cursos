@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Início</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você foi cadastrado(a) com Sucesso!

                    <div class="jumbotron mt-4">
                        <a class="btn btn-danger btn-lg" href="{{ url('/') }}" role="button">Continuar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
