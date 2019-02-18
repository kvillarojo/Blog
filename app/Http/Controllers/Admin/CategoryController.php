<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Model\users\categories as Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $categories = Category::getCategories();
        return view('admin.pages.category.index')->with('categories', $categories);
        //   return response()->json($categories, 404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        try {
            
            $data = array(
                'name' => ucwords($request->input('catname')),
                'slug' => ucwords($request->input('slugname'))
            );

            if (Category::create($data)) {
                return redirect('/admin/category')->with('success', 'Post Created');
            }

        } catch (\Exception $e) {
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
        $cat_id = decrypt($id);

        $categories = Category::getCategoryById($cat_id);
        return view('admin.pages.category.update')->with('category', $categories);
        // return $categories;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStoreRequest $request, $id)
    {
    
        try {
            
            $data = [
                'name' => ucwords($request->input('catname')),
                'slug' => ucwords($request->input('slugname'))
            ];

            if (Category::where('id', $id)->update($data)) {
                return redirect('admin/category')->with('success', 'Update Successfull');
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
       try {

            $cat_id = decrypt($id);
            if (Category::destroy($cat_id)) {
                return redirect('admin/category')->with('success', 'Remove Successfull');
            }
       } catch (\Exception $e) {
           return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
       }
       

    }
}
