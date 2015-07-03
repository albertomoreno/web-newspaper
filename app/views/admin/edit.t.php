
@extends('base.t')

@section('content')

 <h2>Modificar noticia</h2>

 <form action="/admin/news/{{ $news->id }}/edit" method="POST" enctype="multipart/form-data">
  <div class="form-group">       
    <label class="form-label" for="title">Titulo</label>
    <input class="form-control" type="text" placeholder="Titulo" name="title" id="title" value="{{ $news->title }}">
  </div>

  <div class="form-group">       
    <label class="form-label" for="body">Cuerpo</label>
    <textarea class="form-control" placeholder="Cuerpo" name="body" id="body" rows="15">{{ $news->body }}</textarea>
  </div>

  <div class="form-group">  
    <label class="form-label" for="section">Seccion</label>
    <select class="form-control" name="section" id="section">
      @if($news->section === 'internacional')    
        <option selected value="international">Internacional</option>
      @else
        <option value="international">Internacional</option>
      @endif
      @if($news->section === 'sports')      
        <option selected value="sports">Deportes</option>
      @else
        <option value="sports">Deportes</option>
      @endif
      @if($news->section === 'motor')      
        <option selected value="motor">Motor</option>
      @else
        <option value="motor">Motor</option>
      @endif
      @if($news->section === 'technology')      
        <option selected value="technology">Tecnologia</option>
      @else
        <option value="technology">Tecnologia</option>
      @endif
      @if($news->section === 'policy')      
        <option selected value="policy">Politica</option>
      @else
        <option value="policy">Politica</option>
      @endif
    </select>
  </div>



  <div class="form-group">       
    <label class="form-label" for="image">Imagen</label>
    <p>&nbsp;</p>
    @if($news->image)
      <img src="/~76668144/periodicoII/public_html/uploads/images/{{ $news->id }}.jpg">
    @endif
    <p>&nbsp;</p>
    <input type="file" placeholder="Imagen" name="image" id="image">
  </div>
  
  <p>&nbsp;</p>

  <button class="button">Modificar</button>

 </form>


@endsection