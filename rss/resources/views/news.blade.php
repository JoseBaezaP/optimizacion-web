@extends('layout.app')
@section('content') 
    <div class="container">
    <h1 class="m-2"><a href="/news" class="text-decoration-none">Rss</a> </h1>
    <div class="row">
      <div class="col-4 ">
        @include('partials.inputSearch')
      </div>
      <div class="col-8">
        @if(count($news)>0)
          {{ $news->links() }}
        
        @endif
      </div>
    </div>
  <div>
    @include('partials.dropdown')
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

    </div>

@endsection