
@extends('base.t')

@section('content')

  <h2>Noticias</h2>

  <a href="/admin/news/add" class="button">Añadir</a>
  
  <table class="table">
    <thead>
    <tr>
      <th>Titulo</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($news as $item)
      <tr> 
        <td class="table-title">{{ $item->title }}</td>
        <td><a class="button" href="/admin/news/{{ $item->id }}/edit">Modificar</a>
          <form action="/admin/news/{{ $item->id }}/delete" method="POST">
            <button class="button">Eliminar</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
  </table>


@endsection
