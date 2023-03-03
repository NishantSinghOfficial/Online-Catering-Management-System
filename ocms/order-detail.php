<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocmsuid']==0)) {
  header('location:logout.php');
  } else{


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    
    <title>Online Catering Management  System | Detail Single Order</title>

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
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
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
                        <h2>My Order</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>My Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <p style="text-align: center;font-size: 20px;color: red"><strong>Details of Single Order</strong></p>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                               
<div id="shopping-cart">
 <strong style="color: red">#<?php echo $oid=$_GET['orderid'];?> Order Details</strong>

            <?php 
$userid= $_SESSION['ocmsuid'];
$sql1="SELECT * from tblorder where UserID=:userid && OrderNumber=:odid";
$query1 = $dbh -> prepare($sql1);
$query1-> bindParam(':userid', $userid, PDO::PARAM_STR);
$query1-> bindParam(':odid', $oid, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($results1 as $row1)
{               ?>
    <p style="color:#000"><b>Order Date : </b><?php echo $row1->OrderDate;?></p>
    <p style="color:#000"><b>Delivery Date : </b><?php echo $row1->DeliveryDate;?></p>
<p style="color:#000"><b>Order Status :</b> <?php if($row1->Status==""){
    echo "Waiting for confirmation";
} else {
echo $row1->Status;
}?> &nbsp;
(<a href="javascript:void(0);" onClick="popUpWindow('trackorder.php?odid=<?php echo $oid;?>');" title="Track order" style="color:#000"> Track order
</a>)</p>

<?php }} ?>
         <div class="cart-items">
            
            
                <script>$(document).ready(function(c) {
                    $('.close1').on('click', function(c){
                        $('.cart-header').fadeOut('slow', function(c){
                            $('.cart-header').remove();
                        });
                        });   
                    });
               </script>
                         <table class="table table-bordered" cellpadding="10" cellspacing="1" style="padding-top: 20px">
<tbody>
               <tr>
    <th style="text-align:left;">Package Image</th>
<th style="text-align:left;">Package Name</th>
<th style="text-align:left;">Order Number</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="5%">Quantity</th>

<th style="text-align:right;" width="10%">Total Price</th>
</tr>   
                                    <?php 
$userid= $_SESSION['ocmsuid'];
$oid= $_GET['orderid'];
$sql="SELECT tblorder.OrderNumber,tblorder.OrderDate,tblfood.PackageName,tblfood.Price,tblfood.ItemImage,tblorderdetails.ProductId,tblorderdetails.ProductQty from  tblorder 
join tblorderdetails on tblorderdetails.OrderNumber=tblorder.OrderNumber 
join tblfood on tblorderdetails.ProductId=tblfood.ID 
where tblorder.UserID=:userid and tblorder.OrderNumber=:odid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':userid', $userid, PDO::PARAM_STR);
$query-> bindParam(':odid', $oid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>



                <tr>
                <td><img class="b-goods-f__img img-scale" src="admin/itemimages/<?php echo $row->ItemImage;?>" alt="" width='200' height='120'></td> 
                <td><?php echo $row->PackageName;?></td>
                <td><?php echo $row->OrderNumber;?></td>
               
                <td><?php echo $price=$row->Price;?></td>
                <td><?php echo $qty=$row->ProductQty;?></td>
                <td><?php echo $total=$price*$qty;?></td>

       </tr>



       <?php
$grandtotal+=$total;
$gqty+=$qty;
        $cnt=$cnt+1; }} ?>
       <tr>
<td colspan="4" align="right">Total:</td>
<td><strong><?php echo $gqty; ?></strong></td>
<td><strong><?php echo "$ ".number_format($grandtotal, 2); ?></strong></td>
</tr>
</tbody>
</table>
        
    <p style="color:red;padding-bottom: 20px">
        <a href="javascript:void(0);" onClick="popUpWindow('cancelorder.php?oid=<?php echo $oid;?>');" title="Cancel this order" style="color:red">Cancel this order </a>
    </p>

</div>

            
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