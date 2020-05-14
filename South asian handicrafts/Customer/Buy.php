<?php
session_start();
include("functions/functions.php");
?>

<!DOCTYPE>
<html>
    <head> 
        <title> South Asian Handicrafts </title>
		
		<link rel="stylesheet" href="styles/style.css" media="all"> 
    </head>
<body>

  <div class="main_wrapper">
     <div class="header_wrapper"> 
       <img id="image2"src="image2.jpg" width="1000" height="300"/>
	 
	</div> 
    <div class="menubar"> 
		<ul id="menu">
			<li><a href="index.php"><img src="home.PNG" height="35" width="90"/></a></li>
			<li><a href="MyAccount.php"> <img src="myaacount.PNG"height="35" width="90"/></a></li>
			<li><a href="customer_register.php">Signup</a></li>
			<li><a href="cart.php">ShoppingCart</a></li>
			<li><a href="#">Contactus</a></li>
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
	   <?php cart(); ?>
	   <div id="shopping_cart">
	    <span style="float:right"; font-size:18px; padding:6px;line-height:30px;>
	    Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?> <a href="cart.php" style="color:yellow">Go to cart</a>
	    
	    
	    </span>
	   </div>
	   <?php $ip=getIp(); ?>
	   
	   <div id="products_box">
	   <form action="" method="post" enctype="multipart/form-data">
	     <table align="center" width="700" bgcolor="white">
	      
	      <tr align="center">
	      <th>Product(s)</th>
	      <th>Quantity</th>
	      <th>Price</th>
	      <th>Total Price</th>
	      </tr>
	     	      
 <?php
$total=0;
global $con;
$ip = getIp();
$sel_price = "select * from cart where ip_add='$ip'";
$run_price = mysqli_query($con,$sel_price);
//$itemnumber = 1;
while($p_price=mysqli_fetch_array($run_price)){
$pro_id= $p_price['p_id'];
$qty=$p_price['qty'];	
$price=$p_price['price'];
if($price==0)
{
continue;
}
$pro_price = "select * from products where product_id='$pro_id'";
$run_pro_price=mysqli_query($con,$pro_price);
while($pp_price = mysqli_fetch_array($run_pro_price)){
$product_price= array($pp_price['product_price']);
$product_title = $pp_price['product_title'];
$product_image = $pp_price['product_image'];
$single_price = $pp_price['product_price'];
$values=$single_price*$qty; 
    
$total += $values;
}	     

   	      
	 ?>  
	
	
	
	 <tr align="center">
	 
	 <td><?php echo $product_title; ?><br>
	 <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
	 </td>
	 <td><?php echo $qty;?></td>
	     <td><?php echo "$". $single_price; ?></td>
	    <td><?php echo "$". $values; ?></td>
	      </tr>

	  
	      <?php } ?>
	      <tr align="right">
	      <td colspan="4"><b> Sub Total:</b>
	     
	     <td><?php echo"$" . $total; ?></td>
	      </tr>
	      
	      <tr align="center">
	      
	      <td><input type="submit" name="continue" value="Continue Shopping"/></td>
	      <td><input type="submit" name="Paynow" value="Pay Now"/></td>
	      x
	      
	      </tr>	      	      
	      </table>
	   
	
	   </form>
	   </form>
	   
	   
	   <?php
	   if(isset($_POST['Paynow'])){
	      
$ip_add = getIp();
$sl_price = "select * from cart where ip_add='$ip_add'";
$rn_price = mysqli_query($con,$sl_price);
//$itemnumber = 1;
while($p_p=mysqli_fetch_array($rn_price)){
$pr_id= $p_p['p_id'];
$qt=$p_p['qty'];	
$pr=$p_price['price'];
if($pr==0)
{
continue;
}
$pr_price = "select * from products where product_id='$pr_id'";
$rn_pro_price=mysqli_query($con,$pr_price);
while($pp_pp = mysqli_fetch_array($rn_pro_price)){
$prod_price= array($pp_pp['product_price']);
$prod_title = $pp_pp['product_title'];
$prod_Qty = $pp_pp['product_quantity'];
$Updt_qty=$prod_Qty - $qt;

$Updt_Qty = "update products set product_quantity='$Updt_qty' where product_id='$pr_id'";
$r_pro_price=mysqli_query($con,$Updt_Qty);

   
	   }
	   }
	   echo "<script>window.open('Confirmation.php','_self')</script>";
	   }
	   ?>
	   
	   <?php

	   if(isset($_POST['continue'])){
	   
	    echo "<script>window.open('index.php','_self')</script>";
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
</div>
</body>
</html>