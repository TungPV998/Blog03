<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSliderRequest;
use App\Model\Slider;
use App\TraitUploadFile\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class SliderController extends Controller
{
    use UploadFile;
    public function index(){
        $data = Slider::latest()->paginate(5);
        return view("admin.slider.index",compact('data'));
    }
    public function create(){
        return view("admin.slider.create");
    }
    public function store(AdminSliderRequest $request){
    $slide = new Slider();
    $slide->name = $request->name;
    $slide->description = $request->description;
    $slide->active = $request->active;
    $img = $this->storageTraitUpalod($request,'slide_img',"slider");
    if(!empty($img)){
        $slide->img_name = $img['pro_img'];
        $slide->img_path = $img['path_img'];
    }
    $slide->save();
    return redirect()->route("slider.index");

}
    public function edit($id){
        if(isset($id)){
            //dd($id);
            $slider = Slider::findOrFail($id);
            return view("admin.slider.edit",compact('slider'));
        }


    }
    public function update(AdminSliderRequest $request,$id){
        $slide = Slider::findorFail($id);
        $slide->name = $request->name;
        $slide->description = $request->description;
        $slide->active = $request->active;
        if($request->hasFile('slide_img')){
            $img = $this->storageTraitUpalod($request,'slide_img',"slider");
            if(!empty($img)){
                $slide->img_name = $img['pro_img'];
                $slide->img_path = $img['path_img'];
            }
        }
        $slide->save();
        return redirect()->route("slider.index");

    }
    public function delete($id){
        $slide = Slider::findorFail($id);
        $slide->delete();
        return redirect()->back();

    }
}
