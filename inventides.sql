-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2025 at 04:02 PM
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
-- Database: `inventides`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `quantity`, `added_at`) VALUES
(8, 2, 5, 4, '2025-10-14 21:54:26'),
(9, 2, 6, 4, '2025-10-15 07:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `old_price` varchar(200) NOT NULL,
  `new_price` varchar(200) NOT NULL,
  `image_front` varchar(200) NOT NULL,
  `image_back` varchar(200) NOT NULL,
  `product_description` varchar(1500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `shop_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`shop_images`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `category`, `tags`, `old_price`, `new_price`, `image_front`, `image_back`, `product_description`, `description`, `shop_images`) VALUES
(2, 'Battery and Charger Kit', 'Electronics,Accessories,Batteries', 'Top Rated,Trending', '74.59', '49.5', '1760470027_front_1760460696_sub_0_product-image2.png', '1760470027_back_1760460696_sub_1_product-image4.png', 'Rapidiusly transform corporate expertise whereas\r\n                                enterprise-wide\r\n                                web\r\n                                services.\r\n                                Progressively whiteboard multifunctional\r\n                                networks for pandemic total linkage a Synergistically recaptiualize client and based\r\n                                methods of empowerment with\r\n                                sustainable bandwidth\r\nProgressively whiteboard multifunctional\r\n                                networks for pandemic total linkage a Synergistically recaptiualize client and based\r\n                                methods of empowerment with\r\n                                sustainable bandwidth.', 'Proactively disseminate impactful mindshare without technically sound web services. Distiively harness compelling innovation before high payoff testing procedures. Uniquely fashion customized web services with cross functional internal or \"organic\" sources. Uniquely restore error-free e-commerce via multidisciplinary antailers. Completely whiteboard user friendly quality vectors rather than synergistic technologi Professionally evisculate enterprise wide metrics without resource maximizing interfaces. Synergistically benchmark enterprise-wide e-tailers through optimal paradigms. Phosfluorescently foster cutting-edge was and benefits without magnetic\r\n\r\nCompletely build emerging ideas through covalent applications. Distinctively synthesize user friendly collaboration and idsharing with superior content. Energistically incentivize user friendly models rather than timely convergence. Objectively disintermediate high standards in paradigms before state the art process improvements. Interactively orchestrate plug-and-play human capital whereas customer directed initiatives.\r\n\r\nIntrinsicly provide access to team driven information without adaptive content. Collaboratively embrace reliable supply chains via extensible benefits. Enthusiastically visualize accurate human capital before backend meta-services. Continually reinvent interdependent schemas through mission-critical benefits. Competently leverage existing parallel action items through end-to-end \"outside the box\" thinking.', '[\"1760470027_sub_0_1760460696_sub_0_product-image2.png\",\"1760470027_sub_1_1760469462_sub_3_1760460696_sub_1_product-image4.png\",\"1760470027_sub_2_get-image.png\",\"1760470027_sub_3_1760469462_sub_1_1760460696_sub_2_get-image2.png\"]'),
(3, 'Menthol E-Cigarrete ', 'Electronics,Accessories', 'New Arrival,Top Rated', '33', '11', '1760470175_front_03.jpg', '1760470175_back_04.jpg', 'Whether you’re transitioning from traditional smoking or simply looking to elevate your vaping experience, this Nic Salt Juice promises both satisfaction and style. Its superior smoothness, full-bodied flavor, and efficient nicotine delivery make it a standout choice among discerning vapers. Designed for compatibility with low-wattage pod systems and refillable devices, it’s the perfect blend of power, purity, and pleasure — ensuring every puff feels just as refreshing as the first.', 'Whether you’re transitioning from traditional smoking or simply looking to elevate your vaping experience, this Nic Salt Juice promises both satisfaction and style. Its superior smoothness, full-bodied flavor, and efficient nicotine delivery make it a standout choice among discerning vapers. Designed for compatibility with low-wattage pod systems and refillable devices, it’s the perfect blend of power, purity, and pleasure — ensuring every puff feels just as refreshing as the first.', '[\"1760470175_sub_0_04.jpg\",\"1760470175_sub_1_03.jpg\",\"1760470175_sub_2_get-image.png\",\"1760470175_sub_3_1760460696_sub_2_get-image2.png\"]'),
(4, '100 Nic Salt Juice', 'Vape Kits,Juice', 'Featured,Top Rated,Restocked', '98.1', '44.3', '1760469462_front_get-image2.png', '1760469462_back_04.jpg', '100ml Nic Salt Juice delivers a smooth, flavorful, and satisfying vaping experience crafted for those who crave intensity and refinement in every puff. Packed with premium nicotine salts, this large 100ml bottle provides an extended supply of rich, bold flavor — ideal for sub-ohm or pod systems.\r\n\r\nEnjoy a perfectly balanced throat hit and fast nicotine absorption that keeps cravings at bay while offering a silky, cloud-rich experience. Whether you prefer fruity, menthol, or dessert blends, this Nic Salt Juice ensures purity, consistency, and exceptional taste every time.', 'The 100ml Nic Salt Juice comes in a variety of carefully curated flavors — from refreshing fruity blends and cooling menthols to deep, rich dessert profiles — catering to a wide range of preferences. Each flavor is made using USP-grade ingredients, ensuring purity, consistency, and exceptional quality from the first drop to the last. The leak-proof, child-resistant bottle design also adds a layer of safety and convenience, making it easy to carry and refill without mess or waste.\r\n\r\nWhether you’re transitioning from traditional smoking or simply looking to elevate your vaping experience, this Nic Salt Juice promises both satisfaction and style. Its superior smoothness, full-bodied flavor, and efficient nicotine delivery make it a standout choice among discerning vapers. Designed for compatibility with low-wattage pod systems and refillable devices, it’s the perfect blend of power, purity, and pleasure — ensuring every puff feels just as refreshing as the first.', '[\"1760469462_sub_0_04.jpg\",\"1760469462_sub_1_1760460696_sub_2_get-image2.png\",\"1760469462_sub_2_03.jpg\",\"1760469462_sub_3_1760460696_sub_1_product-image4.png\"]'),
(5, 'Pop Extra Strawberry', 'Electronics,Accessories,Juice', 'New Arrival,Featured,Top Rated,Discount', '89.7', '36.6', '1760460696_front_product-image4.png', '1760460696_back_product-image2.png', 'POP Extra Strawberry Disposable Vape delivers a sweet and refreshing burst of ripe strawberries in every puff. Designed for convenience and rich flavor, this sleek disposable device comes pre-filled and pre-charged, ready to use straight out of the box. With a smooth draw and consistent vapor production, it’s ideal for both beginners and experienced vapers who want a no-fuss experience without compromising taste.\r\n\r\nEnjoy a clean, juicy strawberry flavor that stays consistent from start to finish — satisfying your cravings with each inhale. Compact, portable, and stylish, the POP Extra Strawberry fits perfectly in your hand or pocket for vaping on the go.', 'Brand: POP Extra\r\n\r\nFlavor: Strawberry\r\n\r\nNicotine Strength: 5% (50mg Nic Salt)\r\n\r\nPuff Count: Approximately 1000–1200 puffs per device\r\n\r\nBattery Capacity: 650mAh (non-rechargeable)\r\n\r\nE-liquid Capacity: 3.5mL pre-filled\r\n\r\nDraw Activation: No buttons – simply inhale to activate\r\n\r\nDesign: Slim, lightweight, and leak-resistant body\r\n\r\nUsage: Disposable — no refilling or charging required\r\n\r\nIdeal For: Users seeking a fruity, smooth, and consistent vape experience', '[\"1760460696_sub_0_product-image2.png\",\"1760460696_sub_1_product-image4.png\",\"1760460696_sub_2_get-image2.png\",\"1760460696_sub_3_get-image.png\"]'),
(6, 'Disposable Sub-Ohm Tank', 'Accessories,Vape Kits,Pods', 'New Arrival,Featured,Top Rated', '90.9', '33.3', '1760515054_front_get-image2.png', '1760391737_back_02.jpg', 'The Disposable Sub-Ohm Tank is a high-performance vaping solution designed for convenience and flavor. Built for vapers who want the power of sub-ohm clouds without the maintenance, this disposable tank combines advanced coil technology, durable construction, and effortless usability. Each tank comes pre-filled and ready to use—simply attach it to your compatible mod, enjoy the smooth vapor production, and replace it when finished. Perfect for both experienced cloud chasers and beginners seeking simplicity, it delivers a consistently rich flavor and dense vapor output.', 'Crafted with food-grade stainless steel and premium-grade PCTG materials, the Disposable Sub-Ohm Tank features a built-in mesh coil that enhances flavor clarity and vapor density. Its top-fill design prevents leaks while making refills quick and mess-free. The adjustable airflow control allows you to fine-tune your draw—from tight, flavorful hits to wide-open cloud production.\r\nWith no need for coil changes or cleaning, this tank is an ideal low-maintenance option for on-the-go vaping. Once performance declines, simply dispose of the tank responsibly and replace it with a new one.\r\n\r\nKey Features:\r\n\r\nBuilt-in mesh coil for enhanced flavor and vapor\r\n\r\nLeak-resistant top-fill system\r\n\r\nAdjustable airflow control', '[\"1760392606_sub_0_product-image7.png\",\"1760391737_sub_1_02.jpg\",\"1760391737_sub_2_product-image3.png\",\"1760391737_sub_3_01.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(3, 'Ata Ahenkora', 'student2@gmail.com', 'Globally leverage existing sticky testing procedures whereas timely alignments. Appropriately leverage existing cross unit human a capital Globally distributed process improvements and empowered internal or sources.', '2025-10-15 14:51:18'),
(4, 'Emmanuel O. Coffie', 'student1@gmail.com', 'Globally leverage existing sticky testing procedures whereas timely alignments. Appropriately leverage existing cross unit human a capital Globally distributed process improvements and empowered internal or sources.', '2025-10-15 14:51:56'),
(5, 'Oppong Coffie', 'student2@gmail.com', 'Globally leverage existing sticky testing procedures whereas timely alignments. Appropriately leverage existing cross unit human a capital Globally distributed process improvements and empowered internal or sources.', '2025-10-16 14:58:15'),
(6, 'Emmanuel oppong Coffie', 'oppongcoffie27@gmail.com', 'Globally leverage existing sticky testing procedures whereas timely alignments. Appropriately leverage existing cross unit human a capital Globally distributed process improvements and empowered internal or sources.', '2025-10-16 14:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `subscribed_at`) VALUES
(1, 'oppongcoffie27@gmail.com', '2025-10-13 02:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'student2', 'student2@gmail.com', 'student2'),
(3, 'Emmanuel oppong Coffie', 'student1@gmail.com', 'student1'),
(4, 'Oppong Coffie', 'student3@gmail.com', 'student3'),
(5, 'Ata Ahenkora', 'student4@gmail.com', 'student4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
