@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-3">
        <h1>{{ $turma->nome }}</h1>
        <a class="btn btn-danger btn-lg" href="{{ route('turmas.matriculas.create', $turma->id) }}"  role="button">Matricular</a>
    </div>

    <div class="d-flex justify-content-between align-items-center my-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Cancelar matrícula</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matriculas as $matricula)
                <tr>
                    <td>{{ $matricula->aluno->nome }}</td>
                    <td>
                        <form action="{{ route('turmas.matriculas.destroy', [$turma->id, $matricula->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja cancelar a matrícula?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center my-3">
        <a class="btn btn-danger btn-lg" href="{{ route('turmas.index') }}" role="button">Voltar</a>
    </div>
</div>
@endsection
