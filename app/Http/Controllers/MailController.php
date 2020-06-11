<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterMail;
use App\Mail\NewsletterVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Subscriber;
use App\Post;

class MailController extends Controller
{
    public function check_user($email){

        $name = (string)(rand(1010107,101010107)) . (string)(rand(1010107,101010107)) . (string)(rand(1010107,101010107));

        $subs = Subscriber::where('name',$name);
        if ($subs->count() <= 0){
            $news = new Subscriber();
            $news->name = $name;
            $news->email = $email;

            if (Subscriber::where('email',$email)->count() <= 0){
                $news->salt = rand(1010107,101010107);

                $link = $this->linked($email,$news->salt);
                $news->reply_verif_link = $link;

                $unlink = $this->unlinked($email,$news->salt);
                $news->reply_unverif_link = $unlink;

                $letterlink = $this->news_linked($email,$news->salt);
                $news->newsletter_verif_link = $letterlink;

                $letterunlink = $this->news_unlinked($email,$news->salt);
                $news->newsletter_unverif_link = $letterunlink;
            }

            $news->save();

            return true;
        } else {
            $sub = $subs->first();
            if ($sub->email == $email){
                return true;
            }
        }
        return false;
    }

    public function strToHex($string){
        $hex = '';
        for ($i=0; $i<strlen($string); $i++){
            $ord = ord($string[$i]);
            $hexCode = dechex($ord);
            $hex .= substr('0'.$hexCode, -2);
        }
        return strToUpper($hex);
    }

    public function xor_string($string, $key) {
        $val = '';
        for($i = 0; $i < strlen($string); $i++) {
            $val .= chr(ord($string[$i]) ^ ord($key[$i % strlen($key)]));
        }
        return $val;
    }

    public function linked($x,$salt){
        $enc = $this->strToHex($this->xor_string(base64_encode($x.$salt),$salt).$salt);
        return $enc;
    }

    public function unlinked($x,$salt){
        $dec = $this->strToHex($salt.$this->xor_string(base64_encode($x),$salt.$salt));
        return $dec;
    }

    public function news_linked($x,$salt){
        $enc = $this->strToHex($this->xor_string(base64_encode($salt.$x.$salt),$salt).$salt);
        return $enc;
    }

    public function news_unlinked($x,$salt){
        $dec = $this->strToHex($salt.$this->xor_string(base64_encode($salt.$x),$salt.$x.$salt));
        return $dec;
    }

    public function subscribe(Request $request){
        if ($request->exists('email')){
            if ($request->get('email') == ''){
                return view('newsletter',['status'=>'kosongan']);
            }
            if (filter_var($request->get('email'),FILTER_VALIDATE_EMAIL)){
                $subs = Subscriber::where('email',$request->get('email'));
                if ($subs->count() >= 1){
                    if ($subs->first()->newsletter == true){
                        return view('newsletter',['status'=>'emailsogud']);
                    }
                } else {
                    $this->check_user($request->get('email'));
                }

                $subs = Subscriber::where('email',$request->get('email'));

                $obj = new \stdClass();
                $obj->sender = 'aimaina@syqscode.com';
                $obj->receiver = $request->get('email');

                Mail::to($obj->receiver)->send(new NewsletterVerificationMail($obj,$request->get('email'),$subs->first()->newsletter_verif_link,$subs->first()->reply_verif_link));
                return view('newsletter',['status'=>'hai']);
            }
            return view('newsletter',['status'=>'emailnodgut']);
        }
        return view('newsletter',['status'=>'nodgut']);
    }

    public function newsletter(Request $request){
        if ($request->get('keywrd') != 'B-baka janai no o o  o'){
            return 'Query nod gut';
        }
        $subs = Subscriber::where('newsletter','1')->get();

        $sended_to = '';

        $collection = [];

        foreach ($subs as $sub){
            $collection[$sub->email] = $sub;
        }

        foreach ($collection as $key => $val){
            $obj = new \stdClass();
            $obj->sender = 'aimaina@syqscode.com';
            $obj->receiver = $key;

            $sended_to .= $obj->receiver . ';';

            $post = Post::all()->last();

            Mail::to($obj->receiver)->send(new NewsletterMail($obj,$obj->receiver,$post,$val->newsletter_unverif_link));
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
                return view('verified',['message'=>'Nice, you comment verified, '.$sub->email]);
            } else {
                $subs = Subscriber::where('reply_unverif_link',$c)->where('verified',1)->where('salt','!=',0);
                if ($subs->count() >= 1){
                    $sub = $subs->first();
                    $sub->verified = 0;
                    $sub->save();
                    return view('verified',['message'=>'Nice, you comment unverified, '.$sub->email]);
                }
            }
            return view('verified',['message'=>'Verification invalid or expired']);
        } else if ($request->exists('n')){ //newsletter
            $n = $request->get('n');
            $subs = Subscriber::where('newsletter_verif_link',$n)->where('newsletter',0);
            if ($subs->count() >= 1){
                $sub = $subs->first();
                $sub->newsletter = 1;
                $sub->save();
                return view('verified',['message'=>'Nice, you newsletter verified, '.$sub->email]);
            } else {
                $subs = Subscriber::where('newsletter_unverif_link',$n)->where('newsletter',1);
                if ($subs->count() >= 1){
                    $sub = $subs->first();
                    $sub->newsletter = 0;
                    $sub->save();
                    return view('verified',['message'=>'Nice, you newsletter unverified, '.$sub->email]);
                }
                return view('verified',['message'=>'Verification invalid or expired']);
            }
        } else {
            return redirect('/');
        }
    }
}
