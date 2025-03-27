<?php

session_start();

if (!isset($_SESSION["Login"]) || $_SESSION["Login"] != "YES") { // Добавлена проверка isset()
  header("Location: 16.php");
  exit(); // Важно добавить exit() после перенаправления
}

?>

<html>
<head>
  <title>Защищенная страница</title>  <!-- Изменено название -->
</head>
<body>

<h1>Этот документ защищен</h1>
<p>Вы получили доступ к файлу, так как вошли в систему.</p>

</body>
</html>

