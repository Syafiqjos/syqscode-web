@extends('layouts.basepage')

@section('title')
    Page Error 404 - Syqscode
@endsection

@section('page-description')
    : 404
@endsection

@section('content')
    <h1>Page Error 404</h1>
    @if(isset($message))
        <h2>{{$message}} Silahkan klik <a href="/">ini</a> untuk kembali ke homepage.</h2>
    @else
        <h2>Maaf, halaman ini tidak tersedia. Silahkan klik <a href="/">ini</a> untuk kembali ke homepage.</h2>
    @endif
@endsection
