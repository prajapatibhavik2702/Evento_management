<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fatch category data & send to view file
        $categorys=Category::all();
        return view('admin.category',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Addcategory file redirect
        return view('admin.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data store
        $validatedData= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image'=>['required','mimes:png,jpg,jpeg'],
        ]);

        //image name store in file variable & convert HASH name
        $file=$request->file('image');
        $filename=$file->hashName();

        //storage path in storage folder
        $image_path = $request->file('image')->storeAs('admin/category',$filename,'public');

        //store data with file(image)
        $category = Category::create([
            'name'=>$request->name,
            'image'=>$filename,
        ]);
        $category->save();
        //redirect file Category
        return redirect('admin/category')->with('success', 'Category Add successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Update category data redirect with id UPDATECATEGORY FILE
        $categorys =Category::find($id);
        return view('admin.updatecategory',compact('categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          //find id update Category
          $category=Category::find($id);

          //validated data update time store
          $validatedData= $request->validate([
              'name' => ['required', 'string', 'max:255'],
              'image'=>['nullable','mimes:png,jpg,jpeg'],
          ]);

          //condition cheak image is update to ,, so store new images condition,,
          if(isset($request->image))
          {
              $file=$request->file('image');
              $filename=$file->hashName();
              $image_path = $request->file('image')->storeAs('admin/category',$filename,'public');
              $category->image=$filename;
          }
          //store updated data
          $category->name=$request->name;
          $category->save();

          //redirect to category file
          return redirect('admin/category')->with('success', 'Category Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Deleted Category fatch id to DATA
        $category = Category::find($id);
        $category->delete();

        //redirect index file DELETE SUCCESSFULLY!!!
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');

    }
}
