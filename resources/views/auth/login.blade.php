@extends('out')

@section('conteudo')
<h4 style="margin: 25px;" class="font-weight-light text-secondary text-center">BEM-VINDO AO SISTEMA DE SUBMISSÃO DE ARTIGOS DA SEUNI 2019</h4>
<p style="margin: 25px;" class="font-weight-light text-light bg-success text-center">Acesse o sistema com sua conta</p>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body" style=" margin: 0 auto;">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/autenticar">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Lembre-se de mim
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button style="margin-top: 10px;" type="submit" class="btn btn-success btn-block">Login</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Esqueceu sua senha?</a>
							</div>
						</div>
					</form>
					<div class="col-md-6 col-md-offset-2">
					<form action="/register" method="GET" nowrap>
					<button style="margin-top: 2px; margin-bottom: 7px" type="submit" class="btn btn-outline-success btn-block">Registrar-se como aluno</button>
				</form>
			</div>
			<div class="col-md-6 col-md-offset-2">
			<form action="/registerprof" method="GET">
				<button style="margin-top: 2px;" type="submit" class="btn btn-outline-success btn-block">Registrar-se como professor</button>
			</form>
		</div>
		</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
