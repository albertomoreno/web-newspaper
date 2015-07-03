
@extends('base.t')

@section('content')

 <h2>Añadir una noticia</h2>

 <form action="/admin/news/add" method="POST" enctype="multipart/form-data">
  <div class="form-group">       
    <label class="form-label" for="title">Titulo</label>
    <input class="form-control" type="text" placeholder="Titulo" name="title" id="title">
  </div>

  <div class="form-group">       
    <label class="form-label" for="body">Cuerpo</label>
    <textarea class="form-control" placeholder="Cuerpo" name="body" id="body" rows="15"></textarea>
  </div>

  <div class="form-group">  
    <label class="form-label" for="section">Seccion</label>
    <select class="form-control" name="section" id="section">
      <option value="international">Internacional</option>
      <option value="sports">Deportes</option>
      <option value="motor">Motor</option>
      <option value="technology">Tecnologia</option>
      <option value="policy">Politica</option>
    </select>
  </div>

  <div class="form-group">       
    <label class="form-label" for="image">Imagen</label>
    <p>&nbsp;</p>
    <input type="file" placeholder="Imagen" name="image" id="image">
  </div>
  
  <p>&nbsp;</p>

  <button class="button">Añadir</button>

 </form>


@endsection