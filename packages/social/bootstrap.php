<?php

Autoloader::add_namespace('\\Social', __DIR__.'/classes');

Autoloader::add_classes(array(
	'Social\\Facebook'             => __DIR__.'/classes/facebook.php',
	'Social\\Twitter'             => __DIR__.'/classes/twitter.php',
	'Social\\Google'             => __DIR__.'/classes/google.php'
));
