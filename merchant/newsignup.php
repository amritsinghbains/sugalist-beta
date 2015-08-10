<?php
//checks if username exists, else creates account
				include("config.php");
				$myusername=$_POST['username']; 
				$mypassword=$_POST['password']; 
				
				$email=$_POST['email'];
				
				
				
				$sql="SELECT id_merchant FROM merchant WHERE username='$myusername' ";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$active=$row['active'];
				$count=mysql_num_rows($result);
				
				if($myusername=="index")
				$count=1;
								
				if($count==0)
				{
								$filehandle=fopen($_SERVER['DOCUMENT_ROOT']."/main/market/$myusername.php","wb");
								fclose($filehandle);
								Copy($_SERVER['DOCUMENT_ROOT']."/main/market/base/abc.php",$_SERVER['DOCUMENT_ROOT']."/main/market/$myusername.php");

								$sql="SELECT max(id_merchant) FROM merchant";
								$result=mysql_query($sql);
								$row=mysql_fetch_array($result);
								$idfetch=$row[0]+1;
								$sql="INSERT INTO merchant values($idfetch, '$myusername','$email','$mypassword')";
								$result=mysql_query($sql);
								//create file in market folder for showroom(virtual market) for companies in stealth mode
								
								
								
								echo "<script type='text/javascript'>window.location = 'signup.php?flag=1'</script>";
				}
				else
								echo "<script type='text/javascript'>window.location = 'signup.php?flag=2'</script>";

		?>
