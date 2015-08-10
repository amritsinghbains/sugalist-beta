<?php
include('lock.php');

include('connexion.php');


?>


<?php
	//check if the form is submited
	$flag=0;
	if(!empty($_POST)){
	
		if((!empty($_POST['name']))&& (!empty($_POST['city'])) && (!empty($_POST['zip']))){ //put the mandatory field
		
			$name=mysql_real_escape_string($_POST['name']);
			$city=mysql_real_escape_string($_POST['city']);
			$zip=mysql_real_escape_string($_POST['zip']);
			$country=mysql_real_escape_string($_POST['country']);
			
			$sql="SELECT * FROM merchant WHERE USERNAME='$login_session'";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
									
									
		$id_merchant=$row[0]; //Use the session variable to set this variable to the Id of the connected merchant
		
		
				/* Save the store */
			
			 $sql=sprintf("INSERT INTO STORE (`ID_STORE`,`ID_MERCHANT`, `NAME`, `CITY`, `ZIP`, `COUNTRY`)
			 VALUES(NULL,'%s','%s','%s','%s','%s')",
					$connexion->real_escape_string($id_merchant),
					$connexion->real_escape_string($name),
					$connexion->real_escape_string($city),
					$connexion->real_escape_string($zip),
					$connexion->real_escape_string($country));
					
					
				
				// If OK do what you want
				
				if ($connexion->query($sql) === TRUE) {
					
					$flag=1;
				}
		}
	}

?>
<!doctype html>
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
                        <ul class="nav">
                        <h3><li class="span5 offset1">
                        	
							
                        </li></h3>
                        </ul>
                       
                        <ul class="nav pull-right">
                          	<li class="dropdown">
                           	 	<a class="dropdown-toggle" href="#" data-toggle="dropdown"><?php echo $login_session; ?>
								<strong class="caret"></strong></a>
                            	<div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px;">
                                     
									 
									<?php
									
											$sql="SELECT * FROM merchant WHERE USERNAME='$login_session'";
											$result=mysql_query($sql);
											$row=mysql_fetch_array($result);
											
											echo "	
													<strong>EMAIL: </strong>$row[2]<br/>
													
													";
											
											
											
											
											
									 ?>
									 
                           		</div>
                          	</li>
							<li><a href="logout.php">Logout</a></li>
                          	
                          </ul> 
                          
                     </div>
                 </div> 

<!--- Container --->                 
                
                
                <div class="row container ">
                <div id="tab_whishlist span12">
                <h3 style="color: #ff3333;">Add New Store  <h4>	<?php if($flag==1) echo 'Succesfully inserted !'; ?></h4>
				</h3>
                    </div>
                <div class="span9 container" > 
                


				
				
<form action="addstore.php" method="post">
<table width="400">
<tr><td><label>Name  :</label></td><td><input type="text" name="name" class="box"/></td></tr>
<tr><td><label>City  :</label></td><td><input type="text" name="city" class="box"/></td></tr>
<tr><td><label>Zip  :</label></td><td><input type="text" name="zip" class="box"/></td></tr>
<tr><td><label>Country  :</label></td><td><input type="text" name="country" class="box" /></td></tr>
</table>

<input type="submit" class="btn" value=" Submit "/><br />

</form>


				
				
				
				

        </div>

                  
                   <div class="span3">
                  
				   
				   
					
                </div>
							
							
							<?php
							include('footer.php');
							?>