<?php

/*
|--------------------------------------------------------------------------
| Melody Library
|--------------------------------------------------------------------------
|
| Map Melody Library using PSR-0 standard namespace. 
|
*/

Autoloader::namespaces(array(
	'Melody' => Bundle::path('melody').'libraries'.DS,
));

Melody\Core::start();