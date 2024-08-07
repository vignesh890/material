<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Material_Controller;

Route::get('/',[Material_Controller::class,'material_list']);
Route::get('/material_list', [Material_Controller::class, 'material_list']);
Route::get('/add_material',[Material_Controller::class,'add_material']);
Route::post('/insert',[Material_Controller::class,'insert']);
Route::get('/material_edit/{id}',[Material_Controller::class,'edit']);
Route::post('/update/{id}',[Material_Controller::class,'update']);
Route::get('/material_delete/{id}',[Material_Controller::class,'delete']);