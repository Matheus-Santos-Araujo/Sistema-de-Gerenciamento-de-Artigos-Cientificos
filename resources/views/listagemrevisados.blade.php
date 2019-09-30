@extends('main')  
  @section('conteudo') 
    <div class="alert alert-success">
        <i class="fa fa-eye fa-lg"></i><strong> Veja seus artigos</strong> 
    </div><table id="container">
  <!-- percorre contatos montando as linhas da tabela -->
  @foreach($artigos as $p)
  @if($p->revisor === auth()->user()->email && strpos($p->autores, auth()->user()->name) === false)
  <div class="grid">
      <ul class="container-fluid col-lg-12">
          <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
            display: inline;">Titulo: </h3><h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
            font-style: italic;">{{$p->titulo}}</h2></dl>
          <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
            display: inline;">Autores: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
            font-style: italic;">{{$p->autores}}</h2></dl>
          <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
            display: inline;">Resumo: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
            font-style: italic;">{{$p->resumo}}</h2></dl>
          <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
            display: inline;">Status: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
            font-style: italic;">@if($p->estadoRevisao === "0") Não revisado @else Revisado @endif</h2></dl>
           @if($p->resultado !== NULL)
            <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
                display: inline;">Status: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
                font-style: italic;">{{$p->resultado}}</h2></dl>
            @endif      
                <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
              display: inline;">Evento: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
              font-style: italic;">{{$p->evento}}</h2></dl>
              @if($p->estadoRevisao !== "1") 
              <dl class="list-group-item">
                    <div class="row">
            <form method="GET" action="/artigos/aceitar/{{$p->id}}"> 
                <button href="/artigos/aceitar/{{$p->id}}" type="submit" style="margin-right: 10px;" onClick="" id="DeletarUsuario"  value="Deletar Pergunta" class="btn btn-outline-success btn-sm btn-responsive">
                    <i class="fa fa-check">
                    </i> Aceitar Artigo
                </button>
            </form>

            <form method="GET" action="/artigos/rejeitar/{{$p->id}}"> 
                <button href="/artigos/rejeitar/{{$p->id}}" type="submit" style="margin-right: 10px;" onClick="" id="DeletarUsuario"  value="Deletar Pergunta" class="btn btn-outline-danger btn-sm btn-responsive">
                    <i class="fa fa-trash-o">
                    </i> Rejeitar Artigo
                </button>
            </form>
                    </div>
        </dl>
        @endif
      </ul>
      </div>         
      @endif    
      @endforeach
    </table>
  </div>
@stop
