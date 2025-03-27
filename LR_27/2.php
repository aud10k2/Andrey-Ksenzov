<?php
$lastName = $_REQUEST["last_name"];
$firstName = $_REQUEST["first_name"]; 
$kurs = $_REQUEST["kurs"];

$str = "Здравствуйте, $firstName $lastName!<br>";
$str .= "Вы выбрали для изучения курс по $kurs.";


echo $str;
?>