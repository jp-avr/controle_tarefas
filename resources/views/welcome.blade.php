@extends('layouts.app', ['title' => __('TAREFAS')])

@section('content')
    <div class="content col-lg-8 mx-auto p-5 py-md-5" style="max-width: 1024px;">
        <header class="d-flex flex-column align-items-start pb-3 mb-5 border-bottom">
            <h1> TAREFAS </h1>
            <h3> Plataforma de cadastro de tarefas </h3>
        </header>

        @if ($errors->any())
            <div class="alert alert-danger">Erro! :(
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      
        <div>  
            <div class="row g-5">
                <div class="col-md-8">
                    <h1>Bem vindo (a) de volta!</h1>
                    <p class="fs-5 col-md-8">
                    Se você já tem uma conta, utilize suas credenciais para acessar o sistema.
                    </p>

                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div class="d-md-flex d-sm-inline justify-content-start">
                            <div class="col-10 col-md-8 col-sm-12">
                                <div class="d-flex flex-column gap-3">
                                    <div>
                                        <label class="form-label">E-mail</label>
                                        <input id="email" placeholder="Digite o seu E-mail" class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="form-label">Senha</label>
                                        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Digite a sua senha" required autocomplete="current-password" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                Lembrar-se de mim
                                            </label>
                                        </div>
                                        <div>
                                            <a href="#">
                                                Esqueceu sua senha?
                                            </a>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            Entrar
                                        </button>
                                    </div>
                                    
                                        
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <div>
                        <h2>Ainda não possui conta?</h2>
                        <p>
                            Para saber mais sobre a plataforma ou se você quer fazer a o acompanhamento de suas tarefas,
                            <a href="/">clique aqui</a> 
                        </p>
                        <a href="{{route('register')}}" class="btn btn-primary px-4">Criar conta</a>
                    </div>
                </div>
            </div>

            <hr class="my-5">
        </div>
    </div>
    
@endsection
