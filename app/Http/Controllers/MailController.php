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

    public function verify(Request $request){
        if ($request->exists('c')){ //comment
            $c = $request->get('c');
            $subs = Subscriber::where('reply_verif_link',$c)->where('verified',0);
            if ($subs->count() >= 1){
                $sub = $subs->first();
                $sub->verified = 1;
                $sub->save();
                return 'Nice, you comment verified, '.$sub->email; //view verif true
            } else {
                $subs = Subscriber::where('reply_unverif_link',$c)->where('verified',1)->where('salt','!=',0);
                if ($subs->count() >= 1){
                    $sub = $subs->first();
                    $sub->verified = 0;
                    $sub->save();
                    return 'Nice, you comment unverified, '.$sub->email; //view verif true
                }
            }
            return 'Nod gut'; //view verif false
        } else if ($request->exists('c')){ //newsletter
            $n = $request->get('n');
            $subs = Subscriber::where('reply_verif_newsletter',$n)->where('newsletter',0);
            if ($subs->count() >= 1){
                $sub = $subs->first();
                $sub->newsletter = 1;
                $sub->save();
                return 'Nice, you newsletter verified, '.$sub->email; //view verif true
            } else {
                $subs = Subscriber::where('reply_unverif_newsletter',$n)->where('newsletter',1);
                if ($subs->count() >= 1){
                    $sub = $subs->first();
                    $sub->newsletter = 0;
                    $sub->save();
                    return 'Nice, you newsletter unverified, '.$sub->email; //view verif true
                }
                return 'Nod gut'; //view verif false
            }
        } else {
            return 'Wh Nod Gut;\n\\';
        }
    }
}
