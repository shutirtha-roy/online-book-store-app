-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 05:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` float NOT NULL,
  `total_products` int(11) NOT NULL,
  `product_preview_link` varchar(3000) NOT NULL,
  `product_image_link` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `name`, `author`, `description`, `price`, `total_products`, `product_preview_link`, `product_image_link`) VALUES
(62, 4, 'Pride and Prejudice', 'Jane Austen', 'Debbie had taken George for granted for more than fifteen years now He wasnt sure what exactly had made him choose this time and place to address the issue but he decided that now was the time He looked straight into her eyes and just as she was about to speak turned away and walked out the door Betty decided to write a short story and she was sure it was going to be amazing She had already written it in her head and each time she thought about it she grinned from ear to ear knowing how wonderful it would be She could imagine the accolades coming in and the praise she would receive for creating such a wonderful piece She was therefore extremely frustrated when she actually sat down to write the short story and the story that was so beautiful inside her head refused to come out that way on paper He was after the truth At least thats what he told himself He believed it but any rational person on the outside could see he was lying to himself It was apparent he was really only after his own truth that hed already decided and was after this truth because the facts didnt line up with the truth he wanted So he continued to tell everyone he was after the truth oblivious to the real truth sitting right in front of him', 150, 56, 'Assets/BookPreviews/62.pdf', 'Assets/BookImages/62.jpg'),
(63, 4, 'Emma', 'Jane Austen', 'He slowly poured the drink over a large chunk of ice he has especially chiseled off a larger block He didnt particularly like his drinks cold but he knew that the drama of chiseling the ice and then pouring a drink over it looked far more impressive than how he actually liked it It was all about image and hed managed to perfect the image that he wanted to projectI dont like cats and they dont like me I used to be allergic to them and I would get stuffed up and have hives That doesnt seem to happen anymore But I still dont like them I lived with 3 cats that were not good at peeing in the litter box They seemed to find something important to me and pee on it Most of the time they peed on photographs or papers that would be ruined Cats also bring fleas into the house There is nothing worse than having to flea dip cats and also flea bomb a home That is why I dont like catsSo what do you think he asked nervously He wanted to know the answer but at the same time he didnt Hed put his heart and soul into the project and he wasnt sure hed be able to recover if they didnt like what he produced The silence from the others in the room seemed to last a lifetime even though it had only been a moment since he asked the question So what do you think he asked again', 185, 43, 'Assets/BookPreviews/63.pdf', 'Assets/BookImages/63.jpg'),
(64, 2, 'The Art of War', 'Sun Tzu', 'Sometimes its simply better to ignore the haters Thats the lesson that Toms dad had been trying to teach him but Tom still couldnt let it go He latched onto them and their hate and couldnt let it go but he also realized that this wasnt healthy Thats when he came up with his devious planHe sat across from her trying to imagine it was the first time It wasnt Had it been a hundred It quite possibly could have been Two hundred Probably not His mind wandered until he caught himself and again tried to imagine it was the first timeSometimes its the first moment of the day that catches you off guard Thats what Wendy was thinking She opened her window to see fire engines screeching down the street While this wasnt something completely unheard of it also wasnt normal It was a sure sign of what was going to happen that day She could feel it in her bones and it wasnt the way she wanted the day to begin', 215, 54, 'Assets/BookPreviews/64.pdf', 'Assets/BookImages/64.jpg'),
(65, 2, 'Adventures of Huckleberry Finn', 'Mark Twain', 'Ingredients for life said the backside of the truck They mean food but really food is only 1 ingredient of life Life has so many more ingredients such as pain happiness laughter joy tears and smiles Life also has hard work easy play sleepless nights and sunbathing by the ocean Love hatred envy self assurance and fear could be just down aisle 3 ready to be bought when needed How I wish I could pull ingredients like these off shelves in a storeThere wasnt a whole lot more that could be done It had become a wait and see situation with the final results no longer in her control That didnt stop her from trying to control the situation She demanded that things be done as she desperately tried to control what couldnt beHe heard the crack echo in the late afternoon about a mile away His heart started racing and he bolted into a full sprint It wasnt a gunshot it wasnt a gunshot he repeated under his breathlessness as he continued to sprint', 100, 23, 'Assets/BookPreviews/65.pdf', 'Assets/BookImages/65.jpg'),
(66, 3, 'Alice in Wonderland', 'Lewis Carroll', 'There were only two ways to get out of this mess if they all worked together The problem was that neither was all that appealing One would likely cause everyone a huge amount of physical pain while the other would likely end up with everyone in jail In Sams mind there was only one thing to do He threw everyone else under the bus and he secretly sprinted away leaving the others to take the fall without himIt was the best compliment that hed ever received although the person who gave it likely never knew It had been an off hand observation on his ability to hold a conversation and actually add pertinent information to it on practically any topic Although he hadnt consciously strived to be able to do so hed started to voraciously read the news when he couldnt keep up on topics his friends discussed because their conversations went above his head The fact that someone had noticed enough to compliment him that he could talk intelligently about many topics meant that he had succeeded in his quest to be better informedThe words hadnt flowed from his fingers for the past few weeks He never imagined hed find himself with writers block but here he sat with a blank screen in front of him That blank screen taunting him day after day had started to play with his mind He didnt understand why he couldnt even type a single word just one to begin the process and build from there And yet he already knew that the eight hours he was prepared to sit in front of his computer today would end with the screen remaining blank', 340, 32, 'Assets/BookPreviews/66.pdf', 'Assets/BookImages/66.jpg'),
(67, 3, 'Collected Works of Poe', 'Edgar Allan Poe', 'He slowly poured the drink over a large chunk of ice he has especially chiseled off a larger block He didnt particularly like his drinks cold but he knew that the drama of chiseling the ice and then pouring a drink over it looked far more impressive than how he actually liked it It was all about image and hed managed to perfect the image that he wanted to project The desert wind blew the tumbleweed in front of the car Alex swerved to avoid the tumbleweed but he turned the wheel a bit too strong and the car left the road and skidded onto the dirt median He instantly slammed on the brakes and the car stopped in a cloud of dirt When the dust cloud had settled and he could see around him again he realized that hed somehow crossed over into an entirely new dimensionIm going to hire professional help tomorrow I cant handle this anymore She fell over the coffee table and now there is blood in her catheter This is much more than I ever signed up to do', 268, 75, 'Assets/BookPreviews/67.pdf', 'Assets/BookImages/67.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_cart`
--

CREATE TABLE `book_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_purchase`
--

CREATE TABLE `book_purchase` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `date_purchased` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_purchase`
--

INSERT INTO `book_purchase` (`id`, `user_id`, `product_id`, `user_name`, `product_name`, `price`, `date_purchased`) VALUES
(24, 4, 63, 'Samin', 'Emma Limited Series', 185, '2:04:22'),
(25, 4, 64, 'Samin', 'The Art of War', 215, '13:04:22'),
(26, 3, 64, 'Mark', 'The Art of War', 215, '13:04:22'),
(27, 3, 63, 'Mark', 'Emma Limited Series', 185, '13:04:22'),
(28, 3, 67, 'Mark', 'Collected Works of Poe', 268, '13:04:22'),
(29, 4, 62, 'Samin', 'Pride and Prejudice', 150, '13:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Action & Adventure'),
(3, 'Fantasy'),
(4, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `location` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `password`, `role`, `location`) VALUES
(1, 'admin', 'admin@gmail.com', 'Admin', '18301028', 'admin', 'Dhaka, Bangladesh'),
(2, 'sam123', 'sam@gmail.com', 'Sam', 'sam@gmail.com', 'user', '2/5, Lalmatia D-Block, Dhaka, Bangladesh - 1294'),
(3, 'mark', 'mark@gmail.com', 'Mark', 'mark@gmail.com', 'user', '4B, Gulshan, Dhaka-1204'),
(4, 'samin', 'samin@gmail.com', 'Samin', 'samin@gmail.com', 'user', '34B, Sherektek Road, Sylhet, Bangladesh'),
(5, 'asif', 'asif@gmail.com', 'Asif', 'asif@gmail.com', 'user', '12, Nikunjo, Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `book_cart`
--
ALTER TABLE `book_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `book_purchase`
--
ALTER TABLE `book_purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `book_cart`
--
ALTER TABLE `book_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `book_purchase`
--
ALTER TABLE `book_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `book_cart`
--
ALTER TABLE `book_cart`
  ADD CONSTRAINT `book_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `book_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `book_purchase`
--
ALTER TABLE `book_purchase`
  ADD CONSTRAINT `book_purchase_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `book_purchase_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
