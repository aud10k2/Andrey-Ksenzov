<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Результат теста</title>
</head>
<body>

<?php

function interpretScore($score) {
    if ($score >= 7.5) {
        return "Очень высокий. Вы проявляете глубокое понимание и сочувствие к другим людям.";
    } elseif ($score >= 5) {
        return "Высокий. Вы обычно хорошо понимаете чувства других людей и готовы оказать поддержку.";
    } elseif ($score >= 3) {
        return "Средний. Иногда вам бывает трудно понять чувства других людей, но вы стараетесь проявлять сочувствие.";
    } else {
        return "Низкий. Вам может быть сложно понимать и разделять чувства других людей.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $score = 0;


    if (isset($_POST['q1'])) {
        $q1Answer = $_POST['q1'];
        if ($q1Answer === 'c') {
            $score++;
        } elseif ($q1Answer === 'b') {
            $score += 1.5;
        }
    }


    $q2CorrectAnswers = 0;
    if (isset($_POST['q2']) && is_array($_POST['q2'])) {
        foreach ($_POST['q2'] as $answer) {
            if ($answer === 'a' || $answer === 'b' || $answer === 'c') {
                $q2CorrectAnswers++;
            }
            if ($answer === 'e') {
                $score += 0.5;
            }
        }
    }
    $score += $q2CorrectAnswers * 0.5;


    if (isset($_POST['q3'])) {
        $q3Answer = $_POST['q3'];
        if ($q3Answer === 'b') {
            $score += 1.5;
        }
         if ($q3Answer === 'c') {
                $score += 1;
            }
    }


    if (isset($_POST['q4'])) {
        $q4Answer = strtolower(trim($_POST['q4']));
        if (strpos($q4Answer, "понимать чувства") !== false || strpos($q4Answer, "сочувствовать") !== false || strpos($q4Answer, "ставить себя на место другого") !== false) {
            $score += 1.5;
        }
    }


    if (isset($_POST['q5_job']) && isset($_POST['q5_project']) && isset($_POST['q5_family'])) {
        $q5JobAnswer = $_POST['q5_job'];
        $q5ProjectAnswer = $_POST['q5_project'];
        $q5FamilyAnswer = $_POST['q5_family'];

        if ($q5JobAnswer === 'b' && $q5ProjectAnswer === 'b' && $q5FamilyAnswer === 'b') {
            $score += 2;
        } else {
              if ($q5JobAnswer === 'c'){
                $score+=0.5;
              }
              if ($q5ProjectAnswer === 'c'){
                $score+=0.5;
              }
              if ($q5FamilyAnswer === 'a'){
                $score+=0.5;
              }
        }
    }


    $result = " результат: " . number_format($score, 1) . " из 9.0<br>";
    $result .= "Уровень Эмпатии " . interpretScore($score);

    echo "<p>" . $result . "</p>";
} else {
    echo "<p>Форма не отправлена</p>"; 
}

?>

</body>
</html>
