<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $sub_domain = request()->getHost();
    if (str_contains($sub_domain, 'admin')) return redirect('admin');
    return view('welcome');
});
