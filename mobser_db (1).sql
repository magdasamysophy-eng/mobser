-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 أكتوبر 2026 الساعة 18:47
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobser_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `cert_title` varchar(255) NOT NULL,
  `cert_text` text NOT NULL,
  `image_url` varchar(508) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `certificates`
--

INSERT INTO `certificates` (`id`, `cert_title`, `cert_text`, `image_url`) VALUES
(1, 'شهادة تقدير معهد أكسفورد', 'إلى الأستاذة/ بسمه سعيد زيدان، بكل مشاعر الشكر والامتنان نتقدم لكم بخالص التقدير والعرفان لما قدمتموه لنا من علم وتوجيه.', 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?w=800'),
(2, 'شهادة تقدير الأم الحبيبة', 'أمي الحبيبة، يشرطنا أن نمنح هذه الشهادة بكل حب واعتزاز إلى الأم الرائعة والفاضلة، تقديراً لعطائكِ الذي لا ينضب.', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800'),
(3, 'شهادة تقدير الأب الحبيب', 'أبي الحبيب، يُشرفنا أن نمنح هذه الشهادة بكل حب واعتزاز إلى الأب الرائع والمثالي، تقديراً لطاقتك وتضحياتك.', 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800'),
(4, 'شهادة تقدير معهد أكسفورد', 'إلى الأستاذة/ بسمه سعيد زيدان، بكل مشاعر الشكر والامتنان نتقدم لكم بخالص التقدير والعرفان لما قدمتموه لنا من علم وتوجيه.', 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?w=800'),
(5, 'شهادة تقدير الأم الحبيبة', 'أمي الحبيبة، يشرطنا أن نمنح هذه الشهادة بكل حب واعتزاز إلى الأم الرائعة والفاضلة، تقديراً لعطائكِ الذي لا ينضب.', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800'),
(6, 'شهادة تقدير الأب الحبيب', 'أبي الحبيب، يُشرفنا أن نمنح هذه الشهادة بكل حب واعتزاز إلى الأب الرائع والمثالي، تقديراً لطاقتك وتضحياتك.', 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800');

-- --------------------------------------------------------

--
-- بنية الجدول `excel_sheets`
--

CREATE TABLE `excel_sheets` (
  `id` int(11) NOT NULL,
  `row_number` int(11) NOT NULL,
  `col_name` varchar(255) NOT NULL,
  `cell_value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `presentations`
--

CREATE TABLE `presentations` (
  `id` int(11) NOT NULL,
  `slide_number` int(11) NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `enable_spiritual` varchar(10) DEFAULT 'no',
  `full_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `enable_spiritual`, `full_name`, `age`, `phone`) VALUES
(1, 'ماجده سامي صبحي عبد الحميد محمد حنيش', '$2y$10$f/KUoSDeJj/.Ce74j3bU8eamFa1OWymh.yiO47npl01Lbw./OKI0K', 'مدير', 'نعم', 'ماجده سامي صبحي عبد الحميد', 19, '04130884774'),
(2, 'ماجده سامي صبحي', '$2y$10$KpilfcXTcXhmq/f8D0V4D.CFfIzLu9s3O3eXqo3Z97CbX.43.0pui', 'مدير', 'نعم', 'ماجده سامي صبحي عبد الحميد', 81, '010000000000000'),
(3, 'ماجده سامي صبحي عبد الحميد', '$2y$10$0UPYV9gjgPMa1Uv0HGj/P.uyiMywzhBaJuN/iZnoloQudYP6ztKuq', 'مدير', 'نعم', 'ماجده سامي صبحي', 19, '04130887447'),
(4, 'ماجده سامي صبحي', '$2y$10$oEyEJojzCNqZorlASgz8DurIKTTOmvaBizTvMsu0o4Y19dtdLsEte', 'مدير', 'نعم', 'ماجده سامي صبحي', 19, '01089012345'),
(5, 'ماجده سامي صبحي عبد الحميد', '$2y$10$rQ9fz03OdtDWP.TTVej4BuHT5X7Dzpik9XKI1GXaE2ev8AjGLNgAC', 'مدير', 'نعم', 'ماجده سامي صبحي', 31, '010000000000000'),
(6, 'ماجده سامي صبحي عبد الحميد', '$2y$10$9uCPjkVjUngMqXtGn/IRGegeUVywbPyqIznF903dtdC1PikCGyk9.', 'مدير', 'نعم', 'ماجده سامي صبحي', 31, '010000000000000'),
(7, 'ماجده سامي صبحي عبد الحميد', '$2y$10$9W.KoUxPVzOr016b0.VEiuEv49yBC6MIRXFOnMp.RP2BpKSgBYH5G', 'موظف', 'نعم', 'ماجده سامي صبحي', 18, '0 10 31 0 0 0 0'),
(8, 'ماجده سامي صبحي عبد الحميد', '$2y$10$WnTpyGRRt/MK1M.IiYqPzui.cqFGKaatw35ZBnX6M9WAR1Z/EEoNS', 'مدير', 'نعم', 'ماجده سامي صبحي عبد الحميد', 66, '04130884774'),
(9, 'ماجده سامي صبحي عبد الحميد', '$2y$10$agf4clbO/Ep47h3HKOMnB.NQUtxoLvvt58yvnt3iT0buj.FP7dL2W', 'موظف', 'نعم', 'ماجدة سامي', 11, '010000000000000'),
(10, 'ماجده سامي صبحي عبد الحميد', '$2y$10$yD0st893ipeqfS//uezHOe1vvaDAbPP7sLknuXyFKWFj1EMMXHgci', 'موظف', 'نعم', 'ماجدة سامي', 33, '010000000000000'),
(11, 'ماجده سامي', '$2y$10$GIAKa5z.m.StROwUcGyIHuXmo7K92jXaQt9ltkTBZDp5flfRwVetK', 'مدير', 'نعم', 'ماجده سامي صبحي', 99, '04130884754'),
(12, 'خانه رقم الهاتف', '$2y$10$P3.81d0SOh.fxQGOCNfUVeFaBxHzbBcFtndDznfMByrwJz5kzQVpO', 'مدير', 'نعم', 'ماجده سامي صبحي', 19, '01001500900'),
(13, 'ماجده', '$2y$10$yI5uaX8wHw2xFrsYcU0AmuKc6aJTIR.T8U9Ubhxvu7XbcRQcVK/36', 'manager', '1', 'ماجده سامي صبحي عبد الحميد', 19, '01234567890');

-- --------------------------------------------------------

--
-- بنية الجدول `word_documents`
--

CREATE TABLE `word_documents` (
  `id` int(11) NOT NULL,
  `doc_title` varchar(255) DEFAULT 'مستند جديد',
  `content` longtext NOT NULL,
  `is_bold` tinyint(4) DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excel_sheets`
--
ALTER TABLE `excel_sheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `word_documents`
--
ALTER TABLE `word_documents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `excel_sheets`
--
ALTER TABLE `excel_sheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `word_documents`
--
ALTER TABLE `word_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
