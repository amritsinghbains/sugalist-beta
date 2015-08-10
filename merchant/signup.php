<?php
ob_start();

session_start();
//customers login page
		include("config.php");
		

		$user_check=$_SESSION['login_user'];
		$ses_sql=mysql_query("select username from merchant where username='$user_check' ");
		$row=mysql_fetch_array($ses_sql);
		$login_session=$row['username'];
		if(isset($login_session))
		{
				echo "<script type='text/javascript'>window.location = 'index.php'</script>";
		}


		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
				// username and password sent from form 
			
				$myusername=$_POST['username']; 
				$mypassword=$_POST['password']; 

				$sql="SELECT id_merchant FROM merchant WHERE username='$myusername' and password='$mypassword'";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$active=$row['active'];
				$count=mysql_num_rows($result);

				// If result matched $myusername and $mypassword, table row must be 1 row
				if($count==1)
				{
						$_SESSION['login_user']=$myusername;
			 echo "	<script type='text/javascript'>window.location = 'index.php'</script>";
		}
				else 
				{
						$error="Your Login Name or Password is invalid";
				}
		}
?>


<html>
<head>
<meta charset="utf-8">
<title>Sugalist</title>


<!--- css --->
<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<!--- responsive --->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

		<div class="container-fluid">

<!--- Menu HEADER --->

     			<div class="navbar container">
					<div class="navbar-inner">
                        <a class="brand" href="index.php"> <img src="img/logo.png"/></a>
                        
						
                       
                        <ul class="nav pull-right">
 
  <li><a href="/main/login.php">Customer Login</a></li>
 <li><a href="login.php">Merchant Login</a></li>
                         	
							</ul> 
                          
                     </div>
                 </div> 

<!--- Container --->                 
                
                
                <div class="row container ">
                <div id="tab_whishlist span12">
				
				
				
				
				<h2 style="color: #ff3333;">
 <?php
 $flag=$_GET['flag'];
 if($flag==1)
 echo "Registration Successful";
 else if($flag==2)
 echo "Username Exists";
 ?>
 </h2>

 
 
 
                <h3 style="color: #ff3333;">Merchant Sign Up </h3>
				
                          	
                    </div>
                <div class="span9 container" > 
                



 


				<div style="width:500px; " align="left">



<form action="newsignup.php" method="post">
<label>UserName  :</label><input type="text" name="username" class="box"/><br/>
<label>Email  :</label><input type="text" name="email" class="box"/><br/>
<label>Password  :</label><input type="password" name="password" class="box" /><br/>


<input type="submit" class="btn" value=" Submit "/><br />

</form>

				
				
				
				
				
</div>


				













				

        </div>

                  
				  
                       
							<?php
							include('footer.php');
							?>
