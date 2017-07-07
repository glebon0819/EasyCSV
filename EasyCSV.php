<?php
class EasyCSV {

	//Input: path to CSV file
	//Output: array with contents of CSV
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
	//Input: array
	//Output: string of array contents in CSV format
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
			$result .= "\r\n ";
		}
		return $result;
	}
}
?>