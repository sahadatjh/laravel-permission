<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'You are Unauthorized !');
        }
        $categorys = Category::all();
        return view('backend.pages.category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'You are Unauthorized !');
        }
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'You are Unauthorized !');
        }
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        session()->flash('success', 'Category created successfully !!');
        return redirect()->route('category.index');
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
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'You are Unauthorized !');
        }
        $category = Category::find($id);
        return view('backend.pages.category.edit', compact('category'));
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
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            abort(403, 'You are Unauthorized !');
        }
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:categories,name,' . $id,
        ]);
        $category = Category::find($id);


        $category->name = $request->name;
        $category->save();

        session()->flash('success', 'Category updated successfully !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            abort(403, 'You are Unauthorized !');
        }
        $category = Category::find($id);
        if (!is_null($category)) {
            $category->delete();
        }
        session()->flash('success', 'Category deleted  successfully!!');
        return back();
    }
}
