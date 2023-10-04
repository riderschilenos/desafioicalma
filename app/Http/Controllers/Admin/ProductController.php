<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category_product;
use App\Models\Disciplina;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $productos = Producto::all();

        return view('admin.products.index',compact('productos'));
    }

    public function image(Request $request, Producto $producto)
    {   
        //$this->authorize('dicatated',$serie);
        
        
        $request->validate([
            'file'=>'required'
        ]);
        if($producto->image){
            Storage::delete($producto->image);
        }

        $foto = Str::random(10).$request->file('file')->getClientOriginalName();
        $rutafoto = public_path().'/storage/productos/'.$foto;
        $img=Image::make($request->file('file'))->orientate()
            ->resize(600, null , function($constraint){
            $constraint->aspectRatio();
            })
            ->save($rutafoto);
        $img->orientate();

        $producto->update([
            'image'=>'productos/'.$foto,
        ]);    


        return redirect()->route('admin.products.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $disciplinas=Disciplina::pluck('name','id');
        $category_products=Category_product::pluck('name','id');
        return view('admin.products.create',compact('disciplinas','category_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:disciplinas'
        ]);

        $producto = Producto::create($request->all());

        return redirect()->route('admin.products.index')->with('info','El producto se creo con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('admin.products.index')->with('info','El productó se elimino con éxito.');

    }
}
