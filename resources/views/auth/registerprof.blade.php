@extends('out')

@section('conteudo')
<h4 style="margin: 25px;" class="font-weight-light text-secondary text-center">BEM-VINDO AO SISTEMA DE SUBMISSÃO DE ARTIGOS DA SEUNI 2019</h4>
<p style="margin: 25px;" class="font-weight-light text-light bg-success text-center">Registre-se aqui</p>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
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

					<form class="form-horizontal" role="form" method="POST" action="/register">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Endereço de email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Senha</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirme a Senha</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Instituição</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="instituicao">
							</div>
                        </div>
                        
                        <div class="form-group">
							<label class="col-md-4 control-label">Área de Pesquisa</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="areadepesquisa">
							</div>
                        </div>
                        
                        <div class="form-group">
							<label class="col-md-4 control-label">Titulação</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="titulacao">
							</div>
						</div>
						<input id="tipo" name="tipo" type="hidden" value="professor">

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button style="margin-top: 10px;" type="submit" class="btn btn-success btn-block">
									Registrar-se
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
