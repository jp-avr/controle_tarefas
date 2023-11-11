{{-- @php use App\Http\Middleware\LoginGlobalMiddleware\AuthCustom; @endphp --}}

{{-- @if (Auth::user() or AuthCustom::user()) --}}
<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a style="border: 0; background: inherit;" data-toggle="collapse" data-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
		<i data-feather="menu" class="text-white"></i>
	</a>

	<div class="navbar-collapse collapse">
		
			{{-- <span class="text-white col-2 justify-align-center">
				@if(AuthCustom::authenticated())
				{{ AuthCustom::role()->role_descricao }}
				@endif
			</span> --}}
		
		<ul class="navbar-nav navbar-align">
			
			<div class="dropleft">
					
				<a class="text-white" style="text-decoration: none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="align-middle me-1 text-light" data-feather="bell"></i> 
					{{-- {{ AuthCustom::pegarNomeLogado() }} --}}
				</a>
				<a class="text-white" style="text-decoration: none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="align-middle me-1 text-light" data-feather="user"></i> 
					{{-- {{ AuthCustom::pegarNomeLogado() }} --}}
					<i class="align-middle me-1 text-light" data-feather="chevron-down"></i>
				</a>
				<li class="nav-item dropdown">
					<div class="dropdown-menu">
						{{-- <div class="dropdown-divider"></div> --}}
						{{-- <a class="dropdown-item" href="{{ route('menu.ajuda') }}"><i class="align-middle me-1" data-feather="help-circle"></i> Ajuda</a> --}}

						{{-- <div class="dropdown-divider"></div> --}}
						<a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
					</div>
				</li>
			</div>
		</ul>
	</div>
</nav>
{{-- @endif --}}