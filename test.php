
<?

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

$result = "";


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


    $result = "Ваш результат: " . number_format($score, 1) . " из 9.0<br>";
    $result .= "Уровень Эмпатии: " . interpretScore($score);
}

?>

<!DOCTYPE html>
<head>
    <title>Психологический тест</title>

</head>
<body>

    <h1>Психологический тест: Уровень Эмпатии</h1>

    <form id="testForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <h2>1. Когда я вижу, что кто-то расстроен, мне... (Выберите один вариант)</h2>
        <label>
            <input type="radio" name="q1" value="a"> ...становится неловко, и я стараюсь избегать этого человека.
        </label><br>
        <label>
            <input type="radio" name="q1" value="b"> ...хочется узнать, что случилось, и помочь, если могу.
        </label><br>
        <label>
            <input type="radio" name="q1" value="c"> ...интересно, почему они так себя чувствуют, и я пытаюсь понять их точку зрения.
        </label><br>
        <label>
            <input type="radio" name="q1" value="d"> ...это не особенно меня заботит.
        </label><br><br>

        <h2>2. Какие из этих утверждений больше всего относятся к вам? (Выберите несколько вариантов)</h2>
        <label>
            <input type="checkbox" name="q2[]" value="a"> Мне легко представить себя на месте другого человека.
        </label><br>
        <label>
            <input type="checkbox" name="q2[]" value="b"> Я часто замечаю, когда кто-то пытается скрыть свои эмоции.
        </label><br>
        <label>
            <input type="checkbox" name="q2[]" value="c"> Я думаю, что важно уважать чувства других людей, даже если я с ними не согласен.
        </label><br>
        <label>
            <input type="checkbox" name="q2[]" value="d"> Мне трудно понять, почему люди так остро реагируют на некоторые вещи.
        </label><br>
        <label>
            <input type="checkbox" name="q2[]" value="e"> Я часто чувствую себя эмоционально истощенным после общения с людьми, переживающими трудные времена.
        </label><br><br>

        <h2>3. Как бы вы отреагировали, если бы увидели плачущего незнакомца на улице?</h2>
        <select name="q3">
            <option value="">Выберите...</option>
            <option value="a">Прошел бы мимо, не вмешиваясь.</option>
            <option value="b">Поинтересовался бы, все ли в порядке, и предложил помощь.</option>
            <option value="c">Подумал бы, что у них, наверное, личные проблемы, и не стал бы вмешиваться.</option>
            <option value="d">Почувствовал бы себя неловко и постарался бы не смотреть в их сторону.</option>
        </select><br><br>

        <h2>4. Опишите, что для вас значит "быть эмпатичным" своими словами.</h2>
        <textarea name="q4" rows="4" cols="50"></textarea><br><br>

        <h2>5. Сопоставьте ситуации с наиболее подходящей реакцией эмпатичного человека:</h2>

        <label>
            Друг потерял работу: <select name="q5_job">
                <option value="">Выберите...</option>
                <option value="a">"Не переживай, все наладится. Просто постарайся забыть об этом."</option>
                <option value="b">"Мне очень жаль. Как ты себя чувствуешь? Что ты планируешь делать дальше?"</option>
                <option value="c">"Это ужасно. Наверное, тебе сейчас очень тяжело."</option>
                <option value="d">"Это жизнь. Все когда-нибудь теряют работу."</option>
            </select>
        </label><br>

        <label>
            Коллега не справился с проектом: <select name="q5_project">
                <option value="">Выберите...</option>
                <option value="a">"Ну, это было ожидаемо. У тебя не хватало опыта."</option>
                <option value="b">"Я понимаю, что ты расстроен. Давай подумаем, как можно улучшить ситуацию в следующий раз."</option>
                <option value="c">"Не бери в голову. Никто не идеален."</option>
                <option value="d">"Я бы на твоем месте давно бы уволился."</option>
            </select>
        </label><br>

        <label>
            Член семьи переживает личный кризис: <select name="q5_family">
                <option value="">Выберите...</option>
                <option value="a">"Тебе нужно просто взять себя в руки и двигаться дальше."</option>
                <option value="b">"Я здесь, если тебе нужно поговорить. Расскажи мне, что происходит."</option>
                <option value="c">"Это все твои проблемы. Ты сам виноват."</option>
                <option value="d">"Я не знаю, что сказать. Просто надеюсь, что все скоро закончится."</option>
            </select>
        </label><br>

        <input type="submit" value="Отправить">
        <input type="reset" value="Сбросить">

    </form>

    <div id="result">
        <?php echo $result; ?>
    </div>

</body>
</html>
