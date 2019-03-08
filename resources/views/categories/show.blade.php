@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Categoria: {{ $category->name }}</h1>
        <img src="{{ asset('storage/'. $category->poster)}}" alt="">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Slug</th>
              <th>Creato il</th>
              <th>Aggiornato il</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
