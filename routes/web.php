<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.home');
})->name('home');


// Route A propos
Route::get('/about',function (){
    return view('layouts.a-propos');
})->name('about');

//Route actualités
Route::get('/news',function (){
    return view('layouts.actualites');
})->name('news');

//Route actualités detail
Route::get('/actualités-detail',function (){
    return view('layouts.actualites-detail');
})->name('actualités-détail');


//Route évenements
Route::get('/events',function (){
    return view('layouts.evenements');
})->name('events');

// Route Blog 
Route::get('/blog',function (){
    return view('layouts.blog');
})->name('blog');

//Route Contact
Route::get('/contact',function (){
    return view('layouts.contact');
})->name('contact');

//Route Autre
Route::get('/autre',function (){
    return view('layouts.autre');
})->name('autre');