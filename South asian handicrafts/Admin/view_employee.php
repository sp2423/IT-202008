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
<td colspan="6"><h2>Employees</h2></td>
</tr>

<tr align="center" bgcolor="white">
<th>S.N</th>
<th>Name</th>
<th>Email</th>
<th>Employee Contact</th>
<th>Delete</th>
</tr>
<?php
include_once ('includes/db.php');
$get_employee ="select * from employee";
$run_employee = mysqli_query($con, $get_employee);
$i = 0;
while($row_employee=mysqli_fetch_array($run_employee)){
$employee_id = $row_employee['employee_id'];
$employee_name = $row_employee['employee_name'];
$employee_email = $row_employee['employee_email'];
$employee_contact = $row_employee['employee_contact'];
$i++;
 


?>
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $employee_name;?></td>
<td><?php echo $employee_email;?></td>
<td><?php echo $employee_contact;?></td>
<td><a href="delete_employee.php?delete_employee=<?php echo $employee_id; ?>">Delete</a></td>

</tr>
<?php } ?>

</table>
<?php } ?>