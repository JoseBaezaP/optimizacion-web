@extends('layout.app')
@section('content')
<div class="container">@include('partials.notification')<div class="row"><div class="col-2"></div><div class="col-8"><div class="row"><image src="\images\evolution.png" class="navbar-brand w-100">
<div class="col-12 d-flex align-refresh"><form action="/refresh" method="post">@csrf<button type="submit" class="m-2 btn btn-primary">Actualizar</button></form></div></div><div class="row">
<div class="col-4 ">@include('partials.inputSearch')</div><div class="col-8 text-end"><a href="/post-feed"><button type="button" class="btn btn-primary">Agregar más noticias</button></a></div></div>
@include('partials.dropdown')
<div>
@if(count($news)>0)
@foreach($news as $new)
<div class="card  mb-2"><div class="card-header"><div class="row"><div class="col-8">{{$new->title}}</div><div class="col-4 text-end"><span>{{$new->date}}</span></div></div></div><div class="card-body">
<p class="card-text"> {{$new->description}}</p><a href="{{$new->link}}" class="btn btn-primary" target="__blank" rel="nofollow noopener noreferrer">Leer noticia</a></div></div>@endforeach
@else<div class="p-3 mb-2 bg-light text-dark">No se encontraron noticias.</div>@endif</div></div></div></div>
@endsection