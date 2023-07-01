<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Auth;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $category =  Category::where('user_id',$user_id)->get();
        return view('admin.category.index',compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        $user_id = Auth::user()->id;
        $category = new Category;
        $category->user_id = $user_id;
        $category->title = $request->title;
        $category->categorytype = $request->categorytype;
        $category->description = $request->description; 
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Category Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', [
            'category' => $category
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $category = new Category;
        $category->user_id = $user_id;
        $category->title = $request->title;
        $category->categorytype = $request->categorytype;
        $category->description = $request->description; 
        $category->update();
        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       $category->delete();
       return redirect()->route('categories.index')->with('success', 'Category Deleted Successfully.');
    }

   
}
