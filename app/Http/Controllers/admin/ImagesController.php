<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Image;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::paginate(8);
        return view('admin.images.index', compact('images'));
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
        $images = Image::findOrFail($id);
        $categories = Category::all(); // For category_id ( Foreach In Edit.blade.php )

        return view('admin.images.edit', compact('categories', 'images'));
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
        $image = Image::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable|min:5|max:150',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        // Upload Image
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path'); // UploadedFile Objects
        
            $image_dir = $file->store('/', [
                'disk' => 'uploads',
            ]);
        
        }

        $image->update([
            'name' => $request->post('name'),
            'description' => $request->post('description'),
            'image_path' => $image_dir,
            'category_id' => $request->post('category_id'),
        ]);

        return redirect()->route('image.index')->with('success', 'Image ' . ($image->name) . ' Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect()->route('image.index')->with('success', 'Image ' . ($image->name) . ' Deleted');
        
    }

    public function trash()
    {
        $images = Image::onlyTrashed()->get();

        return view('admin.images.trash', compact('images'));
    }

    public function restore(Request $request, $id = null)
    {
        if ($id) {
            $image = Image::onlyTrashed()->findOrFail($id);
            $image->restore();

            return redirect()->route('image.index')->with('success', 'Image ' . ($image->name) . ' Restored');
        }      

        $image = Image::onlyTrashed()->restore();
        return redirect()->route('image.index')->with('success', 'All Image Restored');


    }

    public function forceDelete($id = null)
    {
        if ($id) {
            $image = Image::onlyTrashed()->findOrFail($id);
            $image->forceDelete();

            Storage::disk('uploads')->delete($image->image_path);

            return redirect()->route('image.index')->with('success', 'Image ' . ($image->name) . ' Deleted');
        }      

        $image = Image::onlyTrashed()->forceDelete();
        Storage::disk('uploads')->delete($image->image_path);
        return redirect()->route('image.index')->with('success', 'All Image Deleted');


    }





}
