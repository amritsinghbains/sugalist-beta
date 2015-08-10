<?php
//finds user already logged in
include('config.php');
include('lock.php');


$message=$_GET['message'];

if($message!=""){

			$sql="SELECT id_merchant FROM merchant WHERE USERNAME='$login_session'";
			$sql_run=mysql_query($sql);
			$row=mysql_fetch_array($sql_run);
				
			$sql="INSERT INTO NOTIFICATION VALUES(NULL, '$row[0]', '$message',NULL)";
			$sql_run=mysql_query($sql);
			}

echo "<script type='text/javascript'>window.location = 'index.php'</script>";
	

?>