@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Turma</h1>
    <form action="{{ route('turmas.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" required minlength="3" maxlength="50">
        </div>
        <div class="form-group mb-3">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" class="form-control" required minlength="3" maxlength="250"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="tipo">Tipo:</label>
            <select name="tipo" class="form-control" required>
                <option value="">Selecione</option>
                <option value="Presencial">Presencial</option>
                <option value="Online">Online</option>
            </select>
        </div>
        <button type="submit" class="btn btn-danger mt-3">Salvar</button>
        <a class="btn btn-secondary mt-3" href="{{ route('turmas.index') }}" role="button">Cancelar</a>

    </form>
</div>
@endsection
