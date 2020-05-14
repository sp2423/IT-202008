<?php
session_start();
include("functions/functions.php");
if(!isset($_SESSION['customer_email'])){
echo "<script>window.open('customer_login.php? not_customer = You are not a customer.','_self')</script>";
}
else
{
?>
<!DOCTYPE>
<html>
    <head> 
    
        <title> South Asian Handicrafts </title>
	<link rel="stylesheet" href="styles/style.css" media="all"> 
	<style>
	.icons{height:30px;width:80px}
	
	</style>
		
    </head>
<body>

  <div class="main_wrapper">
     <div class="header_wrapper"> 
       <img id="image2" src="images/index_page.jpg" width="1000" height="300"/> 
	 
	</div> 


    <div class="menubar"> 
		<ul id="menu">
			<li><a href="index.php"><img src="home.PNG" height="35" width="90"/></a></li>
			<li><a href="MyAccount.php"> <img src="myaacount.PNG"height="35" width="90"/></a></li>
				<div id="form">
		<form method="get" action="results.php" enctype="multipart/form-data">
			<input type="text" name="user_query" placeholder="Search a Product"/>
			<input type="submit" name="search" value="Search"/>
				
		</form>
		
	</div>					
			<?php cart(); ?>
			
	  <div id="shopping_cart">
	    <span style="float:right"; font-size:18px; padding:6px;line-height:15px;>
	    <?php
	    if(isset($_SESSION['customer_email'])){
            echo"<b>Welcome: </b>" . $_SESSION['customer_email'];
            }
            else{
            echo"<b>Welcome Guest:</b>";
            }
	    ?>
	    
	 
	    
	    
	    <a href="cart.php"><img src="cart_icon.jpg" height="30" width="30"/></a> 
	    <a href="logout.php"> Logout </a>
	    
	    
	    
	   </div>
	    </span>
	   
			
		</ul>
	
	

	</div>

  
   <div class="content_wrapper"> 
	   <div id="content_area">
	   
	   <?php $ip=getIp(); ?>
	   
	   <div id="products_box">
	   <?php getPro(); ?>
	   <?php getCatPro(); ?> 
	   
	   </div>
	   </div>
	  
	  
	   
	   <div id="sidebar">
		   <div id="sidebar_title">Categories</div>
		   
		   <ul id="cats">
			        <?php getCats();?>
			        
				   
			   </ul>
			  
			   
			   
		</div>   
	   	
	  
</div>

   <div id="footer"> <h2 style="text-align:center">&copy; 2020 by South Asian Handicrafts</h2>
   </div>

  </div>
</div>

</body>
</html>
 <?php } ?>