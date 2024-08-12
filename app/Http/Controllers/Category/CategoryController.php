<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{

		// search input
		$searchVal = $request->search ?? null;

		// retrieve categories - paginate by 5
		// with search
		$categories = Category::where('name', 'LIKE', '%'.$searchVal.'%')->paginate(5)->withQueryString();

		return view('category.index', compact('categories', 'searchVal'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreCategoryRequest $request)
	{

		// Retrieve the validated input...
		$validated = $request->validated();

		// new Category resource
		$category 							= new Category;
		$category->name 				= $validated['name'];
		$category->description 	= $validated['description'];
		$category->save();

		// redirect to new page
		return redirect()->route('categories.index')->with('status', 'Category has been successfully added.');

	}

	/**
	 * Display the specified resource.
	 */
	public function show(Category $category)
	{
		return view('category.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateCategoryRequest $request, Category $category)
	{

		// Retrieve the validated input...
		$validated = $request->validated();

		// update Category model
		$category->name 				= $validated['name'];
		$category->description 	= $validated['description'];
		$category->update();

		// redirect to index page
		return redirect()->route('categories.index')->with('status', 'Category has been successfully updated.');

	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Category $category)
	{
		// delete Category model
		$category->delete();

		// redirect to current page
		return redirect()->route('categories.index')->with('status', 'Category has been successfully deleted.');
		
	}
}
