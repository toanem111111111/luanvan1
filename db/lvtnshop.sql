-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 09:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lvtnshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_06_151413_create_tbladmin_table', 1),
(6, '2023_03_26_143445_create_tbl_category', 2),
(7, '2023_03_26_163749_create_tbl_category', 3),
(8, '2023_03_26_164538_create_tbl_category', 4),
(9, '2023_03_26_165817_create_tbl_category', 5),
(10, '2023_03_26_171806_create_tbl_category', 6),
(11, '2023_03_27_154436_create_tbl_category', 7),
(12, '2023_03_27_153511_create_categories_table', 8),
(13, '2023_03_30_161510_create_tbl_category', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('toanem11@gmail.com', '$2y$10$kjzA4Ek/SjgdKVqGXQrVbuU6.7qct1uaRTAsmgEOGkRwpYJS7mL/i', '2023-05-17 12:46:53'),
('dh51801108@gmail.com', '$2y$10$YxHk9tIAFYZuCn7pAPi71u.0PYQNQjL8R1fSZ9U2mHIxmxsLe92Sy', '2023-05-19 09:28:54'),
('dh51801108@gmail.com', 'aYMEdO41iYw27iALUhHTVk1FcTO7o6yDnVHOdT3eOz97F4sE95YH6vt9bpLhz8NC', '2023-05-19 09:35:31'),
('dh51801108@gmail.com', 'xOqAdI3cCwW2FT3qCFhlt9PpRPxrzviDl27e367OZwYLTiLtDdBEAYy0zvUA4tHu', '2023-05-19 09:36:39'),
('dh51801108@gmail.com', 'ardUN2ktvIvbIIZ8NhTmbWo9RITf2EFIm3MI8p7qEgyCC7NqZPlqyJ1fmJRhCB8d', '2023-05-19 09:37:08'),
('dh51801108@gmail.com', 'sYVQLBoj0pnvfoOwRPdjbNJqznQzRzVtIYshSNsb1xAdtEMoJ2em08a7DRfeU0eC', '2023-05-19 09:37:52'),
('dh51801108@gmail.com', 'g0G1vDge4HovuHxiH5eB9CJZ8hjwm0wZiWOfnps9ryL5PyqXt6lFVMpl5kLAvqxq', '2023-05-19 09:39:04'),
('dh51801108@gmail.com', '26Lv94qFqbvakjCXnkfSS7ccMqEVUfYBz8VDNlErTzkSH3TpyQ9nUAAk3DawlmP3', '2023-05-19 10:25:53'),
('dh51801108@gmail.com', 'Tp05LgVRlJwFoVuoaHQBNDanGKChoYx1OTBqxKuJGNxAPLwW39HFTtsZtR8nw89Y', '2023-05-19 10:31:59'),
('dh51801108@gmail.com', 'hXwMGgKhaFyjZIkTaqrBNT2iKDtAbfhoO5bz7d3xzwWb9yOHgFXxFkGNNvC6LqQ8', '2023-05-19 10:35:28'),
('dh51801108@gmail.com', 'BYKPZenNbaC0Tbx6eZW4jBnv8mz2jZgEVHvIq5T3Ii0BkN2JONEsvcUaRlViwVD1', '2023-05-19 10:39:03'),
('toannguyen260300@gmail.com', 'EKo2NvXpMxVqmvmgbhS8Mryk2r8OZ7UmC6VEJROTIfniYa8HsVSVgnZLlFaa9GTp', '2023-05-19 10:46:41'),
('toannguyen260300@gmail.com', '0IQpxAMwLn6Y0HS7yQsuQKM9syKzTRHWieVkSx3B4pE6wkFag1Rlyvcg1dqFTp6h', '2023-05-19 10:47:28'),
('toannguyen260300@gmail.com', 'aSlczq2i25WaQzzAkEd4wnnXd9C3SoDd92d3GUSsULd4pBgl6LBzz1BWlXFHketj', '2023-05-19 11:00:15'),
('toannguyen260300@gmail.com', 'lWL8y6TtPauOnJTSH6RxQmYUb2FIwNwmEdybDuT6xRU6mZ0cVzvOK3sWLhSeBfob', '2023-05-19 11:01:19'),
('toannguyen260300@gmail.com', '2thk8UAlbQi8S6gMRvr6lqCp18YHEed6eyyK3sTdU010B0dEY6cN6wJPhgM7mSya', '2023-05-19 11:01:48'),
('dh51801108@gmail.com', 'uJ3k9jbWiXJtGSQ7Xy0UiR7DBHQ3tbJ4CHpykCGMwkVK7bTQt7m8br8tgIJvRNS9', '2023-05-19 11:02:53'),
('dh51801108@gmail.com', '0PSAkxZdWzNWv6ZJygowjB1ngwhK6EyCQTiA2tLVuHlHvLnXGz5n1nq6OKEdRxId', '2023-05-19 11:24:04'),
('dh51801108@gmail.com', '7WaeeOCFnvjY4hU9eLIR4f9Ivfdqe0TSXBdBfHjfO08nxkC7SteX9ehz9zP1YXvN', '2023-05-19 11:25:01'),
('dh51801108@gmail.com', 's3lkdJUJ2m7zJHbpjKQFwDz7QbhjT4uovyO0fA2cthhJoHcyrRGXLpn9yD6xPcyP', '2023-05-19 11:25:40'),
('dh51801108@gmail.com', 'j22gRJ8vMUQehkEf3Ykl96STsmRqdkpdmMNJMyoIuFbUt8z7u7OO7dLql9bCBGnf', '2023-05-19 11:25:46'),
('dh51801108@gmail.com', '3Lzkc4lNIKYMSalSNj3ZievaYIh17QWSZGYobxBVCClnpeK5qa4nupVVjoJtMl8x', '2023-05-19 11:26:31'),
('dh51801108@gmail.com', 'NC5vTdHwtVFEZpRs44SmT2EsImEG1n8bhUfV8bUBKpiRwv7jUiLUlPAi3kX3BWml', '2023-05-19 11:26:46'),
('dh51801108@gmail.com', 'LGWzgMugNsOR4AABzzcGkcbHbvM9aRUJ9vkcHq5RRfezRgAnee5vwzmebXMhI0ad', '2023-05-19 11:27:28'),
('dh51801108@gmail.com', 'CNgpc1Nyc70rqL1sqdkvNBalNcoxB3jpDsWlN6kIuG2tVmXWQW92xnyAzp3tNLfY', '2023-05-19 11:28:41'),
('dh51801108@gmail.com', 'Zbe56IvbnxfmSXYFWIcsPScuSl6ul71KdpNade9Tc7Cy6rIIZaeA7ce8mUKrm8uu', '2023-05-19 11:30:26'),
('dh51801108@gmail.com', 'ZORyRx7gtfM6Kyc8QzRhpqWjxd6v85KXLMPbO7dp6K4GLS30Dfy2QYEhv8FCG4UT', '2023-05-19 11:33:34'),
('dh51801108@gmail.com', 'vEWtC6AnUqy88Sn45l44SuwRMp8kefNug2Vxcpjv5UlDuqtwuQnzfbv3Yy39qiQy', '2023-05-19 11:34:45'),
('dh51801108@gmail.com', '67ibF6BqLurnjrFRritePyggiTKwgUq8KivesZuDlAjFslHJRx9oAXTBZLDvi0y2', '2023-05-19 11:38:30'),
('dh51801108@gmail.com', 'jNt0FHNGdt66q5ELuyRGrJ7h4UsbPJz9qIFMgaEjcO7RkzlkUJvbXQYwz4C9389i', '2023-05-19 11:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_brand` varchar(255) NOT NULL,
  `desc_brand` varchar(255) NOT NULL,
  `status_brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `name_brand`, `desc_brand`, `status_brand`) VALUES
(22, 'Yamaha', 'Yamaha Motor với niềm đam mê và khát khao sáng tạo, luôn đi tiên phong mang lại những sản phẩm tuyệt hảo và giá trị vượt trội thỏa mãn sự mong đợi của khách hàng.', 1),
(28, 'Honda', 'Honda là một hãng xe Nhật Bản, nổi tiếng với các mẫu xe máy tại Việt Nam. Xe của Honda đa phần có thiết kế dễ nhìn, trung tính, phù hợp với mọi đối tượng khách hàng', 1),
(29, 'Michelin', 'Nhà sản xuất michelin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(10) UNSIGNED NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `desc_category` longtext NOT NULL,
  `status_category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `name_category`, `desc_category`, `status_category`, `created_at`, `updated_at`) VALUES
(61, 'Lốp Xe', 'Lốp xe máy các loại', 1, NULL, NULL),
(62, 'Đèn xe', 'Đèn xe chiếu sáng', 1, NULL, NULL),
(63, 'Dàn áo xe', 'bộ dàn áo xe', 1, NULL, NULL),
(64, 'Bao tay', 'bao tay xe', 1, NULL, NULL),
(65, 'Nhớt xe', 'bôi trơn động cơ', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(10) UNSIGNED NOT NULL,
  `name_customer` varchar(255) NOT NULL,
  `email_customer` varchar(255) NOT NULL,
  `password_customer` varchar(255) NOT NULL,
  `phone_customer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailsorder`
--

CREATE TABLE `tbl_detailsorder` (
  `id_detailsorder` int(10) UNSIGNED NOT NULL,
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `id_shipping` int(10) UNSIGNED NOT NULL,
  `id_payment` int(10) UNSIGNED NOT NULL,
  `total_order` varchar(50) NOT NULL,
  `status_order` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id_payment` int(10) UNSIGNED NOT NULL,
  `name_payment` varchar(255) NOT NULL,
  `status_payment` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `slug_product` varchar(255) NOT NULL,
  `price_product` double NOT NULL,
  `image_product` varchar(255) NOT NULL,
  `desc_product` text NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `id_brand` int(10) UNSIGNED NOT NULL,
  `status_product` int(11) NOT NULL,
  `unit_product` int(11) NOT NULL,
  `stock_product` int(11) NOT NULL,
  `weigh_product` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `name_product`, `slug_product`, `price_product`, `image_product`, `desc_product`, `id_category`, `id_brand`, `status_product`, `unit_product`, `stock_product`, `weigh_product`) VALUES
(14, 'Nhớt Motul 300V Factory Line 10W40 1L', 'nhot-motul-300v-factory-line-10w40-1l', 435, 'motul-300v-factory-line-10w40-1l-products-1743.jpg', 'Motul 300V Factory Line 10W40 1L nhớt chất lượng cao dành cho xe mô tô phân khối lớn như: Exciter 150, Winner 150, Ex135, MSX 125, Raider 150, Fz150i, TFX 150, kawasaki z1000, Ducati, Cbr150, Cb1100...\r\nNhớt Motul 300V 10W40 1L tối ưu hóa công suất động cơ và bảo vệ động cơ một cách hoàn hảo', 65, 28, 1, 3, 1, 0.5),
(15, 'Nhớt Liqui Molygen Scooter 5W30', 'nhot-liqui-molygen-scooter-5w30', 300, 'nhot-liqui-molygen-scooter-5w30-products-197341.jpg', 'Liqui Moly Molygen Scooter 5W30 mang những công thức đặc biệt đúng như tên gọi của nó, là sản phẩm nhớt dành riêng cho xe tay ga hiện đại rất chất lượng và được ưa chuộng trên nhiều nước bởi tín năng bảo vệ động cơ cực tốt.\r\nNhớt Liqui Moly Molygen Scooter 5W30 được hãng Liqui Moly sản xuất đặc biệt dành cho các dòng xe tay ga hiện đại hiện nay trên thị trường Việt, có thể kể đến những chiếc xe tay ga thông dụng và đắt tiền.\r\nNhớt Liqui Moly Molygen Scooter 5W30 có thể kéo dài thời gian thay nhớt lên rất lâu, có thể đến 2500 - 3000km.', 65, 22, 1, 3, 1, 0.5),
(16, 'Nhớt Motul 3100 Gold 4T 10W40 1L', 'nhot-motul-3100-gold-4t-10w40-1l', 115, 'nhot-motul-3100-gold-4t-10w40-1l-products-206536.png', 'Nhớt Motul 3100 Gold 4T 10W40 1L sử dụng cho các loại động cơ 4 thì của xe gắn máy đời mới, công suất mạnh chạy đường trường, địa hình… của các hãng như Honda, Yamaha, Suzuki, SYM …\r\nMotul 3100 Gold 10W40 1L là nhớt bán tổng hợp với khả năng chống oxy hoá tuyệt hảo, giúp kéo dài thời gian sử dụng.\r\nTính năng bôi trơn cao giúp chống mài mòn, tăng cường tuổi thọ động cơ.\r\nTiêu chuẩn JASO MA2 giúp bộ ly hợp ướt hoạt động hiệu quả trong mọi điều kiện: khởi động, tăng tốc và tốc độ tối đa.', 65, 28, 1, 3, 1, 0.4),
(17, 'Lốp Conti Scoot (110/70-12 - 120/70-12) Vỏ trước', 'lop-conti-scoot-11070-12-12070-12-vo-truoc', 1050000, 'lop-conti-scoot-11070-12-12070-12-products-210732.png', 'Lốp Conti Scoot 110/70-12 - 120/70-12 dành cho xe Piaggio Vespa Sprint i-Get, Primavera iGet, GTS... các đời.\r\nContiScoot - Dòng vỏ xe tay ga cao cấp ưu việt mới của thương hiệu lốp Continental nổi tiếng.\r\nLốp ContiScoot 110/70-12 - 120/70-12 được kế thừa thiết kế hoa gai ContiRoadAttack3 hoàn hảo dành cho dòng xe moto Sport Touring hiệu suất cao, với nhiều ưu điểm nổi bật: Hiệu suất bám đường ướt cao, an toàn, linh hoạt, thoải mái & bền bỉ.\r\nVỏ xe Continental ContiScoot nhập khẩu SOUTH KOREA.', 61, 29, 1, 1, 1, 2),
(18, 'Lốp Conti Scoot (110/70-12 - 120/70-12) Vỏ sau', 'lop-conti-scoot-11070-12-12070-12-vo-sau', 1230000, 'lop-conti-scoot-11070-12-12070-12-products-210756.png', 'Lốp Conti Scoot 110/70-12 - 120/70-12 dành cho xe Piaggio Vespa Sprint i-Get, Primavera iGet, GTS... các đời.\r\nContiScoot - Dòng vỏ xe tay ga cao cấp ưu việt mới của thương hiệu lốp Continental nổi tiếng.\r\nLốp ContiScoot 110/70-12 - 120/70-12 được kế thừa thiết kế hoa gai ContiRoadAttack3 hoàn hảo dành cho dòng xe moto Sport Touring hiệu suất cao, với nhiều ưu điểm nổi bật: Hiệu suất bám đường ướt cao, an toàn, linh hoạt, thoải mái & bền bỉ.\r\nVỏ xe Continental ContiScoot nhập khẩu SOUTH KOREA.', 61, 29, 1, 1, 1, 2.5),
(19, 'Vỏ xe Continental ContiStreet 70/90-17', 'vo-xe-continental-contistreet-7090-17', 620000, 'lop-conti-street-7090-17-8090-17-products-210561.jpg', 'Vỏ xe Continental ContiStreet 70/90-17 đạt tiêu chuẩn chất lượng cao nhất của Continental - vỏ diagonal mới được phát triển từ nhóm kỹ sư Korbach đã giành chiến thắng trong cuộc thử nghiệm tại Đức.\r\n- Với hợp chất cao su bám đường ướt vượt trội.\r\n- Cải thiện khả năng chống đâm thủng đảm bảo an toàn cho người lái.\r\n- Độ sâu gai lốp được tăng cường để tiết kiệm nhiên liệu hơn.\r\nVỏ xe Continental ContiStreet 70/90-17 được sản xuất chính hãng tại Thái Lan.', 61, 29, 1, 1, 1, 1),
(20, 'Vỏ xe Continental ContiStreet 120/70-17', 'vo-xe-continental-contistreet-12070-17', 1250000, 'vo-xe-continental-contistreet-12070-17-2087-slide-products-646c2559ad2a898.jpg', 'Vỏ xe Continental ContiStreet 120/70-17 đạt tiêu chuẩn chất lượng cao nhất của Continental - vỏ diagonal mới được phát triển từ nhóm kỹ sư Korbach đã giành chiến thắng trong cuộc thử nghiệm tại Đức.\r\n- Với hợp chất cao su bám đường ướt vượt trội.\r\n- Cải thiện khả năng chống đâm thủng đảm bảo an toàn cho người lái.\r\n- Độ sâu gai lốp được tăng cường để tiết kiệm nhiên liệu hơn.\r\nVỏ xe Continental ContiStreet 120/70-17 gắn cho các xe: Winner 150, Winner X, Exciter 150, Exciter 155...\r\nVỏ xe Continental ContiStreet 120/70-17 được sản xuất chính hãng tại Thái Lan.', 61, 28, 1, 0, 1, 2),
(21, 'Bao tay Daytona Line (chính hãng)', 'bao-tay-daytona-line-chinh-hang', 400000, 'bao-tay-daytona-octa-chinh-hang-products-136059.png', 'Bao tay Daytona Line hàng chính hãng, thiết kế đơn giản có logo Daytona cùng các dòng kẻ ngang nổi bật tạo điểm nhấn trên bao tay, dành cho khách hàng nào thích sự đơn giản nhưng chất lượng, cao su chống trơn trượt cực tốt, nhất là cho các bạn có mồ hôi tay nhiều.\r\nBao tay Daytona Line có 2 màu: đỏ, xám gắn được tất cả các loại xe, được sản xuất tại Nhật, thương hiệu Daytona rất nổi tiếng trong việc sản xuất phụ tùng xe máy.', 64, 28, 1, 0, 1, 0.2),
(22, 'Bao tay Daytona Octa chính hãng', 'bao-tay-daytona-octa-chinh-hang', 300000, 'bao-tay-daytona-nami-chinh-hang-products-113949.jpg', 'Bao tay Daytona Octa hàng chính hãng, thiết kế đơn giản có logo Daytona cùng các đường sóng dọc chia bao tay thành nhiều khối nổi bật tạo điểm nhấn trên bao tay, dành cho khách hàng nào thích sự đơn giản nhưng chất lượng, cao su chống trơn trượt cực tốt, nhất là cho các bạn có mồ hôi tay nhiều.\r\nBao tay Daytona Octa gắn được tất cả các loại xe, được sản xuất tại Nhật, thương hiệu Daytona rất nổi tiếng trong việc sản xuất phụ tùng xe máy.', 64, 22, 1, 0, 1, 0.2),
(23, 'Đèn Led 2 tầng Zhi.Pat cho Dream II (Dream Thái), Super Dream', 'den-led-2-tang-zhipat-cho-dream-ii-dream-thai-super-dream', 1180000, 'den-pha-led-2-tang-zhipat-cho-dream-ii-dream-thai-super-dream-2013-slide-63dcc8481584130.jpg', 'Đèn Led 2 tầng Zhi.Pat Dream-II-THA cho Dream II (Dream Thái), Super Dream.\r\nZHI.PAT DREAM sở hữu thiết kế vượt trội nổi bật với vẻ đẹp cuốn hút riêng biệt. Thiết kế đèn định vị đầy phong cách cùng sắc cam nổi bật, mang đến nét nhìn hiện đại, trẻ trung và thể thao cho chiếc xe của bạn.\r\nVới 2 màu: Khói - định vị cam hoặc Si bạc - định vị cam.\r\nChính hãng Zhi.Pat Bảo hành 12 tháng.', 62, 28, 1, 1, 1, 0.2),
(24, 'Đèn pha Led 2 tầng Zhi.Pat W110 THA cho Wave 100/110/110S đời 1997 - 2004', 'den-pha-led-2-tang-zhipat-w110-tha-cho-wave-100110110s-doi-1997-2004', 1200000, 'den-pha-led-02-tang-zhipat-w110-tha-cho-wave-100110110s-doi-1997-2004-1962-slide-638eac8dda9d662.jpg', 'Bộ sản phẩm đèn pha Led 2 tầng Zhi.Pat W110 THA\r\n+ Sử dụng cho các dòng xe : Xe Wave 100/110/110S đời 1997-2004\r\n+ Bộ sản phẩm bao gồm :\r\n- 01 bộ Đèn Led 02 tầng\r\n- 01 cáp nguồn (đính kèm chóa đèn)\r\n- 01 Móc khóa Zhi.Pat\r\n- 01 Thẻ Bảo hành chính hãng\r\n- 01 Bộ hướng dẫn sử dụng\r\n+ Sản phẩm có 03 mẫu:\r\n- Chóa đèn màu khói - định vị tím\r\n- Chóa đèn màu khói - định vị xanh\r\n- Chóa đèn màu khói - định vị đỏ\r\n+ Bảo hành chính hãng 12 tháng 1 đổi 1', 62, 22, 1, 1, 1, 1),
(25, 'Dàn áo xe Dream II chính hãng', 'dan-ao-xe-dream-ii-chinh-hang', 904000, '360x360-1532448532-DanaoDreamII17.jpg', 'Thông tin sản phẩm:\r\n\r\n- Chất liệu: nhựa ABS nguyên sinh\r\n- Màu sắc: Xanh Rêu\r\n- Chịu nước Xử lý bề mặt: Sơn phun, qua hấp Sấy\r\n- Số lớp sơn trên bề mặt: 3 lớp\r\n\r\nHướng dẫn sử dụng:\r\n\r\n- Sử dụng các công cụ tháo lắp ốc vỏ nhựa xe máy\r\n- Sử dụng đúng các loại ốc vít để lắp vỏ nhựa\r\n\r\nLưu ý :\r\n\r\n- Tránh dùng các vật nhọn tiếp xúc trực tiếp bề mặt sản phẩm\r\n- Tránh dùng các loại vít có kích thước không phù hợp để tháo lắp\r\n- Tháo lắp đúng quy trình\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 63, 28, 1, 2, 1, 5),
(26, 'Dàn áo xe Wave RS, Wave Alpha, Wave 100 – 110', 'dan-ao-xe-wave-rs-wave-alpha-wave-100-–-110', 99, '360x360-1532274657-danaoxewavealpha161.jpg', 'Dàn áo xe Wave RS, Wave Alpha, Wave 100 – 110 với thiết kế tinh xảo, đẹp mắt sẽ mang lại cho xe của bạn một hình ảnh khỏe khắn, mạnh mẽ và thẫm mỹ hơn. Vừa khít với các dòng xe này. Chúng tôi có thể chắc chắn rằng, sản phẩm dàn áo này sẽ luôn làm hài lòng khách hàng, kể cả những vị khách khó tính nhất.\r\n\r\nViệc thay thế dàn áo xe này sẽ khiến cho xe của bạn trở nên nổi bật. Giúp bạn tự tin hơn khi tham gia giao thông. Giúp bạn thể hiện cá tính và phong cách riêng của mình.', 63, 22, 1, 2, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_customer`
--

CREATE TABLE `tbl_social_customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `provider_user_id` varchar(100) NOT NULL,
  `provider_user_email` varchar(100) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`) VALUES
(6, 'Xuân Toàn', 'DH51801108@student.stu.edu.vn', '2023-07-07 16:36:27', '$2y$10$2qtC20oxnLT0HYPrJyurUOkExqQVFge6bjoWeo7v/iBUuqhFMCZ4u', 'VCWhqvSB4tJYUnCEn0SK7IuRLyfED7uWuEDjs1LxcKiCt0T6ZZYlGDioJF5j', '2023-06-01 10:00:08', '2023-06-01 10:38:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`),
  ADD UNIQUE KEY `tbl_category_name_category_unique` (`name_category`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_detailsorder`
--
ALTER TABLE `tbl_detailsorder`
  ADD PRIMARY KEY (`id_detailsorder`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_customer`),
  ADD KEY `id_shipping` (`id_shipping`),
  ADD KEY `id_payment` (`id_payment`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`,`id_brand`),
  ADD KEY `id_category_2` (`id_category`),
  ADD KEY `id_category_3` (`id_category`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- Indexes for table `tbl_social_customer`
--
ALTER TABLE `tbl_social_customer`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_detailsorder`
--
ALTER TABLE `tbl_detailsorder`
  MODIFY `id_detailsorder` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id_payment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_social_customer`
--
ALTER TABLE `tbl_social_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detailsorder`
--
ALTER TABLE `tbl_detailsorder`
  ADD CONSTRAINT `tbl_detailsorder_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`),
  ADD CONSTRAINT `tbl_detailsorder_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`id_shipping`) REFERENCES `tbl_shipping` (`id_shipping`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`id_payment`) REFERENCES `tbl_payment` (`id_payment`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `tbl_brand` (`id`),
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `tbl_category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
