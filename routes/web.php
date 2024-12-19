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

Route::get("/explore/traditional-dances", function () {
    return view("explores.dances");
});

Route::get("/explore/traditional-dances/dance-info", function () {
    return view("info.dance-info");
});

Route::get("/explore/batik", function () {
    return view("explores.batik");
});

Route::get("/explore/batik/batik-info", function () {
    return view("info.batik-info");
});

Route::get("/explore/traditional-house", function () {
    return view("explores.house");
});

Route::get("/explore/traditional-house/house-info", function () {
    return view("info.house-info");
});

Route::get("/explore/traditional-clothes", function () {
    return view("explores.clothes");
});

Route::get("/explore/traditional-clothes/clothes-info", function () {
    return view("info.clothes-info");
});

Route::get("/explore/traditional-weapon", function () {
    return view("explores.weapon");
});

Route::get("/explore/traditional-weapon/weapon-info", function () {
    return view("info.weapon-info");
});

Route::get("/explore/musical-instruments", function () {
    return view("explores.instrument");
});

Route::get("/explore/musical-instruments/instrument-info", function () {
    return view("info.instruments-info");
});

Route::get("/explore/food", function () {
    return view("explores.food");
});

Route::get("/explore/food/food-info", function () {
    return view("info.food-info");
});
