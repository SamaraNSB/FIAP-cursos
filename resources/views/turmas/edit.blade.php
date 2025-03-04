@extends('layouts.app')

@section('title', 'Editar Turma')

@section('content')

<div class="container">

    <h1>Editar Turma</h1>
    <form action="{{ route('turmas.update', $turma->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $turma->nome }}" required minlength="3" maxlength="50">
        </div>

        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" required minlength="3" maxlength="250">{{ $turma->descricao }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="tipo">Tipo</label>
            <select name="tipo" class="form-control" required>
                <option value="">Selecione</option>
                <option value="Presencial" {{ $turma->tipo == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                <option value="Online" {{ $turma->tipo == 'Online' ? 'selected' : '' }}>Online</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <button class="btn btn-danger mt-3" type="submit">Atualizar</button>
            <a class="btn btn-secondary mt-3" href="{{ route('turmas.index') }}" role="button">Cancelar</a>

        </div>
    </form>
</div>
@endsection
