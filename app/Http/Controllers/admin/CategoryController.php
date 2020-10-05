<?php

namespace App\Http\Controllers\admin;


use App\components\RecursiveMenu;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryRequest;
use App\Model\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    private $category;

    public function __construct(Categories $categories)
    {
        $this->category = $categories;
    }

    public function index()
    {
        $data = Categories::latest()->paginate(5);
        return view("admin.category.index", compact('data'));
    }

    public function create()
    {
        $dataMenu = $this->category->all();
        $menu = new RecursiveMenu($dataMenu);
        $htmlOption = $menu->recursiveMenu($parentId='');
        return view("admin.category.create", compact('htmlOption'));
    }

    public function store(AdminCategoryRequest $request)
    {
        $this->category->c_name = $request->c_name;
        $this->category->c_slug = Str::slug($request->c_name);
        $this->category->parent_id = $request->parent_id;
        $this->category->save();
        return redirect()->route("category.index");

    }

    public function update(AdminCategoryRequest $request,$id)
    {
        if(isset($id)){

            $itemMenu = $this->category->find($id);
//            $itemMenu->update([
//                'c_name'=>$request->c_name,
//                'c_slug' => Str::slug($request->c_name),
//                 'parent_id' => $request->parent_id
//            ]);
            $itemMenu->c_name = $request->c_name;
            $itemMenu->c_slug = Str::slug($request->c_name);
            $itemMenu->parent_id = $request->parent_id;
            $itemMenu->save();
            return redirect()->route("category.index");
        }

    }
    public function edit($id)
    {
        $dataMenu = $this->category->all();
        $menu = new RecursiveMenu($dataMenu);
        $category = $this->category->find($id);
        $htmlOption = $menu->recursiveMenu($category->parent_id);
        return view("admin.category.edit", compact('htmlOption', 'category'));
    }

    public function delete($id)
    {
        if (isset($id)) {
            $category = $this->category->find($id);
            $category->delete();
            return redirect()->back();
        }

    }
}
