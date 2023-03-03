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
<title>Online Catering Managements System | Search Order</title>
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
						<h2>Search Order</h2>
					</div>
					<div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>Search Order :</h4>
								</div>
								<div class="form-body">
									<form method="post">
										
										<div class="form-group"> 
											<label for="exampleInputEmail1">Search by Order No</label> 
											 <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Enter Order Number">
										</div> 
										<button type="submit" class="btn btn-default w3ls-button" name="search">Search</button> 
									</form> 
								</div>
							</div>
<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
							 <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
						<thead>
						  <tr>
							                   <th>#</th>
							                    <th>Order Number</th>
                                                <th>Full Name</th>
                                                <th>Contact Number</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
							
						  </tr>
						</thead>
						<tbody>
							<?php
							 if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 3;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $ret = "SELECT ID FROM tblorder";
 $query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();


$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql="SELECT * from tblorder where OrderNumber like '$sdata%' LIMIT $offset, $no_of_records_per_page";
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
							<td><?php  echo htmlentities($row->OrderNumber);?></td>
							<td><?php  echo htmlentities($row->FullName);?></td>
							<td><?php  echo htmlentities($row->ContactNumber);?></td>
							<td><?php  echo htmlentities($row->OrderDate);?></td>
							<td><?php $status=$row->Status;
if($status==''){
 echo "Still Pending";   
} else{
echo $status;
}

                                                    ?>  </td>
							<td><a href="view-order-detail.php?viewid=<?php echo htmlentities ($row->OrderNumber);?>">View Details</a></td>
							
						  </tr>
						 
						
						</tbody>
						
					  </table>
						</div>
<div align="left">
    <ul class="pagination" >
        <li><a href="?pageno=1"><strong>First></strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
</div> <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
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