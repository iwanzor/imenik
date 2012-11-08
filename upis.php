
<?php


require_once('konekcija.php');




if(isset($_POST['action']) && $_POST['action'] == 'submitform')
{
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$broj = $_POST['broj'];
	$komentar = $_POST['komentar'];
	
	
	$ip = gethostbyname($_SERVER['REMOTE_ADDR']);
	
	
	mysql_select_db($database_connection, $connection);
	
	$insert_query = sprintf("INSERT INTO imenik (ime, prezime, broj, komentar, date, ip) VALUES (%s, %s, %s, %s, NOW(), %s)",
							sanitize($ime, "text"),
							sanitize($prezime, "text"),
							sanitize($broj, "text"),
							sanitize($komentar, "text"),
							sanitize($ip, "text"));
	
	$result = mysql_query($insert_query, $connection) or die(mysql_error());
	
	if($result)
	{
		
		
		//ok message
		
		echo "Kontakt je uspesno upisan u bazu.";
	}
} 

function sanitize($value, $type) 
{
  $value = (!get_magic_quotes_gpc()) ? addslashes($value) : $value;

  switch ($type) {
    case "text":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $value = ($value != "") ? intval($value) : "NULL";
      break;
    case "double":
      $value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";
      break;
    case "date":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
  }
  
  return $value;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Upis kontakata</title>

Popunite ispod navedena polja!

<form id="upis" name="upis" action="upis.php" method="post">

<p><label>Ime: <input type="text" id="ime" name="ime" value="" /></label></p>
<p><label>Prezime: <input type="text" id="prezime" name="prezime" value="" /></label></p>
<p><label>Broj telefona: <input type="text" id="broj" name="broj" value="" /></label></p>

<p><label>Komentar:<br /><textarea id="komentar" name="komentar" cols="50" rows="3"></textarea></label></p>

<input type="hidden" id="action" name="action" value="submitform" />

<p><input type="submit" id="submit" name="submit" value="Dodaj" /> <input type="reset" id="reset" name="reset" value="Reset" /></p>

</form>



</body>
</html>