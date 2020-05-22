<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=product::paginate();

        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $logs = new Controller;
        $logs->logs("Creacion De Archivos", Auth::user()->id, Auth::user()->name);

        $product=Product::create($request->all());
        return redirect()->route('products.edit',$product->id)
        ->with('info','Producto Guardado Con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
        $logs = new Controller;
        $logs->logs("Ver Archivos", Auth::user()->id, Auth::user()->name);

        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
        $logs = new Controller;
        $logs->logs("Modificacion De Archivos", Auth::user()->id, Auth::user()->name);

        $product->update($request->all());

        return redirect()->route('products.edit',$product->id)
        ->with('info','Producto Actualizado Con Exito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
        $logs = new Controller;
        $logs->logs("Eliminar Archivos", Auth::user()->id, Auth::user()->name);

        $product->delete();

        

        return back()->with('info','Eliminado Correctamente');
    }
}
