<?php

class Validations
{
    const Valid_Name = "/^[a-zA-Z ]+$/";
	const Valid_Password = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/";
	const Valid_Contact = "/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/";
	
	
	// For string
    public static function isNameValid($v){
        return preg_match(self::Valid_Name, $v);
    }
	
	// Contact Number
	 public static function isPhoneValid($v){
        return preg_match(self::Valid_Contact, $v);
    }
	// For password
	public static function isPasswordValid($v){
        return preg_match(self::Valid_Password, $v);
    }
    // For empty or null field
    public static function isNullOrEmpty($v) {
        $trim_value = trim($v);
        return !isset($v) || $trim_value === "";
    }
	// For Email
    public static function isEmailValid($v) {
        return filter_var($v, FILTER_VALIDATE_EMAIL);
    }
  
     // For Required Fields
    public static function required($input = null) {
        return (!is_null($input) && (trim($input) != ''));
    }
	// For Numeric
    public static function numeric($input) {
        return is_numeric($input);
    }
   
    // For Integer values
    public static function integer($input) {
        return is_int($input) || ($input == (string) (int) $input);
    }
	
   // For URL
    public static function url($input) {
         return filter_var($input, \FILTER_VALIDATE_URL) !== false;
    }
	// Max Lengthsss
    public static function max_length($input, $length) {
        return (strlen($input) <= $length);
    }
	// Minimum Length
    public static function min_length($input, $length) {
        return (strlen($input) >= $length);
    }
	
	// Exact Length
    public static function exact_length($input, $length) {
        return (strlen($input) == $length);
    }
	
	// Check if two fields equal like password and retype password
    public static function equals($input, $param) {
        return ($input == $param);
    }

    // To validate Date
    public function validateDate($field, $value)
    {
        $isDate = false;
        if ($value instanceof \DateTime) {
            $isDate = true;
        } else {
            $isDate = strtotime($value) !== false;
        }
        return $isDate;
    }

   // To check if Date Format is valid 
        
    protected function validateDateFormat($field, $value, $params)
    {
        $parsed = date_parse_from_format($params[0], $value);
        return $parsed['error_count'] === 0 && $parsed['warning_count'] === 0;
    }
  
  
}


