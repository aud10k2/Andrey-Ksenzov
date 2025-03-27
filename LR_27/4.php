<h2>Форма для регистрации студентов</h2>
<form action="5.php" method="POST"> 
    Имя <br>
    <input type="text" name="first_name" placeholder="Введите ваше имя" required><br> 
    Фамилия <br>
    <input type="text" name="last_name" required><br> 
    
    E-mail <br>
    <input type="email" name="email" required><br> 
    <p>Выберите спецкурс, который вы хотели посещать: <br>
    <input type="checkbox" name="kurs[]" value="PHP">PHP<br>
    <input type="checkbox" name="kurs[]" value="Flash">Web-дизайн: Flash<br>
    <input type="checkbox" name="kurs[]" value="Oracle">Работа с Oracle SQL и PL/SQL<br>
    <input type="checkbox" name="kurs[]" value="HTML">Web-дизайн: HTML<br>
    
    <p>Что вы хотите, чтобы мы знали о вас? <br>
    <textarea name="comment" cols="32" rows="5"></textarea><br>
    
    <input type="submit" value="Отправить">
    <input type="reset" value="Сбросить"> 
</form>