@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Tutte le Categorie</h1>
          @if (Auth::user()->can('modificare'))
          <a href="{{ route('categories.create' )}}" class="btn btn-primary">Crea Nuova</a>
          @endif
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Slug</th>
              @if (Auth::user()->can('modificare'))
                <th>Edit</th>
              @endif
              <th>Visualizza</th>
              @if (Auth::user()->can('modificare'))
                <th>Elimina</th>
              @endif
            </tr>
          </thead>

          <tbody>
            @forelse ($categories as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                @if (Auth::user()->can('modificare'))
                  <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success">Edit</a>
                  </td>
                @endif
                <td>
                  <a href="{{ route('categories.show', $category->id)}}" class="btn btn-primary">View</a>
                </td>
                @if (Auth::user()->can('modificare'))
                  <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="Elimina" class="btn btn-danger">
                    </form>
                  </td>
                @endif
              </tr>
            @empty
              <p>Non ci sono categorie</p>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
