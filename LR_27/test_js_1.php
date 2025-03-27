<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
    <script>
        function calculateResult() {
            let N = 0;

            if (document.getElementById("q11").checked) {
                N = N + 1;
            }
            if (document.getElementById("q12").checked) {
                N = N + 2;
            }

            let q2 = document.querySelector('input[name="q2"]:checked');
            if (q2 && q2.value === "2") { 
                N = N + 3;
            }

    
            let q3 = document.getElementById("q3");
            if (q3 && (q3.value === "1" || q3.value === "2" || q3.value === "4")) {
            } else if (q3 && q3.value === "3"){
                N = N + 1;  
            }

            document.test.result.value = "Ваш результат: " + N + " баллов";
        }
    </script>
</head>
<body>
    <form name="test" action="proverka.php" method="POST">
        <p>Первый вопрос. Выберите <strong>правильные</strong> варианты ответа:</p>
        <input id="q11" type="checkbox" value="1" name="q1"> Ответ F1 <br>
        <input id="q12" type="checkbox" value="2" name="q1"> Ответ F2 <br>

        <p>Второй вопрос. Выберите <strong>один правильный</strong> вариант:</p>
        <input type="radio" id="q21" name="q2" value="1"> Ответ F1 <br>
        <input type="radio" id="q22" name="q2" value="2"> Ответ W2 <br>

        <p>Третий вопрос. Выберите <strong>один правильный</strong> вариант из списка:</p>
        <select name="q3" id="q3" size="1">
            <option value="1">Вариант #1</option>
            <option value="2">Вариант #2</option>
            <option value="3">Вариант #3</option>
            <option value="4">Вариант #4</option>
        </select>
 
        <br>
        <input type="button" value="Результат" onclick="calculateResult()">
        <br>
        <p>
            <input type="submit" class="input" value="Проверка">
            <input type="reset" class="input" value="Сброс">
        </p>
        <textarea name="result" rows="5" cols="60"></textarea>
    </form>
</body>
</html>