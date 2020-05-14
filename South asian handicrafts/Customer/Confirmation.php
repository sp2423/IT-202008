<?php

include("functions/functions.php");
?>
<!DOCTYPE>
<html>
<head>
    <title> South Asian Handicrafts </title>
    <style>
        body{font-style:italic; color:black;}
        .menubar{background-color: #a1cac6; display: inline-flex; padding-right: 200px;}
        .menubar table tr th a{padding-left: 175px;}
        #image{background:url(images/confirmation.jpg);background-repeat: no-repeat;background-position: center;background-size: cover;}
    </style>

</head>
<body background id="image">


<div class="menubar">
    <table>
        <tr>
            <th><a href="index.php"><img src="home.PNG" height="40" width="90" /></a></th>
            <th><a href="MyAccount.php"><img src="myaacount.PNG"/></a></th>
            <th><a href="cart.php">Go to cart</a></th>
	    	<th><a href="logout.php"> Logout </a></th>
        </tr>
    </table>

   
</div>

<div id="Info">
    <form method="post" action="Confirmation.php" >

        <table align="center" width="1000">
            <tr align="center">
                <th colspan="6"><h2>Enter the Shipping and Payment Details</h2></th>
                <th ><h2></h2></th>

            </tr>
            <tr>
                <td align="right">First Name:</td>
                <td><input type="text" name="Fname"  required/></td>

                <td align="right">Name on Card:</td>
                <td><input type="text" name="namecard"  required/></td>
            </tr>
            <tr>
                <td align="right">Last Name:</td>
                <td><input type="text" name="Lname" required/></td>

                <td align="right">Card Type:</td>
                <td><input type="text" name="cardtype"  required/></td>
            </tr>
            <tr>
                <td align="right">Address Street 1:</td>
                <td><input type="text" name="Street1" required/></td>

                <td align="right">Card Number:</td>
                <td><input type="text" name="cardno"  required/></td>
            </tr>
            <tr>
                <td align="right">Address Street 2:</td>
                <td><input type="text" name="Street2"required/></td>

                <td align="right">Expiration Date:</td>
                <td><input type="text" name="expirydate"  required/></td>
            </tr>
            <td align="right">City:</td>
            <td><input type="text" name="city"  required/></td>
            </tr>
            <td align="right">State:</td>
            <td><input type="text" name="state"  required/></td>
            </tr>
            <td align="right">Zip:</td>
            <td><input type="text" name="zip" required/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><button type="submit" name="PlaceOrder" class="button button1" value="Place Order">Place Order</button</td>
                <td colspan="6"><button type="submit" name="Continue" class="button button1" value="Continue Shopping">Continue Shopping</button</td>
                <td>
            </tr>
        </table>
    </form>
</div>

<?php
$ip = getIp();
$sel_price = "select * from cart where ip_add='$ip'";
$run_price = mysqli_query($con,$sel_price);
while($row=mysqli_fetch_array($run_price)){

    $p_id= $row['p_id'];
    $qty= $row['qty'];
    $price= $row['price'];

}

$pro_price = "select * from products where product_id='$p_id'";

$run_pro_price=mysqli_query($con,$pro_price);
while($pp_price = mysqli_fetch_array($run_pro_price)){
    $product_title= $pp_price['product_title'];

}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Street1 = $_POST['Street1'];
    $Street2 = $_POST['Street2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $Zip = $_POST['zip'];

$order= "insert into orders(Ip,Prod_id,First_Name,Last_Name,Address_Line_1,Address_Line_2,City,State,Zip,Product_Title,Quantity,Price) values('$ip','$p_id','$Fname','$Lname','$Street1','$Street2','$city','$state','$Zip','$product_title','$qty','$price')";


$run_pro_price=mysqli_query($con,$order);
if($run_pro_price) {
  
            $ip = getIp();
            $sel_price = "delete from cart where ip_add='$ip'";
            $run_price = mysqli_query($con,$sel_price);
    echo "<script>alert('Order Has Been Place Successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
}
}

?>



<script language="Javascript" type="text/javascript">

    function onlyAlphabets(e, t) {
        try {
            if (window.event) {
                var charCode = window.keyCode;
            }
            else if (e) {
                var charCode = e.which;
            }
            else { return true; }
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                return true;
            else
                return false;
        }
        catch (err) {
            alert(err.Description);
        }
    }

</script>


<div class="content_wrapper">
    <div id="content_area">

        <div id="shopping_cart">

        </div>


        <div id="products_box">
            <form action="" method="post" enctype="multipart/form-data">


            </form>


            <?php

            if(isset($_POST['continue'])){

                echo "<script>window.open('index.php','_self')</script>";
            }

            ?>





        </div>
    </div>



    <div id="footer"> <h2 style="text-align:center;margin-top:350px;">© 2020 by South Asian Handicrafts</h2>
    </div>

</div>
</div>
</body>
<style>
.button {
background-color: #4CAF50;
color: white;
border: none;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
}

.button1 {padding: 10px 24px;}
</style>
</html>

