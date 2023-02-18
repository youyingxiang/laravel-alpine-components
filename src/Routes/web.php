<?php
use Illuminate\Support\Facades\Route;

Route::prefix("alp-examples")->group(function (){
    Route::get("/", function (){
        return view("alp::examples.index");
    });
    Route::get('/{component}', function (string $component){
        return view("alp::examples.{$component}");
    })->name('alp.examples.component');
});