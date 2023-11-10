@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Lista de Tarefas <a href="{{ route('tarefa.create') }}" class="float-right">Novo</a></div>

                <div class="card-body">    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Número da Tarefa</th>
                                <th scope="col">Nome da Tarefa</th>
                                <th scope="col">Data para finalização</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        @foreach($tarefas as $tarefa)
                        <tbody>
                            <tr>
                                <th scope="row"> {{ $tarefa->tarefa_id }}</th>
                                <td>{{ $tarefa->tarefa_nome}} </td>
                                <td>{{ date('d/m/Y',strtotime($tarefa->tarefa_data_limite_conclusao)) }}</td>
                                <td><a href=" {{ route('tarefa.edit', $tarefa->tarefa_id) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $tarefa->tarefa_id }}" method="post" action=" {{ route('tarefa.destroy', $tarefa->tarefa_id) }}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <a href="#" onclick="document.getElementById('form_{{ $tarefa->tarefa_id }}').submit()">Excluir</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                      </table>

                      <nav class="float-right">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a>
                            </li>

                            @for($i = 1; $i <= $tarefas->lastPage(); $i++) {{-- Retorna a última página da relação --}}
                                <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="page-item">
                                <a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avançar</a>
                            </li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
