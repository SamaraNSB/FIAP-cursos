<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;


class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->input('search');

        $query = Turma::orderBy('nome', 'asc');

        if ($search) {
            $query->where('nome', 'like', '%' . $search . '%');
        }

        $turmas = $query->paginate(5);

        return view('turmas.index', compact('turmas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('turmas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|min:3|max:50',
            'descricao' => 'required|min:3|max:100',
            'tipo' => 'required'
        ]);

        Turma::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'tipo' => $request->tipo
        ]);

        return redirect()->route('turmas.index')
        ->with('success', 'Turmas cadastrada com sucesso!');
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
        $turma = Turma::findOrFail($id);

        return view('turmas.edit', compact('turma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $request->validate([
            'nome' => 'required|min:3',
            'descricao' => 'required|min:3|max:100',
            'tipo' => 'required',
        ]);

        $turma = Turma::findOrFail($id);
        $turma->update($request->all());

        return redirect()->route('turmas.index')
        ->with('success', 'Turma atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $turma = turma::findOrFail($id);

        $turma->delete();

        return redirect()->route('turmas.index')
                        ->with('success', 'turma excluída com sucesso!');
    }
}
