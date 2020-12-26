<?php

use Illuminate\Http\Request;

Route::apiResource('/product', 'ProductController')->except('create', 'edit');
