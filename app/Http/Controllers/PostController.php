<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $post=Post::all();
        if($post!=null){
            return response()->json([
                'data'=>$post,
                "message"=>"Found!"
            ]);
        }
        return response()->json([
            'data'=>$post,
            "message"=>"No Data!"
        ]);
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
    {  $post=Post::create($request->all());

        return response()->json([
            "data"=>$post,
            "message"=>"Inserted Successfully!"
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        if($post!=null){
            return response()->json([
                "data"=>$post,
                "message"=>"Found Successfull!"
                ]);
        }
        return response()->json([
            "message"=>"Post Not found in database!"
        ]);
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
        $post = Post::find($id);
        if($post!=null){
            $post->update($request->all());
            return response()->json([
                "message"=>"Updated Succesfully!"
            ]);
        }
        return response()->json([
            "message"=>"Post Not Found in database!"
        ]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post!=null){
            $post->delete();
            return response()->json([
                "message"=>"Deleted Successfully!"
            ]);
        }
        return response()->json([
            "message"=>"Post Not fond in database!"
        ]);
       
    }
}
