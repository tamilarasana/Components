<?php

namespace App\Http\Controllers\Webpage;

use App\Models\Category;
use App\Models\Resource;
use App\Models\Categorytype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components = Category::all();
        return view('Client.layout.webmaster',compact('components'));
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
    public function showComponents($id)
    {
        $datas = Category::findOrfail($id);
        $data = $datas->categorytype;
        $categorytype = Categorytype::with('users')->where('status',1)->where('category_id',$id)->get();
        $components = Category::where('categorytype',$data)->where('status',1)->get();
       return view('Client.viewcomponents',['categorytype'=>$categorytype,'components'=>$components]);

    }


public function resourceShow($id){

    $datas = Category::findOrfail($id);
    $data = $datas->categorytype;
    $resource = Resource::with('images','users')->where('status',1)->where('category_id',$id)->get();
    $category = Category::where('categorytype',$data)->where('status',1)->get();
    return view('Client.resourceview',['resource'=>$resource,'category'=>$category]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


    public function search(Request $request){

        $search = $request->input('search');
            $posts = Category::with('categorytype')
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
            $components = Category::all();
            
        return view('Client.search',['posts'=>$posts,'components' => $components]);
    }


    public function getdata($id){

        $categorytype = Categorytype::findOrFail($id);
         return response()->json($categorytype);
    }

 
    public function getComponent(Request $request,  $component)
    {
        $component  = $component;
        $components = Category::where('status',1)->where('categorytype',$component)->get();
        $categorytype = Categorytype::all();
        return view('Client.component',['components' =>$components,'categorytype'=>$categorytype]);
    }

    public function getResources(Request $request,  $resources)
    {
        $resource  = $resources;
        // $resource = Resource::with('images','users')->where('status',1)->where('category_id',$id)->get();

        $resources = Category::where('status',1)->where('categorytype',$resource)->get();
        $resourcetype = Resource::with('images')->get();

        return view('Client.resource',['resources' =>$resources,'resourcetype'=>$resourcetype]);
    
    }
}
