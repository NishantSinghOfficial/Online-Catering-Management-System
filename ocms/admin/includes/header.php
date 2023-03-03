<nav class="user-menu">
            <a href="javascript:;" class="main-menu-access">
            <i class="icon-proton-logo"></i>
            <i class="icon-reorder"></i>
            </a>
        </nav>
        <section class="title-bar">
            <div class="logo">
                <h1><a href="dashboard.php"><img src="images/logo.png" alt="" />OCMS</a></h1>
            </div>
            <div class="full-screen">
                <section class="full-top">
                    <button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>    
                </section>
            </div>
            
            <div class="header-right">
                <div class="profile_details_left">
                    <div class="header-right-left">
                        <!--notifications of menu start -->
                        <ul class="nofitications-dropdown">
                                                     <?php
$sql="SELECT * from tblorder  where Status is null";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
$totalorder=$query->rowCount();
 
  ?>      
                            <li class="dropdown head-dpdn">
 
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $totalorder;?></span></a>
                                <ul class="dropdown-menu anti-dropdown-menu agile-notification">
                                    <li>
                                        <div class="notification_header">
                                            <h3>You have <?php echo $totalorder;?> new notifications</h3>
                                        </div>
                                    </li>
                                    <?php foreach($results as $row)
{?>
                                    <li><a href="view-order-detail.php?viewid=<?php echo htmlentities ($row->OrderNumber);?>">
                                        <div class="user_img"><img src="images/images (1).png" alt=""></div>
                                        <p><?php echo $row->OrderNumber;?>:<?php echo $row->FullName;?></p>
                                       <div class="notification_desc">
                                        <p></p>
                                        <p><span>(<?php echo $row->OrderDate;?>)</span></p>
                                        </div>
                                      <div class="clearfix"></div>  
                                     </a></li><?php  } ?>
                                     <li>
                                        <div class="notification_bottom">
                                            <a href="new-order.php">See all notifications</a>
                                        </div> 
                                    </li>
                                </ul>
                            </li>   
                          
                            <div class="clearfix"> </div>
                        </ul>
                    </div>  
                    <div class="profile_details">       
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">   
                                        <span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span> 
                                        <div class="clearfix"></div>    
                                    </div>  
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="change-password.php"><i class="fa fa-cog"></i> Settings</a> </li> 
                                    <li> <a href="admin-profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
                                    <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </section>