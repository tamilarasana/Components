<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\Category;
use App\Models\Categorytype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CategorytypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $categorytype =  Categorytype::with('category')->where('user_id',$user_id)->get();
        return view('admin.categorytype.index',compact('categorytype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.categorytype.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->file('categorytype_img')) {
        //     $imageName = time().'.'.$request->categorytype_img->extension(); 
        //     $path=   $request->categorytype_img->storeAs('categorytype',$imageName,'public');
        // }    
        $user_id = Auth::user()->id;
        $categorytype = new Categorytype;
        $categorytype->category_id = $request->category_id;
        $categorytype->user_id = $user_id;
        $categorytype->html = $request->html;
        $categorytype->title = $request->title;
        $categorytype->description = $request->description;
        $categorytype->css = $request->css;
        // $categorytype->categorytype_img = $path;
        $categorytype->javascript = $request->javascript;
        $categorytype->save();
        return redirect()->route('categorytype.index')
        ->with('success', 'categorytype Created Successfully.');

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
        return view('admin.categorytype.show', ['categorytype' => $categorytype, 'category' => $category ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorytype = Categorytype::findOrFail($id);
        $category = Category::all();
        return view('admin.categorytype.edit', ['categorytype' => $categorytype, 'category' => $category ]);
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
        $user_id = Auth::user()->id;
        $categorytype = Categorytype::findOrFail($id);
        $categorytype->category_id = $request->category_id;
        // $categorytypeimg = $categorytype ->categorytype_img; 
        $categorytype->user_id = $user_id;
        $categorytype->title = $request->title;
        $categorytype->description = $request->description;
        $categorytype->html = $request->html;
        $categorytype->css = $request->css;
        $categorytype->javascript = $request->javascript;

        // if($request->file('categorytype')) { 
        //     if($categorytypeimg){
        //         Storage::delete('/public/'.$categorytypeimg);
        //     }
        // $imageName = time().'.'.$request->categorytype_img->extension();  
        // $categorytype_img =   $request->categorytype_img->storeAs('categorytype',$imageName,'public');
        // $categorytype->categorytype_img = $categorytype_img;
        // }    
     $categorytype->update();
     return redirect()->route('categorytype.index')
             ->with('success', 'categorytype Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorytype = Categorytype::findOrFail($id);

        $categorytype->delete();
        Storage::delete('/public/'.$categorytype->categorytype_img);
        return redirect()->route('categorytype.index')
                         ->with('success','categorytype Deleted successfully');  
    }


 
}
