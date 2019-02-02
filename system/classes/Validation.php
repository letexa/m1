<?php defined('FRTCFTYU') or die('No direct script access.');

/*
 * Validation helper
 *
*/

class Validation {
	
	/*
	 * Validation staring: delete spaces, delete HTML tags, conversation types.
	 * @param $data Data for conversation..
	 * @param $type Conversation type data.
	 * @return Conversation data.
	 * 
	 *
	*/
	public static function is($data, $type = 'string')
	{
		
		switch($type){
				case 'string':
					$result = (string)htmlspecialchars(trim(strip_tags($data)));
					break;
				case 'integer':
					$result = (int)trim(strip_tags($data));
					break;
				case 'float':
					$result = (float)trim(strip_tags($data));
					break;
				case 'array':
					$result = (array)$data;
					break;
				case 'boolean':
					$result = (boolean)$data;
					break;
			}
		return $result;
		
	}

}
