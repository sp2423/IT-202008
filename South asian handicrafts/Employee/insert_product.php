<?php
include_once ('db.php');
?>
<!DOCTYPE>
<html>
  <head>
     <title>Inserting Product</title>

  </head>
  
  <body bgcolor="white">
      <form action="insert_product.php" method="post" enctype="multipart/form-data">
		  
		  <table align="center" width="795" border="2" bgcolor="white">
			  
			  <tr align="center">
				  <td colspan="7"><h2>Insert Products Here</h2></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Title:</b></td>
				  <td><input type="text" name="product_title" size="60" placeholder="required" required/></td>
			  </tr> 
			  <tr>
				  <td align="right"><b> Product Category:</b></td>
				  <td>
					  <select name="product_cat">
						  <option>Select a Category</option>
						  <?php
					  	$get_cats = "select * from categories";

					  	$run_cats = mysqli_query($con, $get_cats);
					  	while ($row_cats=mysqli_fetch_array($run_cats)){
					  		$cat_id = $row_cats{'cat_id'};
					  		$cat_title = $row_cats{'cat_title'};
		
					  		echo "<option value='$cat_id'>$cat_title</option>";	
					  	}	
							
							
						  ?>
					  </select>
					  </td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Image:</b></td>
				  <td><input type="file" name="product_image"/></td>
			  </tr>
			  <tr>
				  <td align="right"> <b>Product Price:</b></td>
				  <td><input type="text" name="product_price"  placeholder="required"/></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Description:</b></td>
				  <td><textarea name="product_desc"  cols="20" rows="10"></textarea></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Keywords:</b></td>
				  <td><input type="text" name="product_keywords"  placeholder="required" size="50"/></td>
			  </tr>
			  <tr>
				  <td align="right"><b> Product Quantity:</b></td>
				  <td><input type="text" name="product_quantity"  placeholder="required" size="50"/></td>
			  </tr>
			  <tr align="center">
				  <td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
			  </tr>
		  </table>
		  
		  
		 
	  </form>
	    </body> 
</html> 
<?php

    if(isset($_POST['insert_post'])){
     $product_title =$_POST['product_title'];
     $product_cat = $_POST['product_cat'];
     $product_price = $_POST['product_price'];
     $product_desc = $_POST['product_desc'];
     $product_keywords = $_POST['product_keywords'];
     $product_quantity = $_POST['product_quantity'];
    
    $product_image = $_FILES['product_image']['name'];

    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($product_image_tmp,"product_images/$product_image");
   $insert_product ="insert into products  (product_cat,product_title,product_price,product_desc,product_image,product_keywords,product_quantity)
   values('$product_cat','$product_title','$product_price','$product_desc','$product_image','$product_keywords','$product_quantity')";
  
  $insert_pro = mysqli_query($con,$insert_product);
   
   if($insert_pro)
   {
   echo "<script>alert('product has been inserted')</script>";
   echo "<script>window.open('index.php?insert_product.php','_self')</script>";
}   

}
?>



  	 