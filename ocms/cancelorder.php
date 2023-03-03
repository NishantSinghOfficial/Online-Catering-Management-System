<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['ocmsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    
    
    $orderid=$_GET['oid'];
    $ressta="Cancelled";
    $remark=$_POST['restremark'];
    $canclbyuser=1;

    $sql="insert into tbltracking(OrderId,Remark,Status,OrderCanclledByUser) value(:orderid,:remark,:ressta,:canclbyuser)";
    $query=$dbh->prepare($sql);
$query->bindParam(':orderid',$orderid,PDO::PARAM_STR); 
    $query->bindParam(':remark',$remark,PDO::PARAM_STR); 
    $query->bindParam(':ressta',$ressta,PDO::PARAM_STR); 
     $query->bindParam(':canclbyuser',$canclbyuser,PDO::PARAM_STR);
       $query->execute();
      $sql1= "update tblorder set Status=:ressta where OrderNumber=:orderid";

    $query1=$dbh->prepare($sql1);
     $query1->bindParam(':orderid',$orderid,PDO::PARAM_STR);
$query1->bindParam(':ressta',$ressta,PDO::PARAM_STR);

 $query1->execute();
 echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='order-detail.php'</script>";
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Order Cancelation</title>
</head>
<body>

<div style="margin-left:50px;">
<?php  
$orderid=$_GET['oid'];
$sql1="select OrderNumber,Status from tblorder where OrderNumber=:orderid";
$query = $dbh -> prepare($sql1);
$query-> bindParam(':orderid', $orderid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
?>

<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="4" >Cancel Order #<?php echo  $orderid;?></th> 
  </tr>
  <tr>
<th>Order Number </th>
<th>Current Status </th>
</tr>
<?php  
if($query->rowCount() > 0)
{
foreach($results as $row)
{
  ?>
<tr> 
  <td><?php  echo $orderid;?></td> 
   <td><?php  $status=$row->Status;
if($status==""){
  echo "Waiting for confirmation";
} else { 
echo $status;
}
?></td> 
</tr>
<?php 
} }?>

</table>
     <?php if($status=="" || $status=="Confirmed") {?>
<form method="post">
      <table>
        <tr>
          <th>Reason for Cancel</th>
<td>    <textarea name="restremark" placeholder="" rows="12" cols="50" class="form-control wd-450" required="true"></textarea></td>
        </tr>
<tr>
  <td colspan="2" align="center"><button type="submit" name="submit" class="btn btn-primary">Update order</button></td>

</tr>
      </table>

</form>
    <?php } else { ?>
<?php if($status=='Cancelled'){?>
<p style="color:red; font-size:20px;"> Order Cancelled</p>
<?php } else { ?>
  <p style="color:red; font-size:20px;"> You can't cancel this. Order is on the way or delivered</p>

<?php }  } ?>
  
</div>

</body>
</html>
<?php } ?>
     