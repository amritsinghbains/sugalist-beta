<?php

include('lock.php');

include('config.php');


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
                        	<form action="" class="navbar-form">
                            <input name="product" type="text" placeholder="What are you loking for ?">
                        	<button type="submit" class="btn">SEARCH</button>
                            </form>
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
											
											echo "<strong>EMAIL: </strong>$row[2]<br/>";
																	
											
											
											
									 ?>
									 
                           		</div>
								<a href="addnewproduct_new.php">Add Product</a> 
								
                          	</li>
						
							<li><a href="logout.php">Logout</a>
							
								<a href="addstore.php">Add Store</a> </li>
                          	
                          </ul> 
                          
                     </div>
                 </div> 

<!--- Container --->                 
                
                
                <div class="row container ">
                <div id="tab_whishlist span12">
                <h3 style="color: #ff3333;">Products</h3>
                    </div>
                <div class="span9 container" > 
                
                        <table class="table table-striped container"> 
                        	<thead>
                            	<tr style="background-color: #9b9b9b; color: white;">
                                	<th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Store</th>
                                    <th>URL</th>
                                    <th>Price   </th>
                                    <th>Sale   </th>
                                    <th>Suga</th>
                                    <th>Promo</th>
                                    <th></th>
									
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="muted">
							
							
							
						<?php //product details come here
		
		$sql="SELECT product.id_product, product.name, category.name, store.name, product.imageurl, 
		product.price, product.initsale,product.initcustomized_price,product.initcode_promo
		
					FROM product INNER JOIN category INNER JOIN store INNER JOIN merchant
					WHERE product.id_category = category.id_category
						AND product.id_store = store.id_store
						AND store.id_merchant = merchant.id_merchant
						AND merchant.username =  '$login_session'
										";
									
											
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
						
					$trcounter=0;
					
					while($count>0)
					{
						$count--;
						$row=mysql_fetch_array($sql_run);
					
						/*	$row[0] //id
								$row[1] //name
								$row[2]//category
								$row[3]//store
								$row[4] //url
								$row[5] //price
								$row[6] //sale
								$row[7] //suga
								$row[8] //promo
								
							*/	
							echo "<tr>	<td>$row[0]</td>
										<td>$row[1]</td>
										<td>$row[2]</td>
										<td>$row[3]</td>
										<td>$row[4]</td>
										<td>$row[5]</td>
										<td>$row[6]</td>
										<td>$row[7]</td>
										<td>$row[8]</td>
										<td><a href=deleteproduct.php?id=$row[0]>delete</a>
									</tr>";
							
							}
				?>
                            </tbody>
                            
                        
                        </table>      

        </div>

                  

							
							
							<?php
							include('footer.php');
							?>