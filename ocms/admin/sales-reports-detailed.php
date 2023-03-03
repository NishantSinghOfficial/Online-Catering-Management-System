<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocmsaid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<head>
<title>Online Catering Managements System | View Sales Reports</title>

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
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->
</head>
<body class="dashboard-page">

<?php include_once('includes/sidebar.php');?>
	<section class="wrapper scrollable">
		<?php include_once('includes/header.php');?>
		<div class="main-grid">
			<div class="agile-grids">	
				<!-- tables -->
				
				<div class="table-heading">
					<h2>View Sales Reports</h2>
				</div>
				<div class="panel variations-panel">
					<div class="w3l-table-info">
				
                                    <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];

?>

<?php if($rtype=='mtwise'){
$month1=strtotime($fdate);
$month2=strtotime($tdate);
$m1=date("F",$month1);
$m2=date("F",$month2);
$y1=date("Y",$month1);
$y2=date("Y",$month2);
    ?>
    <h4 class="header-title m-t-0 m-b-30">Sales Report Month Wise</h4>
<h4 align="center" style="color:blue">Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>
					    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
						<thead>
						  <tr>
							                   <th>#</th>
							                    <th>Month / Year </th>
<th>Sales</th>
							
						  </tr>
						</thead>
						<tbody>
							<?php
		
$sql="SELECT tblorder.OrderNumber,tblorder.OrderDate,tblfood.PackageName,tblfood.Price,tblfood.ItemImage,tblorderdetails.ProductId,tblorderdetails.ProductQty,month(tblorderdetails.OrderDate) as lmonth,year(tblorderdetails.OrderDate) as lyear,sum(tblfood.Price) as totalprice from  tblorder 
join tblorderdetails on tblorderdetails.OrderNumber=tblorder.OrderNumber 
join tblfood on tblorderdetails.ProductId=tblfood.ID 
where date(tblorderdetails.OrderDate) between '$fdate' and '$tdate' && (tblorder.Status!='' || tblorder.Status!='Cancelled')group by lmonth,lyear";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
						<td><?php  echo $row->lmonth."/".$row->lyear;?></td>
              <td><?php  echo $total=$row->totalprice;?></td>
							
							
						  </tr>
						  <?php
$ftotal+=$total;
$cnt++;
}}?>
 <tr>
                  <td colspan="2" align="center">Total </td>
              <td><?php  echo $ftotal;?></td>
   
						</tr>
						</tbody>
					  </table>
					</div>
				<?php } else {
$year1=strtotime($fdate);
$year2=strtotime($tdate);
$y1=date("Y",$year1);
$y2=date("Y",$year2);
 ?>
        <h4 class="header-title m-t-0 m-b-30">Sales Report Year Wise</h4>
    <h4 align="center" style="color:blue">Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h4>
					    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
						<thead>
						  <tr>
							                   <th>#</th>
							                    <th>Year </th>
<th>Sales</th>
							
						  </tr>
						</thead>
						<tbody>
							<?php
						
$sql="SELECT tblorder.OrderNumber,tblorder.OrderDate,tblfood.PackageName,tblfood.Price,tblfood.ItemImage,tblorderdetails.ProductId,tblorderdetails.ProductQty,year(tblorderdetails.OrderDate) as lyear,sum(tblfood.Price) as totalprice from  tblorder 
join tblorderdetails on tblorderdetails.OrderNumber=tblorder.OrderNumber 
join tblfood on tblorderdetails.ProductId=tblfood.ID 
where date(tblorderdetails.OrderDate) between '$fdate' and '$tdate' && (tblorder.Status!='' || tblorder.Status!='Cancelled')group by lyear ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
						<td><?php  echo $row->lyear;?></td>
              <td><?php  echo $total=$row->totalprice;?></td>
							
							
						  </tr>
						  <?php
$ftotal+=$total;
$cnt++;
}}?>
 <tr>
                  <td colspan="2" align="center">Total </td>
              <td><?php  echo $ftotal;?></td>
   
						</tr>
						</tbody>
					  </table>
					</div>
 <?php } ?> 




				</div>
				<!-- //tables -->
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