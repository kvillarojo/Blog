<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\users\Post;
use App\Http\Requests\PostStoreRequest;
// use App\Http\Resources\Posts as PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        return view('admin.pages.post.index');
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
        try {

            // if($request->hasFile('cover_image')){
            //     // get filename with extention
            //     $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //     // get just filename
            //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //     // Get just ext
            //     $extension = $request->file('cover_image')->getClientOriginalExtension();
            //     // filename to store
            //     $filenNameToStore = $filename.'_'. time().'.'.$extension;
            //     // upload the image
            //     $path  = $request->file('cover_image')->storeAs('public/cover_images', $filenNameToStore);
            // }else{
            //     $filenNameToStore = "no_image.jpg";
            // }
    
            // // insert posts
            // $post =  new Post();
            // $post->title = ucwords($request->input('title'));
            // $post->body = $request->input('body');
            // $post->user_id = auth()->user()->id;
            // $post->cover_image = $filenNameToStore;
           
            // if ($post->save()) {
            //     return redirect('/posts')->with('success', 'Post Created');   
            // }else{
            //     return redirect('/posts.create')->with('error', 'Unable to create post');
            // }
 
            $posts = new Post();

            $data = array(
                'title' => $request->input('title'),
                'subtitle' => $request->input('sub-title'),
                'slug' => $request->input('slug'),
                'body' => $request->input('post'),
                'posted_by' => 1,
                'image' => $posts->uploadImg('cover_image'),
            );
                if ($posts->create($data)) {
                    return redirect('/admin/post')->with('success', 'Post Created');
                }
            } catch (\Exception $e) {
                // return redirect('/admin/post')->with('success', 'Post Created');
                return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();       
            }
            // return response()->json($request, 404);
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
