<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     *Save image with Api functionalty
     */
    public function savaImage($image,string $path='public'):string{
        $filename=time().'png';
        Storage::disk($path)->put($filename,base64_decode($image));
        $url=URL::to('/').'/storage/'.$path.'/'.$filename;
        return $url;
    }
    /**
     *Save Audio with Api functionalty
     */
    public function saveAudio($image,string $path='public'):string{
        $filename=time().'png';
        Storage::disk($path)->put($filename,base64_decode($image));
        $url=URL::to('/').'/storage/'.$path.'/'.$filename;
        return $url;
    }
}
