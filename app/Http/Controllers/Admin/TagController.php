<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create','store');
        $this->middleware('can:admin.tags.edit')->only('edit','update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        $colors = [
          'red'=>'Color Rojo',
          'yellow'=>'Color Amarillo',
          'green'=>'Color Verde',
          'blue'=>'Color Azul',
          'indigo'=>'Color Indigo',
          'purple'=>'Color Morado',
          'pink'=>'Color Rosado',
        ];
        return view('admin.tags.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:tags',
            'color'=>'required',
        ]);
        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.index',compact('tag'))->with('info','Etiqueta creada con exito');
    }

    public function edit(Tag $tag)
    {
        $colors = [
            'red'=>'Color Rojo',
            'yellow'=>'Color Amarillo',
            'green'=>'Color Verde',
            'blue'=>'Color Azul',
            'indigo'=>'Color Indigo',
            'purple'=>'Color Morado',
            'pink'=>'Color Rosado',
        ];
        return view('admin.tags.edit',compact('tag','colors'));
    }

    public function update(Request $request,Tag $tag)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:categories,slug,$tag->id",
            'color'=>'required',
        ]);
        $tag->update($request->all());
        return redirect()->route('admin.tags.index',$tag)->with('info','Etiqueta editada con exito');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info','Etiqueta eliminada con exito');
    }
}
