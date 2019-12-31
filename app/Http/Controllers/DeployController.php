<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeployController extends Controller
{
    public function __invoke(Request $request){
        $LOG_FILE = base_path().'/hook.log';
        $SECRET_KEY = env('GITHUB_SECRET_KEY');
        $postdata = file_get_contents("php://input");
        $signature = 'sha1=' . hash_hmac('sha1', $postdata, $SECRET_KEY);
        if (isset($_SERVER['HTTP_X_HUB_SIGNATURE']) && $_SERVER['HTTP_X_HUB_SIGNATURE'] == $signature) {
            if(Storage::disk('public')->exists('works/')){
                file_put_contents($LOG_FILE, date("[Y-m-d H:i:s]")." pull!!: ".$request->ip()."\n", FILE_APPEND|LOCK_EX);
                chdir(base_path().'/storage/app/public/works/');
                exec('git pull');
            }
            else{
                file_put_contents($LOG_FILE, date("[Y-m-d H:i:s]")." clone!!: ".$request->ip()."\n", FILE_APPEND|LOCK_EX);
                chdir(base_path().'/storage/app/public/');
                exec('git clone git://github.com/'.env('GITHUB_USER_ID').'/'.env('GITHUB_REPOSITORY').' works');
            }
            return 'success!';
        }
        else{
            file_put_contents($LOG_FILE, date("[Y-m-d H:i:s]")." invalid access: ".$request->ip()."\n", FILE_APPEND|LOCK_EX);
            return 'failed!';
        }
    }
}
