<?php
class EasyCSV {

	/*	These are redundant functions
	
	//Takes a CSV file with one column of data and outputs an array of values
	public static function verticalOutput($path) {
		$array = file($path);
			if(count(file($path)) == 0) {
				throw new Exception ("CSV is empty");
			}
			foreach($array as $item) {
				if(strpos($item, ",")) {
					throw new Exception("CSV contains more than one column");
				}
			}
		return $array;
	}
	
	//Takes a CSV file with one row of data and outputs an array of values (if there are multiple rows, it only outputs the first row)
	public static function horizontalOutput($path) {
		$array = explode(",",file($path)[0]);
		if(count(file($path)) == 0) {
			throw new Exception ("CSV is empty");
		}
		
		return $array;
	}
	*/
	//Takes a CSV file with multiple rows/columns and outputs a 2D array of values
	public static function CSVToArray($path) {
		$array = self::verticalOutput($path);
		foreach($array as &$sub) {
			$sub = explode(",", $sub);
		}
		if(count(file($path)) == 0) {
			throw new Exception ("CSV is empty");
		}
		return $array;
	}
	
	//Takes an array as input and converts it to CSV format **Does not create/append to a file
	public static function ArrayToCSV($array) {
		
	}
	
}
?>