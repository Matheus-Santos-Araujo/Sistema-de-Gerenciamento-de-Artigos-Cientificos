@extends('main')  
  @section('conteudo') 
  <div class = "container" style="margin-top: 15px;">
  <form action="criarevento" method="post">
    	<input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Sigla</label>
          <input type="text" class="form-control" id="sigla" name ="sigla" placeholder="Sigla">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Abertura</label>
        <input type="textarea" rows="5" class="form-control" id="abertura" name="abertura" placeholder="Abertura">
      </div>
      <div class="form-group">
            <label for="inputAddress">Deadline</label>
            <input type="textarea" rows="5" class="form-control" id="deadline" name="deadline" placeholder="Deadline">
          </div>
           <div class="form-group">
        <label for="inputAddress">Área de Concentração</label>
        <input type="textarea" rows="5" class="form-control" id="areaconcentracao" name="areaconcentracao" placeholder="Área de Concentração">
      </div>
      <div class="form-group">
          <label for="inputAddress">Palavras chave</label>
          <input type="textarea" rows="5" class="form-control" id="palavrachave" name="palavrachave" placeholder="Palavras chave">
        </div>
        <button style="margin-top: 20px;" type="submit" class="btn btn-success">Criar Evento</button>
      </div>
  @stop