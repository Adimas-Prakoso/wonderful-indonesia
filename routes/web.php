<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("index");
});

Route::get("/explore", function () {
    return view("explore");
});
