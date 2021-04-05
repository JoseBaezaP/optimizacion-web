@extends('layout.app')
@section('content')
    <h1>Rss</h1>

    <div class="container">
    <div class="row">
      <div class="col-4 ">
        <form action="/search" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar" name="search">
            <button class="btn btn-outline-secondary" type="submit">Button</button>
          </div>
        </form>
      </div>


      <div class="col-3 offset-5">
        @if(count($news)>0)
          {{ $news->links() }}
        
        @endif
      </div>
    </div>

    <div>
<h5>Ordenar por:</h5>

<a href="{{route('news.ordenar','titulo')}}">Titulo</a>
<a href="{{route('news.ordenar','descripcion')}}">Descripcion</a>
<a href="{{route('news.ordenar','fecha')}}">Fecha</a>

</div><br>
    @foreach($news as $new)

    <div class="card  mb-2">
    <div class="card-header">
    <div class="row">
      <div class="col-8">
        {{$new->title}}
      </div>
      <div class="col-4 text-end">
        <span>{{$new->date}}</span>
      </div>
    </div>
    </div>
  <div class="card-body">
    <p class="card-text">  {{$new->description}}</p>
    <a href="{{$new->link}}" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
@endforeach

    </div>

@endsection