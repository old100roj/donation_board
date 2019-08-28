<?php

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('donates', 'DonationController');

Route::resource('donatesAPI', 'DonationControllerAPI');

Route::get('/getDonates', 'DonationControllerAPI@getDonates');
