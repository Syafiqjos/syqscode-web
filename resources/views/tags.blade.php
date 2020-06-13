@extends('layouts.basepage')

@section('title')
    Tags - Syqscode
@endsection

@section('page-title')
    Tags Collection
@endsection

@section('page-description')
    Berikut adalah daftar Tag atau Label yang tersedia
@endsection

@section('content')
    @foreach($tags as $tagn)
        <div class="label" style="margin-bottom: 10px;font-size:18px;">
            <a href="/{{$tagn->url}}">{{$tagn->name}}</a>
        </div>
    @endforeach
@endsection
