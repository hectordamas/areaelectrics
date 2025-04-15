<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category};
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::orderBy('order')
        ->orderBy('id')
        ->get();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create(){
        $categories = Category::orderBy('order')
        ->whereNull('parent_id')
        ->orderBy('id')
        ->get();

        return view('admin.categories.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->category;
        $category->slug = Str::slug($request->name);
        $category->save();

        $category->slug = $category->slug . '-' . $category->id;
        $category->save();

        return redirect()->back()->with('message', 'Categoría registrada con éxito!');
    }

    public function edit($id){
        $category = Category::find($id);

        $categories = Category::orderBy('order')
        ->whereNull('parent_id')
        ->orderBy('id')
        ->get();

        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => $categories

        ]);
    }

    public function update($id, Request $request){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->parent_id = $request->category;
        $category->save();

        $category->slug = $category->slug . '-' . $category->id;
        $category->save();


        return redirect()->back()->with('message', 'Categoria modificada con exito');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->products()->detach();
        $category->delete();

        return redirect()->back()->with('message', 'Categoria eliminada con exito!');
    }

    public function updateCategoriesOrder(Request $request){
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            $category = Category::find($id);
            if ($category) {
                $category->order = $index + 1;
                $category->save();
            }
        }
        return response()->json(['status' => 'success']);
    }


}

