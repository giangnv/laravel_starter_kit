<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('email-parser', 'EmailParserController@index')->name('email-parser');

Route::post('email-parser','EmailParserController@parser')->name('api-email-parser');
Route::post('email-feedback','EmailParserController@feedback')->name('api-email-feedback');