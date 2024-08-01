<?php

//upload image to storage
use Illuminate\Support\Facades\Storage;

if(!function_exists('uploadImage')){
    function uploadImage($image, $path){
        $image_name = time().'_'.$image->getClientOriginalName();
        $url = Storage::put($path, $image);
        return $url;
    }
}

