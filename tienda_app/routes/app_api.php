<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/api')->group(function(){
    Route::post('/connect/register', 'Api\ConnectController@postRegister');
});
