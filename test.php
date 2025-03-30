<meta charset="utf-8">
<?

function interpretScore($score) {
    if ($score >= 7.5) {
        return "����� �������. �� ���������� �������� ��������� � ���������� � ������ �����.";
    } elseif ($score >= 5) {
        return "�������. �� ������ ������ ��������� ������� ������ ����� � ������ ������� ���������.";
    } elseif ($score >= 3) {
        return "�������. ������ ��� ������ ������ ������ ������� ������ �����, �� �� ���������� ��������� ����������.";
    } else {
        return "������. ��� ����� ���� ������ �������� � ��������� ������� ������ �����.";
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
        if (strpos($q4Answer, "�������� �������") !== false || strpos($q4Answer, "�������������") !== false || strpos($q4Answer, "������� ���� �� ����� �������") !== false) {
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


    $result = "��� ���������: " . number_format($score, 1) . " �� 9.0<br>";
    $result .= "������� �������: " . interpretScore($score);
}

?>

<!DOCTYPE html>
<head>
    <title>��������������� ����</title>

</head>
<body>

    <h1>��������������� ����: ������� �������</h1>

    <form id="testForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <h2>1. ����� � ����, ��� ���-�� ���������, ���... (�������� ���� �������)</h2>
        <label>
            <input type="radio" name="q1" value="a"> ...���������� �������, � � �������� �������� ����� ��������.
        </label><br>
        <label>
            <input type="radio" name="q1" value="b"> ...������� ������, ��� ���������, � ������, ���� ����.
        </label><br>
        <label>
            <input type="radio" name="q1" value="c"> ...���������, ������ ��� ��� ���� ���������, � � ������� ������ �� ����� ������.
        </label><br>
        <label>
            <input type="radio" name="q1" value="d"> ...��� �� �������� ���� �������.
        </label><br><br>

        <h2>2. ����� �� ���� ����������� ������ ����� ��������� � ���? (�������� ��������� ���������)</h2>
        <label>
            <input type="checkbox" name="q2[]" value="a"> ��� ����� ����������� ���� �� ����� ������� ��������.
        </label><br>
        <label>
            <input type="checkbox" name="q2[]" value="b"> � ����� �������, ����� ���-�� �������� ������ ���� ������.
        </label><br>
        <label>
            <input type="checkbox" name="q2[]" value="c"> � �����, ��� ����� ������� ������� ������ �����, ���� ���� � � ���� �� ��������.
        </label><br>
        <label>
            <input type="checkbox" name="q2[]" value="d"> ��� ������ ������, ������ ���� ��� ����� ��������� �� ��������� ����.
        </label><br>
        <label>
            <input type="checkbox" name="q2[]" value="e"> � ����� �������� ���� ������������ ���������� ����� ������� � ������, ������������� ������� �������.
        </label><br><br>

        <h2>3. ��� �� �� �������������, ���� �� ������� ��������� ���������� �� �����?</h2>
        <select name="q3">
            <option value="">��������...</option>
            <option value="a">������ �� ����, �� ����������.</option>
            <option value="b">��������������� ��, ��� �� � �������, � ��������� ������.</option>
            <option value="c">������� ��, ��� � ���, ��������, ������ ��������, � �� ���� �� �����������.</option>
            <option value="d">������������ �� ���� ������� � ���������� �� �� �������� � �� �������.</option>
        </select><br><br>

        <h2>4. �������, ��� ��� ��� ������ "���� ����������" ������ �������.</h2>
        <textarea name="q4" rows="4" cols="50"></textarea><br><br>

        <h2>5. ����������� �������� � �������� ���������� �������� ����������� ��������:</h2>

        <label>
            ���� ������� ������: <select name="q5_job">
                <option value="">��������...</option>
                <option value="a">"�� ���������, ��� ���������. ������ ���������� ������ �� ����."</option>
                <option value="b">"��� ����� ����. ��� �� ���� ����������? ��� �� ���������� ������ ������?"</option>
                <option value="c">"��� ������. ��������, ���� ������ ����� ������."</option>
                <option value="d">"��� �����. ��� �����-������ ������ ������."</option>
            </select>
        </label><br>

        <label>
            ������� �� ��������� � ��������: <select name="q5_project">
                <option value="">��������...</option>
                <option value="a">"��, ��� ���� ��������. � ���� �� ������� �����."</option>
                <option value="b">"� �������, ��� �� ���������. ����� ��������, ��� ����� �������� �������� � ��������� ���."</option>
                <option value="c">"�� ���� � ������. ����� �� �������."</option>
                <option value="d">"� �� �� ����� ����� ����� �� ��������."</option>
            </select>
        </label><br>

        <label>
            ���� ����� ���������� ������ ������: <select name="q5_family">
                <option value="">��������...</option>
                <option value="a">"���� ����� ������ ����� ���� � ���� � ��������� ������."</option>
                <option value="b">"� �����, ���� ���� ����� ����������. �������� ���, ��� ����������."</option>
                <option value="c">"��� ��� ���� ��������. �� ��� �������."</option>
                <option value="d">"� �� ����, ��� �������. ������ �������, ��� ��� ����� ����������."</option>
            </select>
        </label><br>

        <input type="submit" value="���������">
        <input type="reset" value="��������">

    </form>

    <div id="result">
        <?php echo $result; ?>
    </div>

</body>
</html>
