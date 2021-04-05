<div class="btn-group dropend mb-3">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Ordenar por:
    </button>
    <ul class="dropdown-menu p-2 list-unstyled">
      <li><a href="{{route('news.ordenar','titulo')}}" class="text-decoration-none">Titulo</a></li>
      <li><a href="{{route('news.ordenar','descripcion')}}" class="text-decoration-none">Descripcion</a></li>
      <li><a href="{{route('news.ordenar','fecha')}}" class="text-decoration-none">Fecha</a></li>
    </ul>
  </div>
  </div>