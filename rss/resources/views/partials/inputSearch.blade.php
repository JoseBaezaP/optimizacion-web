<form action="/search" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar" name="search" required>
            <button class="btn btn-secondary" type="submit">Buscar</button>
          </div>
        </form>