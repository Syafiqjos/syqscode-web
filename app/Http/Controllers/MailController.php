<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Subscriber;

class MailController extends Controller
{
    public function newsletter(Request $request){
        if ($request->get('keywrd') != 'B-baka janai no o o  o'){
            return 'Query nod gut';
        }
        $subs = Subscriber::where('newsletter','1')->get();

        $sended_to = '';

        $collection = [];

        foreach ($subs as $sub){
            $collection[$sub->email] = 1;
        }

        foreach ($collection as $key => $val){
            $obj = new \stdClass();
            $obj->sender = 'aimaina@syqscode.com';
            $obj->receiver = $key;

            $sended_to .= $obj->receiver . ';';

            Mail::to($obj->receiver)->send(new NewsletterMail($obj));
        }
        return 'All emails sended : '.$sended_to;
    }
}
