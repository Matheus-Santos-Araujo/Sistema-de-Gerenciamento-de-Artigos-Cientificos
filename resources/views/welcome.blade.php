@extends('main')  
  @section('conteudo')  

  <div class="alert alert-success" style="margin: 0px!important;">
        <i class="fa fa-smile-o fa-lg"></i><strong> Seja Bem-vindo {{ auth()->user()->name }}</strong> 
    </div>
    @foreach($meus as $m)
    @if($m->notificacao !== NULL)
    <div class="alert alert-warning" style="margin: 0px!important;">
        <i class="fa fa-warning fa-lg"></i><strong>  Notificação: {{ $m->notificacao }} Artigo: {{$m->titulo}}</strong> 
        <form style="display: inline;" class="text-right" method="POST" action="/deletarnotificacao">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="text"  hidden="" value="{{$m->id}}" name="id"> 
         <button class="btn btn-warning btn-sm pull-right text-right" type="submit"><i class="fa fa-trash-o"></i></button>
        </form>
    </div>
    @endif
    @endforeach

         <h4 style="margin: 25px;" class="font-weight-light text-secondary text-center">BEM-VINDO AO SISTEMA DE SUBMISSÃO DE ARTIGOS DA SEUNI 2019 </h4>
         <div class="container">   
         <button class="btn btn-outline-dark" style="margin-bottom: 20px;" disabled>Artigos</button>
         <?php if(auth()->user()->tipo !== "administrador"){ ?> 
         <div class="row text-center">
                <form action="/inserirartigo" method="get" >
                    <button type="submit" class="btn btn-sq-lg btn-primary botao" id="SubmeterArtigo" value="Submeter Artigo"/><i class="fa fa-upload fa-5x"></i></br>Submeter Artigo</button>
                </form>
                </br>
                <form action="/artigos" method="get">
                    <button type="submit" class="btn btn-sq-lg btn-info botao" id="Verartigosenviados" value="Ver artigos enviados"/><i class="fa fa-eye fa-5x"></i></br>Ver artigos Enviados</button>
                </form>
              </br>
              <?php } ?>
              <?php if(auth()->user()->tipo == "professor"){ ?>     
              <form action="/artigos/revisados" method="get">
                  <button type="submit" class="btn btn-sq-lg btn-warning botao" id="VerArtigosRevisados" value="Ver Artigos Revisados"/><i class="fa fa-file fa-5x"></i></br>Ver Artigos Revisados</button>
              </form>
            <?php } ?>
               </br>
               <?php if(auth()->user()->tipo == "administrador"){ ?>     
                <form action="/artigos/revisadosadm" method="get">
                    <button type="submit" class="btn btn-sq-lg btn-success botao" id="IndicarRevisor" value="Indicar Revisor"/><i class="fa fa-pencil fa-5x"></i></br>Painel de Artigos/Indicar Revisor</button>
                </form>
                <?php } ?>              
            </div>
        </div>
        <div class="container">
              <button class="btn btn-outline-dark" style="margin-bottom: 20px;" disabled>Eventos</button>
            <div class="row">
                <form action="/eventos" method="get">
                    <button type="submit" class="btn btn-sq-lg btn-info botao" id="VisualizarEventos" value="Visualizar Eventos"/><i class="fa fa-eye fa-5x"></i></br>Visualizar Eventos</button>
                </form>
              </br>
              <?php if(auth()->user()->tipo == "administrador"){ ?>     
              <form action="/inserirevento" method="get">
                    <button type="submit" class="btn btn-sq-lg btn-warning botao" id="InserirEvento" value="Inserir Evento"/><i class="fa fa-plus fa-5x"></i></br>Inserir Evento</button>
                </form>
              </br>
                <?php } ?>
            </div>
        </div>
   @stop
