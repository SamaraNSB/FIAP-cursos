<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->input('search');

        $query = Aluno::orderBy('nome', 'asc');

        if ($search) {
            $query->where('nome', 'like', '%' . $search . '%');
        }

        $alunos = $query->get();

        return view('alunos.index', compact('alunos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|min:3|max:50',
            'data_nascimento' => 'required|date',
            'usuario' => 'required|min:3|max:50'
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'usuario' => $request->usuario
        ]);

        return redirect()->route('alunos.index')
        ->with('success', 'Aluno cadastrado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $aluno = Aluno::findOrFail($id);

        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $request->validate([
            'nome' => 'required|min:3',
            'data_nascimento' => 'required|date',
        ]);

        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->all());

        return redirect()->route('alunos.index')
        ->with('success', 'Aluno atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $aluno = Aluno::findOrFail($id);

        $aluno->delete();

        return redirect()->route('alunos.index')
                        ->with('success', 'Aluno excluído com sucesso!');
    }

}
