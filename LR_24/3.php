</html>
<?php
$tit1 = "CCO";
$CSS1 = "a {text-decoration: none;}
td {width: 20%;}";
function display_head($tit, $CSS): void {

  echo "<html><head><meta charset=\"UTF-8\">
<title> $tit </title>
<style type='text/css'> $CSS
</style></head><body>";
}
function display_body(): void {

  echo "<table border='1' width=100%>
<tr align='center'>
<td><a href='history.html'>История</a></td>
<td><a href='admin.html'>Администрация</a></td>
<td><a href='process.html'>Дневное отделение</a></td>
<td><a href='otherSpec.html'>Заочное отделение</a></td>
<td><a href='educational.html'>Воспитательная работа</a></td>
</tr>
</table>";

  echo "</body></html>";
}
display_head(tit: $tit1, CSS: $CSS1);
display_body();
?>








