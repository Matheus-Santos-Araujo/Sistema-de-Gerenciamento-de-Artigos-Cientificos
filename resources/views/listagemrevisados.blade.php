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
           @if($p->estadoRevisao !== "0")
            <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
                display: inline;">Resultado: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
                font-style: italic;">{{$p->resultado}}</h2></dl>
            @endif      
            @if($p->parecer !== NULL)
            <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
                display: inline;">Parecer: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
                font-style: italic;">{{$p->parecer}}</h2></dl>
            @endif  
                <dl class="list-group-item"><h3 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 13pt; color: #0d3a0d; font-weight: bold;
              display: inline;">Evento: </h3> <h2 style="font-family: helvetica; margin-left: auto; margin-right: auto; font-size: 15pt; color:#2d9402;
              font-style: italic;">{{$p->evento}}</h2></dl>

              <iframe src="data:application/pdf;base64,{{$p->artigodoc}}"></iframe>

              @if($p->estadoRevisao !== "1") 
              <dl class="list-group-item">
                    <div class="row">
            <form method="POST" action="/artigos/aceitar"> 
              {!! csrf_field() !!}
                <button href="/artigos/aceitar" type="submit" style="margin-right: 10px;" onClick="" id="resultado" name="resultado" value="Aprovado" class="btn btn-outline-success btn-sm btn-responsive">
                    <i class="fa fa-check">
                    </i> Aceitar Artigo
                </button>
          
              <input id="id" name="id" type="hidden" value="{{$p->id}}">
                <button href="/artigos/rejeitar" type="submit" style="margin-right: 10px;" onClick="" id="resultado" name="resultado" value="Rejeitado" class="btn btn-outline-danger btn-sm btn-responsive">
                    <i class="fa fa-trash-o">
                    </i> Rejeitar Artigo
                </button>
                <textarea type="textarea" rows="5" class="form-control" id="parecer" name="parecer" placeholder="Crítica acerca do artigo..."></textarea>
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
