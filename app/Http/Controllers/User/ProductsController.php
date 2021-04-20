<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
{

    public function mostrar()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.inicio', compact('products'));
    }

    public function ircrear()
    {
        return view('products.createProducts');
    }

    public function store(Request $request)
    {
        $newProduct = new Product;
        $newProduct->descripcion = $request->input('description');
        $newProduct->precio = $request->input('price');
        $newProduct->save();

        Alert::success('Carga completada', 'Se cargo con éxito el producto');;
        return redirect()->route('products.index');
    }


    public function showedit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.editProducts', compact('product'));

    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->descripcion = $request->input('description');
        $product->precio = $request->input('price');
        $product->save();

        Alert::success('Actualización', 'Producto actualizado con Exito');
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Alert::info('Eliminación', 'Producto Eliminado Exitosamente');
        return redirect()->route('products.index');
    }
}
