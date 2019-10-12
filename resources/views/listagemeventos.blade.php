@extends('main')  
  @section('conteudo') 
    <div class="alert alert-success">
        <i class="fa fa-eye fa-lg"></i><strong> Veja os eventos</strong> 
    </div><table id="container">

    <div style="margin-top:20px; margin-bottom: 15px;" class="input-group-prepend">
       <form action="/eventos/pesquisar" method="POST" class="display: block!important;">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input style="display: block!important; margin-left:12px; margin-right:12px;" class="form-control my-0 py-1" name="nome" id="nome" type="text" placeholder="Pesquise por um evento (nome, sigla, palavra chave, área, situação)" aria-label="Search">
        <button style="margin-top: 12px; margin-bottom: 10px;" type="submit" class="btn btn-success"><i class="fa fa-search text-white"></i> Pesquisar</button>
       </form>
       <br>
  </div>

  <!-- percorre contatos montando as linhas da tabela -->
  @foreach($eventos as $p)
  <div class="grid">
      <ul class="container-fluid col-lg-12">
          <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
            display: inline;">Nome: </h3><h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
            font-style: italic;">{{$p->nome}}</h2></dl>
          <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
            display: inline;">Sigla: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
            font-style: italic;">{{$p->sigla}}</h2></dl>
            <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
                display: inline;">Palavras Chave: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
                font-style: italic;">{{$p->palavraChave}}</h2></dl>

            <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
                display: inline;">Situação: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
                font-style: italic;">{{$p->situacao}}</h2></dl>
                <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
                    display: inline;">Área de Concentração: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
                    font-style: italic;">{{$p->areaconcentracao}}</h2></dl>
                  <dl class="list-group-item">
                      <div class="row">
            <?php if(auth()->user()->tipo == "administrador"){ ?>     

              <form method="GET" action="/eventos/excluir/{{$p->id}}"> 
                  <input type="text"  hidden="" value="" name="id"> 
                  <button href="/eventos/excluir/{{$p->id}}" type="submit" style="margin-right: 10px;" onClick="" id="DeletarUsuario"  value="Deletar Pergunta" class="btn btn-outline-danger btn-sm btn-responsive">
                      <i class="fa fa-trash-o">
                      </i> Excluir Evento
                  </button>
              </form>

              <form action="/edicaoevento" method="POST"> 
                	{!! csrf_field() !!}
                  <input type="text"  hidden="" value="{{$p->nome}}" name="nome"> 
                <button type="submit" id="DeletarUsuario" value="Editar Pergunta" class="btn btn-outline-primary btn-sm btn-responsive">
                    <i class="fa fa-pencil">
                    </i> Editar Evento
                </button>
            </form> 
                      </div>
                      <?php } ?>
          </dl>
      </ul>
      </div>             
      @endforeach
    </table>
  </div>
@stop

