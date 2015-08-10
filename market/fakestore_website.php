<?php

$merchant = "fakestore"; 
include('base/config.php');

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fake Store</title>

<!--- css --->
<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/extras.css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!--- responsive --->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">
	
			$(document).ready(function() {  

				
						
			});
			function highlight(e,price,sale,suga,f)
			{
				
				document.getElementById(e).innerHTML="Sale: $"+sale+"<br/>Suga: $"+suga;
				$('#'+f).show();
				
			}
	
			function donthighlight(e,price,sale,suga,f)
			{
				document.getElementById(e).innerHTML="Price: $"+price+"<br/><br/>";
				$('#'+f).hide();
			}
			
			function cach_div(id)
			{
  				$('#'+id).hide();
 			}
			
			</script>
</head>
<body background="img/bg.png">

<div class="container-fluid">

<!--- Menu HEADER --->

	<div class="navbar container">
		
		<a class="brand" href="#"> <img src="img/fakelogo.png"/></a>
			<ul class="nav">
            	<h3>
            		<li class="span5 offset1">
						<h3 style="color: #009900;">
						Welcome to Original Website
						</h3>                        	
					</li>
				</h3>
            </ul>
                       
            <ul class="nav pull-right">
            	
				<li class="dropdown">
                           	 	<a class="dropdown-toggle" href="#" data-toggle="dropdown">
									<button id="loginbutton" class="btn btn-danger" >Sugalist Login</button>
										
										</a>
								
                            	<div class="dropdown-menu" style="padding: 10px; padding-bottom: 10px;">
                                     <iframe src="/../main/user_find.php" frameborder=0  width=300>
										<p>Your browser does not support iframes.</p>
									</iframe>

									 
                           		</div>
								
                          	</li>
							
							
            </ul> 
         </div>
   
   
<!--- Container --->                 
                
	 <div class="row container ">
	 	<div class="span9 container" > 
	    	

				
			<table width="1000">
			<tr>
				<?php //product details come here
		
					$sql="SELECT product.id_product, product.name, product.imageurl, product.price, product.initsale,product.initcustomized_price,product.initcode_promo
					FROM product INNER JOIN category INNER JOIN store INNER JOIN merchant
					WHERE product.id_category = category.id_category
					AND product.id_store = store.id_store
					AND store.id_merchant = merchant.id_merchant
					AND merchant.username =  '$merchant'";
					$sql_run=mysql_query($sql) or die(mysql_error());
					$count=mysql_num_rows($sql_run);
					$trcounter=0;
					$i=0;
					$count_js=$count;
					if($count==0)
					echo "<h3 style=\"color: #ff3333;\"> No Products Added Yet</h3>   ";
					while($count>0)
					{
						$count--;
						$row=mysql_fetch_array($sql_run);
					
						/*	$row[0] //id
								$row[1] //name
								$row[2] //url
								$row[3] //price
								$row[4] //sale
								$row[5] //suga
								$row[6] //promo
								
							*/	
								
						echo "<td> 
							  <div onmouseover=highlight('one$row[0]',$row[3],$row[4],$row[5],'two$row[0]') onmouseout=donthighlight('one$row[0]',$row[3],$row[4],$row[5],'two$row[0]')  
										style=\"width:200px; height:350px; border: solid 0px #333333; \" align=\"left\" >
							   <div id=\"my_image\">
									<img src=$row[2] width=200 height=100>
									<div id=\"two$row[0]\" hidden>
										<a href=\"/main/showroominsert.php?merchant=$merchant&id_product=$row[0]&sale=$row[4]&customized_price=$row[5]&code_promo=$row[6]\">
										<button id=\"button_id\" class=\"btn btn-success\" >Add to Wishlist</button>
										</a>
									</div>
								
								</div>
								<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
								<h4 align=\"center\" style=\"color: #005500;\"> $row[1]</h4>
								<h6>
									<div id=\"one$row[0]\" >
									Price: $$row[3] <br/><br/></div>
								</h6>
								
							</div><br/>
						</td>	";
						$trcounter++;
						if($trcounter==4)
						{
							echo "</tr><tr>";
							$trcounter=0;
						}
						$i++;
					}
		
		
		
		
		?>


					
		</tr>
					
					
	</table>
		</div>                  
<div class="span3">
</div>
                        <footer id="footer" class="row span12 container" >
           					
							<br/>
							<br/><br/><br/><br/><br/><br/><br/><br/>
                            <br/><br/><br/><br/>
                            <hr>
                             &copy; 2013 Fake Store, Inc.
                            <ul class="inline pull-right">
                            
                              <li><a href="#" >Green</a></li>
                              <li><a href="#" >is</a></li>
                              <li><a href="#" >Life</a></li>
                            </ul>
          			  </footer>
                         </div>


			
</div>

<!--- js --->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
