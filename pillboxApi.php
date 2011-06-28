<?php
/*
		The Pillbox beta API v2 is RESTful. Output is XML.
	
		 Pagination is currently broken?
*/
class pillboxApi extends APIBaseClass{

	public static $api_url = 'http://pillbox.nlm.nih.gov/PHP/pillboxAPIService.php';
	
	// API KEY REQUIRED
	
	public static $api_key = '';
	
	public function __construct($url=NULL)
	{
		parent::new_request(($url?$url:self::$api_url));
	}
	
	public static $base_options = array(
	// disabling 'lower_limit' because pagination is currently not working
		'shape'=> array(
				    'BULLET' => 'C48335',
				    'CAPSULE' => 'C48336',
				    'CLOVER' => 'C48337',
				    'DIAMOND' => 'C48338',
				    'DOUBLE CIRCLE' => 'C48339',
				    'FREEFORM' => 'C48340',
				    'GEAR' => 'C48341',
				    'HEPTAGON' => 'C48342',
				    'HEXAGON' => 'C48343',
				    'OCTAGON' => 'C48344',
				    'OVAL' => 'C48345',
				    'PENTAGON' => 'C48346',
				    'RECTANGLE' => 'C48347',
				    'ROUND' => 'C48348',
				    'SEMI-CIRCLE' => 'C48349',
				    'SQUARE' => 'C48350',
				    'TEAR' => 'C48351',
				    'TRAPEZOID' => 'C48352',
				    'TRIANGLE' => 'C48353'),
		'color'=> array(    	
					'BLACK' => 'C48323',
				    'BLUE' => 'C48333',
				    'BROWN' => 'C48332',
				    'GRAY' => 'C48324',
				    'GREEN' => 'C48329',
				    'ORANGE' => 'C48331',
				    'PINK' => 'C48328',
				    'PURPLE' => 'C48327',
				    'RED' => 'C48326',
				    'TURQUOISE' => 'C48334',
				    'WHITE' => 'C48325',
				    'YELLOW' => 'C48330'),
		'score'=>'',
		'size'=>'',
		'ingredient'=>'',
		'prodcode'=>'',
		'has_image'=>'',
		'imprint'=>'',
		'dea'=> array(
			    'CI' => 'C48672',
    			'CII' => 'C48675',
    			'CIII' => 'C48676',
    			'CIV' => 'C48677',
    			'CV' => 'C48679'),
		'inactive'=>''
		
	);
	
	public function search_pill($options=NULL){
	// pass it an assoc. array with the options you would like to search and value
		foreach($options as $key=>$value)
		{
			if (array_key_exists($key,self::$base_options)){
				if(is_array(self::$base_options[$key])){
					if(in_array($value,self::$base_options[$key]) || array_key_exists(strtoupper($value),self::$base_options[$key]))
					// allows to use either the key name or the value to define what gets passed, example : you can say YELLOW or C48330  
						$data[$key] = (in_array($value,self::$base_options[$key])? self::$base_options[$key][strtoupper($value)]:$value);
				}else{
					$data[$key] = $value;
				}
			}
		}
		
		$data['key'] = self::$api_key;
		return self::_request($api_url,$data);
	}
}