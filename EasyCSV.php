<?php
class EasyCSV {

	//Takes a CSV file with multiple rows/columns and outputs a 2D array of values
	public static function CSVToArray($path) {
		if(count(file($path)) == 0) {
			throw new Exception ("CSV is empty");
		}
		$array = file($path);
		foreach($array as &$sub) {
			$sub = explode(",", $sub);
		}
		return $array;
	}
	
	//Takes an array as input and converts it to CSV format **Does not create/append to a file
	public static function ArrayToCSV($array) {
		if(count($array) == 0) {
			throw new Exception ("Array is empty");
		}
		$result = "";
		foreach($array as $obj) {
			if(count($obj) > 1) {
				foreach($obj as $smallobj) {
					$result .= $smallobj . ",";
				}
			} else {
				$result .= $obj;
			}
			$result .= "/n";
		}
		
	}
	
}
?>