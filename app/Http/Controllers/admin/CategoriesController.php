<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoriesController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(Category::class, 'id');
    // }




    public function index()
    {

        $this->authorize('view-any', Category::class);

        $categories = Category::all();

        $success = session()->get('success');

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        $this->authorize('create', Category::class);

        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
           'category_name' => 'required|min:3|max:40',
        ]);
        // $categories = Category::create( $request->all() );
        $categories = Category::create([
           'category_name' => $request->post('category_name'),
        ]); 

        return redirect()->route('category.index')->with('success', 'Category ' . ($categories->category_name) . ' Created');

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {   
        $categories = Category::find($id);

        $this->authorize('update', $categories);

        return view('admin.categories.edit', compact('categories'));
    }


    public function update(Request $request, $id)
    {
		$category = Category::findOrFail($id);

        $request->validate([
			'category_name' => 'required|min:3|max:40',
		]);

		$category->update( $request->all() );

		return redirect()->route('category.index')->with('success', 'Category ' . ($category->category_name) . ' Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $this->authorize('delete', $category);

        $category->delete();

        return redirect()->back()->with('success', 'Category ' . ($category->category_name) . ' Deleted');

    }
    
    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.categories.trash', compact('categories'));
    }

    public function restore(Request $request, $id = null)
    {
        
        if($id) {
            $category = Category::onlyTrashed()->findOrFail($id);
            $category->restore();

            return redirect()->route('category.index')->with('success', 'Category ' . ($category->category_name) . ' Restored');
        }
        
        $category = Category::onlyTrashed()->restore();
        return redirect()->route('category.index')->with('success', 'All Category Restored');


    }

    public function forceDelete($id = null)
    {
        
        if($id) {

            $category = Category::onlyTrashed()->findOrFail($id);
            $category->forceDelete();

            return redirect()->route('category.index')->with('success', 'Category ' . ($category->category_name) . ' Deleted');

        }
        
        $category = Category::onlyTrashed()->forceDelete();
        return redirect()->route('category.index')->with('success', 'All Category Deleted');

    }
    




















}
