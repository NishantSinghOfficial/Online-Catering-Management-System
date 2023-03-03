<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocmsuid']==0)) {
  header('location:logout.php');
  } else{
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    //code for adding product in cart

    // code for removing product from cart
    case "remove":
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        //echo $_GET["code"];

                        unset($_SESSION["cart_item"][$k]);              
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
            }
        }
        //header('location:cart.php');
    break;
    // code for if cart is empty

}
}
 if(isset($_POST['submit']))
  {
    
    
 $fname=$_POST['fname'];
  $cnumber=$_POST['cnumber'];
 $fnaobno=$_POST['flatbldgnumber'];
$street=$_POST['streename'];
$area=$_POST['area'];
$lndmark=$_POST['landmark'];
$city=$_POST['city'];
$zcode=$_POST['zipcode'];
$state=$_POST['state'];
$ddate=$_POST['ddate'];
$userid=$_SESSION['ocmsuid'];
 $ordernumber=mt_rand(100000000, 999999999);
$sql="insert into tblorder(OrderNumber,UserID,FullName,ContactNumber,FlatNo,StreetName,Area,Landmark,City,Zipcode,State,DeliveryDate)values(:ordernumber,:userid,:fname,:cnumber,:fnaobno,:street,:area,:lndmark,:city,:zcode,:state,:ddate)";
$query=$dbh->prepare($sql);
$query->bindParam(':ordernumber',$ordernumber,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':cnumber',$cnumber,PDO::PARAM_STR);
$query->bindParam(':fnaobno',$fnaobno,PDO::PARAM_STR);
$query->bindParam(':street',$street,PDO::PARAM_STR);
$query->bindParam(':area',$area,PDO::PARAM_STR);
$query->bindParam(':lndmark',$lndmark,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':zcode',$zcode,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':ddate',$ddate,PDO::PARAM_STR);

 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
$quantity=$_POST['quantity'];
$pdd=$_SESSION['pid'];
    $value=array_combine($pdd,$quantity);

foreach($value as $pdid=> $qty){
$sql="insert into tblorderdetails(UserId,OrderNumber,ProductId,ProductQty)values(:userid,:ordernumber,:pdid,:qty)";
$query=$dbh->prepare($sql);
$query->bindParam(':ordernumber',$ordernumber,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':pdid',$pdid,PDO::PARAM_STR);
$query->bindParam(':qty',$qty,PDO::PARAM_STR);
$query->execute();
}

    echo '<script>alert("Your Order Has Been Placed.")</script>';
    unset($_SESSION["cart_item"]);
    unset($_SESSION['tprice']);
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    
    <title>Online Catering Management  System | Cart Page</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
<?php include_once('includes/header.php');?>
   
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                                <form  action="" method="post">
<div id="shopping-cart">


<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>
<a id="btnEmpty" href="products.php?action=empty" style="color:red">Empty Cart</a>  
<table class="table table-bordered" cellpadding="10" cellspacing="1">
<tbody>
<tr>
    <th style="text-align:left;">Product Image</th>
<th style="text-align:left;">Product Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>   
<?php
$pdtid=array();     
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
        array_push($pdtid,$item['code']);
        ?>
                <tr>
                <td><img src="admin/itemimages/<?php echo $item["image"]; ?>" height='100' width='200'/></td><td><?php echo $item["name"]; ?></strong></td>
                <td><?php echo $pd=$item["code"]; 
$_SESSION['pid']=$pdtid;

                ?></td>
                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>

       <input type="hidden" value="<?php echo $item['quantity']; ?>" name="quantity[<?php echo $item['code']; ?>]">

                <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                <td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="img/download.png" alt="Remove Item" /></a></td>
                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"]*$item["quantity"]);
        }
        $_SESSION['tprice']=$total_price;
        
        ?>

<tr>
<td colspan="3" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
<div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                  
                    </div>
                </div>  


<?php
if(isset($_SESSION["cart_item"])){ ?>
<p style="color: red;padding-bottom: 20px;padding-top: 20px">Fill The Following Detail</p>

    <div class="row" style="padding-bottom:20px">

  <div class="col-lg-12 col-md-6" style="padding-bottom:20px">
    <label>Delivery Date</label>
                            <input type="date" class="form-control form-control-alternative" placeholder="Delivery Date" name="ddate" id="ddate" required="true" style="border:1px #000 solid;">

                        </div>

                       <div class="col-lg-4 col-md-6" style="padding-bottom:20px">
                            <input type="text" class="form-control form-control-alternative" placeholder="Full Name" name="fname" id="fname" required="true" style="border:1px #000 solid;">

                        </div>

                   
                 
                         <div class="col-lg-4 col-md-6" style="padding-bottom:20px">
                            <input type="text" class="form-control form-control-alternative" placeholder="Contact Number" name="cnumber" id="cnumber" required="true" style="border:1px #000 solid;" maxlength="10" pattern="[0-9]+">

                       </div>

                   
            
                  <div class="col-lg-4 col-md-6" style="padding-bottom:20px">
                      
                            <input type="text" class="form-control form-control-alternative" placeholder="Flat or Building Number" name="flatbldgnumber" id="flatbldgnumber" required="true" style="border:1px #000 solid;">
                        
                    </div>
                   <div class="col-lg-4 col-md-6" style="padding-bottom:20px">
                      
                            <input type="text" class="form-control form-control-alternative" placeholder="Street Name" name="streename" id="streename" required="true" style="border:1px #000 solid;">
                       
                    </div>                  
                                        
                    <div class="col-lg-4 col-md-6" style="padding-bottom:20px">
                      
                            <input type="text" class="form-control form-control-alternative" placeholder="Area" name="area" id="area" required="true" style="border:1px #000 solid;">
                        
                    </div>                      
                   <div class="col-lg-4 col-md-6" style="padding-bottom:20px">
                     
                            <input type="text" class="form-control form-control-alternative" placeholder="Landmark" name="landmark" id="landmark" required="true" style="border:1px #000 solid;">
                      
                    </div>  
                    <div class="col-lg-4 col-md-6" style="padding-bottom:20px">
                      
                            <input type="text" class="form-control form-control-alternative" placeholder="City" name="city" id="city" required="true" style="border:1px #000 solid;">
                      
                    </div>
                     <div class="col-lg-4 col-md-6" style="padding-bottom:20px">
                     
                            <input type="text" class="form-control form-control-alternative" placeholder="Zip Code" name="zipcode" id="zipcode" required="true" style="border:1px #000 solid;">
                      
                    </div>
                    <div class="col-lg-4 col-md-6" style="padding-bottom:20px">
                      
                            <input type="text" class="form-control form-control-alternative" placeholder="State" name="state" id="state" required="true" style="border:1px #000 solid;">
                        
                    </div>
                     </div>
                <?php } ?>

             <div class="col-lg-12">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span><?php echo "$ ".number_format($total_price, 2); ?></span></li>
                            <li>Total <span><?php echo "$ ".number_format($total_price, 2); ?></span></li>
                        </ul>
                      <input type="submit" value="Place Order"  class="primary-btn" name="submit" id="submit">
                    </div>
                </div>    
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>

</div>

                   
                </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Shoping Cart Section End -->


<?php include_once('includes/footer.php');?>


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html><?php } ?>