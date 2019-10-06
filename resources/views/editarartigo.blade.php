@extends('main')  
  @section('conteudo') 
  <div class = "container" style="margin-top: 15px;">
    @foreach($artigo as $a)
  <form action="/editarartigo" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{$a->titulo}}">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Autores</label>
          <input type="text" class="form-control" id="autores" name ="autores" placeholder="Autores" value="{{$a->autores}}">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Resumo</label>
        <textarea type="textarea" rows="5" class="form-control" id="resumo" name="resumo" placeholder="Breve resumo do trabalho">{{$a->resumo}}</textarea>
      </div>
      <input id="id" name="id" type="hidden" value="{{$a->id}}">
      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Selecione o Evento que deseja Participar</label>
  <select class="custom-select my-1 mr-sm-2" name="evento" id="inlineFormCustomSelectPref" style="margin-bottom: 20px;" value="{{$a->evento}}">
    <option selected>Escolha...</option> 
    @foreach($eventos as $p)
    <option value = "{{$p->nome}}">{{$p->nome}}</option>
    @endforeach
  </select>

      <div class="custom-file">
          <input type="file" class="custom-file-input" name='artigodoc' id="validatedCustomFile" accept="application/pdf" value="{{$a->artigodoc}}">
          <label class="custom-file-label" for="validatedCustomFile">Escolher arquivo PDF...</label><br>
        </div><br>
        <button style="margin-top: 20px;" type="submit" class="btn btn-success">Editar Artigo</button>
      </div>
      @endforeach
  @stop