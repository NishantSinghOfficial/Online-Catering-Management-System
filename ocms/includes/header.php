
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php"><h3>OCMS</h3></a>
        </div>
        <div class="humberger__menu__cart">
         
            <div class="header__cart__price">Item: <span><?php echo "$ ".number_format($_SESSION['tprice'], 2); ?></div>
        </div>
        <div class="humberger__menu__widget">
            
           <?php if (strlen($_SESSION['ocmsuid']==0)) {?>
                            <div class="header__top__right__auth">
                                <a href="login.php"><i class="fa fa-user"></i> Login</a>
                            </div><?php } ?>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
           <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="products.php">Packages</a></li>
                             <?php if (strlen($_SESSION['ocmsuid']==0)) {?>
                            <li><a href="admin/">Admin</a></li><?php } ?>
                             <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                         <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                       
                    </ul>
                </li>
                          
                            <?php if (strlen($_SESSION['ocmsuid']!=0)) {?>
                             <li><a href="#">My Account</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="change-password.php">Setting</a></li>
                                    <li><a href="my-order.php">My Order</a></li>
                                    <li><a href="cart.php">My Cart</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li><?php } ?>
                          
                           

                        </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
         <?php
         
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> <?php  echo htmlentities($row->Email);?></li>
                <li><i class="fa fa-phone"></i><?php  echo htmlentities($row->MobileNumber);?></li>
            </ul>
        </div>

    </div>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                               <li><i class="fa fa-envelope"></i> <?php  echo htmlentities($row->Email);?></li>
                <li><i class="fa fa-phone"></i><?php  echo htmlentities($row->MobileNumber);?></li>
                            </ul>
                        </div> <?php $cnt=$cnt+1;}} ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                           <?php if (strlen($_SESSION['ocmsuid']==0)) {?>
                            <div class="header__top__right__auth">
                                <a href="login.php"><i class="fa fa-user"></i> Login</a>
                            </div><?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php"><h3><strong>OCMS</strong></h3></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="products.php">Packages</a></li>
                             <?php if (strlen($_SESSION['ocmsuid']==0)) {?>
                            <li><a href="admin/">Admin</a></li><?php } ?>
                             <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                         <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                       
                    </ul>
                </li>
                          
                            <?php if (strlen($_SESSION['ocmsuid']!=0)) {?>
                             <li><a href="#">My Account</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="change-password.php">Setting</a></li>
                                    <li><a href="my-order.php">My Order</a></li>
                                    <li><a href="cart.php">My Cart</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li><?php } ?>
                          
                           

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            
                            <li><a href="cart.php"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span><?php echo "$ ".number_format($_SESSION['tprice'], 2); ?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
