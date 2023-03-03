<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['ocmsuid']==0)) {
  header('location:logout.php');
  } else{
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>WSMS-Track Order</title>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
</head>
<body>

<div style="margin-left:50px;">
<?php 
$vid=$_GET['odid']; 
   
$ret="select tbltracking.OrderCanclledByUser,tbltracking.Remark,tbltracking.Status as astatus,tbltracking.StatusDate from tbltracking where tbltracking.OrderId =:vid";
$query3 = $dbh -> prepare($ret);
$query3-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

 $cancelledby=$row3->OrderCanclledByUser;
 ?>
<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="4" style="color: blue" >Tracking History #<?php echo  $vid;?></th> 
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


     
     <p >
      <input name="Submit2" type="submit" class="btn btn-success" value="Close" onClick="return f2();" style="cursor: pointer;"  /></p>
</div>

</body>
</html>
<?php } ?>
     