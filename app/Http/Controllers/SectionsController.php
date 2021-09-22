<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
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

        $validatedData = $request->validate([
            'section_name' => ['required', 'unique:sections', 'max:255'],
        ],
        [
            'section_name.required' => 'اسم القسم مطلوب',
            'section_name.unique' => 'قيمة حقل القسم مُستخدمة من قبل'
        ]);

        Section::create([
            'section_name' => $request->section_name,
            'description' => $request->description,
            'created_by' => (Auth::user()->name),
        ]);

        return redirect()->back()->with('add', 'اضافة قسم');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $validatedData = $request->validate([
            'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
        ],
        [
            'section_name.required' => 'اسم القسم مطلوب',
            'section_name.unique' => 'قيمة حقل القسم مُستخدمة من قبل'
        ]);

        $sections_data = Section::find($id);
        $sections_data->update([
            'section_name' => $request->section_name,
            'description' => $request->description
        ]);


        return redirect()->back()->with('edit', 'تعديل القسم');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        Section::find($id)->delete();
        return redirect()->back()->with('deleted', 'حذف القسم');
    }
}
