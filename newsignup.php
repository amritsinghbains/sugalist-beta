<?php
//checks if username exists, else creates account
				include("config.php");
				$myusername=$_POST['username']; 
				$mypassword=$_POST['password']; 
				$zip=$_POST['zipcode']; 
				$email=$_POST['email'];
				$birthday=$_POST['birthday'];
				$city=$_POST['city'];
				$country=$_POST['country'];
				$registrationdate=date("Y-m-d");
				
				
				$sql="SELECT id_customer FROM customer WHERE username='$myusername' ";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$active=$row['active'];
				$count=mysql_num_rows($result);
				if($count==0)
				{
								$sql="SELECT max(id_customer) FROM customer";
								$result=mysql_query($sql);
								$row=mysql_fetch_array($result);
								$idfetch=$row[0]+1;
								$sql="INSERT INTO customer values($idfetch, '$myusername','$zip','$birthday','$city', '$mypassword','$country','$registrationdate','$email')";
								$result=mysql_query($sql);
								echo "<script type='text/javascript'>window.location = 'signup.php?flag=1'</script>";
				}
				else
								echo "<script type='text/javascript'>window.location = 'signup.php?flag=2'</script>";
		
		?>
