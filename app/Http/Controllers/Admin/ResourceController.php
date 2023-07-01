<?php

namespace App\Http\Controllers\Admin;

use id;
use Auth;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\Resourceimage;
use App\Http\Controllers\Controller;
use DB;
use Storage;


class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $resource = Resource::with('category')->where('user_id',$user_id)->get();
        return view('admin.resources.index',compact('resource'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $category = Category::where('user_id',$user_id)->get();
        return view('admin.resources.create',compact('category'));
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
        $resource = new Resource;
        $resource->category_id = $request->category_id;
        $resource->user_id = $user_id;
        $resource->category_type = $request->category_type;
        $resource->description = $request->description;
        $resource->save();
        if($request->has('resourceimg')){
            $images = $request->file('resourceimg');
            foreach ($images as $key => $imagefile) {
                $imageName = $key.'-'.time().'.'.$imagefile->extension(); 
                $path =  $imagefile->storeAs('resourceimg',$imageName,'public');
                $resourceimage = new Resourceimage;
                $resourceimage->user_id = $user_id;
                $resourceimage->resourceimg = $path;
                $resourceimage->resource_id = $resource->id;
                $resourceimage->save();
            }
        }

        return redirect()->route('resources.index')
        ->with('success', 'Resources Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $resource = Resource::findOrFail($id);
        // with('images')->where('id',$id)->get();
        // dd($resource->images);
        $category = Category::all();
        return view('admin.resources.edit', ['category' =>$category,'resource'=>$resource]);


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
        $resource = Resource::findOrFail($id);
        // $user_id = Auth::user()->id;
        $resource->category_id = $request->category_id;
        $resource->user_id = $user_id;
        $resource->category_type = $request->category_type;
        $resource->description = $request->description;
        $resource->update();
        if($request->has('resourceimg')){
            $img_del = Resourceimage::where('resource_id',$id)->get();
            foreach($img_del as $img) {
                Storage::delete('/public/'.$img->resourceimg);
            }
            Resourceimage::where('resource_id',$id)->delete();

                $images = $request->file('resourceimg');
                foreach ($images as $key => $imagefile) {
                    $imageName = $key.'-'.time().'.'.$imagefile->extension(); 
                    $path =  $imagefile->storeAs('resourceimg',$imageName,'public');

                    DB::table('resourceimages')->where('id',$id)->insert([
                        'resource_id' => $resource->id,
                        'user_id' => $user_id,
                        'resourceimg' => $path,
                    ]);
                }
        }
        return redirect()->route('resources.index')
        ->with('success', 'Resources Created Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);
        $img_del = Resourceimage::where('resource_id',$resource->id)->get();
        foreach($img_del as $img) {
            Storage::delete('/public/'.$img->resourceimg);
        }
        Resourceimage::where('resource_id',$resource->id)->delete();
        $resource->delete();
        return redirect()->route('resources.index')
        ->with('success', 'Resources Created Successfully.');
    }
}



