@extends('layouts.global')

<?php
    $little = "gta";
?>

@section('title')
    Interface Nyanko
@endsection

@section('content')
    <h1>Interface</h1>
    <div id="nyanko">
        <h2>@{{ message }}</h2>
        <div>
            <p>@{{ paragraph }}</p>
        <div>
        <script type="text/javascript">
            var vm = new Vue({
                el : '#nyanko',
                data : {
                    message : 'Nyanko',
                    paragraph : "This is a long story actually {{ $little }}"
                }
            });
        </script>
    </div>
@endsection
