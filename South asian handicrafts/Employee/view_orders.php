<?php
error_reporting('0');
session_start();

if(!isset($_SESSION['employee_name'])){
echo "<script>window.open('employee_login.php? not_employee = You are not an employee.','_self')</script>";
}
else
{
?>


<table width="795" align="center" bgcolor="white">

<tr align="center">
<td colspan="15"><h2>Orders</h2></td>
</tr>

<tr align="center" bgcolor="white">
<th>Ip</th>
<th>First_Name</th>
<th>Last_Name</th>
<th>Address_line_1</th>
<th>Address_line_2</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>Product_Title</th>
<th>Quantity</th>
<th>Price</th>

<?php
include_once ('db.php');
$get_orders ="select * from orders";
$run_orders = mysqli_query($con, $get_orders);
while($row_orders=mysqli_fetch_array($run_orders)){
$order_ip = $row_orders['Ip'];
$order_First_Name = $row_orders['First_Name'];
$order_Last_Name = $row_orders['Last_Name'];
$order_Address_Line_1 = $row_orders['Address_Line_1'];
$order_Address_Line_2 = $row_orders['Address_Line_2'];
$order_City = $row_orders['City'];
$order_Email = $row_orders['State'];
$order_Zip = $row_orders['Zip'];
$pro_title = $row_orders['Product_Title'];
$order_Quantity = $row_orders['Quantity'];
$order_Price = $row_orders['Price'];
$i++;
 


?>
<tr align="center">
<td><?php echo $order_ip;?></td>
<td><?php echo $order_First_Name;?></td>
<td><?php echo $order_Last_Name;?></td>
<td><?php echo $order_Address_Line_1;?></td>
<td><?php echo $order_Address_Line_2;?></td>
<td><?php echo $order_City;?></td>
<td><?php echo $order_Email;?></td>
<td><?php echo $order_Zip;?></td>
<td><?php echo $pro_title ;?></td>
<td><?php echo $order_Quantity;?></td>
<td><?php echo $order_Price;?></td>



</tr>
<?php } ?>

</table>
<?php } ?>