@extends('layouts.app', ['title' => __('SISCOP')])

@section('content')
    <div>
        @if (session('sucesso'))
            <div class="alert alert-success ">
                <p>{{ session('sucesso') }}</p>
            </div>
        @endif

        <div class="content">
            <div class="d-flex flex-wrap gap-3">
                <div class="col-lg-7 col-md-12 col-sm-12 p-0">
                    <div>
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div>
                                    <h4 class="mb-0"> Suas solicitações </h4>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Paciente</th>
                                            <th>Cartão SUS</th>
                                            <th >Dispositivo</th>
                                            <th>Status</th>
                                            <th><i class="align-middle me-1" data-feather="calendar"></i> Data </th>
                                            <th>Tempo do procedimento</th>
                                            <th style="width:7%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @forelse($tarefas as $tarefa)
                                        {{-- @include('usuarios.modal') --}}
                                            
                                            <tr>
                                                <td><strong> {{ Auth::user()->name }}  </strong></td>
                                                <td> {{ Auth::user()->name }}</td>
                                                <td> {{ 'a' }} </td>
                                                <td>Solicitado</td>
                                                <td id="data"> {{ 'a' }} </td>
                                                <td id="tempoDeUsoDisplay"></td>
                                                
                                                <td>
                                                    {{-- <button title="Visualizar mais informações" style="border: 0; background: inherit;" data-toggle="modal" data-target="#staticBackdrop-{{ $solicitacao->getKey() }}">
                                                        <i class="align-middle me-1 text-primary" data-feather="eye"></i>
                                                    </button> --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td style="border: none;">Você ainda não possui nenhuma solicitação.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
@endsection



