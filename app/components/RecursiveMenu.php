<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 8/29/2020
 * Time: 10:30 AM
 */

namespace App\components;


class RecursiveMenu
{
    private $htmlSelection = " ";
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function recursiveMenu($parentId,$id=0,$text=''){
        if(!empty($parentId)){
            foreach ($this->data as $menu){
                if($menu["parent_id"] == $id){
                    if($parentId == $menu['id']){
                        $this->htmlSelection .= "<option selected value='".$menu['id']."'>".$text.$menu['c_name']."</option>";
                    }else{
                        $this->htmlSelection .= "<option value='".$menu['id']."'>".$text.$menu['c_name']."</option>";
                    }
                    $this->recursiveMenu($menu["id"],$text.'-');
                }
            }
        }else{
            foreach ($this->data as $menu){
                if($menu["parent_id"] == $id){
                        $this->htmlSelection .= "<option value='".$menu['id']."'>".$text.$menu['c_name']."</option>";
                    }
                $this->recursiveMenu($menu["id"],$text.'-');
                }
        }
        return $this->htmlSelection;
    }

}
