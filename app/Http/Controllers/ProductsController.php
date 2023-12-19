<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Lists;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
class ProductsController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($list_id)
    {
        $list = Auth::user()->lists()->findOrFail($list_id);
        $products = $list->products()->get();
        
        return view('products.index', compact('products','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('products.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, $id)
    {
        $lists = Auth::user()->lists()->findOrFail($id);
        $lists->products()->create($request->validated());
        return redirect()->route('products.index',$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $product)
    {
        $lists = Auth::user()->lists()->findOrFail($id);
        return view('lists.show', compact('lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $product)
    {
        $list = Auth::user()->lists()->findOrFail($id);
        $product = $list->products()->findOrFail($product);
        return view('products.edit', compact('list','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id, $product)
    {

        $products = Auth::user()->lists()->findOrFail($id)->products()->find($product);
        $products->update($request->validated());

        return redirect()-> route('products.index',$id);
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $product)
    {
        $lists =Auth::user()->lists()->findOrFail($id); 
        $lists->products()->find($product)->delete();
        return redirect()-> route('products.index',$id);
    }
}
