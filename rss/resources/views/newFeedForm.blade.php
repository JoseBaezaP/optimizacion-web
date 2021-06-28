@extends('layout.app')
@section('content')
<div class="container addNews"><div class="card text-center mx-auto my-5 w-50">@include('partials.notification')<div class="card-title"><h1>Ingresa tu url de noticias</h1></div>
<div class="card-body"><form method="POST" action="{{route('postfeed')}}">@csrf<input type="text" class="form-control" name="urlfeed" placeholder="Ingresa tu url" required>
<div class="row mt-4 mx-auto"><div class="col-6 text-end"><button type="submit" class="btn btn-primary ">Guardar noticias</button></div>
<div class="col-6 text-start"><a href="/news"><button type="button" class="btn btn-outline-primary">Ver noticias</button></a></div></div></form></div></div></div>
@endsection