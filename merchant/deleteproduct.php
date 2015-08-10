<?php

				include("config.php");
				$id=$_GET['id']; 
				$sql="DELETE from product WHERE id_product=$id ";
				$result=mysql_query($sql);
				
				echo "<script type='text/javascript'>window.location = 'viewproduct.php'</script>";
				


	
?>
				