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
    
    <title>Online Catering Management  System | Order Page</title>

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
        <p style="text-align: center;font-size: 20px;color: blue"><strong>Details of Order Placed</strong></p>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                               
<div id="shopping-cart">
<table border="1" class="table">
    <tr>
<th>#</th>

<th>Order ID</th>   
<th>Order Date and Time</th>
<th>Order Status</th>
<th>Track Order</th>    
<th>View Details</th>
</tr>
        <?php 
$userid= $_SESSION['ocmsuid'];

$sql="SELECT * from  tblorder 
where UserID=:userid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':userid', $userid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>  

<tr>
    <td><?php echo $cnt;?></td>
<td><?php echo $row->OrderNumber;?></td>
<td><p><b>Order Date :</b> <?php echo $row->OrderDate?></p></td>  
<td><?php $status=$row->Status;
if($status==''){
 echo "Waiting for confirmation";   
} else{
echo $status;
}

                                                    ?>  </td>   
<td><li class="list-inline-item"><i class="fa fa-motorcycle"></i> 

 <a href="javascript:void(0);" onClick="popUpWindow('trackorder.php?odid=<?php echo htmlentities($row->OrderNumber);?>');" title="Track order">Track Order</a></li></td>
<td><a href="order-detail.php?orderid=<?php echo $row->OrderNumber;?>" class="btn theme-btn-dash">View Details</a></td>       
</tr>
<?php $cnt=$cnt+1; }} else { ?>
<tr>
    <th colspan="6" style="text-align:center; color:red;">No Order placed yet</td>
</tr>
<?php } ?>
</table>

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