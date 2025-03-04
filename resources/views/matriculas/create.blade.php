@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Matricular aluno</h1>
    <h1>{{ $turma->nome }}</h1>
    <form action="{{ route('turmas.matriculas.store', $turma) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="aluno_id">Aluno</label>
            <select name="aluno_id" class="form-control" required>
                <option value="">Selecione o aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>

            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <button type="submit" class="btn btn-danger mt-3">Matricular</button>
        <a class="btn btn-secondary mt-3" href="{{ route('turmas.matriculas.index', $turma->id) }}" role="button">Cancelar</a>
    </form>


</div>
@endsection
