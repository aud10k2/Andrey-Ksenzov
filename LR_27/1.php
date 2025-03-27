<h2>Форма для регистрации</h2>
<form action="2.php" method="POST"> 
    Имя <br>
    <input type="text" name="first_name" placeholder="Введите ваше имя" required><br> 
    Фамилия <br>
    <input type="text" name="last_name" required><br> 
    E-mail <br>
    <input type="email" name="email" required><br> 
    <p>Выберите спецкурс, который вы хотели посещать: <br>
    <input type="radio" name="kurs" value="PHP" required>PHP<br>
    <input type="radio" name="kurs" value="Web-дизайн: HTML">Web-дизайн: HTML<br>
    <input type="radio" name="kurs" value="Web-дизайн: Flash">Web-дизайн: Flash<br>
    
    <p>Что вы хотите, чтобы мы знали о вас? <br>
    <textarea name="comment" cols="32" rows="5"></textarea>
    
    <p>
    <input name="confirm" type="checkbox" checked required>Подтвердить получение <br> 
    <input type="submit" value="Отправить">
    <input type="reset" value="Сбросить"> 
</form>