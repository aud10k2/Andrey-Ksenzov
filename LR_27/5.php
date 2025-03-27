<?php

$times = array(
    "PHP" => "14.30",
    "Flash" => "12.00",
    "Oracle" => "15.00",
    "HTML" => "14.00"
);

$lectors = array(
    "PHP" => "Василий Васильевич",
    "Flash" => "Иван Иванович",
    "Oracle" => "Петр Петрович",
    "HTML" => "Семен Семенович"
);

define("SIGN", "С уважением, администрация"); 
define("MEETING_TIME", "18.00"); 
$date = "12 мая";

$str = "Здравствуйте, уважаемый " . $_POST["first_name"] . " " . $_POST["last_name"] . "<br>";
$str .= "<br>Сообщаем Вам, что ";

$kurses = $_POST["kurs"]; 

if (!isset($kurses) || empty($kurses)) { 
    $event = "Следующее собрание ";
    $str .= "$event состоится $date в " . MEETING_TIME . "<br>";
} else { // Если хотя бы один курс выбран
    $event = "Выбранные Вами лекции состоятся $date <ul>";
    for ($i = 0; $i < count($kurses); $i++) { 
        $k = $kurses[$i]; 
        $str .= "<li>Лекция по $k в $times[$k] (Ваш лектор: $lectors[$k])</li>"; 
    }
    $str .= "</ul>";
}

$str .= "<br>" . SIGN; 
echo $str; 
?>