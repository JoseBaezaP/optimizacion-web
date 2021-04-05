@extends('layout.app')
@section('content')
    <h1>Rss</h1>

    <div class="container">
    <div class="row">
      <div class="col-4 ">
        @include('partials.inputSearch')
      </div>
      <div class="col-3 offset-5">
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
    <a href="{{$new->link}}" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
@endforeach

    </div>

@endsection