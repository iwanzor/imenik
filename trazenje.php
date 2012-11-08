<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TRAZENJE</title>
</head>

<body>
Trazite zeljeni kontakt po imenu ILI prezimenu:

<form id="trazenje" name="trazenje" action="trazenje.php" method="post">
<p><label>Ime: <input type="text" id="inputime" name="inputime" value="" /></label></p
><p><label>Prezime: <input type="text" id="inputprezime" name="inputprezime" value="" /></label></p>
<input type="hidden" id="action" name="action" value="submitform" />

<p><input type="submit" id="submit" name="submit" value="Submit" /> <input type="reset" id="reset" name="reset" value="Reset" /></p>





<?php
$inputime=$_REQUEST['inputime'];
$inputprezime=$_REQUEST['inputprezime'];
mysql_connect("localhost", "root","");
mysql_select_db("proba");
$sql=mysql_query("SELECT * FROM imenik WHERE ime='$inputime' OR prezime='$inputprezime'");
$num=mysql_numrows($sql);
if ($num <> 0) { echo 'Pretraga je uspesna. Pronadjeni rezultati su: <br/><br/>';

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
if ($num==0) echo 'Nazalost, pretraga je neuspesna';
$i++;
}
}
?>


</body>
</html>