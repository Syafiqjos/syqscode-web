@extends('layouts.basepage')

@section('title')
    Newsletter - Syqscode
@endsection

@section('page-title')
    Subscribe Newsletter
@endsection

@section('page-description')
    Jika kamu mengisi form ini, kamu bakal menerima email setiap kali ada post baru
@endsection

@section('content')
    <form action="" method="post" align="center">
        @csrf
        <label style="margin:0 auto;margin-top:10px;margin-bottom:10px;display:block;font-size:24px;" for="email">Masukkan Email</label>
        <h2>
        @if($status == 'nodgut')
            Query Nod gut
        @elseif($status == 'emailnodgut')
            Masukkan email yang valid
        @elseif($status == 'emailsogud')
            Kamu telah berlangganan newsletter ^_^
        @elseif($status == 'hai')
            Oke, silahkan verifikasi email nya dulu ya
        @elseif($status == 'kosongan')
            Kok emailnya kosongan ?
        @elseif($status == 'initial')

        @else
            Add d  a  E r  oo RR  r yan  g  g ak  d i k t e   a ha ui  i  i
        @endif
        </h2>
        <input style="margin:0 auto;display:block;padding:4px;width:80%;font-size:24px;" type="text" id="email" name="email"></input>
        <input style="margin:0 auto;display:block;width:20%;padding:8px;margin-top:10px;" type="submit" value="Oke"></input>
    </form>
@endsection
