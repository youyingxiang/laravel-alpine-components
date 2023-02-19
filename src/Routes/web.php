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

Route::prefix("alp-examples-mockup")->group(function (){
    Route::get("/remote-combobox", function (){
        $perPage = request('perPage');
        $page = request('page');
        $query = request('query');

        $result = [];
        for($i = ($page - 1) * $perPage; $i < $page * $perPage; $i ++ ) {
            $result[] = [
                'id' => $i,
                'name' => "{$query}-{$i}"
            ];
        }
        return \Illuminate\Support\Facades\Response::json([
            'pagination' => ['more' => $page  < 5],
            'data' => $result
        ]);
    })->name('remote-combobox.mockup');
});