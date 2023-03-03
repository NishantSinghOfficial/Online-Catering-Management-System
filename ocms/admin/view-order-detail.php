<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocmsaid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['submit']))
  {
    
    
    $vid=$_GET['viewid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
  

    $sql="insert into tbltracking(OrderId,Remark,Status) value(:vid,:remark,:status)";
    $query=$dbh->prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR); 
    $query->bindParam(':remark',$remark,PDO::PARAM_STR); 
    $query->bindParam(':status',$status,PDO::PARAM_STR); 
       $query->execute();
      $sql1= "update tblorder set Remark=:remark, Status=:status where OrderNumber=:vid";

    $query1=$dbh->prepare($sql1);
     $query1->bindParam(':vid',$vid,PDO::PARAM_STR);
     $query1->bindParam(':remark',$remark,PDO::PARAM_STR);
$query1->bindParam(':status',$status,PDO::PARAM_STR);

 $query1->execute();
 echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='all-order.php'</script>";
}
  ?>
<!DOCTYPE html>
<head>
<title>Online Catering Managements System | View Orders</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>

		
</head>
<body class="dashboard-page">

	<?php include_once('includes/sidebar.php');?>
	<section class="wrapper scrollable">
		<?php include_once('includes/header.php');?>
		<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>View Order Details</h2>
					</div>
					<div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>View Order Details</h4>
								</div>
								<div class="form-body">
									           <table border="2" class="table table-bordered mg-b-0">
                <?php 
          $vid=$_GET['viewid'];

$sql1="SELECT tblorder.OrderNumber,tblorder.OrderDate,tblorder.FullName,tblorder.ContactNumber,tblorder.FlatNo,tblorder.StreetName,tblorder.Area,tblorder.Landmark,tblorder.City,tblorder.Zipcode,tblorder.State,tblorder.Status,tbluser.FullName as afname,tbluser.MobileNumber,tbluser.Email,tblorder.DeliveryDate from  tblorder
join tbluser on tbluser.ID=tblorder.UserID where tblorder.OrderNumber=:vid";
$query1 = $dbh -> prepare($sql1);
$query1-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($results1 as $row1)
{               ?>
                <tr>
<td colspan="8" style="font-size:20px;color:blue">
 Customer Details</td></tr>
                                            <tr>
    <th>Order Number</th>
    <td><?php  echo $row1->OrderNumber;?></td>
    <th>Full Name</th>
    <td><?php  echo $row1->FullName;?></td>
    <th colspan="2">Contact Number</th>
    <td><?php  echo $row1->ContactNumber;?></td>
  </tr>
  <tr>
  <td colspan="8" style="font-size:20px;color:blue">
 Delivery Address</td></tr>
  
 <tr>
  <th>Order Date</th>
  <td colspan="7">
 <?php  echo $row1->DeliveryDate;?></td></tr>

   <tr>
    <th>Flat Number</th>
    <td><?php  echo $row1->FlatNo;?></td>
    <th>Street Name</th>
    <td><?php  echo $row1->StreetName;?></td>
     <th>Area</th>
    <td colspan="2"><?php  echo $row1->Area;?></td>
  </tr>
   <tr>
   
    <th>Landmark</th>
    <td><?php  echo $row1->Landmark;?></td>
    <th>City</th>
    <td><?php  echo $row1->City;?></td>
    <th>Zipcode</th>
    <td colspan="2"><?php  echo $row1->Zipcode;?></td>
  </tr>
  
  <tr>
    <th>State</th>
    <td><?php  echo $row1->State;?></td>
    <th>Order Date</th>
    <td><?php  echo $row1->OrderDate;?></td>
     <th>Order Final Status</th>

    <td colspan="4"> <?php  $status=$row1->Status;
    
if($row1->Status=="Confirmed")
{
  echo "Your Order has been Confirmed";
}
if($row1->Status=="On The Way")
{
  echo "Your product is onthe way";
}
if($row1->Status=="Delivered")
{
  echo "Your product has been Delivered";
}

if($row1->Status=="Cancelled")
{
 echo "Your order has been cancelled";
}


if($row1->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td>
  </tr><?php $cnt=$cnt+1;}} ?>
  <tr>
<td colspan="7" style="font-size:20px;color:blue">
 Item Purchased</td></tr>
 
   <tr>
  <th style="text-align:left;">S.NO</th>
  <th style="text-align:left;">Product Image</th>
<th style="text-align:left;">Product Name</th>
<th style="text-align:left;">Order Number</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Total Price</th>

</tr>
  <?php 
          $vid=$_GET['viewid'];

$sql="SELECT tblorder.OrderNumber,tblorder.OrderDate,tblfood.PackageName,tblfood.Price,tblfood.ItemImage,tblfood.Nofopeople,tblorderdetails.ProductId,tblorderdetails.ProductQty from  tblorder 
join tblorderdetails on tblorderdetails.OrderNumber=tblorder.OrderNumber 
join tblfood on tblorderdetails.ProductId=tblfood.ID 
where tblorder.OrderNumber=:vid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>



        <tr>
          <td><?php echo htmlentities($cnt);?></td>
        <td><img class="b-goods-f__img img-scale" src="itemimages/<?php echo $row->ItemImage;?>" alt="" width='80' height='80'></td> 
        <td><?php echo $row->PackageName;?></td>
        <td><?php echo $onum=$row->OrderNumber;?></td>
        <td><?php echo $price=$row->Price;?></td>
        <td><?php echo $qty=$row->ProductQty;?></td>
        
        <td><?php echo $total=$qty*$price;?></td>

       </tr>



       <?php
$grandtotal+=$total;
$gqty+=$qty;
        $cnt=$cnt+1; }} ?>
       <tr>
<td colspan="5" align="right">Total:</td>
<td><strong><?php echo $gqty; ?></strong></td>
<td><strong><?php echo "$ ".number_format($grandtotal, 2); ?></strong></td>
</tr>
</table> 
<?php 
$vid=$_GET['viewid']; 
   if($status!=""){
$ret="select tbltracking.OrderCanclledByUser,tbltracking.Remark,tbltracking.Status as astatus,tbltracking.StatusDate from tbltracking where tbltracking.OrderId =:vid";
$query3 = $dbh -> prepare($ret);
$query3-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

 $cancelledby=$row3->OrderCanclledByUser;
 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" style="color: blue" >Tracking History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
foreach($results3 as $row3)
{  ?>             
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row3->Remark;?></td> 
  <td><?php  echo $row3->astatus;
if($row3->OrderCanclledByUser==1){
echo "("."by user".")";
} else {

echo "("."by Company".")";
}

   ?></td> 
  <td><?php  echo $row3->StatusDate;?></td>  
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
?>
 
<?php 

if ($status=="" || $status=="Confirmed" || $status=="On The Way"){
?> 
<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control" required="true"></textarea></td>
  </tr> 
   
  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control" required="true" >
     <option value="Confirmed" selected="true">Confirmed</option>
     <option value="On The Way">On The Way</option>
     <option value="Delivered">Delivered</option>
     <option value="Cancelled">Cancelled</option>
     
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>
								</div>
							</div>
						</div>
					</div>
					
			
					
				</div>
				<!-- //input-forms -->
			</div>
		</div>
		<!-- footer -->
		<?php include_once('includes/footer.php');?>
		<!-- //footer -->
	</section>
	<script src="js/bootstrap.js"></script>
	<script src="js/proton.js"></script>
</body>
</html>
<?php }  ?>