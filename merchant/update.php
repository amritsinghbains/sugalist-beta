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
                <h3 style="color: #ff3333;">Update</h3>
                    </div>
                <div class="span9 container" > 
                



<?php
//accepts the update details from sugalist and validates the date and sends to updater.php 

$product=$_GET["product"];

$size=$_GET["size"];
$color=$_GET["color"];
$price=$_GET["price"];
$sale=$_GET["sale"];

$customized_price=$_GET["customized_price"];
$code_promo=$_GET["code_promo"];
$end_promo=$_GET["end_promo"];




?> 

<script>
function validateForm()
{

  var y=document.forms["myForm"]["end_promo"].value;
if (y<"<?php echo date("Y-m-d"); ?>")
 {
  alert("Invalid Promo Code End Date");
  return false;
  }
  
}
</script>



<form name="myForm" action="updater.php" method="get" onsubmit="return validateForm()" >
<table width=25%>



<tr> <td>Product: </td><td><input name="product" type="text" readonly="readonly" value="<?php echo $product; ?>" /></td></tr>

<tr> <td>Size:</td><td><input name="size" type="text" readonly="readonly" value="<?php echo $size; ?>" /></td></tr>
<tr> <td>Color:</td><td> <input name="color" type="text" readonly="readonly" value="<?php echo $color; ?>" /></td></tr>

<tr> <td>Price: </td><td><input name="price" type="text" readonly="readonly" value="<?php echo $price; ?>" /></td></tr>

<tr> <td>Sale: </td><td><input name="sale" type="text"  value="<?php echo $sale; ?>" /></td></tr>

<tr> <td>Customized_Price:</td><td> <input name="customized_price" type="text"  value="<?php echo $customized_price; ?>" /></td></tr>

<tr> <td>Promo Code:</td><td> <input type="text" name="code_promo" value="<?php echo $code_promo; ?>" /></td></tr>

<tr> <td>Promo Code End:</td><td><input type="date" name="end_promo" value="<?php echo $end_promo; ?>" /></tr>
</table>
<input type="submit" class="btn" value="Submit">
</form>







				

        </div>

                  
                   <div class="span3">
                   
				   
				   
					
                </div>
							
							
							<?php
							include('footer.php');
							?>