<?php
//finds the user for merchant's login with sugalist
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysql_query("select username from customer where username='$user_check' ");

$row=mysql_fetch_array($ses_sql);

$login_session=$row['username'];
?>
<h1>
<?php
if(!isset($login_session))
{
	echo "No user logged on. <a href=login.php target=/blank ><button class=\"btn btn-primary\"> Login Page</button></a>";
}
?>
<?php echo $login_session; ?>
</h1>

<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">