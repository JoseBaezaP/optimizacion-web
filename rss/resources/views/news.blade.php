@extends('layout.app')
@section('content') 
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h1 class="m-2"><a href="/news" class="text-decoration-none">Rss</a> </h1>
        </div>
        <div class="col-6 d-flex align-refresh">
          <a href="/news" class="m-2 text-decoration-none">Actualizar</a>
        </div>
      </div>
        <div class="row">
          <div class="col-4 ">
            @include('partials.inputSearch')
          </div>
          <div class="col-8 text-end">
            <a href="/"><button type="button" class="btn btn-outline-primary">Agregar más noticias</button></a>  
          </div>
        </div>
        @include('partials.dropdown')
      <div>
      @if(count($news)>0)
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
            <a href="{{$new->link}}" class="btn btn-primary" target="__blank" rel="nofollow noopener noreferrer">Leer noticia</a>
          </div>
        </div>
        @endforeach
      @else
        <div class="p-3 mb-2 bg-light text-dark">No se encontraron noticias.</div>
      @endif
    </div>
@endsection