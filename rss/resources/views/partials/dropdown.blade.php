<div class="row">
  <div class="col-4">
    <div class="btn-group dropend mb-3">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Ordenar por:
      </button>
      <ul class="dropdown-menu p-2 list-unstyled">
        <li><a href="{{ $variable ?? '' ? route('news.search.show',[$variable,'title']) : route('news','title') }}" class="text-decoration-none">Titulo</a></li>
        <li><a href="{{ $variable ?? '' ? route('news.search.show',[$variable,'description']) : route('news','description') }}" class="text-decoration-none">Descripcion</a></li>
        <li><a href="{{ $variable ?? '' ? route('news.search.show',[$variable,'date']) : route('news','date') }}" class="text-decoration-none">Fecha</a></li>
      </ul>
    </div>
  </div>
  <div class="col-8">
  @if(count($news)>0)
              {{ $news->links() }}
            
            @endif     
  </div>
</div>
