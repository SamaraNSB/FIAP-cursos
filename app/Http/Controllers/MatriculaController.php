<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Aluno;
use App\Models\Turma;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource for a given turma.
     */
    public function index($turma_id)
    {
        $turma = Turma::findOrFail($turma_id);

        $matriculas = Matricula::with('aluno')->where('turma_id', $turma_id)->get();

        return view('matriculas.index', compact('matriculas', 'turma'));
    }

    /**
     * Show the form for creating a new resource for a given turma.
     */
    public function create($turma_id)
    {
        $turma = Turma::findOrFail($turma_id);
        $alunos = Aluno::orderBy('nome', 'asc')->get();

        return view('matriculas.create', compact('turma', 'alunos'));
    }

    /**
     * Store a newly created resource in storage for a given turma.
     */
    public function store(Request $request, Turma $turma)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
        ]);

        $exists = Matricula::where('aluno_id', $request->aluno_id)
                        ->where('turma_id', $turma['id'])
                        ->exists();

        if ($exists) {
            return redirect()->back()->withErrors('O aluno já está matriculado nesta turma.');
        }

        Matricula::create([
            'aluno_id' => $request->aluno_id,
            'turma_id' => $turma['id'],
        ]);

        return redirect()->route('turmas.matriculas.index', $turma['id'])
                        ->with('success', 'Matrícula realizada com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show($turma_id, $id)
    {
        $matricula = Matricula::with('aluno')->findOrFail($id);
        return view('matriculas.show', compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($turma_id, $id)
    {
        $matricula = Matricula::findOrFail($id);
        $turma = Turma::findOrFail($turma_id);
        $alunos = Aluno::orderBy('nome', 'asc')->get();

        return view('matriculas.edit', compact('matricula', 'turma', 'alunos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $turma_id, $id)
    {
        $matricula = Matricula::findOrFail($id);

        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
        ]);

        $exists = Matricula::where('aluno_id', $request->aluno_id)
                           ->where('turma_id', $turma_id)
                           ->where('id', '<>', $id)
                           ->exists();

        if ($exists) {
            return redirect()->back()->withErrors('O aluno já está matriculado nesta turma.');
        }

        $matricula->update([
            'aluno_id' => $request->aluno_id,
        ]);

        return redirect()->route('turmas.matriculas.index', $turma_id)
                         ->with('success', 'Matrícula atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($turma_id, $id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();

        return redirect()->route('turmas.matriculas.index', $turma_id)
                         ->with('success', 'Matrícula removida com sucesso!');
    }
}
