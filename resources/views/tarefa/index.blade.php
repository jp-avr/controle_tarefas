@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Lista de Tarefas </div>

                <div class="card-body">    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Número da Tarefa</th>
                                <th scope="col">Nome da Tarefa</th>
                                <th scope="col">Data para finalização</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>

                        @foreach($tarefas as $tarefa)
                        <tbody>
                            <tr>
                                <th scope="row"> {{ $tarefa->tarefa_id }}</th>
                                <td>{{ $tarefa->tarefa_nome}} </td>
                                <td>{{ date('d/m/Y',strtotime($tarefa->tarefa_data_limite_conclusao)) }}</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                        @endforeach
                      </table>

                      <nav>
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
