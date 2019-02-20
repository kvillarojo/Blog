<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\users\Post;
use App\Model\users\post_tag;
use App\Model\users\categories as Category;
use App\Model\users\Category_post;
use App\Model\users\Tag;

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
        $post = Post::all();
    
        if (!empty($post)) {
            return view('admin.pages.post.index')->with('posts', $post);    
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = [];
        $category = Category::all('id', 'name as text');
        $tags = Tag::all('id', 'name as text');
        return view('admin.pages.post.create')->with(array('tags' => $tags, 'categories' => $category));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {

        try {

            $post = new Post();

            $data = array(
                'title' => $request->input('title'),
                'subtitle' => $request->input('sub-title'),
                'slug' => $request->input('slug'),
                'body' => $request->input('post'),
                'posted_by' => 1,
                'image' => $post->uploadImg('cover_image'),
            );

            

            // $post_tag =  [
            //     'tag_id' => $request->input('tagname')
            // ];

            // $category_tag = [
            //     'category_id' => $request->input('catname')
            // ];

       
            // if ($post_id = $post->create($data)) {
            //     if ($postTag_id = post_tag::initPostTag($post_id->id)) {
            //         if (!category_tag::initCategoryTag($postTag_id->id)) {
            //             post_tag::destroy($postTag_id);
            //             self::destroy($post_id->id);
            //         }
            //         return redirect('/admin/post')->with('success', 'Post Created');

            //     } else {
            //         self::destroy($article->id);
            //     }
            
                // return redirect('/admin/post')->with('success', 'Post Created');
            // }
                
            return response()->json($request, 404);


        } catch (\Exception $e) {
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::getPostById($id);
        return view('admin.pages.post.update')->with('posts', $post);  
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
