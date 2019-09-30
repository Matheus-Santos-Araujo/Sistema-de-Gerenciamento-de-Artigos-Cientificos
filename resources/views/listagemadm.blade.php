@extends('main')  
  @section('conteudo') 
    <div class="alert alert-success">
        <i class="fa fa-eye fa-lg"></i><strong> Veja seus artigos</strong> 
    </div><table id="container">
  <!-- percorre contatos montando as linhas da tabela -->
  @foreach($artigos as $p)
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
           @if($p->estadoRevisao !== "0")
            <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
                display: inline;">Resultado: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
                font-style: italic;">{{$p->resultado}}</h2></dl>
            @endif      
                <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
              display: inline;">Evento: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
              font-style: italic;">{{$p->evento}}</h2></dl>
              <dl class="list-group-item">
                    <div class="row">
            <form method="POST" action="{{ url('/artigos/revisor') }}"> 
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" value="{{$p->id}}">
                @if($p->revisor === NULL)
                <div class="form-row">
                        <div class="form-group col-md-6">
                          <input type="text" class="form-control" id="revisor" name="revisor" placeholder="Email do Revisor">
                        </div>
                <button href="/artigos/revisor/{{$p->id}}" type="submit" style="margin-right: 10px;" onClick="" id="DeletarUsuario"  value="Deletar Pergunta" class="btn btn-outline-success btn-sm btn-responsive">
                    <i class="fa fa-pencil">
                    </i> Indicar Revisor
                </button>

            </form>
           </div>
        </dl>
        @endif
      </ul>
      </div>         
      @endforeach
    </table>
  </div>
@stop
