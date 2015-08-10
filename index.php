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
                            <input name="product" type="text" placeholder="What are you looking for ?">
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
									
											$sql="SELECT * FROM customer WHERE USERNAME='$login_session'";
											$result=mysql_query($sql);
											$row=mysql_fetch_array($result);
											$date1 = date_create($row[3]);
											$date2 = date_format($date1, 'd-m-Y');
											echo "	
													<strong>EMAIL: </strong>$row[8]<br/>
													<strong>ZIP: </strong>$row[2]<br/>
													<strong>CITY: </strong>$row[4]<br/>
													<strong>COUNTRY: </strong>$row[6]<br/>
													<strong>BIRTHDAY: </strong>$date2<br/>	";
											
											
											
											
											
									 ?>
									 
                           		</div>
								<a href="market/index.php">Showroom</a>
                          	</li>
							<li><a href="logout.php">Logout</a></li>
                          	
                          </ul> 
                          
                     </div>
                 </div> 

<!--- Container --->                 
                
                
                <div class="row container ">
                <div id="tab_whishlist span12">
                <h3 style="color: #ff3333;">Added to Wishlist</h3>
                    </div>
                <div class="span9 container" > 
                
                        <table class="table table-striped container"> 
                        	<thead>
                            	<tr style="background-color: #9b9b9b; color: white;">
                                	<th>Category</th>
                                    <th>Store</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Suga</th>
                                    <th>End</th>
									<th></th>
                                </tr>
                            </thead>
                            <tbody class="muted">
							
							
							
							<?php
									//find all the products
									//kisi ke baap ke bas ki nahi hai
									$product_search=$_GET['product'];
								if($product_search=="")
									$sql="SELECT category.name,store.name,product.name,follow.sale,follow.customized_price,follow.end_promo,follow.id_product
											FROM product INNER JOIN category INNER JOIN follow INNER JOIN store
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store
											and follow.id_customer = (select id_customer from customer where username='$login_session')
										";
								else
										$sql="SELECT category.name,store.name,product.name,follow.sale,follow.customized_price,follow.end_promo,follow.id_product
											FROM product INNER JOIN category INNER JOIN follow INNER JOIN store
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store
											and follow.id_customer = (select id_customer from customer where username='$login_session')
											and product.name like '%$product_search%'
										";
									
											
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
						
					while($count>0)
					{
						$count--;
						$row=mysql_fetch_array($sql_run);
						$date1 = date_create($row[5]);
						$date2 = date_format($date1, 'm-d');
											
						echo "
                            	<tr>
                                	<td>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td class=text-success text-right>$row[3] $</td>
                                    <td class=text-error text-right>$row[4] $</td>
                                    <td>$date2</td>
									<td><a href=delete.php?id_product=$row[6]>delete</a></td>
									
                                </tr>
								";
                                    
}
?>									
                            </tbody>
                            
                        
                        </table>      

        </div>

                  
                   <div class="span3">
                   
                    <div id="Notifications ">
					<div style=height:300px;overflow:auto;>
                        
                                <table class="table table-bordered" style="table-layout:fixed; word-wrap: break-word;">
                                       <thead>
                                   <h1> <tr style="background-color:rgb(249,249,249);">
                                    <th><p style="text-indent:10px; margin-top:5px;color: #ff3333; font-size:x-large;">Notifications</p></th>
                                </tr></h1>
                                 </thead>
                                  <tbody>
								  
								  <?php
								  
								 $sql="SELECT merchant.username,notification.message,notification.timestamp FROM NOTIFICATION inner join merchant WHERE notification.id_merchant = merchant.id_merchant and notification.id_merchant in (SELECT distinct(merchant.id_merchant)
											FROM product INNER JOIN category INNER JOIN follow INNER JOIN store INNER JOIN merchant
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store
											and store.id_merchant = merchant.id_merchant
											and follow.id_customer = (select id_customer from customer where username='$login_session'))
											order by notification.timestamp desc";
											
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
						
					while($count>0)
					{
									$count--;
									$row=mysql_fetch_array($sql_run);
									$date1 = date_create($row[2]);
									$date2 = date_format($date1, 'm-d');
						
									echo "
                                    <tr>
                                      <td><strong>$row[0]</strong><br>
									  $row[1]<small><br>
									  <em class=muted>$date2</em></small></td>
                                    </tr>
									";
                                  }
								  ?>
								  
                                    </tbody>
                                </table>
								
                                </div>
                                
                                </div>
                                
                <div id="Following">
						        <table class="table table-bordered" style="table-layout:fixed; word-wrap: break-word;">
                                       <thead>
                                   <h1> <tr style="background-color:rgb(249,249,249);">
                                    <th><p style="text-indent:10px; margin-top:5px;color: #ff3333; font-size:x-large;">Following</p></th>
                                </tr></h1>
                                 </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                      <strong>
                                      <p>
						<?php
								
								$sql="SELECT distinct(product.name)
											FROM product INNER JOIN category INNER JOIN follow INNER JOIN store
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store
											and follow.id_customer = (select id_customer from customer where username='$login_session')
										";
											
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
									echo $count;
						?>									  
									  
									  Products</p>
                                      <p>
						 <?php
								  
								 $sql="SELECT distinct(merchant.username) FROM NOTIFICATION inner join merchant WHERE notification.id_merchant = merchant.id_merchant and notification.id_merchant in (SELECT distinct(merchant.id_merchant)
											FROM product INNER JOIN category INNER JOIN follow INNER JOIN store INNER JOIN merchant
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store
											and store.id_merchant = merchant.id_merchant
											and follow.id_customer = (select id_customer from customer where username='$login_session'))
											order by notification.timestamp desc";
											
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
									echo $count;
						?>
									Brands</p>
                                      <p>

								<?php
								$sql="SELECT distinct(store.name)
											FROM product INNER JOIN category INNER JOIN follow INNER JOIN store
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store
											and follow.id_customer = (select id_customer from customer where username='$login_session')
										";
											
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
									echo $count;
						?>									  Store</p>
                                      </strong>
                                      </td>
                                    </tr>
                                    </tbody>
                                </table>
                                
                                </div>
					
                </div>
							
							
							<?php
							include('footer.php');
							?>