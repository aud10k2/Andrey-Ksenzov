<?php

setcookie("name", "name");

setcookie("work", "Swork", time() + 3600);


echo $_COOKIE["name"];

print_r($_COOKIE);
setcookie("work", "", time() - 3600);
if(!isset($_COOKIE['counter'])) {

    setcookie('counter', 0);

    setcookie('timeCookie', time());

    $timeDoc = "Вы зашли на страницу ".date("Y-m-d")." B ".date("H:i:s");

    setcookie('timeDoc', $timeDoc);

    echo $timeDoc;

} else {

    setcookie('counter', ++$_COOKIE['counter']);

    $timeCookie = time()-$_COOKIE['timeCookie'];

    echo $_COOKIE['timeDoc'];

    echo "<br><br> Вы обновили страницу ".$_COOKIE['counter']." раз,";

    echo " последнее обновление через ". $timeCookie. " секунд после открытия страницы";
}
?>