<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{

    public function home(){
        $dirs = Storage::disk('works')->directories();
        $params['works'] = array();
        foreach($dirs as $dir){
            if(Storage::disk('works')->exists($dir.'/index.html')){
                $param = [
                    'pv' => Storage::disk('works')->url($dir.'/index.html'),
                    'img' => Storage::disk('works')->url($dir.'/sample.png'),
                    'project' => $dir,
                ];
                if(!Storage::disk('works')->exists($dir.'/sample.png'))
                    $param['img'] = 'img/no_image.png';
                array_push($params['works'], $param);
            }
        }
        return view('main.home', $params);
    }




    public function contact(){
        return view('main.contact');
    }

}
