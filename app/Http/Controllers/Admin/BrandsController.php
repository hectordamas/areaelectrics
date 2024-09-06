<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Brand;

class BrandsController extends Controller
{
    public function index(){
        $brands = Brand::orderBy('order')
        ->orderBy('id')
        ->get();

        return view('admin.brands.index', [
            'brands' => $brands
        ]);
    }

    public function create(){
        return view('admin.brands.create');
    }

    public function store(Request $request){
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->save();

        $brand->slug = $brand->slug . '-' . $brand->id;
        $brand->save();

        return redirect()->back()->with('message', 'Marca Registrada con éxito!');
    }

    public function edit($id, Request $request){
        $brand = Brand::find($id);

        return view('admin.brands.edit', [
            'brand' => $brand
        ]);
    }

    public function update($id, Request $request){
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->save();

        $brand->slug = $brand->slug . '-' . $brand->id;
        $brand->save();
        
        return redirect()->back()->with('message', 'Marca modificada con éxito!');
    }
    public function delete($id){
        $brand = Brand::find($id);
        foreach($brand->products as $p){
            $p->brand_id = NULL;
            $p->save();
        }
        $brand->delete();

        return redirect()->back()->with('message', 'Marca eliminada con exito!');
    }

    public function updateBrandsOrder(Request $request){
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            $brand = Brand::find($id);
            if ($brand) {
                $brand->order = $index + 1;
                $brand->save();
            }
        }
        return response()->json(['status' => 'success']);
    }

}
