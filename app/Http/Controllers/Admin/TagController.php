<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tags as TagStoreRequest;

use App\Model\users\Tag;



class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::all('id', 'name', 'slug');
        return view('admin.pages.tags.index')->with('tags', $tag);
        //  return response()->json($tag, 404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        try {

            $data = array(
                'slug' => $request->input('slugname'),
                'name' => $request->input('tagname')
            );

            if (Tag::create($data)) {
                return redirect('/admin/tags')->with('success', 'Post Created');
            }
        } catch (\Execption $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();       
        }
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
        try {
            $tag_id = decrypt($id);
            $tag = Tag::getTagById($tag_id);
            if ($tag) {
                return view('admin.pages.tags.update')->with('tag', $tag);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagStoreRequest $request, $id)
    {
        try {
            
            $data = [
                'name' => ucfirst($request->input('tagname')),
                'slug' => ucfirst($request->input('slugname'))
            ];

            if (Tag::where('id', $id)->update($data)) {
                return redirect('admin/tags')->with('success', 'Update Successfull');
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        try {
            $tag_id = decrypt($id);
            if (Tag::destroy($tag_id)) {
                return redirect('admin/tags')->with('success', 'Remove Successfull');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }
}
