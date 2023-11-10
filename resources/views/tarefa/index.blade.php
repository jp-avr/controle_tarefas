@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Lista de Tarefas
                        </div>
                        
                        <div class="col-6">
                            <div class="float-right">
                                <a href="{{ route('tarefa.create') }}" class="mr-3">Novo</a>
                                <a href="{{ route('tarefa.exportacao.xlsx') }}" class="mr-3">XLSX</a>
                                <a href="{{ route('tarefa.exportacao.csv') }}" class="mr-3">CSV</a>
                                <a href="{{ route('tarefa.exportacao.pdf') }}">PDF</a>
                            </div>
                        </div>      
                    </div>
                </div>

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

                        @forelse($tarefas as $tarefa)
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
                        @empty
                            <tr>
                                <td style="border: none;">Nenhuma Tarefa encontrada</td>
                            </tr>
                        </tbody>
                        @endforelse
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
