<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('category.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $categories = Category::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();
            return view('search', compact('categories'));
    }

    //Category Archived Show 
    public function CategoryArchived()
    {
       // return $request
        $categoryArchivedData = Category::onlyTrashed()->get();
        return view('category.archived', compact('categoryArchivedData'))->with('i', (request()->input('page', 1) - 1) * 5);
        ;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:categories,title',
        ]);

        $category = new Category();

        $category->title = $request->title;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category Added Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $category = Category::findOrfail($id);
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $category = Category::findOrfail($id);
        return view('category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $category = Category::findOrfail($request->id);
        $category->title = $request->title;
        $category->update();
        return redirect()->route('category.index')->with('success', 'Category Update successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Category::findOrfail($id)->delete();
        return redirect()->back()->with('success', 'Category Delete Successfully');
    }


    public function CategoryRestore($id){
        $categoryRestore = Category::onlyTrashed()->findOrfail($id);
        $categoryRestore->restore();
        return redirect()->route('category.index')->with('success', 'Category Restored Successfully');
        
    }
    public function CategoryForceDelete($id){
        $deleteForever = Category::onlyTrashed()->findOrfail($id);
        $deleteForever->forceDelete();
        return redirect()->back()->with('success', 'Category Delete Forever');
    }

}