-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 07:22 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Test', 'admin', 5689784570, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-04-21 12:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CatName` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CatName`, `CreationDate`) VALUES
(1, 'Breakfast', '2020-04-23 07:04:02'),
(2, 'Deli Platters', '2020-04-23 07:04:20'),
(3, 'Deserts', '2020-04-23 07:04:39'),
(4, 'Drinks', '2020-04-23 07:04:56'),
(5, 'Snacks', '2020-04-23 07:05:08'),
(6, 'Lunch', '2020-04-23 07:05:26'),
(7, 'Dinner', '2020-04-23 07:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `MobileNumber`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'ugyu', 654645, 'uhug@rdr.gfg', 'hjhb', '2020-05-09 12:43:31', 1),
(2, 'anuj', 9798797987, 'anuj@gmail.com', 'Sample Text', '2020-05-09 12:44:32', 1),
(3, 'Sample Tests', 9879797979, 'sample@gmail.com', 'Hello,\r\nThis is sample text', '2020-06-13 07:28:40', NULL),
(4, 'Anuj', 1212221212, 'ancsh@gmail.com', 'Sample text for testing.', '2020-06-19 14:34:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfood`
--

CREATE TABLE `tblfood` (
  `ID` int(10) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Price` varchar(100) DEFAULT NULL,
  `Category` varchar(200) DEFAULT NULL,
  `PackageContain` mediumtext DEFAULT NULL,
  `Nofopeople` int(5) DEFAULT NULL,
  `ItemImage` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`ID`, `PackageName`, `Description`, `Size`, `Status`, `Price`, `Category`, `PackageContain`, `Nofopeople`, `ItemImage`, `CreationDate`) VALUES
(1, 'Birthday Package', '                                                 	                                                 	<div class=\"desc-component-title\" style=\"font-size: 18px; margin-bottom: 10px; font-family: Roboto, Helvetica, Arial, sans-serif;\">Things To Remember</div><div class=\"desc-component-content\" style=\"font-size: 14px; font-family: Roboto, Helvetica, Arial, sans-serif;\"><ol><li><span style=\"letter-spacing: 0px;\">Rest of the payment needs to be settled in cash.&nbsp;</span></li><li><span style=\"letter-spacing: 0px;\">Sampling can be availed at the location mentioned above</span></li><li><span style=\"letter-spacing: 0px;\">If the order size is above Rs. 15000 then sampling amount Rs. 250 can be deducted from total booking amount</span></li><li><span style=\"letter-spacing: 0px;\">Buffet tables and handwash will be provided if the order is for 50 people or more. In case if the order is less than that table needs to be arranged by customer frill cloth will be arranged by service provider.</span></li><li><span style=\"letter-spacing: 0px;\">The image used is for representation purpose from the options available in menu.</span></li><li><span style=\"letter-spacing: 0px;\">Minimum 50 Plates are required for this combo order.</span></li><li><span style=\"letter-spacing: 0px;\">Disposable plates / Cups / Spoons / Bowls, drinking water, serving bowls, serving spoons will be arranged.</span></li><li><span style=\"letter-spacing: 0px;\">Paid sampling is available, for sampling food can be delivered at minimal price.</span></li><li><span style=\"letter-spacing: 0px;\">Rs.1000 will be charged additional for setting live counter.</span></li><li><span style=\"letter-spacing: 0px;\">Spoons, tissues, glasses, garbage collection will be provided. Disposable plates/ fiber plates will be provided on request.</span></li><li><span style=\"letter-spacing: 0px;\">Water can is included in this package.</span></li><li><span style=\"letter-spacing: 0px;\">Guest service team will be formally dressed with cap on head and gloves</span></li><li><span style=\"letter-spacing: 0px;\">For serving food hot, flame heating is used so that it can be served hot at the venue.</span></li><li><span style=\"letter-spacing: 0px;\">Based on the order plate count, additional 10 plates are prepared in case if guest count increases.</span></li><li><span style=\"letter-spacing: 0px;\">No. of people for serving guests will be 1 per 30 guests. It can be increased on additional charges.</span></li></ol></div>                                                 	', 'Small', 'Active', '250', 'Deli Platters', '                                                 	                                                 	<div><span style=\"font-weight: 700; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\">Birthday Package Contain Following Food Items</span></div><span style=\"font-weight: 700; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\">Food Items:</span><br style=\"font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><ol><li>Sweet Corn Soup</li><li>Baby Corn Manchurian</li><li>Gobi Manchurian</li><li>Veg Noodles with Sauce</li><li>Veg Fried Rice with Sauce</li><li>Gulab Jamun</li><li>Vanilla</li></ol>                                                 	', 60, '18c306208e1527c0a5ba9f1ea7bc6678.png', '2020-04-24 06:44:11'),
(2, 'Paneer Butter Masala Combo For 25 Guests', '<div id=\"thingsToRemember\" class=\"desc-component-wrap mar-b-20\" style=\"margin-bottom: 20px; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 13px;\"><div class=\"desc-component-title\" style=\"font-size: 18px; margin-bottom: 10px;\"><b>Things To Remember</b></div><div class=\"desc-component-content\" style=\"font-size: 14px;\"><ol><li><span style=\"letter-spacing: 0px;\">Tables need to be arranged by the customer to set things up.</span></li><li>The image used is for representation purpose from the options available in menu.</li><li>Minimum 25 Plates are required for this combo order.</li><li>This package will be delivered with Disposable plates / Cups / Spoons at your venue and it does not include serving.<br></li><li>Paid sampling is available, for sampling food can be delivered at minimal price.</li><li>Rs.500 will be charged additional for setting live counter.</li></ol></div></div><div id=\"showProductReviews\" style=\"font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 13px;\"><div class=\"product-reviews-section\"><div id=\"fullDescription\" class=\"product-reviews-wrap\"></div></div></div><div id=\"terms\" class=\"desc-component-wrap mar-b-20 pad-t-10 pad-b-10\" style=\"padding-top: 10px; padding-bottom: 10px; margin-bottom: 20px; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 13px;\"><div class=\"desc-component-title\" style=\"font-size: 18px; margin-bottom: 10px;\"><b>Terms of Booking</b></div><div class=\"desc-component-content desc-terms-content\" style=\"color: rgb(111, 111, 111); font-size: 14px;\"><ol><li>This package should be booked 3 days in advance.<br></li><li>Rest of the payment needs to be done in cash only, once the delivery is complete.<br></li><li>You need to make sure sufficient time is available to set-up food at your venue.<br></li><li>You need to make sure you have required arrangements in place to execute it on time.<br></li><li>For anything additional which is not mentioned here, charges will be extra.<br></li><li>If there is any damage to any of the merchandize used for this set-up during your party, you will be billed accordingly.<br></li><li>Booking does not include any furniture / fixture. Examples, but not limited to: chairs, tables, carpets, power points, ladder, plates, microwave.<br></li><li>Booking does not include housekeeping service.<br></li><li>You need to ensure that all necessary permissions / copyrights and authorisations are in place.<br></li><li>Although we use all reasonable safety precautions, we cannot be held liable for any casualties arising at any stage.</li></ol></div></div>                                                 	', 'Medium', 'Active', '600', 'Lunch', '<div class=\"desc-component-title\" style=\"font-size: 18px; margin-bottom: 10px; font-family: Roboto, Helvetica, Arial, sans-serif;\"><b>Inclusions</b></div><div class=\"desc-component-content\" style=\"font-size: 14px; font-family: Roboto, Helvetica, Arial, sans-serif;\"><br><div><ol><li>Green Salad</li><li>Rumali Roti</li><li>Paneer Butter Masala/Paneer Kadai/Aloo Palak Paneer</li><li>Chhole/Bhindi Masala/</li><li>Veg Pulao/Peas Pulao</li><li>Plain Rice</li><li>Raitha</li><li>Papad</li><li>Pickle</li><li>Sweet</li></ol></div></div>                                                 	', 25, 'db38b0e7df06f6e9b1ef00b49390bea1.png', '2020-04-24 06:49:34'),
(3, 'Special South Indian Combo For 50 People', '                                                 	<div class=\"desc-component-title\" style=\"font-size: 18px; margin-bottom: 10px; font-family: Roboto, Helvetica, Arial, sans-serif;\"><b>Things To Remember</b></div><div class=\"desc-component-content\" style=\"font-size: 14px; font-family: Roboto, Helvetica, Arial, sans-serif;\"><ol><li>Rest of the payment needs to be settled in cash.</li><li><br></li><li>Disposable plates / Cups / Spoons / Bowls, drinking water, serving bowls, serving spoons will be arranged.<br></li><li>Minimum 50 plates are required for this combo order.<br></li><li>Spoons, tissues, glasses, garbage collection will be provided. Disposable plates/ fiber plates will be provided on request.<br></li><li>Water can is included in this package.<br></li><li>Guest service team will be formally dressed with cap on head and gloves<br></li><li>For serving food hot, flame heating is used so that it can be served hot at the venue.<br></li><li>Based on the order plate count, additional 10 plates are prepared in case if guest count increases.<br></li><li>No. of people for serving guests will be 1 per 30 guests. It can be increased on additional charges.</li></ol></div>                                                 	', 'Large', 'Active', '900', 'Deli Platters', '                                                 	<span style=\"font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><b>Menu Items:</b></span><br style=\"font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><ol><li>Veg Pulav</li><li>Poori</li><li>Plain rice</li><li>Vankai+Tomato+Aloo</li><li>Gobi Pakoda</li><li>Dal mixed with tomato</li><li>Miriyala rasam</li><li>Fruit salad with custard</li><li>mirch bhajji</li><li>jangri</li><li>Majjiga pulusu</li><li>Curd</li><li>Papad</li><li>Pickle</li></ol>                                                 	', 50, 'a59a1e1fb0484d902b137c5bb4334db1.png', '2020-04-24 06:53:08'),
(4, 'Best Live Chat Counter For 30 People', '                                                 	<div class=\"desc-component-title\" style=\"font-size: 18px; margin-bottom: 10px; font-family: Roboto, Helvetica, Arial, sans-serif;\"><b>Things To Remember</b></div><div class=\"desc-component-content\" style=\"font-size: 14px; font-family: Roboto, Helvetica, Arial, sans-serif;\"><ol><li>Tables need to be arranged by the customer to set things up</li><li>The image used is for representation purpose from the options available in menu.</li><li>Minimum 50 Plates are required for this combo order.</li><li>This package will be delivered with Disposable plates / Cups / Spoons at your venue and it does not include serving.<br></li><li>Paid sampling is available, for sampling food can be delivered at minimal price.</li><li>Rs.1000 will be charged additional for setting live counter.</li></ol></div>                                                 	', 'Medium', 'Active', '300', 'Deserts', '                                                 	<div id=\"inclusions\" class=\"desc-component-wrap mar-b-20\" style=\"margin-bottom: 20px; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 13px;\"><div class=\"desc-component-title\" style=\"font-size: 18px; margin-bottom: 10px;\"><b>Inclusions</b></div><div class=\"desc-component-content\" style=\"font-size: 14px;\"><span style=\"font-weight: 700;\">Chat Counters:</span><br><ol><li>Pani Puri<br></li><li>Pav Bhaji<br></li><li>Dhahi Puri<br></li></ol></div></div><div id=\"thingsToRemember\" class=\"desc-component-wrap mar-b-20\" style=\"margin-bottom: 20px; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 13px;\"><div class=\"desc-component-title\" style=\"font-size: 18px; margin-bottom: 10px;\"><br></div></div>                                                 	', 30, 'fad2ef3597aaee2750e3b181b6a3e2ba.png', '2020-04-24 06:56:06'),
(5, 'Delicious North Indian Veg Combo For 50 People', '&nbsp;<span style=\"font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 18px;\"><b>Things To Remember</b></span><div class=\"desc-component-content\" style=\"font-size: 14px; font-family: Roboto, Helvetica, Arial, sans-serif;\"><ol><li>Table needs to be arranged from your side.</li><li>Image used for this combo is for representation purpose</li><li>Disposable plates / Cups / Spoons / Bowls, drinking water, serving bowls, serving spoons will be arranged.<br></li><li>Minimum 50 plates are required for this combo order.</li><li>Paid sampling can be arranged after selecting items for paid sampling.<br></li><li>Live counters can be set up at an additional cost of Rs. 1000 for each food item</li></ol></div>                                                 	', 'Medium', 'Active', '600', 'Dinner', '<div class=\"desc-component-title\" style=\"font-size: 18px; margin-bottom: 10px; font-family: Roboto, Helvetica, Arial, sans-serif;\">Inclusions</div><div class=\"desc-component-content\" style=\"font-size: 14px; font-family: Roboto, Helvetica, Arial, sans-serif;\"><div><span style=\"font-weight: 700;\">Starter ( Any one )</span></div><div><ol><li>Veg cutlet<br></li><li>Vada pao<br></li><li>French fries<br></li><li>Paneer pakoda<br></li><li>Pao bhaji<br></li><li>Grill sandwich<br></li><li>Dhokla<br></li><li>Hara bhara kabab<br></li><li>Cheese corn ball<br></li><li>Cheese ball<br></li><li>Pani puri<br></li><li>Spring roll<br></li><li>Aloo chat<br></li><li>Chola tikki<br></li><li>Chole chaat<br></li><li>Onion pakoda<br></li><li>Bhel puri<br></li><li>Mirchi pakoda<br></li><li>Veg noodles</li></ol></div><div><span style=\"font-weight: 700;\">Indian bread ( Any one )</span></div><div><ol><li>Poori<br></li><li>Stuffed kulcha<br></li><li>Plain kulcha<br></li><li>Masala poori<br></li><li>Urad dal kachori<br></li><li>Plain naan<br></li><li>Butter naan<br></li><li>Plain tandoori roti<br></li><li>Butter tandoori roti<br></li><li>Roomali roti<br></li><li>Phulka<br></li><li>Aloo paratha<br></li><li>Paneer paratha<br></li><li>Missi roti</li></ol></div><div><span style=\"font-weight: 700;\">Flavoured rice ( Any one )</span></div><div><ol><li>Veg pulao<br></li><li>Peas pulao<br></li><li>Fried onion pulao<br></li><li>Ghee rice<br></li><li>Jeera rice<br></li><li>Lemon rice<br></li><li>Veg fried rice<br></li><li>Curd rice<br></li><li>Veg biryani</li></ol></div><div><span style=\"font-weight: 700;\">Dal ( Any one )</span></div><div><ol><li>Dal fry<br></li><li>Dal tadka<br></li><li>Dal palak<br></li><li>Dal makhni<br></li><li>Channa dal<br></li><li>Dal methi<br></li><li>Kadi pakoda<br></li><li>Paneer butter masala<br></li><li>Matar paneer<br></li><li>Shahi paneer<br></li><li>Palak paneer<br></li><li>Corn palak paneer<br></li><li>Paneer kofta<br></li><li>Paneer do pyaza</li></ol></div><div><span style=\"font-weight: 700;\">Dry subzi ( Any one )</span></div><div><ol><li>Aloo gobhi matar<br></li><li>Aloo jeera<br></li><li>Aloo chola<br></li><li>Chola masala<br></li><li>Pindi chola<br></li><li>Bhindi rajasthani<br></li><li>Navratan kurma<br></li><li>Gatte ki sabzi<br></li><li>Gobhi matar<br></li><li>Rajma masala<br></li><li>Tawa sabzi<br></li><li>Green peas masala<br></li><li>Malai kofta<br></li><li>Lauki kofta<br></li><li>Palak kofta<br></li><li>Mix veg.</li></ol></div><div><span style=\"font-weight: 700;\">Raita ( Any one )</span></div><div><ol><li>Boondi raita<br></li><li>Mix veg raita<br></li><li>Masala raita<br></li><li>Lauki raita<br></li><li>Aloo raita<br></li><li>Cucumber raita<br></li><li>Dahi pakoda<br></li><li>Jeera curd<br></li><li>Dahi vada</li></ol></div><div><span style=\"font-weight: 700;\">Dessert ( Any one )</span></div><div><ol><li>Rasgulla<br></li><li>Rasmalai<br></li><li>Gulab jamun<br></li><li>Jalebi,Gajar ka halwa<br></li><li>Moong dal ka halwa<br></li><li>Rabdi<br></li><li>Malpua<br></li><li>Chawal ki kheer<br></li><li>Balushahi<br></li><li>Lawang lata<br></li><li>Vanilla ice cream<br></li><li>Butterscotch ice cream<br></li><li>Chocolate ice cream<br></li><li>Strawberry ice cream</li></ol></div><div><span style=\"font-weight: 700;\">Salad ( Any one )</span></div><div><ol><li>Garden green salad<br></li><li>Sprout salad<br></li><li>Corn capsicum salad<br></li><li>Tomato salad<br></li><li>Aloo chana salad<br></li><li>Cucumber salad<br></li><li>Onion laccha tomato salad<br></li><li>Carrot beetroot salad<br></li><li>Sweet corn bell pepper salad<br></li><li>Chana chat<br></li><li>Vinegar onion<br></li></ol></div><div>Papad<br></div><div><br></div><div>Pickle</div></div>                                                 	', 50, '6669c9181d84b0bc5bbc593d0c76ad1b.png', '2020-04-24 07:02:11'),
(6, 'Best South Indian Veg Combo For 100 Guests', '<div class=\"desc-component-title\" style=\"font-size: 18px; margin-bottom: 10px; font-family: Roboto, Helvetica, Arial, sans-serif;\">Things To Remember</div><div class=\"desc-component-content\" style=\"font-size: 14px; font-family: Roboto, Helvetica, Arial, sans-serif;\"><ol><li>Rest of the payment needs to be settled up in cash.</li><li>Sampling can be availed at the location mentioned above</li><li>If the order size is above Rs. 15000 then sampling amount Rs. 250 can be deducted from total booking amount</li><li>Buffet tables and handwash will be provided if the order is for 50 people or more. In case if the order is less than that table needs to be arranged by customer frill cloth will be arranged by service provider.<br></li><li>Disposable plates / Cups / Spoons / Bowls, drinking water, serving bowls, serving spoons will be arranged.<br></li><li>Minimum 50 plates are required for this combo order.<br></li><li>Spoons, tissues, glasses, garbage collection will be provided. Disposable plates/ fiber plates will be provided on request.<br></li><li>Water can is included in this package.<br></li><li>Guest service team will be formally dressed with cap on head and gloves<br></li><li>For serving food hot, flame heating is used so that it can be served hot at the venue.<br></li><li>Based on the order plate count, additional 10 plates are prepared in case if guest count increases.<br></li><li>No. of people for serving guests will be 1 per 30 guests. It can be increased on additional charges.</li></ol></div>                                                 	', 'Large', 'Active', '900', 'Deli Platters', '<span style=\"font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><b>Menu Items</b></span><br style=\"font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><ol><li>Fruit Juice<br></li><li>Badhusha<br></li><li>Sweetcorn Soup<br></li><li>Chapathi<br></li><li>Paneer Curry<br></li><li>Veg Biriyani<br></li><li>Raitha<br></li><li>White Rice<br></li><li>Drumstick, Onion Sambar<br></li><li>Madras Rasam<br></li><li>Groundnut Kosambari<br></li><li>Akki Payasa<br></li><li>Mix Veg Palya</li></ol><span style=\"font-weight: 700; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\">Note:</span><br style=\"font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><ol><li>Paid Sampling can be availed prior 4 days to your Party.<br></li><li>Sampling can be done for Rs. 250/Plate</li></ol><span style=\"font-weight: 700; font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\">Items for Sampling</span><br style=\"font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><ol><li>Groundnut Kosambari<br></li><li>Akki Payasa<br></li><li>Mix Veg Palya</li><li>Veg Biriyani</li></ol>                                                 	', 100, '5ea4f6c76d28b1c4b0b1100159e88c73.png', '2020-04-24 07:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `ID` int(10) NOT NULL,
  `OrderNumber` int(10) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `FlatNo` varchar(200) DEFAULT NULL,
  `StreetName` varchar(200) DEFAULT NULL,
  `Area` varchar(200) DEFAULT NULL,
  `Landmark` varchar(200) DEFAULT NULL,
  `City` varchar(200) DEFAULT NULL,
  `Zipcode` int(10) DEFAULT NULL,
  `State` varchar(200) DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`ID`, `OrderNumber`, `UserID`, `FullName`, `ContactNumber`, `FlatNo`, `StreetName`, `Area`, `Landmark`, `City`, `Zipcode`, `State`, `DeliveryDate`, `OrderDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 503915948, 2, 'Rajesh', 4546464654, 'F-809', 'Gali No 8', 'Mayur Vihar', 'Near Shiv Mandir', 'Delhi', 110096, 'Delhi', '2020-06-25', '2020-06-19 13:46:35', 'Your Delicious has been delivered', 'Delivered', '2020-06-19 13:46:35'),
(2, 259618655, 2, 'Janki Das', 6469879846, 'L-686', 'Jhangirpuri', 'Nihali Gao', 'Near Relaince Fresh', 'Varanasi', 221001, 'UP', '2020-06-21', '2020-06-19 13:46:57', 'Delivery Boy is on the way', 'On The Way', '2020-06-19 13:46:57'),
(3, 585156948, 3, 'sample', 6546446546, 'h-890', 'XyZ', 'abc', 'hyf', 'jkl', 123456, 'up', '2020-06-26', '2020-06-19 13:47:08', NULL, NULL, '2020-06-19 13:47:08'),
(4, 544398145, 4, 'Anuj Kmar', 1234567890, 'A671', 'XYZ Streer ', 'Noida', 'NA', 'Noida', 2301, 'UP', '2020-06-21', '2020-06-19 13:47:12', NULL, NULL, '2020-06-19 13:47:12'),
(7, 973792755, 5, 'ABC', 324234234, 'H 23432', 'ABC Street', 'XYZ', 'Abc XYZ', 'New Delhi', 110091, 'Delhi', '2020-06-28', '2020-06-19 14:35:38', 'Order confirmed', 'Confirmed', '2020-06-19 14:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetails`
--

CREATE TABLE `tblorderdetails` (
  `ID` int(10) NOT NULL,
  `UserId` int(5) DEFAULT NULL,
  `OrderNumber` bigint(10) DEFAULT NULL,
  `ProductId` int(10) DEFAULT NULL,
  `ProductQty` int(10) DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorderdetails`
--

INSERT INTO `tblorderdetails` (`ID`, `UserId`, `OrderNumber`, `ProductId`, `ProductQty`, `OrderDate`) VALUES
(1, 2, 503915948, 3, 1, '2020-05-11 07:40:03'),
(2, 2, 503915948, 2, 2, '2020-05-11 07:40:03'),
(3, 2, 503915948, 6, 1, '2020-05-11 07:40:03'),
(4, 2, 259618655, 6, 1, '2020-05-13 07:23:45'),
(5, 2, 259618655, 2, 10, '2020-05-13 07:23:46'),
(6, 2, 259618655, 5, 1, '2020-05-13 07:23:46'),
(7, 3, 585156948, 1, 4, '2020-06-13 07:37:39'),
(8, 4, 544398145, 3, 1, '2020-06-19 13:10:54'),
(9, 4, 500186279, 1, 1, '2020-06-19 13:42:16'),
(10, 4, 682824414, 2, 1, '2020-06-19 13:46:16'),
(11, 5, 973792755, 1, 1, '2020-06-19 14:33:32'),
(12, 5, 973792755, 2, 2, '2020-06-19 14:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<span style=\"color: rgb(85, 71, 65); font-family: CorbelRegular, sans-serif; text-align: justify;\">We are known as the best catering company in Seattle for good reason. Our dedication and commitment to quality and sustainability has earned us a loyal following among our clientele, one that continues to grow based on enthusiastic referrals. For nearly two decades, we have bridged the gap between the land, the sea, and your table. We leverage the best ingredients Washington has to offer, preparing them mindfully and always from scratch.</span><div><span style=\"color: rgb(85, 71, 65); font-family: CorbelRegular, sans-serif; text-align: justify;\"><br></span></div><div><br></div>', NULL, NULL, '2020-06-19 14:42:15'),
(2, 'contactus', 'Contact Us', '#890 CFG Apartment, Mayur Vihar, Delhi-India', 'info@gmail.com', 7979797979, '2020-05-09 12:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscriber`
--

CREATE TABLE `tblsubscriber` (
  `ID` int(10) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `SubDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubscriber`
--

INSERT INTO `tblsubscriber` (`ID`, `Email`, `SubDate`) VALUES
(2, 'anuj@gmail.com', '2020-04-30 07:29:44'),
(3, 'sarita@gmail.com', '2020-04-30 07:31:04'),
(4, 'aksah@gmail.com', '2020-04-30 16:40:59'),
(5, 'khusi@gmail.com', '2020-05-09 16:06:12'),
(6, 'dinesg@gmail.com', '2020-05-24 14:47:55'),
(7, 'varun@gmail.com', '2020-06-13 07:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbltracking`
--

CREATE TABLE `tbltracking` (
  `ID` int(10) NOT NULL,
  `OrderId` varchar(50) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT current_timestamp(),
  `OrderCanclledByUser` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltracking`
--

INSERT INTO `tbltracking` (`ID`, `OrderId`, `Remark`, `Status`, `StatusDate`, `OrderCanclledByUser`) VALUES
(1, '503915948', 'Your Order has been Confirmed', 'Confirmed', '2020-05-13 12:47:25', NULL),
(2, '503915948', 'Your Order has been Confirmed', 'Confirmed', '2020-05-13 12:51:51', NULL),
(3, '503915948', 'Delivery Boy is on the way', 'On The Way', '2020-05-13 12:57:40', NULL),
(4, '503915948', 'Your Delicious has been delivered', 'Delivered', '2020-05-13 12:58:34', NULL),
(5, '259618655', NULL, NULL, NULL, NULL),
(6, '259618655', 'Your Order Has been confirmed', 'Confirmed', '2020-05-25 04:18:35', NULL),
(7, '259618655', 'Delivery Boy is on the way', 'On The Way', '2020-05-25 04:20:37', NULL),
(8, '973792755', 'Order confirmed', 'Confirmed', '2020-06-19 14:35:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Akash Mishra', 9877979797, 'aki@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-04-30 06:23:57'),
(2, 'Test', 7987987987, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-04-30 17:02:00'),
(3, 'Sample', 7987987987, 'sample@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-06-13 07:30:17'),
(4, 'Anuj kumar', 1234567890, 'anujk30@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-06-19 12:52:14'),
(5, 'Test user', 1236547899, 'testuser@test.com', 'f925916e2754e5e03f75dd58a5733251', '2020-06-19 14:31:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CatName` (`CatName`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfood`
--
ALTER TABLE `tblfood`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrderNumber` (`OrderNumber`);

--
-- Indexes for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltracking`
--
ALTER TABLE `tbltracking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblfood`
--
ALTER TABLE `tblfood`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbltracking`
--
ALTER TABLE `tbltracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
