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
<td colspan="6"><h2>Adminstrator</h2></td>
</tr>

<tr align="center" bgcolor="white">
<th>S.N</th>
<th>Name</th>
<th>Email</th>
<th>Admin Contact</th>
<th>Delete</th>
</tr>
<?php
include_once ('includes/db.php');
$get_admin ="select * from administrator";
$run_admin = mysqli_query($con, $get_admin);
$i = 0;
while($row_admin=mysqli_fetch_array($run_admin)){
$admin_id = $row_admin['admin_id'];
$admin_name = $row_admin['admin_name'];
$admin_email = $row_admin['admin_email'];
$admin_contact = $row_admin['admin_contact'];
$i++;
 


?>
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $admin_name;?></td>
<td><?php echo $admin_email;?></td>
<td><?php echo $admin_contact;?></td>
<td><a href="delete_admin.php?delete_admin=<?php echo $admin_id; ?>">Delete</a></td>

</tr>
<?php } ?>

</table>
<?php } ?>