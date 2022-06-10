<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function storage(Request $request)
    {
        $category = Category::create($request->all());
        if ($category) return redirect()->back()->with('success','Categoria adicionada com sucesso!');
        return redirect()->back()->with('danger','Falha ao adicionada categoria!');
    }

    public function update(Request $request, int $id)
    {
        $category = Category::find($id);
        if (!$category) return redirect()->back()->with('danger','Categoria não encontrada!');
        $category->update($request->all());
        return redirect()->back()->with('success','Categoria actualizada com sucesso!');
    }

    public function delete(int $id)
    {
        $category = Category::find($id);
        if (!$category) return redirect()->back()->with('danger','Categoria não encontrada!');
        $category->delete();
        return redirect()->back()->with('success','Categoria removida com sucesso!');
    }
}
