<?php

Route::get('/', 'ContactController@showContactForm');

Route::post('contact', 'ContactController@postContact');
