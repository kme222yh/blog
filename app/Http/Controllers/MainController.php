<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{

    public function home(){
        $dirs = Storage::disk('public')->directories('works');
        $params['works'] = array();
        foreach($dirs as $dir){
            if(Storage::disk('public')->exists($dir.'/index.html')){
                $project = str_replace('works/', '', $dir);
                if(Storage::disk('public')->exists($dir.'/sample.png'))
                    $img = 'storage/'.$dir.'/sample.png';
                else
                    $img = 'img/no_image.png';
                array_push($params['works'], [
                    'pv' => 'storage/'.$dir.'/index.html',
                    'project' => $project,
                    'img' => $img,
                ]);
            }
        }
        return view('main.home', $params);
    }




    public function contact(){
        return view('main.contact');
    }

}
