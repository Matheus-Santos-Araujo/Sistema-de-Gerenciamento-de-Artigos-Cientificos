@extends('main')

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
							<strong>Whoops!</strong> Preencha corretamente os campos.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/editarprof">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Nome conforme você será citado como autor</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Endereço de email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Instituição</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="instituicao" value="{{ auth()->user()->instituicao }}">
							</div>
                        </div>
                        @foreach($prof as $p)

                        <div class="form-group">
							<label class="col-md-4 control-label">Área de Pesquisa</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="areadepesquisa" value="{{ $p->areadepesquisa }}">
							</div>
                        </div>
                        <div class="form-group">
							<label class="col-md-4 control-label">Titulação</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="titulacao" value="{{ $p->titulacao }}">
							</div>
                        </div>
                        <input id="id" name="id" type="hidden" value="{{$p->id}}">
                        @endforeach
                        <input id="tipo" name="tipo" type="hidden" value="professor">

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button style="margin-top: 10px;" type="submit" class="btn btn-success btn-block">
									Editar
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
