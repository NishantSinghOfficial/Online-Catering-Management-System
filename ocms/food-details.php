<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

////code for Cart
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    //code for adding product in cart
    case "add":
        if(!empty($_POST["quantity"])) {
            echo $pid=$_GET["pid"];

 //$sql="SELECT * FROM tblproduct WHERE ID=:pid ";
$sql = $dbh->prepare("SELECT * FROM tblfood WHERE ID=:pid ");
//$stckdta=$dbh->query($sql);
$sql->execute(array(':pid' => $pid));
 while($productByCode=$sql->fetch(PDO::FETCH_ASSOC))
 {


            $itemArray = array($productByCode["ID"]=>array('name'=>$productByCode["PackageName"], 'code'=>$productByCode["ID"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["Price"], 'image'=>$productByCode["ItemImage"]));
        
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode["ID"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode["ID"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    
                }
            }  else {
                $_SESSION["cart_item"] = $itemArray;

            }
        }
    }
        header('location:cart.php');
    break;

    // code for removing product from cart
    case "remove":
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);              
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
            }
        }
        header('location:cart.php');
    break;
    // code for if cart is empty
    case "empty":
        unset($_SESSION["cart_item"]);
            header('location:cart.php');
    break;  
}
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
   
    <title>Online Catering Management System | Single Product</title>

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

    <!-- Humberger Begin -->
  <?php include_once('includes/header.php');?>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Food’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <a href="index.php">Foods</a>
                            <span>Food’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
             <?php
$pid=intval($_GET['pid']);
$sql="SELECT * from  tblfood where ID=:pid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="admin/itemimages/<?php echo $row->ItemImage;?>" width="500" height="500" alt="">
                        </div>
                       
                    </div>
                </div>
               
                <div class="col-lg-6 col-md-6">
                        <form method="post" action="products.php?action=add&pid=<?php echo $row->ID; ?>">
                    <div class="product__details__text">
                        <h3><?php echo $row->PackageName;?></h3>
                       
                        <div class="product__details__price">$<?php echo $row->Price;?></div>
                        <p><?php echo $row->Description;?>.</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                   <input type="text" class="item_quantity" name="quantity" value="1" />
                                </div>
                            </div>
                        </div>
                       <input type="submit" value="Add to Cart" class="btnAddAction" />
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span><?php echo $row->Status;?></span></li>
                            <li><b>Size</b> <span><?php echo $row->Size;?></span></li>
                            <li><b>Suitable For</b> <span><?php echo $row->Nofopeople;?></span></li>
                            <li><b>Category</b> <span><?php echo $row->Category;?></span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p><?php echo $row->Description;?></p>
                                        <p><?php echo $row->PackageContain;?></p>
                                </div>
                            </div>
                    
                       
                        </div>
                    </div>
                </div>
            </form>
                <?php $cnt=$cnt+1;}}?>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

 

 <?php include_once('includes/footer.php');//?>


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

</html>