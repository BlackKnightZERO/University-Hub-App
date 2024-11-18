<?php 

namespace App\Services;
use Illuminate\Http\Request;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class FileUploadService {

    public function upload($model, $uploadFile) {
        $fileName    = $model .'_'. time() .'.'. $uploadFile->getClientOriginalExtension();
        $storagePath = 'public/'.$model;
        Storage::putFileAs($storagePath, new File($uploadFile), $fileName);
        return $model.'/'.$fileName;
    }

    public function destroy($path){
        if (Storage::exists('public/'.$path)) {
            Storage::delete('public/'.$path);
        }
    }



}