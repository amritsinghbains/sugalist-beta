<?php
//finds user already logged in
include('config.php');
include('lock.php');

$id_product=$_GET['id_product'];

$sql="SELECT id_customer FROM CUSTOMER WHERE USERNAME='$login_session'";
$sql_run=mysql_query($sql);
$row=mysql_fetch_array($sql_run);
						

$sql="delete FROM follow WHERE id_product='$id_product' and id_customer='$row[0]'";
$sql_run=mysql_query($sql);

echo "<script type='text/javascript'>window.location = 'index.php'</script>";
								
						
?>