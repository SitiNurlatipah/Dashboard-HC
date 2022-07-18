<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    $name="<h1>Siti Nurlatipah</h1>";
    return view('welcome',['nama'=> $name]);
});
Route::view('contact','contact');
Route::get('/',function(){
    $ii="aku adalah ii";
    return view('contact',['aa'=> $ii]);
});

