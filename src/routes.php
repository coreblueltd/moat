<?php

Route::middleware('web')->name('moat.')->group(function () {
    Route::get('build-a-moat', 'CoreBlue\Moat\Controllers\MoatController@show')->name('show');

    Route::get('{any}', function() {
        return redirect()->route('moat.show');
    });
});
