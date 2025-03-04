@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')

<div class="container">

    <h1>Editar Aluno</h1>
    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ $aluno->nome }}" required minlength="3" maxlength="50">
        </div>

        <div class="form-group mb-3">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" class="form-control" value="{{ $aluno->data_nascimento }}" required>
        </div>

        <div class="form-group mb-3">
            <label or="usuario">Usuário:</label>
            <input type="text" name="usuario" class="form-control" value="{{ $aluno->usuario }}" required minlength="3" maxlength="50">
        </div>

        <div class="form-group mb-3">
            <button class="btn btn-danger mt-3" type="submit">Atualizar</button>
            <a class="btn btn-secondary mt-3" href="{{ route('alunos.index') }}" role="button">Cancelar</a>

        </div>
    </form>
</div>
@endsection
