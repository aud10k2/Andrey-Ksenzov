<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты теста</title>
</head>
<body>

<?php

// Инициализация переменной для хранения результата
$N = 0;

// Обработка первого вопроса (чекбоксы)
if (isset($_POST["q1"]) && is_array($_POST["q1"])) {
    $q1 = $_POST["q1"];
    if (in_array("1", $q1)) { // Проверка, был ли отмечен чекбокс со значением 1
        $N = $N + 1;
    }
    if (in_array("2", $q1)) { // Проверка, был ли отмечен чекбокс со значением 2
        $N = $N + 2;
    }

    if (count($q1) >= 2) { // Если отмечено 2 или больше чекбоксов.
        $N = $N + 1; // Начисляем еще один балл.
    }
}

// Обработка второго вопроса (радио)
if (isset($_POST["q2"])) {
    $q2 = $_POST["q2"];
    if ($q2 == 2) { // Если выбран вариант со значением 2.
        $N = $N + 3;
    }
}

// Обработка третьего вопроса (выпадающий список)
if (isset($_POST["q3"])) {
    $q3 = $_POST["q3"];
    if ($q3 == 1) { // Если выбран вариант со значением 1.
        $N = $N + 3;
    }
}

// Определение окончания для слова "балл" в зависимости от количества баллов
$str = "баллов"; // По умолчанию "баллов"
switch ($N) {
    case 1:
        $str = "балл";
        break;
    case 2:
    case 3:
    case 4:
        $str = "балла";
        break;
}

// Вывод результата
echo "Вы набрали " . $N . " " . $str;

?>

</body>
</html>