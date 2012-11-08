<?php

mysql_connect("localhost","root","") or die("Neuspesno konektovanje na bazu");
mysql_select_db("proba") or die (mysql_error());


$id=addslashes($_REQUEST['id']);
$image=mysql_query("SELECT * FROM imenik WHERE id=$id");
$image=mysql_fetch_assoc($image);
$image=$image['image'];

header("Content-type:image/jpeg");


echo $image;



?>