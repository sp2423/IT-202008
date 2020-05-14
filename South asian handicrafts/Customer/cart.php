<?php
session_start();
include("functions/functions.php");
?>

<!DOCTYPE>
<html>
    <head> 
    <style>
    #Stock{color:red;}
    </style>
        <title> South Asian Handicrafts </title>
       
		
		<link rel="stylesheet" href="styles/style.css" media="all"> 
    </head>
<body>

  <div class="main_wrapper">
     <div class="header_wrapper"> 
       <img id="image2" src="handicraft.jpg" width="1000" height="300"/>
	 
	</div> 
    <div class="menubar"> 
		<ul id="menu">
			<li><a href="index.php"><img src="home.PNG" height="35" width="90"/></a></li>
			<li><a href="MyAccount.php"> <img src="myaacount.PNG"height="35" width="90"/></a></li>						
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
	    
	 
	    
	    
	    <a href="cart.php">Go to cart</a> 
	    <a href="logout.php"> Logout </a>
	    
	    
	    
	   </div>
	    </span>
	   
			
		</ul>
	
	
	</div>

  <div class="content_wrapper"> 
	   <div id="content_area">
   
	   <?php $ip=getIp(); ?>
	   </div>
	   </div>
	   
	   <div id="products_box">
	   <form action="" method="post" enctype="multipart/form-data">
	     <table align="right" width="600" bgcolor="white">
	      
	      <tr align="center">
	      <th>Remove</th>
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

if(isset($_POST['update_cart']))
{  
$qty = $_POST[$pro_id];
$update_qty="update cart set qty='$qty' WHERE p_id = '$pro_id'";  
$run_qty=mysqli_query($con, $update_qty);      
}	

$pro_price = "select * from products where product_id='$pro_id'";
$run_pro_price=mysqli_query($con,$pro_price);
while($pp_price = mysqli_fetch_array($run_pro_price)){
$product_price= array($pp_price['product_price']);
$product_title = $pp_price['product_title'];
$product_image = $pp_price['product_image'];
$product_quantity=$pp_price['product_quantity'];
$Qty_Chk=$product_quantity - $qty;
if($Qty_Chk>=0)
{
$single_price = $pp_price['product_price'];
}
else
{
$single_price=0;
echo "<h4 id='Stock'>$product_title Out of Stock</h4>";
}

$values=$single_price*$qty; 

$up_price = "update cart set price=$values where p_id='$pro_id'";
$rn_price = mysqli_query($con,$up_price);
    
$total += $values;
}	
   	      
	 ?> 
	 <tr align="center">
	 <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
	 <td><?php echo $product_title; ?><br>
	 <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
	 </td>
	 <td><input type ='text' size="4" name ="<?php echo $pro_id;?>" value="<?php echo $qty;?>"/></td>
	     <td><?php echo "$". $single_price; ?></td>
	    <td><?php echo "$". $values; ?></td>
	      </tr>
	      
	  
	      <?php } ?>
	      <tr align="right">
	      <td colspan="4"><b> Sub Total:</b>
	     
	     <td><?php echo"$" . $total; ?></td>
	      </tr>
	      
	      <tr align="center">
	      <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
	      <td><input type="submit" name="continue" value="Continue Shopping"/></td>
	      <td><button><a href="Buy.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
	      
	      </tr>	      	      
	      </table>
	   
	   
	   </form>
	   </form>
	   
	   <?php
	   function updatecart(){
            global $con;
            
	   $ip = getIp();
	  
	    if(isset($_POST['update_cart'])){
	     foreach($_POST['remove'] as $remove_id){
	     
	     $delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
	     $run_delete = mysqli_query($con,$delete_product);
	     if($run_delete){
	     echo "<script>window.open('cart.php','_self')</script>";
	     }
	     
	     }
	     }
	     
	    }
	   if(isset($_POST['continue'])){
	   
	    echo "<script>window.open('index.php','_self')</script>";
	   }
	   echo @$up_cart = updatecart();
	   
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