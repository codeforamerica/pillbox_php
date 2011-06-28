<?php
// Base API Class
require 'APIBaseClass.php';

require 'pillboxApi.php';

$new = new pillboxApi();

$options = array(

	'color' => 'YELLOW',
	'shape' => 'BULLET'

);

$new->search_pill($options);

// Debug information
die(print_r($new).print_r(get_object_vars($new)).print_r(get_class_methods(get_class($new))));
