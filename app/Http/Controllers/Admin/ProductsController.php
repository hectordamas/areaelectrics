<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function filter(){
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.filter', [
            'brands' => $brands, 
            'categories' => $categories
        ]);
    }

    public function create(){
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.create', [
            'brands' => $brands, 
            'categories' => $categories
        ]);
    }

    public function store(Request $request){
        $product = new Product();
        $product->price = $request->price;
        $product->name = $request->name;
        if($request->brand){
            $product->brand_id = $request->brand;
        }
        $product->description = $request->description;
        $product->hidden = $request->hidden;
        $product->youtube_id = $request->youtube_id;
        $product->slug = Str::slug($request->name);
        $product->save();

        // Actualizar el slug con el ID
        $product->slug = $product->slug . '-' . $product->id;
        $product->save();
    
        // Decodificar el JSON contenido en el primer elemento del array
        $imageIds = json_decode($request->images, true);
    
        // Sincronizar imágenes
        $product->images()->sync($imageIds);
    
        // Sincronizar categorías
        $product->categories()->sync($request->categories);

        // Manejar especificaciones
        if ($request->has('specifications')) {
            foreach ($request->input('specifications') as $specification) {
                $product->specifications()->create([
                    'item' => $specification['item'],
                    'description' => $specification['description'],
                ]);
            }
        }

        // Manejar tallas
        if ($request->has('sizes')) {
            foreach ($request->input('sizes') as $size) {
                $product->specifications()->create([
                    'name' => $size['size'],
                ]);
            }
        }

        // Manejar Colores
        if ($request->has('colors')) {
            foreach ($request->input('colors') as $color) {
                $product->specifications()->create([
                    'name' => $color['color'],
                ]);
            }
        }

        //El crear productos deberia ir a la pantalla de edicion que se va a crear 
        return redirect('products/' . $product->id . '/edit')->with('message', 'Producto creado con éxito!');
    }    

    public function edit($id){
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::find($id);

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function update($id, Request $request){
        $product = Product::find($id);
        $product->price = $request->price;
        $product->name = $request->name;
        if($request->brand){
            $product->brand_id = $request->brand;
        }
        $product->description = $request->description;
        $product->hidden = $request->hidden;
        $product->slug = Str::slug($request->name);
        $product->youtube_id = $request->youtube_id;
        $product->save();

        // Actualizar el slug con el ID
        $product->slug = $product->slug . '-' . $product->id;
        $product->save();
    
        // Decodificar el JSON contenido en el primer elemento del array
        $imageIds = json_decode($request->images, true);
    
        // Sincronizar imágenes
        if(isset($imageIds) && count($imageIds) > 0){
            $product->images()->attach($imageIds);
        }
    
        // Sincronizar categorías
        $product->categories()->sync($request->categories);

        // Manejar especificaciones

        // Eliminar especificaciones antiguas
        $product->specifications()->delete();        
        $product->sizes()->delete();
        $product->colors()->delete();

        // Guardar nuevas especificaciones
        $items = $request->input('item');
        $descriptions = $request->input('specDescription');

        if(isset($items)){
            for($i = 0; $i < count($items); $i++){
                $product->specifications()->create([
                    'item' => $items[$i] ,
                    'description' => $descriptions[$i],
                ]);
            }
        }

        // Guardar nuevas tallas
        $sizes = $request->input('size');

        if(isset($sizes)){
            for($i = 0; $i < count($sizes); $i++){
                $product->sizes()->create([
                    'name' => $sizes[$i] ,
                ]);
            }
        }

        // Guardar nuevas tallas
        $colors = $request->input('color');
        if(isset($colors)){
            for($i = 0; $i < count($colors); $i++){
                $product->colors()->create([
                    'name' => $colors[$i],
                ]);
            }
        }

        //El crear productos deberia ir a la pantalla de edicion que se va a crear 
        return redirect()->back()->with('message', 'Productos guardados con éxito!');
    }    

    public function search(Request $request){
        $products = Product::query()
        ->name($request->name)
        ->filterByCategories($request->categories)
        ->filterByBrands($request->brands)
        ->priceRange($request->minPrice, $request->maxPrice)
        ->createdAtRange($request->startDate, $request->endDate)
        ->get();

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    //Logica Masiva de Productos
    public function handle(Request $request){
        return $this->deleteProducts($request);    
    }

    private function deleteProducts(Request $request)
    {
        if(isset($request->productId) && count($request->productId) > 0){
            for($i = 0; $i < count($request->productId); $i++){
                $product = Product::find($request->productId[$i]);
                $product->images()->detach();
                $product->categories()->detach();
                $product->brand()->delete();
                $product->delete();
            }
        }

        return redirect()->back()->with('message', 'Productos Eliminados con exito!');
    }

    public function importProducts(Request $request)
    {
        // Implementa la lógica para importar productos aquí
        // Validar que el archivo sea un Excel
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);
        
        // Cargar el archivo Excel
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        
        // Seleccionar la primera hoja
        $sheet = $spreadsheet->getActiveSheet();
        
        // Recorrer las filas del Excel
        $data = [];
        foreach ($sheet->getRowIterator() as $row) {
            $rowData = [];
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // Esto recorre todas las celdas

            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue(); // Obtener el valor de la celda
            }

            $data[] = $rowData; // Guardar los datos de la fila
        }
        

        for($i = 1; $i < count($data); $i++){
            $product = new Product();
            $product->name = $data[$i][0];
            $product->description = $data[$i][1];
            $product->price = $data[$i][2];
            $product->save();
        }

        return redirect()->back()->with('message', 'Productos Importados con exito!');
    }

    public function exportProducts(){
        // Crear un nuevo documento de Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Añadir los encabezados de las columnas
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Descripción');
        $sheet->setCellValue('D1', 'Precio');
        $sheet->setCellValue('E1', 'Marca');
        $sheet->setCellValue('F1', 'Categoría Principal');

        // Obtener datos de la base de datos (ejemplo)
        $products = Product::all();

        // Añadir datos a las filas
        $rowNumber = 2; // La fila 1 se usa para los encabezados
        foreach ($products as $product) {
            $sheet->setCellValue('A' . $rowNumber, $product->id);
            $sheet->setCellValue('B' . $rowNumber, $product->name);
            $sheet->setCellValue('C' . $rowNumber, $product->description);
            $sheet->setCellValue('D' . $rowNumber, $product->price);
            $sheet->setCellValue('E' . $rowNumber, $product->brand ? $product->brand->name : '');
            $sheet->setCellValue('F' . $rowNumber, $product->categories()->first() ? $product->categories()->first()->name : '');
            $rowNumber++;
        }

        // Crear un escritor para guardar el archivo Excel
        $writer = new Xlsx($spreadsheet);

        // Crear el archivo temporalmente en el servidor
        $fileName = 'fibersolutions_productos.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        // Enviar el archivo al navegador para descarga
        return Response::download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
    
    
}
