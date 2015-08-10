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
								<a href="viewproduct.php">Products</a> 
								
                          	</li>
						
							<li><a href="logout.php">Logout</a>
							
								<a href="addstore.php">Add Store</a> </li>
                          	
                          </ul> 
                          
                     </div>
                 </div> 

<!--- Container --->                 
                
                
                <div class="row container ">
                <div id="tab_whishlist span12">
                <h3 style="color: #ff3333;">DashBoard</h3>
                    </div>
                <div class="span9 container" > 
                
                        <table class="table table-striped container"> 
                        	<thead>
                            	<tr style="background-color: #9b9b9b; color: white;">
                                	<th>Category</th>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Followers</th>
                                    <th>Price   </th>
                                    <th>Sale   </th>
                                    <th>Suga</th>
                                    <th>Promo</th>
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
									$sql="SELECT category.name,product.name,product.size,product.color,product.price,follow.sale,follow.customized_price,follow.code_promo,follow.end_promo	FROM product INNER JOIN category INNER JOIN follow INNER JOIN store INNER JOIN merchant
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store
											and store.id_merchant = merchant.id_merchant
											and merchant.username='$login_session'
											LIMIT 1
										";
								else
										$sql="SELECT category.name,product.name,product.size,product.color,product.price,follow.sale,follow.customized_price,follow.code_promo,follow.end_promo	FROM product INNER JOIN category INNER JOIN follow INNER JOIN store INNER JOIN merchant
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store 
											and store.id_merchant = merchant.id_merchant
											and merchant.username='$login_session'
											
										 and product.name like '%$product_search%'
										 LIMIT 1
										";
									
											
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
						
					while($count>0)
					{
						$count--;
						$row=mysql_fetch_array($sql_run);
						$date1 = date_create($row[8]);
						$date2 = date_format($date1, 'm-d');
						
						//find no of followers
						$sql_temp="SELECT category.name,product.name,product.size,product.color,product.price,follow.sale,follow.customized_price,follow.code_promo,follow.end_promo	FROM product INNER JOIN category INNER JOIN follow INNER JOIN store INNER JOIN merchant
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store
											and store.id_merchant = merchant.id_merchant
											and product.name='$row[1]'
											and product.size='$row[2]'
											and product.color='$row[3]'
										";
												
						$sql_run_temp=mysql_query($sql_temp);
						$count_temp=mysql_num_rows($sql_run_temp);
											
						echo "
                            	<tr>
                                	<td>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td>$row[3]</td>
                                    <td>$count_temp</td>
                                    <td class=text-success text-right>$row[4] $</td>
                                    <td class=text-error text-right>$row[5] $</td>
                                    <td class=text-error text-right>$row[6] $</td>
                                    <td>$row[7]</td>
                                    <td>$date2</td>
									
                                    <td>
									
									
									
									
									
									<a href=\"update.php?product=$row[1]&size=$row[2]&color=$row[3]
									&price=$row[4]&sale=$row[5]&customized_price=$row[6]&
									code_promo=$row[7]&end_promo=$row[8]\" >update</a>
							
 
 </td>
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
								                <tr>
                                      <td>
                                      <form id="form_write_notifications"class="navbar-form" onblur="cacher()" action="newnotification.php" method="get" accept-charset="UTF-8">
                             <textarea name="message" id="click" onfocus="nohidden()" rows="1" style="height:25px; width:148px; resize:none;" placeholder="Write new "></textarea>
                        	<div id="hidden">
                            <button type="submit" onfocus="nohidden()" class="btn">Submit</button>
                            </div>
                            </form>
                                      </td>
                                    </tr>
								  <?php
								  
								 $sql="SELECT merchant.username,notification.message,notification.timestamp 
								 FROM `notification` inner join merchant 
								 WHERE merchant.id_merchant = notification.id_merchant 
								 and merchant.username='$login_session'	
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

									$sql="SELECT category.name,product.name,product.size,product.color,product.price,follow.sale,follow.customized_price,follow.code_promo,follow.end_promo	FROM product INNER JOIN category INNER JOIN follow INNER JOIN store INNER JOIN merchant
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store 
											and store.id_merchant = merchant.id_merchant
											and merchant.username='$login_session'
											
										";
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
									echo "$count";
?>										Followers</p>
                                      <p>
<?php

									$sql="SELECT category.name,product.name,product.size,product.color,product.price,follow.sale,follow.customized_price,follow.code_promo,follow.end_promo	FROM product INNER JOIN category INNER JOIN follow INNER JOIN store INNER JOIN merchant
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store
											and store.id_merchant = merchant.id_merchant
											and merchant.username='$login_session'
											LIMIT 1
										";
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
									echo "$count";
?>										
									  products on sale</p>
                                      <p>
<?php

									$sql="SELECT category.name,product.name,product.size,product.color,product.price,follow.sale,follow.customized_price,follow.code_promo,follow.end_promo	FROM product INNER JOIN category INNER JOIN follow INNER JOIN store INNER JOIN merchant
											WHERE product.id_category = category.id_category
											and product.id_product = follow.id_product
											and product.id_store = store.id_store
											and store.id_merchant = merchant.id_merchant
											and merchant.username='$login_session'
											and follow.customized_price !=''
											LIMIT 1
										";
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
									echo "$count";
?>										
									  Products on sale (followers)</p>
                                      
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