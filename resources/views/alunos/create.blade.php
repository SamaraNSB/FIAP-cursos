@extends('layouts.app')

@section('title', 'Cadastrar Aluno')

@section('content')
<div class="container">
    <h1>Cadastrar Aluno</h1>
    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" required minlength="3" maxlength="50">
        </div>
        <div class="form-group mb-3">
            <label>Data de Nascimento:</label>
            <input type="date" name="data_nascimento" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Usuário</label>
            <input type="text" name="usuario" class="form-control" required minlength="3" maxlength="50">
        </div>
        <button class="btn btn-danger mt-3" type="submit">Salvar</button>
        <a class="btn btn-secondary mt-3" href="{{ route('alunos.index') }}" role="button">Cancelar</a>
    </form>
</div>

@endsection
