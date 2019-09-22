@extends('main')  
  @section('conteudo')  

  <div class="alert alert-success">
        <i class="fa fa-smile-o fa-lg"></i><strong> Seja Bem-vindo {{ auth()->user()->name }} você tem 0 notificações</strong> 
    </div>

         <h4 style="margin: 25px;" class="font-weight-light text-secondary text-center">BEM-VINDO AO SISTEMA DE SUBMISSÃO DE ARTIGOS DA SEUNI 2019 </h4>
         <div class="container">   
         <button class="btn btn-outline-dark" style="margin-bottom: 20px;" disabled>Artigos</button>
         <div class="row text-center">
                <form action="/inserirartigo" method="get" >
                    <button type="submit" class="btn btn-sq-lg btn-primary botao" id="SubmeterArtigo" value="Submeter Artigo"/><i class="fa fa-upload fa-5x"></i></br>Submeter Artigo</button>
                </form>
                </br>
                <form action="/artigos" method="get">
                    <button type="submit" class="btn btn-sq-lg btn-info botao" id="Verartigosenviados" value="Ver artigos enviados"/><i class="fa fa-eye fa-5x"></i></br>Ver artigos Enviados</button>
                </form>
              </br>
              <?php if(auth()->user()->tipo == "professor"){ ?>     
              <form action="" method="get">
                  <button type="submit" class="btn btn-sq-lg btn-warning botao" id="VerArtigosRevisados" value="Ver Artigos Revisados"/><i class="fa fa-file fa-5x"></i></br>Ver Artigos Revisados</button>
              </form>
            </br>
            <form action="" method="get">
                <button type="submit" class="btn btn-sq-lg btn-danger botao" id="IndicarArtigo" value="Indicar Artigo"/><i class="fa fa-external-link fa-5x"></i></br>Indicar Artigo</button>
            </form>
            <?php } ?>
               </br>
               <?php if(auth()->user()->tipo == "administrador"){ ?>     
                <form action="" method="get">
                    <button type="submit" class="btn btn-sq-lg btn-success botao" id="IndicarRevisor" value="Indicar Revisor"/><i class="fa fa-pencil fa-5x"></i></br>Indicar Revisor</button>
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
                <form action="/eventos/pesquisar" method="get">
                    <button type="submit" class="btn btn-sq-lg btn-success botao" id="PesquisarEvento" value="PesquisarEvento"/><i class="fa fa-search fa-5x"></i></br>Pesquisar Evento</button>
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
