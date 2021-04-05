<div class="btn-group dropend mb-3">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Ordenar por:
    </button>
    
    <ul class="dropdown-menu p-2 list-unstyled">
      <li><a href="{{ $variable ?? '' ? route('news.search.show',[$variable,'title']) : route('news','titulo') }}" class="text-decoration-none">Titulo</a></li>
      <li><a href="{{ $variable ?? '' ? route('news.search.show',[$variable,'description']) : route('news','descripcion') }}" class="text-decoration-none">Descripcion</a></li>
      <li><a href="{{ $variable ?? '' ? route('news.search.show',[$variable,'date']) : route('news','fecha') }}" class="text-decoration-none">Fecha</a></li>
    </ul>
  </div>
  </div>