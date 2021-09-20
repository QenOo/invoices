<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoices.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoice  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(invoice $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoice  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoice  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice $invoices)
    {
        //
    }
}
