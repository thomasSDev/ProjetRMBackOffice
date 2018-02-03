<?php
namespace utils;

class KeyValues
{
	private $key;
	private $values;

	public KeyValues($k){
		$key = $k;
		$values = new array();
	}

	public add($value){
		array_push($values, $value);
	}

	public getKey(){
		return $key;
	}

	public getValues(){
		return $values;
	}
}

?>

