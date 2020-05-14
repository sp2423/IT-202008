<!DOCTYPE>
<?php
include("functions/functions.php");
?>
<html>
    <head> 
        <title> South Asian Handicrafts </title>
		
		<link rel="stylesheet" href="styles/style.css" media="all"> 
    </head>
<body>

  <div class="main_wrapper">
     <div class="header_wrapper"> 
       <img id="image2"src="handicraft.jpg" width="1000" height="300"/>
	 
	</div> 
    <div class="menubar"> 
		<ul id="menu">
			<li><a href="index.php"><img src="home.PNG" height="35" width="90"/></a></li>
			<li><a href="MyAccount.php"> <img src="myaacount.PNG"height="35" width="90"/></a></li>
			<li><a href="customer_register.php">Signup</a></li>
			<li><a href="cart.php">ShoppingCart</a></li>

		</ul>
	
	<div id="form">
		<form method="get" action="results.php" enctype="multipart/form-data">
			<input type="text" name="user_query" placeholder="Search a Product"/>
			<input type="submit" name="search" value="Search"/>
		</form>
		
	</div>
	</div>

  
   <div class="content_wrapper"> 
	   <div id="content_area">
	   <div id="shopping_cart">
	    <span style="float:right"; font-size:18px; padding:6px;line-height:30px;>
	    Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items - Total Price: <a href="cart.php" style="color:yellow">Go to cart</a>
	    
	    
	    </span>
	   </div>
	   <div id="products_box">	   
<?php
if(isset($_GET['pro_id'])){
$product_id = $_GET['pro_id'];
	   
$get_pro="select * from products where product_id='$product_id'";
$run_pro = mysqli_query($con,$get_pro);
while($row_pro=mysqli_fetch_array($run_pro)){

$pro_id = $row_pro['product_id'];
$pro_title = $row_pro['product_title'];
$pro_price = $row_pro['product_price'];
$pro_image = $row_pro['product_image'];
$pro_desc = $row_pro['product_desc'];

echo"
   <div id='single_product'>
   <h3>$pro_title</h3>
   <img src='admin_area/product_images/$pro_image' width='400' height='300'/>
   <p><b> $ $pro_price</b></p>
   <p>$pro_desc</p>
   <a href='index.php?pro_id=$pro_id' style='float:left;'>Go Back</a>
   <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
   </div>


";
	   
	   }
	   }
	   ?>
	  </div>
	   </div>
	   <div id="sidebar">
		   <div id="sidebar_title">Categories</div>
		   
		   <ul id="cats">
			        <?php getCats();?>
				   
			   </ul>
			   
			   
		</div>
	  
</div>

   <div id="footer"> <h2 style="text-align:center;padding-top:30px;">&copy; 2020 by South Asian Handicrafts</h2>
   </div>

  
</div>
</body>
</html>