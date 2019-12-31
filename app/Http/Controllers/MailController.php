<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactNotification;

class MailController extends Controller
{
    public function contact(Request $request){
        $validate_rule = [
            'name' => 'required',
            'email' => 'email',
        ];
        $this->validate($request, $validate_rule);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactNotification($request));
        return redirect('/');
    }
}
