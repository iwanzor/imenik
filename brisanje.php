<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Brisanje</title>
</head>

Unesite ID kontakta koji zelite da izbrisete:

<form id="brisanje" name="brisanje" action="brisanje.php" method="post">
<p><label>Indeks: <input type="text" id="idbrisanja" name="idbrisanja" value="" /></label></p>
<input type="hidden" id="action" name="action" value="submitform" />

<p><input type="submit" id="submit" name="submit" value="Submit" /> <input type="reset" id="reset" name="reset" value="Reset" /></p>



</form>

<?php
$idbrisanja = $_REQUEST['idbrisanja'];
mysql_connect("localhost", "root","");
mysql_select_db("proba");
$sql=mysql_query("DELETE FROM imenik WHERE id='$idbrisanja'");
echo 'Kontakt je uspesno izbrisan iz baze!';
?>
<body>
</body>
</html>