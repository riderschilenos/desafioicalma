<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Category_product;
use App\Models\Marca;
use App\Models\Marcasmartphone;
use App\Models\Modelo;
use App\Models\Orden;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Smartphone;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;


class PedidosOrdens extends Component
{   
    use WithFileUploads;
   

    public $pedido, $pedido_id, $file, $category_product, $selectedproduct, $selectedcategory, $producto_id, $products, $marcas, $selectedmarca, $modelos, $modelo_id;
    public $smartphones, $talla, $smartphone_id, $name, $numero, $detalle, $subtotal, $image, $category_id;

    public function mount(Pedido $pedido){

        $this->pedido=$pedido;

        $this->pedido_id=$pedido->id;

        $this->category_products = Category_product::all();

    }

    public function render()
    {   
        

        return view('livewire.vendedor.pedidos-ordens');
    }

    public function updatedselectedcategory($category_product){
        
        $this->products = Producto::where('category_product_id',$category_product)->get();
        
        $this->category_id = $category_product;
    
    }

    public function updatedselectedproduct($producto_id){
        
        $disciplina_id = Producto::find($producto_id)->disciplina_id;
        $category_product_id = Producto::find($producto_id)->category_product_id;
        $this->producto_id = $producto_id;

        $this->marcas = Marca::where('disciplina_id',$disciplina_id)->get();
        
        if($category_product_id == 1){
            $this->smartphones = Smartphone::where('stock', '>=', 1)
                                            ->orderby('marcasmartphone_id','ASC')
                                            ->orderby('modelo','ASC')
                                            ->get();
        }
    
    }

    public function select_product($id){
        $this->producto_id=$id;
        $producto_id=$id;
        $this->selectedproduct =$id;

        $category_product_id = Producto::find($producto_id)->category_product_id;

        $this->category_product =$category_product_id;
        $this->selectedcategory =$category_product_id;
        $this->products = Producto::where('category_product_id',$this->category_product)->get();
        
        $this->category_id = $this->category_product;

        
       
        $disciplina_id = Producto::find($producto_id)->disciplina_id;
        
        $this->producto_id = $producto_id;

        $this->marcas = Marca::where('disciplina_id',$disciplina_id)->get();
        
        if($category_product_id == 1){
            $this->smartphones = Smartphone::where('stock', '>=', 1)
                                            ->orderby('marcasmartphone_id','ASC')
                                            ->orderby('modelo','ASC')
                                            ->get();
        }
    
    }

    public function updatedselectedmarca($marca_id){
        
        $this->modelos = Modelo::where('marca_id',$marca_id)->get();
        
    }



    public function store(){

        $rules = [
            'producto_id'=>'required'
        ];
        
        $this->validate ($rules);
        
        $orden= Orden::create([
            'producto_id'=> $this->producto_id,
            'modelo_id'=> $this->modelo_id,
            'talla'=> $this->talla,
            'smartphone_id'=>$this->smartphone_id,
            'name'=>$this->name,
            'numero'=>$this->numero,
            'detalle'=>$this->detalle,
            'pedido_id'=>$this->pedido_id,
        ]);

        if($this->image){
                
            $foto = Str::random(10).$this->image->getClientOriginalName();
            $rutafoto = public_path().'/storage/ordens/'.$foto;
            $img=Image::make($this->image)->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();

            $orden->referencia()->create([
                'url'=>'ordens/'.$foto
            ]);

        }else{
            $foto='nn';
        }


        
        $this->reset(['producto_id','modelo_id','talla','smartphone_id','name','numero','detalle','selectedmarca','selectedproduct','selectedcategory','products','smartphones','image']);

        $this->pedido = Pedido::find($this->pedido_id);

    }

    public function destroy(Orden $orden){
        $orden->delete();
        $this->pedido = Pedido::find($this->pedido_id);
    }
}
