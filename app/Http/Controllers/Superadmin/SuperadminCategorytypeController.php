<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Category;
use App\Models\Categorytype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperadminCategorytypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorytype =  Categorytype::with('category')->get();
        return view('superadmin.categorytype.index',compact('categorytype'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorytype = Categorytype::findOrFail($id);
        $category = Category::all();
        return view('superadmin.categorytype.show', ['categorytype' => $categorytype, 'category' => $category ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function StatusChange(Request $request,  $id)
    {
        $categorytype = Categorytype::findOrFail($id);
        $categorytype->status = $request->status;
        $categorytype->update();
        return response()->json(['success'=>'Status change successfully.']);
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
    public function destroy($id)
    {
        //
    }
}
