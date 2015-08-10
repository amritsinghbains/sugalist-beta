<?php


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
						<h3 style="color: #ff3333;">	Welcome to Sugalist Showroom</h3>                        	
							
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
          

				
	<table width="1000">
		<tr>
		
		
		
		<?php //product details come here
		
		$sql="SELECT username from merchant					";
									
											
									$sql_run=mysql_query($sql);
									$count=mysql_num_rows($sql_run);
						
					$trcounter=0;
					
					while($count>0)
					{
						$count--;
						$row=mysql_fetch_array($sql_run);
					
						
						
			echo "<td> 
					<a href=\"$row[0].php\">
						<div style=\"width:200px; height:70px; border: solid 1px #333333; \" align=\"left\" >
							
							<h3 align=\"center\" style=\"color: #ff3333;\"> $row[0]</h3>
							
							
						</div>
						<br/>
					</a>
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