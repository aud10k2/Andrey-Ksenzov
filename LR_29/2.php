<?php

// --- Листинг 

session_start();

print "ID вашей сессии: " . session_id(); // Исправлено: добавлена точка для конкатенации

session_destroy();

?>

<?php

// --- Листинг 2: 

session_start();

if (!isset($_SESSION['hits'])) {
    $_SESSION['hits'] = 0;
}

$_SESSION['hits']++;

print "Вы посетили эту страницу " . $_SESSION['hits'] . " раз"; // 
?>

<?php

// --- Листинг 3

session_start();

// задаем значение переменной
$_SESSION['a'] = "Меня задали на 14.php"; 

?>

<html>
<body>

Все ОК. Сессию загрузили!

Посмотрим что <a href="1-1.php">там</a>

</body>
</html>




<?php

// --- Листинг 5

session_start();

if(!isset($_SESSION['counter'])) $_SESSION['counter']=0;

echo "Вы обновили эту страницу ".$_SESSION['counter']++." раз.";

echo "<br><a href='".$_SERVER['PHP_SELF']."'>обновить</a>"; 
?>