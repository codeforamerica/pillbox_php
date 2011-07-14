Overview
========

	The Pillbox beta API v2 is RESTful. Output is XML.
	
	http://wiki.citizen.apps.gov/pillbox/Main/APIdocumentation

	
	All calls require an API key. Contact pillbox@mail.nih.gov to request a key or offer feedback. 
	The number of keys will be limited during the API beta. 
	
	Pillbox and the data provided by this API are currently under development and are not intended for clinical use. 
	This data is presented as part of a research and development effort. 
	Images provided are not part of the FDA Structured Product Label and have not been verified by the manufacturer/labeler.

Notes On Images
===============
	If a returned record has an image :
	
	Images are available in four sizes and are not returned with output. 
	Images use the following URIs and <image_id> suffixes.
	
	super_small Ð 91 x 65 (this image size is currently .png)
	
	http://pillbox.nlm.nih.gov/assets/super_small/ss.png
	
	
	small Ð 161 x 115
	
	http://pillbox.nlm.nih.gov/assets/small/sm.jpg
	
	medium Ð 448 x 320
	
	http://pillbox.nlm.nih.gov/assets/medium/md.jpg
	
	large Ð 840 x 600
	
	http://pillbox.nlm.nih.gov/assets/large/lg.jpg
	
	Examples:
	
	http://pillbox.nlm.nih.gov/assets/super_small/000551ss.png
	http://pillbox.nlm.nih.gov/assets/small/000551sm.jpg
	http://pillbox.nlm.nih.gov/assets/medium/000551md.jpg
	http://pillbox.nlm.nih.gov/assets/large/000551lg.jpg
		

Usage
=====

<pre>

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


</pre>
