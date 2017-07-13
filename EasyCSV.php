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
	//Input: array, name of file (String)
	//Output: None, creates a CSV file using dumpCSV()
	 public static function ArrayToCSV($array, $fileName) {
		if(count($array) == 0) {
			throw new Exception ("Array is empty");
		}
		$result = "";
		foreach($array as $obj) {
			if(is_array($obj)) {
				
				$result .= implode(",", $obj);
			} else {
				$result .= $obj;
			}
			$result .= "\r\n";
		}
		try {
			self::dumpCSV($result, $fileName);
			return true;
		} catch(Exception $e){
			return false;
		}
	}
	//Input: String of contents, file name
	//Output: Creation of csv file
	public static function dumpCSV($contents, $fileName) {
		$newFile = file_put_contents($fileName . ".csv", $contents, FILE_APPEND | LOCK_EX);
	}
	
	//ADD: optional parameter, boolean, to see if append or to overwrite.
}
?>