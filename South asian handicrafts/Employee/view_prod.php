<table width="795" align="center" bgcolor="white">

<tr align="center">
<td colspan="6"><h2>Products</h2></td>
</tr>

<tr align="center" bgcolor="white">
<th>S.N</th>
<th>Title</th>
<th>Image</th>
<th>Price</th>
<th>Quantity</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
$con = mysqli_connect("sql1.njit.edu","sp2423","@Rr24107324","sp2423");
if (mysqli_connect_errno())
{
echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}
$get_pro ="select * from products";
$run_pro = mysqli_query($con, $get_pro);
$i = 0;
while($row_pro=mysqli_fetch_array($run_pro)){
$pro_id = $row_pro['product_id'];
$pro_title = $row_pro['product_title'];
$pro_image = $row_pro['product_image'];
$pro_price = $row_pro['product_price'];
$pro_quantity = $row_pro['product_quantity'];
$i++;
 


?>
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $pro_title;?></td>
<td><img src="/admin_area/product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
<td><?php echo "$".$pro_price;?></td>
<td><?php echo $pro_quantity;?></td>
<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>

</tr>
<?php } ?>

</table>