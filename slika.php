<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form action="slika.php" method="POST" enctype="multipart/form-data">
File:
<input type="file" name="image">
<p><label>Id korisinika: <input type="text" id="idupisan" name="idupisan" value="" /></label></p>
 <input type="submit" value="Upload">

</form>

<?php
//connect to database
mysql_connect("localhost","root","") or die("Neuspesno konektovanje na bazu");
mysql_select_db("proba") or die (mysql_error());



$file=$_FILES['image']['tmp_name'];
$idupisan=$_REQUEST['idupisan'];
if (!isset($file))
	echo "Molimo Vas da izaberite sliku!";
	else {
	$image= addslashes(file_get_contents ($_FILES['image']['tmp_name']));
	$image_name=$_FILES['image']['name'];
	$image_size=getimagesize($_FILES['image']['tmp_name']);	
	if ($image_size==FALSE)	
		echo "Ovo nije slika";
		else
		{
			if(!$insert = mysql_query("UPDATE imenik SET image='$image', name='$image_name' WHERE id='$idupisan'"))
			echo "Problem u obradi.";
			
		else
			 {
				 
				 
				 
				 
			$lastid=mysql_insert_id();
			echo "Slika je obradjena.<p />Vasa slika: <p/><img src=get.php?id=$idupisan>";	
				}}}?>
                
                
</body>
</html>
