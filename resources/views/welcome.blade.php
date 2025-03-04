@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron   mt-4">
        <h1 class="display-4">FIAP - Cursos</h1>
        <h3>Menu administrativo:</h3>
        <a class="btn btn-outline-danger btn-lg" href="{{ route('alunos.index') }}" role="button">Alunos</a>
        <a class="btn btn-outline-danger btn-lg" href="{{ route('turmas.index') }}" role="button">Turmas</a>
    </div>
</div>
@endsection
