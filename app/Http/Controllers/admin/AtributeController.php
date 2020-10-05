<?php

namespace App\Http\Controllers\admin;

use App\components\RecursiveMenu;
use App\Http\Controllers\Controller;
use App\Http\Requests\AtributeRequest;
use App\Model\Attribute;
use App\Model\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AtributeController extends Controller
{
    public function index(){
        $data = Attribute::with('category')->paginate(8);
        return view("admin.attribute.index",compact('data'));
    }

    public function create(){
        $dataMenu = Categories::all();
        $menu = new RecursiveMenu($dataMenu);
        $htmlOption = $menu->recursiveMenu($parentId='');
        return view("admin.attribute.create",compact('htmlOption'));
    }
    public function store(AtributeRequest $request){
        $attribute = new Attribute();
        $attribute->attr_name = $request->attr_name;
        $attribute->attr_slug = Str::slug($request->attr_name);
        $attribute->attr_type = $request->attr_type;
        $attribute->attr_category_id = $request->attr_category_id;
        $attribute->save();
        return redirect()->route("attribute.index");
    }
    public function update(AtributeRequest $request,$id){
        $attribute = Attribute::find($id);
        $attribute->attr_name = $request->attr_name;
        $attribute->attr_slug = Str::slug($request->attr_name);
        $attribute->attr_type = $request->attr_type;
        $attribute->attr_category_id = $request->attr_category_id;
        $attribute->save();
        return redirect()->route("attribute.index");
    }
    public function edit($id){
        $attribute = Attribute::find($id);
        $dataMenu = Categories::all();
        $menu = new RecursiveMenu($dataMenu);
        $htmlOption = $menu->recursiveMenu($attribute->attr_category_id);
        return view("admin.attribute.edit", compact('htmlOption', 'attribute'));
    }


    public function delete($id){
        $item = Attribute::find($id);
        $item->delete();
        return redirect()->back();
    }
}
