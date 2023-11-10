<?php

namespace App\Http\Controllers;

use App\Exports\TarefasExport;
use App\Http\Requests\TarefaInserirRequest;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class TarefaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefas = Tarefa::where('user_id','=',Auth::id())->paginate(5);
        return view('tarefa.index',compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarefaInserirRequest $request)
    {
        $tarefa = Tarefa::create([
            'user_id' => Auth::id(),
            'tarefa_nome' => $request->tarefa_nome,
            'tarefa_data_limite_conclusao' => $request->tarefa_data_limite_conclusao
        ]);

        // $destinatario = Auth::user()->email;
        // Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));

        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->tarefa_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        $user_id = Auth::user()->id;

        if($tarefa->user_id == $user_id){
            return view('tarefa.edit', compact('tarefa'));
        }
        
        return view('acesso_negado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        if(!$tarefa->user_id == Auth::user()->id){
            return view('acesso_negado');
        }

        $tarefa->update([
            'tarefa_nome' => $request->get('tarefa_nome'),
            'tarefa_data_limite_conclusao' => $request->get('tarefa_data_limite_conclusao')
        ]);

        return redirect()->route('tarefa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        if(!$tarefa->user_id == Auth::user()->id){
            return view('acesso_negado');
        }

        $tarefa = Tarefa::where('user_id','=',Auth::user()->id)->delete();

        return redirect()->route('tarefa.index');
    }

    public function export()
    {
        return Excel::download(new TarefasExport, 'tarefas.xlsx');
    }
}
