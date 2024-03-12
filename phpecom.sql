-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 12:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'Mobile Phones', 'mobiles', 'A mobile phone is a wireless handheld device that allows users to make and receive calls and do many other things. ', 0, 1, '1687086064.png', 'Mobile Phones', 'A mobile phone is a wireless handheld device that allows users to make and receive calls and do many other things. ', 'mobiles', '2023-06-18 11:01:04'),
(2, 'Electronics', 'electronics', 'Electronic Goods means electronic devices or their mechanisms, memory and all ancillary or related data storage devices, including but not limited to computers, televisions, tablets, cellular phones, smartwatches etc', 0, 1, '1687165347.jpg', 'Electronics', 'Electronic Goods means electronic devices or their mechanisms, memory and all ancillary or related data storage devices, including but not limited to computers, televisions, tablets, cellular phones, smartwatches etc', 'electronics\r\n', '2023-06-19 09:02:27'),
(3, 'Laptops', 'laptop', 'A laptop, sometimes called a notebook computer by manufacturers, is a battery- or AC-powered personal computer (PC) smaller than a briefcase. A laptop can be easily transported and used in temporary spaces such as on airplanes, in libraries, temporary offices and at meetings', 0, 1, '1687165722.png', 'Laptop', 'A laptop, sometimes called a notebook computer by manufacturers, is a battery- or AC-powered personal computer (PC) smaller than a briefcase. A laptop can be easily transported and used in temporary spaces such as on airplanes, in libraries, temporary offices and at meetings', 'laptop', '2023-06-19 09:08:42'),
(4, 'Fashion', 'fashion', 'Fashion is best defined simply as the style or styles of clothing and accessories worn at any given time by groups of people.', 0, 1, '1687166001.jpg', 'Fashion', 'Fashion is best defined simply as the style or styles of clothing and accessories worn at any given time by groups of people.', 'fashion', '2023-06-19 09:13:21'),
(5, 'Footwears', 'footwear', 'Footwear refers to garments worn on the feet, which typically serves the purpose of protection against adversities of the environment such as wear from ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpose to ease locomotion and prevent injuries', 0, 1, '1687166135.webp', 'Footwear', 'Footwear refers to garments worn on the feet, which typically serves the purpose of protection against adversities of the environment such as wear from ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpose to ease locomotion and prevent injuries', 'Footwear', '2023-06-19 09:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(1, 'muneebabbasi6784337660939', 1, 'muneeb', 'abbasimuneeb7869@gmail.com', '03337660939', 'Bahawalpur', 6300, 170000, 'COD', '', 1, NULL, '2023-07-03 04:06:14'),
(2, 'muneebabbasi36123556', 1, 'ABC', 'abc@gmail.com', '123556', 'lahore', 1231, 4999, 'COD', '', 1, NULL, '2023-07-03 04:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(1, 1, 9, 1, 170000, '2023-07-03 04:06:14'),
(2, 2, 12, 1, 2999, '2023-07-03 04:21:26'),
(3, 2, 7, 1, 2000, '2023-07-03 04:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(1, 1, 'Iphone 14', 'Apple', 'Apple iPhone 14, launched on September 16, 2022, is a top-tier and expensive mobile phone by Apple. The phone is powered by Apple A15 Bionic processor and Apple GPU (5-core graphics) GPU. Moreover, it comes with 6 GB RAM and 128 / 256 / 512 GB storage memory.', 'The iPhone 14 is a significant upgrade from its predecessor, the iPhone 13, in terms of its camera capabilities and safety features. It boasts a 6.1-inch OLED display with great HDR support and an improved rear camera that takes better low-light snaps. The phone also features clever safety features such as Emergency SOS via satellite and Car Crash Detection', 420000, 390000, '1687166386.jpg', 20, 0, 1, 'Iphone', 'apple', 'The iPhone 14 is a significant upgrade from its predecessor, the iPhone 13, in terms of its camera capabilities and safety features. It boasts a 6.1-inch OLED display with great HDR support and an improved rear camera that takes better low-light snaps. The phone also features clever safety features such as Emergency SOS via satellite and Car Crash Detection', '2023-06-19 09:19:46'),
(2, 2, 'Samsung T350', 'lcd', 'All-expansive view - The 3-sided borderless display brings a clean and modern aesthetic to any working environment.See It from Any Angle - The IPS panel preserves color vividness and clarity across every inch of the screen', 'Synchronized action - AMD Radeon FreeSync keeps your monitor and graphics card refresh rate in sync to reduce image tearing.Seamless, smooth visuals - Now, the picture looks flawless. The 75Hz refresh rate delivers more fluid scenes.More gaming power - Get optimal color and image contrast to see scenes more vividly and spot enemies hiding in the dark.Superior eye care - Flicker Free technology continuously removes tiring and irritating screen flicker, while Eye Saver Mode minimizes emitted blue light. Your eyes stay fresh longer.True versatility - With both HDMI and D-sub ports, multiple devices can be plugged straight into your monitor for complete flexibility.', 70000, 65000, '1687166912.jpg', 12, 0, 1, 'samsung t350', 'lcd', 'Synchronized action - AMD Radeon FreeSync keeps your monitor and graphics card refresh rate in sync to reduce image tearing.Seamless, smooth visuals - Now, the picture looks flawless. The 75Hz refresh rate delivers more fluid scenes.More gaming power - Get optimal color and image contrast to see scenes more vividly and spot enemies hiding in the dark.Superior eye care - Flicker Free technology continuously removes tiring and irritating screen flicker, while Eye Saver Mode minimizes emitted blue light. Your eyes stay fresh longer.True versatility - With both HDMI and D-sub ports, multiple devices can be plugged straight into your monitor for complete flexibility.', '2023-06-19 09:28:32'),
(3, 3, 'HP 14 DQ5043CL', 'HP', 'The latest HP 14 DQ5043CL Core i3 12th Generation 8GB RAM 512GB SSD Windows 11 price in Pakistan is 124,999 - PKR which was recently updated on June 2023. Basic specification is Core i3 12th Generation i3-1215U, RAM: 8GB, Screen: 14 INCHES, OS: Windows 11, Storage: 512GB, SSD, Speed: up to 4.4 GHz,', 'Get a fresh perspective - Windows 11 provides a calm and creative space where you can pursue your passions through a fresh experience. From a rejuvenated Start menu, to new ways to connect to your favorite people, news, games, and content—Windows 11 is the place to think, express, and create in a natural way.Full HD display - Sit back and enjoy crystal-clear visuals and images with the vibrant quality of 2 million pixels. The 1920 x 1080 resolution gives all your digital content a new dimension.Anti-glare panel - Enjoy the sun and your favorite content with this anti-glare panel. ', 125999, 123999, '1687167268.jpg', 15, 0, 1, 'HP 14 DQ5043CL', 'HP', 'Get a fresh perspective - Windows 11 provides a calm and creative space where you can pursue your passions through a fresh experience. From a rejuvenated Start menu, to new ways to connect to your favorite people, news, games, and content—Windows 11 is the place to think, express, and create in a natural way.Full HD display - Sit back and enjoy crystal-clear visuals and images with the vibrant quality of 2 million pixels. The 1920 x 1080 resolution gives all your digital content a new dimension.Anti-glare panel - Enjoy the sun and your favorite content with this anti-glare panel. ', '2023-06-19 09:34:28'),
(4, 3, 'Dell Vostro 3510', 'dell', 'The latest Dell Vostro 3510 Core i3 11th Generation 4GB RAM 256GB SSD DOS price in Pakistan is 104,999 - PKR which was recently updated on June 2023.Basic specification is Core i3 11th Generation i3-1115G4, RAM: 4GB, Screen: 15.6 Inch, OS: DOS, Storage: 256GB , SSD', 'Dell Vostro 3510 laptop - 11th Intel core i3-1115G4, 8 GB RAM, 1 TB HDD + 256 GB SSD, Intel UHD Graphics, 15.6\" HD TN 220 nits Anti-glare , Ubuntu - Carbon Black\r\nGood Quality\r\nPerfect Material\r\nEasy to use\r\nUnique and fashionable design.', 104999, 101999, '1687167476.jpg', 10, 0, 1, 'Dell Vostro 3510 ', 'dell', 'Dell Vostro 3510 laptop - 11th Intel core i3-1115G4, 8 GB RAM, 1 TB HDD + 256 GB SSD, Intel UHD Graphics, 15.6\" HD TN 220 nits Anti-glare , Ubuntu - Carbon Black\r\nGood Quality\r\nPerfect Material\r\nEasy to use\r\nUnique and fashionable design.', '2023-06-19 09:37:56'),
(5, 0, 'ACER A515 57 53FA', 'acer', 'The latest ACER A515 57 53FA Core i5 12th Generation 8GB RAM 256GB SSD Windows 11 price in Pakistan is 145,999 - PKR which was recently updated on June 2023.Basic specification is Core i5 12th Generation 1235U , RAM: 8GB , Screen: 15.6 Inch, OS: Windows 11, Storage: 256GB, SSD, Speed: 1.30 GHz,.', 'Basic specification is Core i5 12th Generation 1235U , RAM: 8GB , Screen: 15.6 Inch, OS: Windows 11, Storage: 256GB, SSD, Speed: 1.30 GHz.The highly versatile Acer Aspire 5 laptop is powered by the latest 12th Gen Intel Core i5 processors for multitasking and NVIDIA graphics for accelerated photo and video editing performance.\r\n12th Generation Intel Core i5-1235U\r\n8GB DDR4, 256GB PCI Express SSD (1 extra SSD slot)\r\n15.6\" FHD IPS, Backlit Keyboard, Intel Iris Xe Graphics, Aluminum Top Cover\r\nWindows 11, Steel Grey, 1 Year Local Warranty', 145999, 142999, '1687167885.webp', 12, 0, 1, 'ACER A515 57 53FA', 'acer', 'Basic specification is Core i5 12th Generation 1235U , RAM: 8GB , Screen: 15.6 Inch, OS: Windows 11, Storage: 256GB, SSD, Speed: 1.30 GHz.The highly versatile Acer Aspire 5 laptop is powered by the latest 12th Gen Intel Core i5 processors for multitasking and NVIDIA graphics for accelerated photo and video editing performance.\r\n12th Generation Intel Core i5-1235U\r\n8GB DDR4, 256GB PCI Express SSD (1 extra SSD slot)\r\n15.6\" FHD IPS, Backlit Keyboard, Intel Iris Xe Graphics, Aluminum Top Cover\r\nWindows 11, Steel Grey, 1 Year Local Warranty', '2023-06-19 09:44:45'),
(6, 4, 'OMEN GRAPHIC T-SHIRT', 'tshirts', 'FIT REGULAR\r\n\r\nTHE NAME SAYS IT ALL THE RIGHT SIZE SLIGHTLY SNUGS THE BODY LEAVING ENOUGH ROOM FOR COMFORT IN THE SLEEVES AND WAIST. DOES NOT TAPER DOWN AND OFFERS A RELAXED SILHOUETTE FOR YOUR EVERYDAY LOOKS', '100%COTTON\r\nMACHINE WASH UP TO 30C/86F, GENTLE CYCLE\r\nDO NOT BLEACH\r\nIRON UP TO 110C/230F\r\nDO NOT IRON DIRECTLY ON PRINTS/EMBROIDERY/EMBELLISHMENTS\r\nDO NOT DRY CLEAN\r\nDO NOT TUMBLE DRY', 2000, 1890, '1687168137.webp', 20, 0, 1, 'OMEN GRAPHIC T-SHIRT', 'tshirts', '100%COTTON\r\nMACHINE WASH UP TO 30C/86F, GENTLE CYCLE\r\nDO NOT BLEACH\r\nIRON UP TO 110C/230F\r\nDO NOT IRON DIRECTLY ON PRINTS/EMBROIDERY/EMBELLISHMENTS\r\nDO NOT DRY CLEAN\r\nDO NOT TUMBLE DRY', '2023-06-19 09:48:57'),
(7, 4, 'Black White Printed Casual Shirt', 'casual shirt', 'Created with premium quality material, Casual Shirts from Ideas Man are perfect for every occasion.\r\n', 'Cotton\r\nRegular Fit\r\nModel Specs: The model is 6’1 and is wearing size Medium', 2999, 2000, '1687168368.webp', 14, 0, 1, 'Black White Printed Casual Shirt', 'casual shirt', 'Cotton\r\nRegular Fit\r\nModel Specs: The model is 6’1 and is wearing size Medium', '2023-06-19 09:52:48'),
(8, 4, 'CARROT FIT JEANS', 'jeans', 'SIZE\r\n30 32 34 36 38\r\nGENDER\r\nMEN', 'COMPOSITION & CARE:\r\n98%COTTON 2%ELASTANE\r\nMACHINE WASH UP TO 30C/86F, GENTLE CYCLE\r\nDO NOT BLEACH\r\nIRON UP TO 110C/230F\r\nDO NOT IRON DIRECTLY ON PRINTS/EMBROIDERY/EMBELLISHMENTS\r\nDO NOT DRY CLEAN\r\nDO NOT TUMBLE DRY', 4400, 3500, '1687168547.webp', 14, 0, 1, 'CARROT FIT JEANS', 'jeans', 'COMPOSITION & CARE:\r\n98%COTTON 2%ELASTANE\r\nMACHINE WASH UP TO 30C/86F, GENTLE CYCLE\r\nDO NOT BLEACH\r\nIRON UP TO 110C/230F\r\nDO NOT IRON DIRECTLY ON PRINTS/EMBROIDERY/EMBELLISHMENTS\r\nDO NOT DRY CLEAN\r\nDO NOT TUMBLE DRY', '2023-06-19 09:55:47'),
(9, 1, 'Samsung S21', 'samsung', 'Description. The Samsung Galaxy S21 specs are top-notch including a Snapdragon 888 chipset, 5G capability, 8GB RAM coupled with 128/256GB storage, and a 4000mAh battery', 'The Samsung Galaxy S21 specs are top-notch including a Snapdragon 888 chipset, 5G capability, 8GB RAM coupled with 128/256GB storage, and a 4000mAh battery. The phone sports a 6.2-inch Dynamic AMOLED display with an adaptive 120Hz refresh rate. In the camera department, a triple-sensor setup is presented.\r\nHigh refresh rate (120Hz)\r\n5G ready\r\nHigh screen-to-body ratio (86.06 %)\r\nSupports wireless charging', 174999, 170000, '1687168817.webp', 11, 0, 1, 'Samsung S21', 'samsung', 'The Samsung Galaxy S21 specs are top-notch including a Snapdragon 888 chipset, 5G capability, 8GB RAM coupled with 128/256GB storage, and a 4000mAh battery. The phone sports a 6.2-inch Dynamic AMOLED display with an adaptive 120Hz refresh rate. In the camera department, a triple-sensor setup is presented.\r\nHigh refresh rate (120Hz)\r\n5G ready\r\nHigh screen-to-body ratio (86.06 %)\r\nSupports wireless charging', '2023-06-19 10:00:17'),
(10, 0, 'OnePlus 9', 'oneplus', 'Best-in-class performance.Great daylight photography.Fast 65W charging..Smooth 120Hz screen..High refresh rate (120Hz).5G ready.High screen-to-body ratio (87.27 %).Supports wireless charging', 'Best-in-class performance.Great daylight photography.Fast 65W charging..Smooth 120Hz screen..High refresh rate (120Hz).5G ready.High screen-to-body ratio (87.27 %).Supports wireless charging', 130499, 128999, '1687169349.png', 10, 0, 1, 'OnePlus 9', 'oneplus', 'Best-in-class performance.Great daylight photography.Fast 65W charging..Smooth 120Hz screen..High refresh rate (120Hz).5G ready.High screen-to-body ratio (87.27 %).Supports wireless charging', '2023-06-19 10:09:09'),
(11, 5, 'MENS CHUNKY SPORTS SHOES', 'shoes', 'These Mens Chunky Sports Shoes will provide you long-lasting comfort and support.They have been made with good quality Mesh material, which ensures durability and breathability.These shoes feature a lace-up design, a round toe shape, and a padded insole', 'These Mens Chunky Sports Shoes will provide you long-lasting comfort and support!.They have been made with good quality Mesh material, which ensures durability and breathability.These shoes feature a lace-up design, a round toe shape, and a padded insole', 5999, 4199, '1687169944.webp', 10, 0, 0, 'MENS CHUNKY SPORTS SHOES', 'shoes', 'These Mens Chunky Sports Shoes will provide you long-lasting comfort and support.They have been made with good quality Mesh material, which ensures durability and breathability.These shoes feature a lace-up design, a round toe shape, and a padded insole', '2023-06-19 10:19:04'),
(12, 5, 'MENS sports shoes', 'mensshoe', 'These Mens sports shoes will withstand the rigours of running and exercise.\r\nThey have been made with good quality Mesh material which ensures durability and breathability.\r\nThese shoes feature a lace-up design, a round toe shape, and a padded insole.\r\nThe EVA outsole provides comfort, grip and keeps the shoe light', 'These Mens sports shoes will withstand the rigours of running and exercise.\r\nThey have been made with good quality Mesh material which ensures durability and breathability.\r\nThese shoes feature a lace-up design, a round toe shape, and a padded insole.\r\nThe EVA outsole provides comfort, grip and keeps the shoe light', 3499, 2999, '1687170646.webp', 9, 0, 1, 'MENS sports shoes', 'mensshoes', 'These Mens sports shoes will withstand the rigours of running and exercise.\r\nThey have been made with good quality Mesh material which ensures durability and breathability.\r\nThese shoes feature a lace-up design, a round toe shape, and a padded insole.\r\nThe EVA outsole provides comfort, grip and keeps the shoe light', '2023-06-19 10:23:52'),
(13, 2, 'Green Double Door Refrigerator', 'Refrigerator', 'A refrigerator is an open system that dispels heat from a closed space to a warmer area, usually a kitchen or another room. By dispelling the heat from this area, it decreases in temperature, allowing food and other items to remain at a cool temperature.', 'A refrigerator is an open system that dispels heat from a closed space to a warmer area, usually a kitchen or another room. By dispelling the heat from this area, it decreases in temperature, allowing food and other items to remain at a cool temperature.', 110000, 96000, '1690539021.webp', 20, 0, 1, 'Green Double Door Refrigerator', 'Refrigerator', 'A refrigerator is an open system that dispels heat from a closed space to a warmer area, usually a kitchen or another room. By dispelling the heat from this area, it decreases in temperature, allowing food and other items to remain at a cool temperature.', '2023-07-28 10:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(1, 'muneeb', 'abbasimuneeb7869@gmail.com', 2147483647, 'ca3728cab138a9fc5b10cc9db249a3b1', 'user', '2023-06-20 13:01:56'),
(2, 'admin', 'admin@gmail.com', 331232, '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-06-20 13:02:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
