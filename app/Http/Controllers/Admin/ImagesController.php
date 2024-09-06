<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller
{
    public function upload(Request $request){
        if($request->hasFile('file')){
            $file = $request->file('file');
            $path = public_path(). '/images/' ;
            $fileName = time() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $fileUri = '/images/'. $fileName;

            $image = new Image();
            $image->url = $fileUri;
            $image->save();
        
            return response()->json([
                'success' => 'Imagen subida con éxito',
                'id' => $image->id
            ]);
        }

        return response()->json([
            'error' => 'No se cargo ningun archivo',
        ]);
    }

    public function updateImageOrder(Request $request){
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            $image = Image::find($id);
            if ($image) {
                $image->order = $index + 1;
                $image->save();
            }
        }
        return response()->json(['status' => 'success']);
    }


    public function destroy($id, Request $request){
        $image = Image::find($id);
        $image->products()->detach();
        $image->delete();

        return redirect()->back()->with('message', 'Imagen eliminada con éxito!');    
    }
}
