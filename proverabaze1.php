<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> LISTA </title>
</head>

<body>
<?php
mysql_connect("localhost", "root","");
mysql_select_db("proba");
$sql=mysql_query("SELECT * FROM imenik ORDER BY ime ASC ");
$num=mysql_numrows($sql);

$i=0;
while ($i < $num) {

$id='id';
$ime='ime';
$prezime='prezime';
$broj='broj';
$komentar='komentar';
$rows = mysql_fetch_assoc($sql);
echo "<img src=get.php?id=".$rows[$id].">";
echo "<br/>";
echo '<font color="red"> ID: </font>' . $rows[$id] . '<br/>'. 'Ime: ' . $rows[$ime] . '<br/>' . 'Prezime: ' . $rows[$prezime] . '<br/>' . 'Broj telefona: ' . $rows[$broj] . '<br/>' . 'Komentar: ' . $rows [$komentar] . '<br/>' . '<hr/>';

$i++;
}





?>
</body>
</html>