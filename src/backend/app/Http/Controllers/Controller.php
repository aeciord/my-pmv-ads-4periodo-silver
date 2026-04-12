<?php

  namespace App\Http\Controllers;

  use App\Models\Category;
  use Illuminate\Http\Request;

  class CategoryController extends Controller
  {
      public function index()
      {
          return response()->json(Category::orderBy('name')->get());
      }

      public function store(Request $request)
      {
          $data = $request->validate([
              'name' => 'required|string|max:255|unique:categories,name',
              'description' => 'nullable|string|max:255'
          ]);

          $category = Category::create($data);

          return response()->json([
              'message' => 'Categoria criada',
              'data' => $category
          ], 201);
      }

      public function show($id)
      {
          $category = Category::findOrFail($id);
          return response()->json($category);
      }

      public function update(Request $request, $id)
      {
          $category = Category::findOrFail($id);

          if ($category->transactions()->exists()) {
              return response()->json(['message' => 'Não é possível editar categoria com transações'], 400);
          }

          $data = $request->validate([
              'name' => 'required|string|max:255|unique:categories,name,' . $category->_id,
              'description' => 'nullable|string|max:255'
          ]);

          $category->update($data);

          return response()->json([
              'message' => 'Categoria atualizada',
              'data' => $category
          ]);
      }

      public function destroy($id)
      {
          $category = Category::findOrFail($id);

          if ($category->transactions()->exists()) {
              return response()->json(['message' => 'Não é possível deletar categoria com transações'], 400);
          }

          $category->delete();

          return response()->json(['message' => 'Categoria deletada']);
      }
  }
