<link href="{{ asset('css/app2.css') }}" rel="stylesheet">
    <main class="content">
        <div class="container-fluid p-0 col-12">

            <a href="{{ route('home') }}">
                <i class="align-middle me-1" data-feather="arrow-left"></i>
                Voltar para página inicial
            </a>
            <div class="d-flex justify-content-center">
            <div class="my-3 text-center">
                <h2><b>Cadastre-se</b></h2>
                <h4 style="font-size: 1rem;">
                    É rápido e fácil
                </h4>
            </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="post" action=" {{ route('register') }} " autocomplete="off">
                        @csrf
                        <div class="d-flex justify-content-center">
                        <div class="card col-12 col-md-4 col-sm-16">
                            
                            <div class="card-body d-flex flex-column gap-3">

                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="name" placeholder="Nome" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <input id="lastname" placeholder="Sobrenome" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" placeholder="Confirmar senha" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    Ao clicar em Cadastrar, você concorda com nossos Termos, Política de Privacidade e Política de Cookies. Você poderá receber notificações por SMS e cancelar isso quando quiser.
                                </div>

                                <div class="mt-3 d-flex justify-content-center ">
                                    <button type="submit" id="bt_validar_cpf"class="btn btn-success">Cadastrar</button>
                                </div> 
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </main>
