<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        $products = products::all();
        return view('products.index', compact('products', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'product_name' => ['required', 'unique:products', 'max:255'],
            'section_id' => 'required'
        ],
        [
            'product_name.required' => 'حقل اسم المنتج مطلوب.',
            'section_id.required' => ' حقل المنتج مطلوب.'
        ]);

        products::create([
            'product_name' =>   $request->product_name,
            'section_id' =>     $request->section_id,
            'description' =>    $request->description,
        ]);

        return redirect()->back()->with('add', ' نم اضافة منتج');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = Section::where('section_name', $request->section_id)->first()->id;

        $Products = products::findOrFail($request->id);

        $Products->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'section_id' => $id,
        ]);

        return redirect()->back()->with('add', 'تعديل المنتج');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        products::find($request->id)->delete();

        return redirect()->back()->with('deleted', ' حذف المنتج ' . $request->products_name);
    }
}
