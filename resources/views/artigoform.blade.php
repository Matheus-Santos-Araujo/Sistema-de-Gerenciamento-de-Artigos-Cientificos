@extends('main')  
  @section('conteudo') 
  <div class = "container" style="margin-top: 15px;">
  <form action="criarartigo" method="post">
    	<input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Autores</label>
          <input type="text" class="form-control" id="autores" name ="autores" placeholder="Autores">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Resumo</label>
        <input type="textarea" rows="5" class="form-control" id="resumo" name="resumo" placeholder="Breve resumo do trabalho">
      </div>
      <div class="custom-file">
          <input type="file" class="custom-file-input" id="validatedCustomFile">
          <label class="custom-file-label" for="validatedCustomFile">Escolher arquivo...</label><br>
        </div><br>
        <button style="margin-top: 20px;" type="submit" class="btn btn-success">Enviar Artigo</button>
      </div>
  @stop