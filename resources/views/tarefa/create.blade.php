@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Tarefa</div>

                <div class="card-body">
                   <form method="post" action=" {{ route('tarefa.store') }} ">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Tarefa</label>
                            <input type="text" class="form-control @error('tarefa_nome') is-invalid @enderror" placeholder="Digite a tarefa" name="tarefa_nome">
                            @error('tarefa_nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Data limite conclusão</label>
                            <input type="date" class="form-control @error('tarefa_data_limite_conclusao') is-invalid @enderror" name="tarefa_data_limite_conclusao">
                            @error('tarefa_data_limite_conclusao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
