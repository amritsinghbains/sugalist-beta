<?php
include('lock.php');



$merchant=$_GET["merchant"];
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sugalist</title>


<!--- css --->
<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/extras.css">

<!--- responsive --->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

		<div class="container-fluid">

<!--- Menu HEADER --->

     			<div class="navbar container">
					<div class="navbar-inner">
                        <a class="brand" href="#"> <img src="img/logo_virtual.png"/></a>

                        <ul class="nav">
                        <h3><li class="span5 offset1">
						<h3 style="color: #ff3333;">	<?php  echo $merchant; ?></h3>                        	
							
                        </li></h3>
                        </ul>
                       
                        <ul class="nav pull-right">
                          	
							
                          	<li>
                           	 	<a class="dropdown-toggle" href="#" data-toggle="dropdown">User: <?php echo $login_session; ?>
								</a>
							<li> 
                          	
                          </ul> 
                          
                     </div>
                 </div> 

<!--- Container --->                 
                
                
                <div class="row container ">
               
			   


					<div class="span9 container" > 
          
							<?php
									
									$id_product=$_GET["id_product"];
									$sale=$_GET["sale"];
									$customized_price=$_GET["customized_price"];
									$code_promo=$_GET["code_promo"];
									
									$sql="SELECT id_customer FROM customer WHERE USERNAME='$login_session'";
											$result=mysql_query($sql);
											$row=mysql_fetch_array($result);
									
									
									$sql="INSERT INTO follow VALUES($row[0],$id_product,$sale,$customized_price,'$code_promo','2014-10-01')";
									$result=mysql_query($sql);
									
									echo "<h3>Added to Wishlist Successfully . . . ";
									echo "<a style=\"color: #ff3333;\" href=/main/market/$merchant.php>Buy More</a></h3> 
									<h3><a href=index.php>View Wishlist</a></h3>";
	
							?>
				
				
				
				

        </div>

                  
                   <div class="span3">
                  
				   
				   
		
				   
					
                </div>
							<?php
							include('footer.php');
							?>