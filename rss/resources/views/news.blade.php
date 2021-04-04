@extends('layout.app')
@section('content')
    <h1>Rss</h1>

    <div class="container">
    {{ $news->links() }}
    @foreach($news as $new)

    <div class="card  mb-2">
  <div class="card-header">
    {{$new->title}}
  </div>
  <div class="card-body">
    <h5 class="card-title">  {{$new->author}}</h5>
    <p class="card-text">  {{$new->description}}</p>
    <a href="{{$new->link}}" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
@endforeach

    </div>

@endsection