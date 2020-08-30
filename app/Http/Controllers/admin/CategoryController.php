<?php

namespace App\Http\Controllers\admin;

use App\components\RecursiveMenu;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    private $categories;

    public function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }

    public function index(){
        $data = $this->categories->latest()->paginate(5);
        return view("admin.category.index",compact('data'));
    }
    public function create(){
       $htmlOption = $this->getCategory();
        return view("admin.category.create",compact('htmlOption'));
    }

    public function store(Request $request){
            $validator = Validator::make($request->all(),[
                'c_name'=>'required|',
            ],[
                'c_name.required'=>'Tên danh mục không được để trống !|',
            ]);
        $this->categories->c_name = $request->c_name;
        $this->categories->c_slug = Str::slug($request->c_name);
        $this->categories->parent_id = $request->parent_id;
        $this->categories->save();
            return redirect()->route("category.index");

    }

    public function edit($id){
       $category = $this->categories->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view("admin.category.edit",compact('htmlOption','category'));
    }

    public function delete($id){
        if(isset($id)){
            $this->categories->find($id);
            $this->categories->delete();
            return redirect()->route("category.index");
        }

    }

    public function getCategory($parentId = null){
        $data = $this->categories->all();
        $recursiveMenu = new RecursiveMenu($data);
        $htmlOption = $recursiveMenu->recursiveMenu($parentId);
        return $htmlOption;
    }
}
