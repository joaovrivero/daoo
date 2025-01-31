<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $activities = Activity::all();
         return view('activities.index', compact('activities'));
     }

    public function create()
    {
        return view('activities.create');  // Retorna para a view do formulário de criação
    }

    // Salvar uma nova atividade no banco de dados
    public function store(Request $request)
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'max_participants' => 'required|integer|min:1',
        ]);

        // Cria a atividade no banco de dados
        Activity::create($validated);

        // Redireciona de volta para a lista de atividades com mensagem de sucesso
        return redirect()->route('activities.index')->with('success', 'Atividade criada com sucesso!');
    }

    // Exibir uma atividade específica
    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));  // Exibe a atividade individual
    }

    // Exibir o formulário para editar uma atividade existente
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));  // Retorna a view do formulário de edição
    }

    // Atualizar os dados de uma atividade existente
    public function update(Request $request, Activity $activity)
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'max_participants' => 'required|integer|min:1',
        ]);

        // Atualiza a atividade com os novos dados
        $activity->update($validated);

        // Redireciona para a lista de atividades com uma mensagem de sucesso
        return redirect()->route('activities.index')->with('success', 'Atividade atualizada com sucesso!');
    }

    // Remover uma atividade
    public function destroy(Activity $activity)
    {
        // Exclui a atividade
        $activity->delete();

        // Redireciona de volta para a lista de atividades com mensagem de sucesso
        return redirect()->route('activities.index')->with('success', 'Atividade removida com sucesso!');
    }
}
