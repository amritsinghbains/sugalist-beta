<?php


include('lock.php');

include('connexion.php');
?>


<?php
	//check if the form is submited
	$flag=0;
	if(!empty($_POST)){
	
		if((!empty($_POST['name']))&& (!empty($_POST['price'])) && (!empty($_POST['zip']))){ //put the mandatory field
		
			$name=mysql_real_escape_string($_POST['name']);
			$imageurl=mysql_real_escape_string($_POST['imageurl']); 
			$size=mysql_real_escape_string($_POST['size']);
			$color=mysql_real_escape_string($_POST['color']);
			$price=mysql_real_escape_string($_POST['price']);
			$sale=mysql_real_escape_string($_POST['sale']);
			$suga=mysql_real_escape_string($_POST['suga']);
			$promo=mysql_real_escape_string($_POST['promo']);
			$store=mysql_real_escape_string($_POST['store']);
			$category=mysql_real_escape_string($_POST['category']); 
			$city=mysql_real_escape_string($_POST['city']);
			$zip=mysql_real_escape_string($_POST['zip']);
			$country=mysql_real_escape_string($_POST['country']);
			
			
				/* Save the product */
			
			 $sql=sprintf("INSERT INTO PRODUCT (`ID_PRODUCT`, `ID_CATEGORY`, `ID_STORE`, `NAME`, `SIZE`, `COLOR`, `PRICE` , 
			 `INITSALE` , `INITCUSTOMIZED_PRICE` , `INITCODE_PROMO` , `IMAGEURL`)
			 VALUES(NULL,'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
					$connexion->real_escape_string($category),
					$connexion->real_escape_string($store),
					$connexion->real_escape_string($name),
					$connexion->real_escape_string($size),
					$connexion->real_escape_string($color),
					$connexion->real_escape_string($price),
					$connexion->real_escape_string($sale),
					$connexion->real_escape_string($suga),
					$connexion->real_escape_string($promo),
					$connexion->real_escape_string($imageurl));
					
					
				
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
                <h3 style="color: #ff3333;">Add New Product <h4>	<?php if($flag==1) echo 'Succesfully inserted !'; ?></h4>
				
				</h3>
				
                    </div>
                <div class="span9 container" > 
                


				
				
<form action="addnewproduct_new.php" method="post">
<table width="400">
<tr><td><label>Name  :</label></td><td><input type="text" name="name" class="box"/></td></tr>
<tr><td><label>Image URL  :</label></td><td><input type="text" name="imageurl" class="box"/></td></tr>
<tr><td><label>Category  :</label></td><td><select name="category" >
			<option value="">[-- Select the category --]</option>
		<?php
			// retrieve the name of all Categories
			
		$sql2 = "SELECT * FROM CATEGORY"; 

		// perform the query and store the result
		$result2 = $connexion->query($sql2);
		// if the $result contains at least one row
		if ($result2->num_rows > 0) {
		  // output data of each row from $result
		  while($row = $result2->fetch_assoc()) {
				
		?>
		  <option value="<?php echo $row['ID_CATEGORY']; ?>"><?php echo $row['NAME']; ?></option>
		<?php 
		}
		}
		?>
  </select></td></tr>
<tr><td><label>Size  :</label></td><td><input type="text" name="size" class="box"/></td></tr>
<tr><td><label>Color  :</label></td><td><input type="text" name="color" class="box" /></td></tr>
<tr><td><label>Price  : $ </label></td><td><input type="text" name="price" class="box"/></td></tr>
<tr><td><label>Sale  : $ </label></td><td><input type="text" name="sale" class="box"/></td></tr>
<tr><td><label>Suga  : $ </label></td><td><input type="text" name="suga" class="box"/></td></tr>
<tr><td><label>Promo  :  </label></td><td><input type="text" name="promo" class="box"/></td></tr>
<tr><td><label>Store  :</label></td><td><select name="store" >
			<option value="">[-- Select the store --]</option>
		<?php
			// retrieve the name of all stores for the merchant
		
											$sql="SELECT * FROM merchant WHERE USERNAME='$login_session'";
											$result=mysql_query($sql);
											$row=mysql_fetch_array($result);
									
									
		$id_merchant=$row[0]; //Use the session variable to set this variable to the Id of the connected merchant
		
		$sql3 = sprintf("SELECT * FROM STORE where ID_MERCHANT='%s'",
					$connexion->real_escape_string($id_merchant)); 

		// perform the query and store the result
		$result3 = $connexion->query($sql3);
		// if the $result contains at least one row
		if($result3->num_rows ==0)
		echo "<script type='text/javascript'>window.location = 'addstore.php'</script>";
				
		if ($result3->num_rows > 0) {
		  // output data of each row from $result
		  while($row1 = $result3->fetch_assoc()) {
				
		?>
		  <option value="<?php echo $row1['ID_STORE']; ?>"><?php echo $row1['NAME']; ?></option>
		<?php 
		}
		}
		?>
  </select></td></tr>
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