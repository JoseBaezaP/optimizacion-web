<form action="/search" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar" name="search" value="{{ old('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Button</button>
          </div>
        </form>