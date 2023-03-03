<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


$packname=$_POST['packname'];
$desc=$_POST['description'];
$itemcon=$_POST['itemcontains'];
$size=$_POST['size'];
$status=$_POST['status'];
$price=$_POST['price'];
$category=$_POST['category'];
$noofpeople=$_POST['noofpeople'];
$itempic=$_FILES["itemimages"]["name"];
$extension = substr($itempic,strlen($itempic)-4,strlen($itempic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
    $itempic=md5($itempic).$extension;
     move_uploaded_file($_FILES["itemimages"]["tmp_name"],"itemimages/".$itempic);
$sql="insert into tblfood(PackageName,Description,PackageContain,Size,Nofopeople,Status,Price,Category,ItemImage)values(:packname,:desc,:itemcon,:size,:noofpeople,:status,:price,:category,:itempic)";
$query=$dbh->prepare($sql);
$query->bindParam(':packname',$packname,PDO::PARAM_STR);
$query->bindParam(':desc',$desc,PDO::PARAM_STR);
$query->bindParam(':itemcon',$itemcon,PDO::PARAM_STR);
$query->bindParam(':size',$size,PDO::PARAM_STR);
$query->bindParam(':noofpeople',$noofpeople,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':itempic',$itempic,PDO::PARAM_STR);


 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Food has been added.")</script>';
echo "<script>window.location.href ='add-category.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}

?>
<!DOCTYPE html>
<head>
<title>Online Catering Managements System | Add Food Package</title>
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
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
		
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
						<h2>Add Food</h2>
					</div>
					<div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>Add Food :</h4>
								</div>
								<div class="form-body">
									<form method="post" enctype="multipart/form-data">
										
										<div class="form-group"> 
											<label for="exampleInputEmail1">Package Name</label> 
											 <input type="text" name="packname" id="packname" required="true" placeholder="Package Name" class="form-control">
										</div> 

										<div class="form-group"> 
											<label for="exampleInputEmail1">Food Description</label> 
											 <textarea type="text" class="form-control" name="description" row="8" cols="12" required="true">
                                                 	</textarea>
										</div>
										<div class="form-group"> 
											<label for="exampleInputEmail1">Item Contains</label> 
											 <textarea type="text" class="form-control" name="itemcontains" row="8" cols="12" required="true">
                                                 	</textarea>
										</div>
										<div class="form-group"> 
											<label for="exampleInputEmail1">Category</label> 
											 <select type="text" name="category" id="category" required="true" class="form-control">
											 	<option value="">Choose Category</option>
                                                        <?php 


$sql2 = "SELECT * from   tblcategory ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->CatName);?>"><?php echo htmlentities($row->CatName);?></option>
 <?php } ?> 
											 	
											 </select>
										</div>
									<div class="form-group"> 
											<label for="exampleInputEmail1">Item Image</label> 
											 <input type="file" name="itemimages" id="itemimages" required="true" class="form-control">
										</div>
										
									<div class="form-group"> 
											<label for="exampleInputEmail1">Size</label> 
											 <select type="text" name="size" id="size" required="true"  class="form-control">
											 	<option value="">Select Size</option>
											 	<option value="Small">Small</option>
											 	<option value="Medium">Medium</option>
											 	<option value="Large">Large</option>
											 </select>
										</div>
										<div class="form-group"> 
											<label for="exampleInputEmail1">Status</label> 
											 <select type="text" name="status" id="status" required="true" class="form-control">
											 	<option value="">Select Status</option>
											 	<option value="Active">Active</option>
											 	<option value="Inactive">Inactive</option>
											 	
											 </select>
										</div>
										<div class="form-group"> 
											<label for="exampleInputEmail1">Suitable For no. of people</label> 
											 <input type="text" name="noofpeople" id="noofpeople" required="true" placeholder="Price" class="form-control">
										</div>
									<div class="form-group"> 
											<label for="exampleInputEmail1">Price</label> 
											 <input type="text" name="price" id="price" required="true" placeholder="Price" class="form-control">
										</div>
										<button type="submit" class="btn btn-default w3ls-button" name="submit">Add</button> 
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