<?php
error_reporting('0');
session_start();

if(!isset($_SESSION['admin_name'])){
echo "<script>window.open('admin_login.php? not_adminstrator = You are not an administartor.','_self')</script>";
}
else
{
?>

<table width="795" align="center" bgcolor="white">

<tr align="center">
<td colspan="6"><h2>Customers</h2></td>
</tr>

<tr align="center" bgcolor="white">
<th>S.N</th>
<th>Name</th>
<th>Email</th>
<th>Customer Contact</th>
<th>Delete</th>
</tr>
<?php
include_once ('includes/db.php');
$get_customers ="select * from customers";
$run_customers = mysqli_query($con, $get_customers);
$i = 0;
while($row_customers=mysqli_fetch_array($run_customers)){
$customers_id = $row_customers['customer_id'];
$customers_name = $row_customers['customer_name'];
$customers_email = $row_customers['customer_email'];
$customers_contact = $row_customers['customer_contact'];
$i++;
 


?>
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $customers_name;?></td>
<td><?php echo $customers_email;?></td>
<td><?php echo $customers_contact;?></td>
<td><a href="delete_customers.php?delete_customers=<?php echo $customers_id; ?>">Delete</a></td>

</tr>
<?php } ?>

</table>
<?php } ?>