<?php
include('lock.php');

include('config.php');

$product=$_GET["product"];

$size=$_GET["size"];
$color=$_GET["color"];
$price=$_GET["price"];
$sale=$_GET["sale"];

$customized_price=$_GET["customized_price"];
$code_promo=$_GET["code_promo"];
$end_promo=$_GET["end_promo"];



$sql="SELECT id_product from product where name='$product'&size='$size'&color='$color'";							
$sql_run=mysql_query($sql);
$row=mysql_fetch_array($sql_run);

$sql="update follow set `sale`=$sale,`customized_price`=$customized_price,`code_promo`='$code_promo',`end_promo`='$end_promo' 
where id_product='$row[0]'";							
$sql_run=mysql_query($sql);

												

								




echo "<script type='text/javascript'>window.location = 'index.php'</script>";



















?> 