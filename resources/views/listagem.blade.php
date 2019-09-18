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
            font-style: italic;">{{$p->estadoRevisao}}</h2></dl>
          <dl class="list-group-item">
              <form action="RemoverPergunta" method="post"> 
                  <input type="text"  hidden="" value="" name="id"> 
                  <button type="submit" onClick="" id="DeletarUsuario"  value="Deletar Pergunta" class="btn btn-outline-danger btn-sm btn-responsive">
                      <i class="fa fa-trash-o">
                      </i> Excluir Envio
                  </button>
              </form>
          </dl>
      </ul>
      </div>             
      @endforeach
    </table>
  </div>
@stop
