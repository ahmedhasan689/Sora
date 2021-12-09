<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        $success = session()->get('success');

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        $categories = Category::all();
        $parents = Category::where('type', 'parent')->get();

        return view('admin.categories.create', compact('categories', 'parents'));
    }


    public function store(Request $request)
    {
        $request->validate([
           'category_name' => 'required|min:3|max:15',
           'type' => 'required',
           'salable' => 'nullable',
           'parent_id' => 'nullable',
        ]);

        $categories = Category::create( $request->all() );
        /* $categories = Category::create([
           'category_name' => $request->post('category_name'),
           'type' => $request->post('type'),
           'salable' => $request->post('salable'),
           'parent_id' => $request->post('parent_id'),
        ]); */

        return redirect()->route('category.index')->with('success', 'Category ' . ($categories->category_name) . ' Created');

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $categories = Category::find($id);
        $parents = Category::where('type', 'parent')->get();

        return view('admin.categories.edit', compact('categories', 'parents'));
    }


    public function update(Request $request, $id)
    {
		$category = Category::findOrFail($id);

        $request->validate([
			'category_name' => 'required|min:3|max:15',
           'type' => 'required',
           'salable' => 'nullable',
           'parent_id' => 'nullable',
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
