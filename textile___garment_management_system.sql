-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 06:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `textile_&_garment_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Contact_ID` int(11) NOT NULL,
  `Contact_name` varchar(255) DEFAULT NULL,
  `Contact_email` varchar(255) DEFAULT NULL,
  `Message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Contact_ID`, `Contact_name`, `Contact_email`, `Message`) VALUES
(1, 'Nimal Perera', 'nimal.perera@gmail.com', 'Can I change my shipping address?'),
(2, 'Kumari Jayasinghe', 'kumari.jay@yahoo.com', 'I need help with my order status.'),
(3, 'Sunil Fernando', 'sunil.f@yahoo.com', 'Do you offer international shipping?'),
(4, 'Chathura Silva', 'chathura.silva@gmail.com', 'How can I track my order?'),
(5, 'Anusha Wijesinghe', 'anusha.wije@gmail.com', 'Can I modify my order?'),
(6, 'Ravindu Dias', 'ravindu.dias@yahoo.com', 'Do you have a return policy?'),
(7, 'Madhavi Wickramasinghe', 'madhavi.wick@gmail.com', 'I received a damaged item.'),
(8, 'Saman Kumara', 'saman.kumara@yahoo.com', 'I need to cancel my order.'),
(9, 'Lakmal Hettiarachchi', 'lakmal.hettia@gmail.com', 'What payment methods do you accept?'),
(10, 'Kanchana Peris', 'kanchana.peris@yahoo.com', 'Can I exchange an item for a different size?');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `salary_ID` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `Working_days` int(11) DEFAULT NULL,
  `Working_hours` decimal(4,2) DEFAULT NULL,
  `Hour_rate` decimal(7,2) DEFAULT NULL,
  `total_salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`salary_ID`, `username`, `Working_days`, `Working_hours`, `Hour_rate`, `total_salary`) VALUES
(1, 'kasun_perera', 22, 8.50, 120.00, 50000.00),
(2, 'fernando23', 20, 9.00, 125.50, NULL),
(3, 'jayawardena_07', 18, 7.75, 118.75, NULL),
(4, 'perera_nimal', 21, 8.25, 122.00, NULL),
(5, 'samarasinghe89', 19, 7.50, 119.50, NULL),
(6, 'bandara_deshan', 23, 9.50, 130.25, NULL),
(7, 'silva_piyasiri', 22, 8.00, 123.75, NULL),
(8, 'rajapaksha_kavi', 20, 9.25, 121.50, NULL),
(9, 'wijesinghe_kala', 21, 7.00, 117.00, NULL),
(10, 'gunawardena_ravi', 22, 8.75, 124.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Inventory_ID` int(11) NOT NULL,
  `Inventory_name` varchar(255) DEFAULT NULL,
  `Available_stock` int(11) DEFAULT NULL,
  `costPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inventory_ID`, `Inventory_name`, `Available_stock`, `costPrice`) VALUES
(2, 'Silk Yarn', 320, 300.00),
(3, 'Linen Thread', 270, 540.00),
(4, 'Jute Cloth', 600, 430.00),
(5, 'Polyester', 600, 200.00),
(6, 'Nylon Mesh', 200, 30.00),
(7, 'Velvet', 150, 320.00),
(8, 'Batik Cloth', 300, 545.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `Customer_name` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Order_status` varchar(50) NOT NULL,
  `Order_email` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Receipt_url` varchar(255) DEFAULT NULL,
  `Product_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Customer_name`, `Price`, `Order_status`, `Order_email`, `Address`, `Receipt_url`, `Product_ID`) VALUES
(1, 'Shanaka Perera', 2500.50, 'Shipped', 'shanaka.perera@example.lk', '123 Galle Road, Colombo', './example.lk/receipt001', 1),
(2, 'Tharindu Silva', 1750.00, 'Processing', 'tharindu.silva@example.lk', '45 Kandy Road, Gampaha', './example.lk/receipt002', 2),
(3, 'Samanthi Jayasinghe', 2999.99, 'Shipped', 'samanthi.jayasinghe@example.lk', '89 Lake Road, Kurunegala', './example.lk/receipt003', 3),
(4, 'Ajith Fernando', 1500.25, 'Delivered', 'ajith.fernando@example.lk', '67 Peradeniya Road, Kandy', './example.lk/receipt004', 4),
(5, 'Nimal de Silva', 1000.00, 'Processing', 'nimal.desilva@example.lk', '321 Beach Road, Negombo', './example.lk/receipt005', 5),
(6, 'Kumari Wickramasinghe', 499.99, 'Cancelled', 'kumari.wickramasinghe@example.lk', '654 Main Street, Matara', './example.lk/receipt006', 6),
(7, 'Dilshan Karunaratne', 3499.50, 'Shipped', 'dilshan.karunaratne@example.lk', '789 Hospital Road, Jaffna', './example.lk/receipt007', 7),
(8, 'Gayan Rajapaksha', 2799.49, 'Delivered', 'gayan.rajapaksha@example.lk', '951 High Street, Galle', './example.lk/receipt008', 8),
(9, 'Lakmini Weerasinghe', 899.99, 'Processing', 'lakmini.weerasinghe@example.lk', '852 Temple Road, Ratnapura', './example.lk/receipt009', 9),
(10, 'Anura Pathirana', 2300.75, 'Shipped', 'anura.pathirana@example.lk', '369 Railway Avenue, Batticaloa', './example.lk/receipt010', 10),
(25, 'Moditha Neranjan', 2298.00, 'Processing', 'hello@gmail.com', '167, Negombo', 'Screenshot 2024-10-06 135905.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL,
  `Product_name` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Product_description` varchar(255) NOT NULL,
  `Stock_quantity` int(11) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_name`, `Price`, `Product_description`, `Stock_quantity`, `img_url`) VALUES
(1, 'Cotton T-Shirt', 799.00, 'A comfortable cotton T-shirt made in Sri Lanka.', 100, 't-shirt-1.jpg'),
(2, 'Jersey', 1149.00, 'Stylish red & white jersey.', 150, 'jersey-1.jpg'),
(3, 'T-Shirt', 1379.00, 'A comfortable stylish T-shirt made in Sri Lanka', 95, 't-shirt-3.jpg'),
(4, 'Trouser', 4999.00, 'A stylish Trouser made in Sri Lanka', 120, 'trouser-1.jpg'),
(5, 'T-Shirt', 2499.00, 'Genuine linen shirt made in SL.', 150, 't-shirt-5.jpg'),
(6, 'Trouser', 2999.00, 'A charm Trouser made in Sri Lanka', 280, 'trouser-2.jpg'),
(7, 'T-Shirt', 1999.00, 'Stylish printed t-shirt.', 60, 't-shirt-7.jpg'),
(8, 'Jersey', 2999.00, 'Printed jersey for anyone.', 40, 'jersey-2.jpg'),
(9, 'T-Shirt', 699.00, 'Comfortable casual t-shirt for warm weather.', 120, 't-shirt-9.jpg'),
(10, 'T-Shirt', 1299.00, 'Stylish black color printed jersey.', 98, 't-shirt-10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone_number_1` varchar(15) DEFAULT NULL,
  `Phone_number_2` varchar(15) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `user_type` enum('admin','manager','user','employee') NOT NULL,
  `acc_status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`username`, `password`, `first_name`, `last_name`, `Email`, `Phone_number_1`, `Phone_number_2`, `Address`, `user_type`, `acc_status`) VALUES
('admin1', 'admin321', 'Nimal', 'Jayasooriya', 'nimalj@google.com', '0712345678', '0787654321', '123 Admin Street', 'admin', 'active'),
('admin_user', 'admin123', 'Admin', 'User', 'admin@example.com', '0755678910', NULL, 'No.78, Galle', 'admin', 'active'),
('kasun_perera', 'kasun123', 'Kasun', 'Perera', 'kasun.perera@example.lk', '0771234567', '0112233445', 'No. 123, Galle Road, Colombo', 'employee', 'active'),
('manager1', 'manager456', 'Praveen', 'Perera', 'pperera@yahoo.com', '1234567891', NULL, NULL, 'manager', 'active'),
('manager2', 'securePwd1', 'Jane', 'Smith', 'jane.smith@yahoo.com', '0769876543', '0113344556', 'No.45, Kandy', 'manager', 'active'),
('modiya', 'modi67', 'Moditha', 'Neranjan', 'moditha@gmail.com', '0772341515', NULL, NULL, 'user', 'active'),
('user2', 'password789', 'Mary', 'Jones', 'mary.jones@outlook.com', '0775432109', '0114455667', 'No.23, Matara', 'user', 'active'),
('user3', 'pass1234', 'John', 'Doe', 'john.doe@gmail.com', '0771234567', '0112233445', 'No.12, Colombo', 'user', 'active'),
('user4', 'hello123', 'Peter', 'Parker', 'peter.parker@spiderman.com', '0787654321', '0115566778', 'No.32, Negombo', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`Contact_ID`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`salary_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Inventory_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `fk_product_id` (`Product_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `Contact_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `salary_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Inventory_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
