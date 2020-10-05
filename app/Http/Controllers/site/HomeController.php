<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Product;
use App\Model\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $category;

    public function __construct(Categories $categories)
    {
        $this->category = $categories;
    }

    public function index()
    {
        $sliders = Slider::all();
        $arrIdPhone = $this->getChildCategory($this->category, 1);
        $phones = Product::whereIn("category_id", $arrIdPhone)->take(4)->get();

        $arrIdTablet = $this->getChildCategory($this->category, 4);
        $tablets = Product::whereIn("category_id", $arrIdTablet)->take(4)->get();

        $arrIdPhuKien = $this->getChildCategory($this->category, 3);
        $phukiens = Product::whereIn("category_id", $arrIdPhuKien)->take(4)->get();

        $arrIdLaptop = $this->getChildCategory($this->category, 2);
        $laptops = Product::whereIn("category_id", $arrIdLaptop)->take(4)->get();

        return view("frontend.home", compact('phones', 'tablets', 'phukiens', 'laptops', 'sliders'));
    }

    public function getChildCategory($category, $idParent)
    {
        $arrId = [];
        $categoryChild = $category->find($idParent)->categoryChild()->get();
        foreach ($categoryChild as $itemArr) {
            array_push($arrId, $itemArr['id']);
        }
        return $arrId;

    }
    public function getListProduct($id){
        //echo $id;die();
        $childCate = Categories::find($id);
        $nameChildCate = $childCate['c_name'];
        $listPro = Product::whereIn("category_id", [$id])->get();
        return view("frontend.listProduct",compact("listPro","nameChildCate"));
    }



}
