<?php
$merchant = basename(__FILE__, '.php'); 

include('/base/config.php');
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
                        <a class="brand" href="index.php"> <img src="img/logo_virtual.png"/></a>

                        <ul class="nav">
                        <h3><li class="span5 offset1">
						<h3 style="color: #ff3333;">	<?php  echo $merchant; ?></h3>                        	
							
                        </li></h3>
                        </ul>
                       
                        <ul class="nav pull-right">
                          	
							
							<li> </li>
                          	
                          </ul> 
                          
                     </div>
                 </div> 

<!--- Container --->                 
                
                
                <div class="row container ">
               
			   


					<div class="span9 container" > 
          
	<script type="text/javascript">
	
	function highlight(e,price,sale,suga){
	
	
		document.getElementById(e).innerHTML="Sale: $"+sale+"<br/>Suga: $"+suga;
		
	}
	function donthighlight(e,price,sale,suga){
	
		document.getElementById(e).innerHTML="Price: $"+price+"<br/><br/>";
	
	
	}
	</script>

				
	<table width="1000">
		<tr>
		
		
		
		<?php //product details come here
		
		$sql="SELECT product.id_product, product.name, product.imageurl, product.price, product.initsale,product.initcustomized_price,product.initcode_promo
					FROM product INNER JOIN category INNER JOIN store INNER JOIN merchant
					WHERE product.id_category = category.id_category
						AND product.id_store = store.id_store
						AND store.id_merchant = merchant.id_merchant
						AND merchant.username =  '$merchant'
										";
									
											
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
						
					$trcounter=0;
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
				<div onmouseover=highlight('one$row[0]',$row[3],$row[4],$row[5]) onmouseout=donthighlight('one$row[0]',$row[3],$row[4],$row[5])  
										style=\"width:200px; height:350px; border: solid 0px #333333; \" align=\"left\" >
							   <div id=\"my_image\">
									<img src=$row[2] width=200 height=100>
									<a href=\"/main/showroominsert.php?merchant=$merchant&id_product=$row[0]&sale=$row[4]&customized_price=$row[5]&code_promo=$row[6]\">
									<button id=\"button_id\" class=\"btn btn-primary\" >Add to Wishlist</button>
									</a>
								
								</div>
								<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
								<h4 align=\"center\" style=\"color: #ff3333;\"> $row[1]</h4>
								<h6 >
									<div id=\"one$row[0]\" >
									Price: $$row[3] <br/><br/></div>
								</h6>
								
							</div>
						</td>	";
						$trcounter++;
						if($trcounter==4)
						{
							echo "</tr><tr>";
							$trcounter=0;
						}
				}
		
		
		
		
		?>


					
		</tr>
					
					
	</table>
				

				
				
				
				
				

        </div>

                  
                   <div class="span3">
                  
				   
				   
		
				   
					
                </div>
							<?php
							include('/base/footer.php');
							?>