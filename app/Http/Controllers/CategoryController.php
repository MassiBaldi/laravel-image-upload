<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:vedere');
      $this->middleware('permission:modificare')->except(['index', 'show']);
    }
    
    public function index()
    {
      $categories = Category::all();

      return view('categories.index', compact('categories'));
    }


    public function create()
    {
      $data = [
        'h1' => 'Crea nuova categoria',
        'action' => route('categories.store'),
        'method' => 'POST'
      ];
      return view('categories.create_edit', $data);
    }

    public function store(Request $request)
    {
      $data = $request->all();

      $data['slug'] = Str::slug($data['name']);

      $newCategory = new Category;

      $newCategory->fill($data);

      $newCategory->save();

      return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
      $categories = Category::all();
      return view('categories.show', compact('category', 'categories'));
    }

    public function edit(Category $category)
    {
      $data = [
        'h1' => 'Edita la categoria '. $category->name,
        'action' => route('categories.update', $category->id),
        'method' => 'PUT',
        'category' => $category
      ];
      return view('categories.create_edit', $data);
    }


    public function update(Request $request, Category $category)
    {
      $data = $request->all();

      //$poster = Storage::disk('public')->put('categories_poster', $data['poster_file']);

      $data['slug'] = Str::slug($data['name']);

      //$data['poster'] = $poster;

      $category->update($data);

      return redirect()->route('categories.index');

    }

    public function destroy(Category $category)
    {
      $category->delete();

      return redirect()->route('categories.index');
    }
}
