<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create','store');
        $this->middleware('can:admin.categories.edit')->only('edit','update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }

    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $category = Category::create($request->all());
        Session::flash('flash_message', 'Categoria Creado con exito');
        Session::flash('flash_message_type', 'success');
        return redirect()->route('admin.categories.index',compact('category'))->with('info','Categoria creada con exito');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:categories,slug,$category->id"
        ]);
        $category->update($request->all());
        return redirect()->route('admin.categories.index',$category)->with('info','Categoria editada con exito');

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('info','Categoria eliminada con exito');
    }
}
