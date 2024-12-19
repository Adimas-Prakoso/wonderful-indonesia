<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("index");
});

Route::get("/explore", function () {
    return view("explore");
});

Route::get("/explore/destinations", function () {
    return view("explores.destinations");
});

Route::get("/explore/destinations/destination-info", function () {
    return view("info.destination-info");
});
