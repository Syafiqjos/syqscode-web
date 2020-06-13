@extends('layouts.basepage')

@section('title')
    Request - Syqscode
@endsection

@section('page-title')
    Request Sesuatu
@endsection

@section('page-description')
    Jika ada yang mau disampaikan bisa hubungi admin dengan mengisi request dibawah.
@endsection

@section('content')
    <form action="" method="post" align="center">
        @csrf
        <h2>
            @if($status == 'initial')

            @elseif($status == 'nodgut')
                Query Nod gut
            @elseif($status == 'kosongan')
                Kok emailnya kosongan ?
            @elseif($status == 'reqkosongan')
                Kok requestnya kosongan ?
            @elseif($status == 'hai')
                Okay, request akan disampaikan
            @endif
        </h2>
        <label style="margin:0 auto;margin-top:10px;margin-bottom:10px;display:block;font-size:20px;" for="email">Masukkan Email atau Nama (Digunakan sebagai identitas)</label>
        <input style="margin:0 auto;display:block;padding:4px;width:80%;font-size:20px;" type="text" id="email" name="email"></input>
        <label style="margin:0 auto;margin-top:10px;margin-bottom:10px;display:block;font-size:20px;" for="request">Request yang mau disampaikan</label>
        <textarea style="margin:0 auto;display:block;padding:4px;width:80%;font-size:20px;" type="text" id="request" name="request"></textarea>
        <input style="margin:0 auto;display:block;width:20%;padding:8px;margin-top:10px;" type="submit" value="Oke"></input>
    </form>
@endsection
