<?php
namespace App\TraitUploadFile;
use Illuminate\Support\Facades\Storage;
trait UploadFile{
    public function storageTraitUpalod($req,$fileName,$dir){
        if($req->hasFile($fileName)){
            $file = $req->$fileName;
            $fileNameOrigin = $file->getClientOriginalName();
            $nameFileHash = $fileNameOrigin.'.'.$file->getClientOriginalExtension();
            $path = $req->file($fileName)->storeAs("public/Upload/".$dir ,$nameFileHash ); // public/Upload/Cat.jpg

            $dataUpload = [
                'pro_img'=>$fileNameOrigin,
                'path_img' => Storage::url($path),///storage/Upload/193044442.jpg
            ];
            return $dataUpload;
        }
        return null;
    }

    public function storageTraitUpalodMultiFile($file,$dir){

            $fileNameOrigin = $file->getClientOriginalName();
            $nameFileHash = rand().'.'.strtolower($file->getClientOriginalExtension());
            $path = $file->storeAs("public/Upload/".$dir ,$nameFileHash ); // public/Upload/Cat.jpg

            $dataUpload = [
                'pro_img_name'=>$fileNameOrigin,
                'path_img' => Storage::url($path),///storage/Upload/193044442.jpg
            ];
            return $dataUpload;
    }
}
