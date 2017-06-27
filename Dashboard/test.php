<?php
require_once 'validation.php';

$fname = new Validations();

$name = $fname->isNameValid("sheenam");
var_dump($name); echo "Expected True"."<br/>";

$password = $fname->isPasswordValid("sheenam");
var_dump($password); echo "Expected False"."<br/>";
 
$empty = $fname->isNullOrEmpty(" ");
var_dump($empty); echo "Expected True"."<br/>";

$contact = $fname->isPhoneValid("123-0125-5144");
var_dump($contact); echo "Expected true"."<br/>";

$email = $fname->isEmailValid("mecom");
var_dump($email); echo "Expected false"."<br/>";

$required = $fname->required(" ");
var_dump($required); echo "Expected false"."<br/>";

$num = $fname->numeric("12ss");
var_dump($num); echo "Expected false"."<br/>";

$int = $fname->integer("125555");
var_dump($int); echo "Expected true"."<br/>";

$ul = $fname->url("htt:/");
var_dump($ul); echo "Expected false"."<br/>";

$len = $fname->max_length("12345", 4);
var_dump($len); echo "Expected false"."<br/>";
?>
