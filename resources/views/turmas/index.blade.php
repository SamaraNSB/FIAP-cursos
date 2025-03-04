@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-3">
        <h1>Turmas</h1>
        <a class="btn btn-danger btn-lg" href="{{ route('turmas.create') }}"  role="button">Nova Turma</a>
    </div>

    <div class="d-flex justify-content-between align-items-center my-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Matriculas</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                <tr>
                    <td>{{ $turma->nome }}</td>
                    <td>{{ $turma->descricao }}</td>
                    <td>{{ $turma->tipo }}</td>
                    <td>
                        <a href="{{ route('turmas.matriculas.index', $turma->id) }}">
                        <i class="fa-solid fa-address-card text-danger"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('turmas.edit', $turma->id) }}">
                            <i class="fa-solid fa-pen-to-square text-danger"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-link p-0 border-0" onclick="return confirm('Tem certeza que deseja excluir esta turma?')">
                                    <i class="fa-solid fa-trash text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </  tbody>
        </table>
    </div>
    {{ $turmas->links('vendor.pagination.bootstrap-5') }}

    <div class="d-flex justify-content-between align-items-center my-3">
        <a class="btn btn-danger btn-lg" href="/" role="button">Voltar</a>
    </div>
</div>
@endsection
