@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center my-3">
        <h1>Alunos</h1>
        <a class="btn btn-danger btn-lg" href="{{ route('alunos.create') }}" role="button">Novo Aluno</a>
    </div>

    <form action="{{ route('alunos.index') }}" method="GET" class="d-flex mb-3">
        <input type="text" name="search" placeholder="Buscar por nome"
               class="form-control me-2"
               value="{{ request('search') }}">
        <button type="submit" class="btn btn-danger me-2">Buscar</button>
        <a class="btn btn-secondary" href="{{ route('alunos.index') }}" role="button">Limpar</a>

    </form>

    <div class="d-flex justify-content-between align-items-center my-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Usuário</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($aluno->data_nascimento)->format('d/m/Y') }}</td>
                    <td>{{ $aluno->usuario }}</td>
                    <td>
                        <a href="{{ route('alunos.edit', $aluno->id) }}">
                            <i class="fa-solid fa-pen-to-square text-danger"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-link p-0 border-0"
                                    onclick="return confirm('Tem certeza que deseja excluir este aluno?')">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between align-items-center my-3">
        <a class="btn btn-danger btn-lg" href="/" role="button">Voltar</a>
    </div>
</div>
@endsection
