-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 17, 2024 lúc 01:06 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `documentmanage`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `desc`, `parent_id`, `tag`, `created_at`, `updated_at`) VALUES
(20, 'Luận văn - Báo cáo', 'luan-van-bao-cao', 'Các tài liệu về các bài luận văn hay báo cáo tốt nghiệp cho sinh viên đại học', NULL, NULL, '2023-10-07 06:47:52', '2023-10-13 09:01:11'),
(22, 'Kỹ năng mềm', 'ky-nang-mem', 'Chia sẻ các tài liệu về những kỹ năng trong đời sống', NULL, NULL, '2023-10-13 09:01:58', '2023-10-13 09:01:58'),
(23, 'Kinh doanh - tiếp thị', 'kinh-doanh-tiep-thi', 'Những tài liệu về mảng kinh doanh và tiếp thị', NULL, NULL, '2023-10-13 09:02:44', '2023-10-13 09:02:44'),
(24, 'Kinh tế - Quản lý', 'kinh-te-quan-ly', 'Các tài liệu về mảng kinh tế và quảng lý', NULL, NULL, '2023-10-13 09:03:08', '2023-10-13 09:03:08'),
(25, 'Ngoại ngữ', 'ngoai-ngu', 'Các tài liệu về ngoại ngữ', NULL, NULL, '2023-10-13 09:03:26', '2023-10-13 09:03:26'),
(26, 'Công nghệ thông tin', 'cong-nghe-thong-tin', 'Các tài liệu về ngành công nghệ thông tin', NULL, NULL, '2023-10-13 09:03:41', '2023-10-13 09:03:41'),
(27, 'Sư phạm - Giáo dục', 'su-pham-giao-duc', 'Các tài liệu cho ngành sư phạm', NULL, NULL, '2023-10-13 09:04:10', '2023-10-13 09:04:10'),
(28, 'Kỹ thuật lập trình', 'ky-thuat-lap-trinh', 'Các tài liệu về kỹ thuật lập trình', 26, NULL, '2023-10-13 09:05:02', '2023-10-13 09:05:02'),
(29, 'Sư phạm toán', 'su-pham-toan', 'Các tài liệu cho ngành sư phạm toán', 27, NULL, '2023-10-13 09:07:48', '2023-10-13 09:07:48'),
(30, 'Sư phạm ngữ văn', 'su-pham-ngu-van', 'Các tài liệu cho sư phạm ngữ văn', 27, NULL, '2023-10-13 09:08:27', '2023-10-13 09:08:27'),
(31, 'Tiếng anh', 'tieng-anh', 'các tài liệu về tiếng anh', 25, NULL, '2023-10-13 09:08:54', '2023-10-13 09:08:54'),
(32, 'Kế toán', 'ke-toan', 'Các tài liệu cho ngành kế toán', 24, NULL, '2023-10-13 09:09:31', '2023-10-13 09:09:31'),
(38, 'Xử lý ảnh', '12-xu-ly-anh', NULL, NULL, NULL, '2023-12-18 02:01:41', '2023-12-18 02:01:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `document_id` bigint UNSIGNED DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_comment_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `document_id`, `comment`, `created_at`, `updated_at`, `parent_comment_id`) VALUES
(1, 62, 57, 'rggdg', '2023-12-08 03:17:25', '2023-12-08 03:17:25', NULL),
(2, 62, 57, 'tryyryt', '2023-12-08 03:17:42', '2023-12-08 03:17:42', NULL),
(3, 63, 57, 'hjhgjghj', '2023-12-08 03:24:53', '2023-12-08 03:24:53', 2),
(4, 63, 57, 'fjfgj', '2023-12-08 03:26:13', '2023-12-08 03:26:13', NULL),
(5, 63, 57, 'sfgfgf', '2023-12-08 03:26:55', '2023-12-08 03:26:55', 1),
(6, 63, 57, '345345', '2023-12-08 03:27:37', '2023-12-08 03:27:37', 2),
(7, 8, 58, 'kyuky', '2023-12-13 21:12:44', '2023-12-13 21:12:44', NULL),
(8, 8, 58, 'tertjr', '2023-12-13 21:12:51', '2023-12-13 21:12:51', 7),
(9, 8, 55, 'gfnf', '2023-12-14 07:39:42', '2023-12-14 07:39:42', NULL),
(10, 8, 104, 'fdgg', '2023-12-14 08:11:10', '2023-12-14 08:11:10', NULL),
(11, 8, 37, 'ggf', '2023-12-15 05:44:30', '2023-12-15 05:44:30', NULL),
(12, 8, 37, 'ghhfgf', '2023-12-15 05:44:35', '2023-12-15 05:44:35', NULL),
(13, 8, 106, 'được', '2024-04-08 09:00:56', '2024-04-08 09:00:56', NULL),
(14, 8, 106, 'tốt', '2024-04-08 09:39:29', '2024-04-08 09:39:29', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `cate_id` bigint UNSIGNED DEFAULT NULL,
  `score` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_id` bigint UNSIGNED DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` bigint UNSIGNED DEFAULT NULL,
  `rate` double(8,2) DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `documents`
--

INSERT INTO `documents` (`id`, `title`, `slug`, `description`, `user_id`, `cate_id`, `score`, `type`, `size`, `source`, `tag_id`, `file`, `created_at`, `updated_at`, `status`, `rate`, `views`) VALUES
(16, 'Mẫu giấy', 'mau-giay', NULL, 8, 20, 0, 'docx', '736.27 KB', NULL, NULL, '5B - MẪU GIẤY LÀM BÀI CHUYÊN MỤC NHÀ THÔNG THÁI', '2023-11-08 20:29:04', '2024-04-13 08:26:15', 3, 48.57, 1),
(17, 'lịch thi', 'lich-thi', 'q', 8, 20, 5, 'xlsx', '34.98 KB', NULL, NULL, 'LỊCH THI GIỮA KỲ CỦA SINH VIÊN CHUYỂN ĐỔI_HK 1 2023-2024', '2023-11-09 00:58:51', '2024-02-24 09:00:57', 3, 76.08, 0),
(20, '60 Khái niệm thường gặp nhất trong các đề thi NLXH', '2-60-khai-niem-thuong-gap-nhat-trong-cac-e-thi-nlxh', '60 Khái niệm thường gặp nhất trong các đề thi NLXH', 48, 20, 0, 'pdf', '220.63 KB', 'https://www.studocu.com/vn', NULL, '60-khai-niem-thuong-gap-nhat-trong-cac-de-thi-nlxh-phan-1', '2023-11-28 21:23:45', '2024-03-13 12:14:07', 1, 60.00, 6),
(21, '154 nhận định lý luận văn học', '3-154-nhan-inh-ly-luan-van-hoc', '154 nhận định lý luận văn học', 48, 20, 0, 'pdf', '11520.21 KB', 'https://www.studocu.com/vn', NULL, '154-nhan-dinh-li-luan-van-hoc', '2023-11-28 21:24:38', '2023-11-28 21:24:38', 1, NULL, 0),
(22, '185 nhận định văn học cực hay để áp dụng vào các NLVH', '4-185-nhan-inh-van-hoc-cuc-hay-e-ap-dung-vao-cac-nlvh', '185 nhận định văn học cực hay để áp dụng vào các NLVH', 48, 20, 0, 'pdf', '392.16 KB', 'https://www.studocu.com/vn', NULL, '185-nhan-dinh-van-hoc-185-nhan-dinh-van-hoc-cuc-hay-de-ap-dung-vao-cac-de-nghi-luan-van-hoc', '2023-11-28 21:25:40', '2023-11-28 21:25:40', 1, NULL, 0),
(23, 'Bài tập tình huống môn luật hình sự', '5-bai-tap-tinh-huong-mon-luat-hinh-su', 'Bài tập tình huống môn luật hình sự', 48, 20, 0, 'pdf', '113.12 KB', 'https://www.studocu.com/vn', NULL, 'bt-tinh-huong-mon-luat-hinh-su', '2023-11-28 21:27:33', '2023-11-28 21:27:33', 1, NULL, 0),
(24, 'Dẫn chứng NLXH hot nhất', '6-dan-chung-nlxh-hot-nhat', 'Một số dẫn chứng NLXH nổi bật', 48, 20, 2, 'pdf', '214.51 KB', 'https://www.studocu.com/vn', NULL, 'dan-chung-nlxh-hot-nhat-nlxh-hot', '2023-11-28 21:28:33', '2024-04-13 08:48:05', 1, NULL, 3),
(25, 'Dẫn chứng về các nhân vât', '7-dan-chung-ve-cac-nhan-vat', 'Dẫn chứng về các nhân vât', 48, 20, 0, 'pdf', '299.59 KB', 'https://www.studocu.com/vn', NULL, 'dan-chung-ve-cac-nhan-vat', '2023-11-28 21:29:24', '2023-11-28 21:29:24', 1, NULL, 0),
(26, 'Lí luận xã hội nhận định', '8-li-luan-xa-hoi-nhan-inh', 'Lí luận xã hội nhận định', 48, 20, 3, 'pdf', '260.16 KB', 'https://www.studocu.com/vn', NULL, 'li-luan-van-hoc-nhan-dinh', '2023-11-29 07:54:13', '2023-11-29 07:54:13', 1, NULL, 0),
(27, 'Tổng hợp lí luận văn học tổng hợp kiến thức lí luận văn học', '9-tong-hop-li-luan-van-hoc-tong-hop-kien-thuc-li-luan-van-hoc', 'Tổng hợp lí luận văn học tổng hợp kiến thức lí luận văn học', 48, 20, 3, 'pdf', '466.88 KB', 'https://www.studocu.com/vn', NULL, 'tong-hop-li-luan-van-hoc-tong-hop-kien-thuc-li-luan-van-hoc', '2023-11-29 07:54:49', '2023-11-29 07:54:49', 1, NULL, 0),
(28, 'Bài tập kỹ năng cá nhân kỹ năng mềm', '10-bai-tap-ky-nang-ca-nhan-ky-nang-mem', 'Bài tập kỹ năng cá nhân kỹ năng mềm', 48, 22, 0, 'pdf', '305.2 KB', 'https://www.studocu.com/vn', NULL, 'bai-tap-ky-nang-ca-nhan-ky-nang-mem', '2023-11-29 08:00:44', '2023-11-29 08:00:44', 1, NULL, 0),
(29, 'Báo cáo kỹ năm mềm', '11-bao-cao-ky-nam-mem', 'Báo cáo kỹ năm mềm', 48, 22, 2, 'pdf', '288.72 KB', 'https://www.studocu.com/vn', NULL, 'bao-cao-ky-nang-mem', '2023-11-29 08:01:19', '2023-11-29 08:01:19', 1, NULL, 0),
(30, 'Báo cáo kỹ năm mềm', '12-bao-cao-ky-nam-mem', 'Báo cáo kỹ năm mềm', 48, 22, 0, 'pdf', '251.45 KB', 'https://www.studocu.com/vn', NULL, 'baocaokynangmem-this-is-my-document', '2023-11-29 08:02:12', '2023-11-29 08:02:12', 1, NULL, 0),
(31, 'Câu hỏi trắc nghiệm kỹ năng mềm có đáp án', '13-cau-hoi-trac-nghiem-ky-nang-mem-co-ap-an', 'Câu hỏi trắc nghiệm kỹ năng mềm có đáp án', 48, 22, 3, 'pdf', '182.97 KB', 'https://www.studocu.com/vn', NULL, 'cau-hoi-trac-nghiem-ky-nang-mem-co-dap-an', '2023-11-29 08:04:00', '2024-04-12 09:42:53', 1, NULL, 1),
(32, 'Câu hỏi về kỹ năng giao tiếp ôn thi kết thúc học phần', '14-cau-hoi-ve-ky-nang-giao-tiep-on-thi-ket-thuc-hoc-phan', 'Câu hỏi về kỹ năng giao tiếp ôn thi kết thúc học phần', 48, 22, 0, 'pdf', '169.58 KB', 'https://www.studocu.com/vn', NULL, 'cau-hoi-ve-ky-nang-giao-tiep-on-thi-ket-thuc-hoc-phan', '2023-11-29 08:05:23', '2023-11-29 08:05:23', 1, NULL, 0),
(33, 'Kỹ năng lắng nghe', '15-ky-nang-lang-nghe', 'Kỹ năng lắng nghe', 48, 22, 0, 'pdf', '191.78 KB', 'https://www.studocu.com/vn', NULL, 'ki-nang-lang-nghe-knln', '2023-11-29 08:06:16', '2023-11-29 08:06:16', 1, NULL, 0),
(34, 'Kỹ năng mềm - Tài liệu ôn tập', '16-ky-nang-mem-tai-lieu-on-tap', 'Kỹ năng mềm - Tài liệu ôn tập', 48, 22, 1, 'pdf', '389.23 KB', 'https://www.studocu.com/vn', NULL, 'knm-tai-lieu-on-tap', '2023-11-29 08:07:34', '2023-11-29 08:07:34', 1, NULL, 0),
(35, 'Kỹ năng mềm  LMS - Đáp án', '17-ky-nang-mem-lms-ap-an', 'Kỹ năng mềm  LMS - Đáp án', 48, 22, 0, 'pdf', '181.83 KB', 'https://www.studocu.com/vn', NULL, 'ky-nang-mem-lms-dap-an-lms-knm', '2023-11-29 08:27:27', '2023-11-29 08:27:27', 1, NULL, 0),
(36, 'Tiểu luận môn kinh doanh quốc tế tiếp thị Lo Viba ở một thị trường mới', '18-tieu-luan-mon-kinh-doanh-quoc-te-tiep-thi-lo-viba-o-mot-thi-truong-moi', 'Tiểu luận môn kinh doanh quốc tế tiếp thị Lo Viba ở một thị trường mới', 48, 23, 2, 'pdf', '178.14 KB', 'https://www.studocu.com/vn', NULL, '123doc-tieu-luan-mon-kinh-doanh-quoc-te-tiep-thi-lo-viba-o-mot-thi-truong-moi-tieu-luan-mar-quoc-te', '2023-11-29 08:36:49', '2023-11-29 08:36:49', 1, NULL, 0),
(37, 'Cẩm nang kinh doanh Harvard - Các kỹ năng tiếp thị hiệu quả', '19-cam-nang-kinh-doanh-harvard-cac-ky-nang-tiep-thi-hieu-qua', 'Cẩm nang kinh doanh Harvard - Các kỹ năng tiếp thị hiệu quả', 48, 23, 2, 'pdf', '6384.25 KB', 'https://www.studocu.com/vn', NULL, 'cam-nang-kinh-doanh-harvard-cac-ky-nang-tiep-thi-hieu-qua', '2023-11-29 08:38:04', '2023-11-29 08:38:04', 1, 31.58, 0),
(38, 'Chiến lược tiếp thị kinh doanh môi trường thể chế định hướng và hiệu quả kinh doanh', '20-chien-luoc-tiep-thi-kinh-doanh-moi-truong-the-che-inh-huong-va-hieu-qua-kinh-doanh', 'Chiến lược tiếp thị kinh doanh môi trường thể chế định hướng và hiệu quả kinh doanh của các doanh nghiệp vừa và nhỏ ở Việt Nam', 48, 23, 1, 'pdf', '10759.29 KB', 'https://www.studocu.com/vn', NULL, 'chien-luoc-tiep-thi-kinh-doanh-moi-truong-the-che-dinh-huong-thi-truong-va-hieu-qua-kinh-doanh-cua-cac-doanh-nghiep-vua-va-nho-o-cac-do-thi-viet-nam', '2023-11-29 08:39:21', '2023-11-29 08:39:21', 1, NULL, 0),
(39, 'Ôn thi giao tiếp kinh doanh', '20-on-thi-giao-tiep-kinh-doanh', 'Ôn thi giao tiếp kinh doanh', 48, 23, 0, 'pdf', '1511.41 KB', 'https://www.studocu.com/vn', NULL, 'file-20211220-082804-on-thi-giao-tiep-kinh-doanh-1', '2023-11-29 08:40:11', '2023-11-29 08:40:11', 1, NULL, 0),
(40, 'Ôn thi giao tiếp kinh doanh', '22-on-thi-giao-tiep-kinh-doanh', 'Ôn thi giao tiếp kinh doanh', 48, 23, 0, 'pdf', '74.1 KB', 'https://www.studocu.com/vn', NULL, 'on-thi-gtkd-on-thi-giao-tiep-kinh-doanh', '2023-11-29 08:41:18', '2023-11-29 08:41:18', 1, NULL, 0),
(41, 'Quản lý tiếp thị kinh doanh', '23-quan-ly-tiep-thi-kinh-doanh', 'Quản lý tiếp thị kinh doanh', 48, 23, 0, 'pdf', '603.01 KB', 'https://www.studocu.com/vn', NULL, 'quan-ly-tiep-thi-kinh-doanh', '2023-11-29 08:43:00', '2023-11-29 08:43:00', 1, NULL, 0),
(42, 'Giao tiếp kinh doanh', '24-giao-tiep-kinh-doanh', 'Giao tiếp kinh doanh', 48, 23, 0, 'pdf', '339.55 KB', 'https://www.studocu.com/vn', NULL, 'tlott-giao-tiep-kinh-doanh-pham-thi-thuy-trang-312010-21967', '2023-11-29 08:45:33', '2023-11-29 08:45:33', 1, NULL, 0),
(43, 'Bài tập kinh tế quản lý môi trường', '25-bai-tap-kinh-te-quan-ly-moi-truong', 'Bài tập kinh tế quản lý môi trường', 48, 24, 0, 'pdf', '226.96 KB', 'https://www.studocu.com/vn', NULL, 'bai-tap-kinh-te-quan-li-moi-truong-11220730', '2023-11-29 08:46:33', '2023-11-29 08:46:33', 1, NULL, 0),
(44, 'Báo cáo kinh tế quản lý - phân tích rủi ro', '26-bao-cao-kinh-te-quan-ly-phan-tich-rui-ro', 'Báo cáo kinh tế quản lý - phân tích rủi ro', 48, 24, 0, 'pdf', '285.21 KB', 'https://www.studocu.com/vn', NULL, 'bao-cao-kinh-te-quan-ly-1-chuong-51-phan-tich-rui-ro (1)', '2023-11-29 08:47:13', '2023-11-29 08:47:13', 1, NULL, 0),
(45, 'Chiến lược của Vingroup', '27-chien-luoc-cua-vingroup', 'Chiến lượớ của Vingroup', 48, 24, 2, 'pdf', '117.06 KB', 'https://www.studocu.com/vn', NULL, 'chien-luoc-cua-vingroup', '2023-11-29 08:49:01', '2023-11-29 08:49:01', 1, NULL, 0),
(46, 'Đề cương môn quản lý kinh tế dược', '28-e-cuong-mon-quan-ly-kinh-te-duoc', 'Đề cương môn quản lý kinh tế dược', 48, 24, 0, 'pdf', '115.41 KB', 'https://www.studocu.com/vn', NULL, 'de-cuong-mon-quan-ly-kinh-te-duoc', '2023-11-29 08:54:02', '2023-11-29 08:54:02', 1, NULL, 0),
(47, 'Quản lý kinh tế', '29-quan-ly-kinh-te', 'Quản lý kinh tế', 48, 24, 0, 'pdf', '970.53 KB', 'https://www.studocu.com/vn', NULL, 'nguyen-ho-manh-qlkt-k25b', '2023-11-29 09:05:26', '2023-11-29 09:05:26', 1, NULL, 0),
(48, 'Lập kế hoạch 4 năm bài tập môn nhập môn sư phạm ngành ngoại ngữ tín chỉ 1', '30-lap-ke-hoach-4-nam-bai-tap-mon-nhap-mon-su-pham-nganh-ngoai-ngu-tin-chi-1', 'Lập kế hoạch 4 năm bài tập môn nhập môn sư phạm ngành ngoại ngữ tín chỉ 1', 48, 25, 2, 'pdf', '170.21 KB', 'https://www.studocu.com/vn', NULL, 'lap-ke-hoach-4-nam-bai-tap-mon-nhap-mon-su-pham-nganh-su-pham-ngoai-ngu-tin-chi-1', '2023-11-29 09:27:31', '2023-11-29 09:27:31', 1, NULL, 0),
(49, 'Ngôn ngữ học đối chiếu đáp án đề cương môn ngôn ngữ học đối chiều', '31-ngon-ngu-hoc-oi-chieu-ap-an-e-cuong-mon-ngon-ngu-hoc-oi-chieu', 'Ngôn ngữ học đối chiếu đáp án đề cương môn ngôn ngữ học đối chiều', 48, 25, 2, 'pdf', '183.92 KB', 'https://www.studocu.com/vn', NULL, 'ngon-ngu-hoc-doi-chieu-dap-an-de-cuong-mon-ngon-ngu-hoc-doi-chieu', '2023-11-29 09:30:11', '2023-11-29 09:30:11', 1, NULL, 0),
(50, 'Phiếu đánh giá hoạt động nhóm môn ngoại ngữ', '32-phieu-anh-gia-hoat-ong-nhom-mon-ngoai-ngu', 'Phiếu đánh giá hoạt động nhóm môn ngoại ngữ', 48, 25, 0, 'pdf', '116.26 KB', 'https://www.studocu.com/vn', NULL, 'phieu-danh-gia-hoat-dong-nhom', '2023-11-29 09:31:08', '2023-11-29 09:31:08', 1, NULL, 0),
(51, 'Quyển 1 tổng hợp ngữ pháp tiếng trung', '33-quyen-1-tong-hop-ngu-phap-tieng-trung', 'Quyển 1 tổng hợp ngữ pháp tiếng trung', 48, 25, 0, 'pdf', '217.94 KB', 'https://www.studocu.com/vn', NULL, 'quyen-1-tong-hop-np-tieng-trung', '2023-11-29 09:31:42', '2023-11-29 09:31:42', 1, NULL, 0),
(52, 'Reading practice tests for nec 1 revised', '34-reading-practice-tests-for-nec-1-revised', 'Reading practice tests for nec 1 revised', 48, 25, 0, 'pdf', '1461.96 KB', 'https://www.studocu.com/vn', NULL, 'reading-practice-tests-for-nec-1-revised', '2023-11-29 09:32:24', '2023-11-29 09:32:24', 1, NULL, 0),
(53, 'Tổng hợp ngữ pháp hsk1 và hsk2', '35-tong-hop-ngu-phap-hsk1-va-hsk2', 'Tổng hợp ngữ pháp hsk1 và hsk2', 48, 25, 0, 'pdf', '722.4 KB', 'https://www.studocu.com/vn', NULL, 'tong-hop-ngu-phap-hsk1-va-hsk2', '2023-11-29 09:33:00', '2023-11-29 09:33:00', 1, NULL, 0),
(54, 'Trắc nghiệm DLNN 50 câu dẫn luận ngôn ngữ', '36-trac-nghiem-dlnn-50-cau-dan-luan-ngon-ngu', 'Trắc nghiệm DLNN 50 câu dẫn luận ngôn ngữ', 48, 25, 2, 'pdf', '214.91 KB', 'https://www.studocu.com/vn', NULL, 'trac-nghiem-dlnn-50-cau-dan-luan-ngon-ngu', '2023-11-29 09:33:50', '2023-11-29 09:33:50', 1, NULL, 0),
(55, 'Bài tập 1of4 Kết nối dữ liệu', '37-bai-tap-1of4-ket-noi-du-lieu', 'Bài tập 1of4 Kết nối dữ liệu', 48, 26, 0, 'pdf', '147.02 KB', 'https://www.studocu.com/vn', NULL, 'bai-tap-1of4-ket-noi-du-lieu', '2023-11-29 09:34:59', '2024-03-13 08:17:38', 1, NULL, 2),
(56, 'Câu hỏi ôn tập học phần hệ thống thông tin quản lý', '38-cau-hoi-on-tap-hoc-phan-he-thong-thong-tin-quan-ly', 'Câu hỏi ôn tập học phần hệ thống thông tin quản lý', 48, 26, 2, 'pdf', '489.3 KB', 'https://www.studocu.com/vn', NULL, 'cau-hoi-on-tap-hoc-phan-he-thong-thong-tin-quan-ly', '2023-11-29 09:36:10', '2024-02-25 08:48:06', 1, NULL, 0),
(57, 'Câu hỏi trắc nghiệm mạng máy tính', '39-cau-hoi-trac-nghiem-mang-may-tinh', 'Câu hỏi trắc nghiệm mạng máy tính', 48, 26, 0, 'pdf', '249.55 KB', 'https://www.studocu.com/vn', NULL, 'cau-hoi-trac-nghiem-mang-may-tinh-on-tap-tham-khao-1', '2023-11-29 10:06:02', '2024-04-13 08:48:09', 1, NULL, 1),
(58, 'Giới thiệu và cài đặt python', '40-gioi-thieu-va-cai-at-python', 'Giới thiệu và cài đặt python', 48, 26, 0, 'pdf', '1027.12 KB', 'https://www.studocu.com/vn', NULL, 'lab-1-gioi-thieu-va-cai-dat-python', '2023-11-29 10:06:31', '2023-11-29 10:06:31', 1, 60.00, 0),
(59, 'Vòng lặp while for nâng cao', '41-vong-lap-while-for-nang-cao', 'Vòng lặp while for nâng cao', 48, 26, 0, 'pdf', '91.21 KB', 'https://www.studocu.com/vn', NULL, 'lab-7-vong-lap-while-for-nang-cao', '2023-11-29 10:06:56', '2023-11-29 10:06:56', 1, 80.00, 0),
(60, 'Nội dung Digital Marketing', '42-noi-dung-digital-marketing', 'Nội dung Digital Marketing', 48, 26, 0, 'pdf', '139.9 KB', 'https://www.studocu.com/vn', NULL, 'ndung-digital-marketing', '2023-11-29 10:07:49', '2023-11-29 10:07:49', 1, NULL, 0),
(61, 'Nguyên tắc cơ số dồn tích', '43-nguyen-tac-co-so-don-tich', 'Nguyên tắc cơ số dồn tích', 48, 26, 0, 'pdf', '77.59 KB', 'https://www.studocu.com/vn', NULL, 'nguyen-tac-co-so-don-tich', '2023-11-29 11:06:57', '2023-11-29 11:06:57', 1, NULL, 0),
(62, 'Phân tích các yếu tố vĩ mô', '44-phan-tich-cac-yeu-to-vi-mo', 'Phân tích các yếu tố vĩ mô', 48, 26, 0, 'pdf', '589.89 KB', 'https://www.studocu.com/vn', NULL, 'phan-tich-cac-yeu-to-vi-mo', '2023-11-29 11:08:43', '2023-11-29 11:08:43', 1, NULL, 0),
(63, 'Xây dựng phần mềm quản lí sinh viên', '45-xay-dung-phan-mem-quan-li-sinh-vien', 'Xây dựng phần mềm quản lí sinh viên', 48, 26, 1, 'pdf', '440.43 KB', 'https://www.studocu.com/vn', NULL, 'xay-dung-phan-mem-qua-li-sinh-vien', '2023-11-29 11:09:14', '2023-11-29 11:09:14', 1, NULL, 0),
(64, 'Bài giảng nhập môn ngành sư phạm giáo dục tiểu học', '46-bai-giang-nhap-mon-nganh-su-pham-giao-duc-tieu-hoc', 'Bài giảng nhập môn ngành sư phạm giáo dục tiểu học', 48, 27, 0, 'pdf', '575.31 KB', 'https://www.studocu.com/vn', NULL, 'bai-giang-nhap-mon-nganh-sp-giao-duc-tieu-hoc-chuong-3-bai-giang', '2023-11-29 11:13:40', '2023-11-29 11:13:40', 1, NULL, 0),
(65, 'Bài tập HDDTN Sư phạm giáo dục tiểu học', '47-bai-tap-hddtn-su-pham-giao-duc-tieu-hoc', 'Bài tập HDDTN Sư phạm giáo dục tiểu học', 48, 27, 0, 'pdf', '117.97 KB', 'https://www.studocu.com/vn', NULL, 'bai-tap-1-hddtn-su-pham-giao-duc-tieu-hoc', '2023-11-29 11:14:39', '2024-03-13 19:47:22', 1, NULL, 1),
(66, 'Bài tập cá nhân tâm lý học giáo dục', '48-bai-tap-ca-nhan-tam-ly-hoc-giao-duc', 'Bài tập cá nhân tâm lý học giáo dục', 48, 27, 0, 'pdf', '146.62 KB', 'https://www.studocu.com/vn', NULL, 'bai-tap-ca-nhan-01-tam-ly-hoc-giao-duc', '2023-11-29 11:15:10', '2023-11-29 11:15:10', 1, NULL, 0),
(67, 'Bùng nổ sư phạm - giáo dục trung học', '49-bung-no-su-pham-giao-duc-trung-hoc', 'Bùng nổ sư phạm - giáo dục trung học', 48, 27, 0, 'pdf', '130.5 KB', 'https://www.studocu.com/vn', NULL, 'bung-no-su-pham-nhom-1-bung-no-su-pham-on-giao-duc-hoc-trung-hoc', '2023-11-29 11:15:41', '2023-11-29 11:15:41', 1, NULL, 0),
(68, 'Câu hỏi ôn tập môn tâm lý học giáo đục đại học sư phạm Hà Nội', '50-cau-hoi-on-tap-mon-tam-ly-hoc-giao-uc-ai-hoc-su-pham-ha-noi', 'Câu hỏi ôn tập môn tâm lý học giáo đục đại học sư phạm Hà Nội', 48, 27, 0, 'pdf', '268.47 KB', 'https://www.studocu.com/vn', NULL, 'cau-hoi-on-tap-mon-tam-ly-hoc-giao-duc-dai-hoc-su-pham-ha-noi', '2023-11-29 11:16:20', '2023-11-29 11:16:20', 1, NULL, 0),
(69, 'Đề cường tâm lý học 2021', '51-e-cuong-tam-ly-hoc-2021', 'Đề cường tâm lý học 2021', 48, 27, 0, 'pdf', '509.99 KB', 'https://www.studocu.com/vn', NULL, 'de-cuong-tam-ly-2021', '2023-11-29 11:16:47', '2023-11-29 11:16:47', 1, NULL, 0),
(70, 'Nghiệp vụ sư phạm giáo dục đại học thế giới và Việt Nam', '52-nghiep-vu-su-pham-giao-duc-ai-hoc-the-gioi-va-viet-nam', 'Nghiệp vụ sư phạm giáo dục đại học thế giới và Việt Nam', 48, 27, 0, 'pdf', '499.34 KB', 'https://www.studocu.com/vn', NULL, 'nghiep-vu-su-pham-giao-duc-dai-hoc-the-gioi-va-viet-nam', '2023-11-29 11:17:18', '2023-11-29 11:17:18', 1, NULL, 0),
(71, 'Nghiệp vụ sư phạm giáo dục học đại cương', '53-nghiep-vu-su-pham-giao-duc-hoc-ai-cuong', 'Nghiệp vụ sư phạm giáo dục học đại cương', 48, 27, 0, 'pdf', '433.49 KB', 'https://www.studocu.com/vn', NULL, 'nghiep-vu-su-pham-giao-duc-hoc-dai-cuong', '2023-11-29 11:17:55', '2024-03-13 20:13:15', 1, NULL, 2),
(72, 'Sư phạm anh - học phần giáo dục học chuyên nghiệp', '54-su-pham-anh-hoc-phan-giao-duc-hoc-chuyen-nghiep', 'Sư phạm anh - học phần giáo dục học chuyên nghiệp', 48, 27, 2, 'pdf', '97.26 KB', 'https://www.studocu.com/vn', NULL, 'su-pham-anh-hoc-phan-giao-duc-hoc-chuyen-nghiep', '2023-11-29 11:18:37', '2023-11-29 11:18:37', 1, NULL, 0),
(73, 'Tài liệu thi nhập môn lập trình', '55-tai-lieu-thi-nhap-mon-lap-trinh', 'Tài liệu thi nhập môn lập trình', 48, 28, 0, 'pdf', '1591.17 KB', 'https://www.studocu.com/vn', NULL, '123doc-tai-lieu-thi-nhap-mon-lap-trinh', '2023-11-29 11:19:18', '2023-11-29 11:19:18', 1, NULL, 0),
(74, 'Tổng quan về nghiên cứu khoa học', '56-tong-quan-ve-nghien-cuu-khoa-hoc', 'Tổng quan về nghiên cứu khoa học', 48, 28, 0, 'pdf', '244.46 KB', 'https://www.studocu.com/vn', NULL, 'bai-1-tong-quan-ve-nghien-cuu-khoa-hoc', '2023-11-29 11:19:54', '2023-11-29 11:19:54', 1, NULL, 0),
(75, 'Báo cáo tốt nghiệp kỹ thuật số', '57-bao-cao-tot-nghiep-ky-thuat-so', 'Báo cáo tốt nghiệp kỹ thuật số', 48, 28, 0, 'pdf', '2696.69 KB', 'https://www.studocu.com/vn', NULL, 'bao-cao-tn-kts-ky-thuat-so', '2023-11-29 11:20:54', '2023-11-29 11:20:54', 1, NULL, 0),
(76, 'Giáo trình kỹ thuật lập code cho các bạn', '58-giao-trinh-ky-thuat-lap-code-cho-cac-ban', 'Giáo trình kỹ thuật lập code cho các bạn', 48, 28, 0, 'pdf', '3480.5 KB', 'https://www.studocu.com/vn', NULL, 'giao-trinh-ky-that-lap-code-cho-cac-ban', '2023-11-29 11:21:32', '2023-11-29 11:21:32', 1, NULL, 0),
(77, 'Giáo trình nhập môn lập trình', '59-giao-trinh-nhap-mon-lap-trinh', 'Giáo trình nhập môn lập trình', 48, 28, 0, 'pdf', '2149.12 KB', 'https://www.studocu.com/vn', NULL, 'giao-trinh-nhap-mon-lap-trinh', '2023-11-29 11:22:01', '2023-11-29 11:22:01', 1, NULL, 0),
(78, 'Toán cao cấp chương 12', '60-toan-cao-cap-chuong-12', 'Toán cao cấp chương 12', 48, 28, 0, 'pdf', '904.86 KB', 'https://www.studocu.com/vn', NULL, 'toan-cao-cap-1-chuong-12', '2023-11-29 11:22:33', '2023-11-29 11:22:33', 1, NULL, 0),
(79, 'tìm cực trị rời rạc', '61-tim-cuc-tri-roi-rac', 'tìm cực trị rời rạc', 48, 29, 0, 'pdf', '204.53 KB', 'https://www.studocu.com/vn', NULL, 'tim-cuc-tri-roi-rac-abcd', '2023-11-29 11:23:04', '2023-11-29 11:23:04', 1, NULL, 0),
(80, 'Ôn toán lớp 5', '62-on-toan-lop-5', 'Ôn toán lớp 5', 48, 29, 0, 'pdf', '135.87 KB', 'https://www.studocu.com/vn', NULL, 'on-tap-toan-lop-5-chuong-2', '2023-11-29 11:31:19', '2023-11-29 11:31:19', 1, NULL, 0),
(81, 'Lecture notes topology', '63-lecture-notes-topology', 'Cấu trúc liên kết ghi chú bài giảng', 48, 29, 0, 'pdf', '369.16 KB', 'https://www.studocu.com/vn', NULL, 'lecture-notes-topology', '2023-11-29 11:31:57', '2023-11-29 11:31:57', 1, NULL, 0),
(82, 'Đề thi dự đoán số 6 - giải chi tiết', '64-e-thi-du-oan-so-6-giai-chi-tiet', 'Đề thi dự đoán số 6 - giải chi tiết', 48, 29, 0, 'pdf', '322.28 KB', 'https://www.studocu.com/vn', NULL, 'de-thi-du-doan-so-6-48giai-chi-tiet', '2023-11-29 11:32:29', '2023-11-29 11:32:29', 1, NULL, 0),
(83, 'Chia số có 2 chữ số - bải tập', '65-chia-so-co-2-chu-so-bai-tap', 'Chia số có 2 chữ số - bải tập', 48, 29, 0, 'pdf', '96 KB', 'https://www.studocu.com/vn', NULL, 'chia-cho-so-co-2-chu-so-bai-tap', '2023-11-29 11:33:00', '2023-11-29 11:33:00', 1, NULL, 0),
(84, 'Các dạng toán đường bậc hai', '66-cac-dang-toan-uong-bac-hai', 'Các dạng toán đường bậc hai', 48, 29, 0, 'pdf', '750.64 KB', 'https://www.studocu.com/vn', NULL, 'cac-dang-toan-duong-bac-hai', '2023-11-29 11:33:43', '2023-11-29 11:33:43', 1, NULL, 0),
(85, 'Tóm tắt chi tiết sách campbell biology 8th edition', '67-tom-tat-chi-tiet-sach-campbell-biology-8th-edition', 'Tóm tắt chi tiết sách campbell biology 8th edition', 48, 29, 2, 'pdf', '1070.95 KB', 'https://www.studocu.com/vn', NULL, '123doc-tom-tat-chi-tiet-sach-campbell-biology-8th-edition', '2023-11-29 11:34:42', '2023-11-29 11:34:42', 1, NULL, 0),
(86, 'Ứng dụng hệ phương trình bậc nhất 3 ẩn', '68-ung-dung-he-phuong-trinh-bac-nhat-3-an', 'Ứng dụng hệ phương trình bậc nhất 3 ẩn', 48, 29, 0, 'pdf', '618.9 KB', 'https://www.studocu.com/vn', NULL, '44cd1-bai-2-ung-dung-he-phuong-trinh-bac-nhat-ba-an', '2023-11-29 11:35:11', '2023-11-29 11:35:11', 1, NULL, 0),
(87, 'Khắc dấu mạn thuyền - phân tích về truyện ngắn', '69-khac-dau-man-thuyen-phan-tich-ve-truyen-ngan', 'Khắc dấu mạn thuyền - phân tích về truyện ngắn', 48, 30, 0, 'pdf', '192.93 KB', 'https://www.studocu.com/vn', NULL, 'a8-khac-dau-man-thuyen-phan-tich-ve-truyen-ngan', '2023-11-29 11:36:19', '2023-11-29 11:36:19', 1, NULL, 0),
(88, 'Giáo án thuyết phục người khác từ bỏ 1 thói quen', '70-giao-an-thuyet-phuc-nguoi-khac-tu-bo-1-thoi-quen', 'Giáo án thuyết phục người khác từ bỏ 1 thói quen', 48, 30, 0, 'pdf', '163.19 KB', 'https://www.studocu.com/vn', NULL, 'giao-an-thuyet-phuc-nguoi-khac-tu-bo-mot-thoi-quen', '2023-11-29 11:36:51', '2023-11-29 11:36:51', 1, NULL, 0),
(89, 'Hai đứa trẻ - Tác phẩm văn học', '71-hai-ua-tre-tac-pham-van-hoc', 'Hai đứa trẻ - Tác phẩm văn học', 48, 30, 0, 'pdf', '225 KB', 'https://www.studocu.com/vn', NULL, 'hai-dua-tre-su-pham-van-tac-pham-van-hoc-11', '2023-11-29 11:37:28', '2023-11-29 11:37:28', 1, NULL, 0),
(90, 'Lí luận văn học -  HSG lớp 9', '72-li-luan-van-hoc-hsg-lop-9', 'Lí luận văn học -  HSG lớp 9', 48, 30, 2, 'pdf', '171.13 KB', 'https://www.studocu.com/vn', NULL, 'llvh-hsg-li-luan-van-hoc-hsg-lop-9', '2023-11-29 11:38:09', '2023-11-29 11:38:09', 1, NULL, 0),
(91, 'Người sót lại của rừng cười', '73-nguoi-sot-lai-cua-rung-cuoi', 'Người sót lại của rừng cười', 48, 30, 0, 'pdf', '153.95 KB', 'https://www.studocu.com/vn', NULL, 'nguoi-sot-lai-cua-rung-cuoi-nguyen-thi-hao', '2023-11-29 11:38:45', '2023-11-29 11:38:45', 1, NULL, 0),
(92, 'Những bài văn nghị luận xã hội hay nhất', '74-nhung-bai-van-nghi-luan-xa-hoi-hay-nhat', 'Những bài văn nghị luận xã hội hay nhất', 48, 30, 0, 'pdf', '490.03 KB', 'https://www.studocu.com/vn', NULL, 'nhung-bai-van-nghi-luan-xa-hoi-hay-nhat', '2023-11-29 11:41:39', '2023-11-29 11:41:39', 1, NULL, 0),
(93, 'Tài liệu chuyên sâu Vcap', '75-tai-lieu-chuyen-sau-vcap', 'Tài liệu chuyên sâu Vcap', 48, 30, 0, 'pdf', '678.29 KB', 'https://www.studocu.com/vn', NULL, 'tai-lieu-chuyen-sau-vcap', '2023-11-29 11:42:42', '2023-11-29 11:42:42', 1, NULL, 0),
(94, '100 câu trắc nghiệm ôn thi tiếng anh 8', '76-100-cau-trac-nghiem-on-thi-tieng-anh-8', '100 câu trắc nghiệm ôn thi tiếng anh 8', 48, 31, 0, 'pdf', '132.96 KB', 'https://www.studocu.com/vn', NULL, '100-cau-trac-nghiem-on-thi-anh-8', '2023-11-29 20:24:54', '2023-11-29 20:24:54', 1, NULL, 0),
(95, 'Bài tập chia động từ thì hiện tại đơn', '77-bai-tap-chia-ong-tu-thi-hien-tai-on', 'Bài tập chia động từ thì hiện tại đơn', 48, 31, 0, 'pdf', '102.7 KB', 'https://www.studocu.com/vn', NULL, 'bai-tap-chia-dong-tu-thi-hien-tai-don', '2023-11-29 20:25:21', '2023-11-29 20:25:21', 1, NULL, 0),
(96, 'Bộ 20 đề đọc hiểu ngữ văn 8  kì 2', '78-bo-20-e-oc-hieu-ngu-van-8-ki-2', 'Bộ 20 đề đọc hiểu ngữ văn 8  kì 2', 48, 31, 0, 'pdf', '381.26 KB', 'https://www.studocu.com/vn', NULL, 'bo-20-de-doc-hieu-ngu-van-8-ki-2', '2023-11-29 20:25:46', '2023-11-29 20:25:46', 1, NULL, 0),
(97, 'Đề kiểm tra giữa kỳ số 1', '79-e-kiem-tra-giua-ky-so-1', 'Đề kiểm tra giữa kỳ số 1', 48, 31, 0, 'pdf', '137.5 KB', 'https://www.studocu.com/vn', NULL, 'de-kiem-tra-giua-ky-so-1-de-thi-what-is-this-thing-called-science', '2023-11-29 20:26:05', '2023-11-29 20:26:05', 1, NULL, 0),
(98, 'Bảng so sánh Coca và Pepsi', '80-bang-so-sanh-coca-va-pepsi', 'Bảng so sánh Coca và Pepsi', 48, 32, 0, 'pdf', '81.09 KB', 'https://www.studocu.com/vn', NULL, 'bang-so-sanh-coca-va-pepsi', '2023-11-29 20:27:43', '2023-11-29 20:27:43', 1, NULL, 0),
(99, 'Đề cương chi tiết kế toán doanh thu chi phí và xá định kết quả kinh doanh', '81-e-cuong-chi-tiet-ke-toan-doanh-thu-chi-phi-va-xa-inh-ket-qua-kinh-doanh', 'Đề cương chi tiết kế toán doanh thu chi phí và xá định kết quả kinh doanh', 48, 32, 2, 'pdf', '74.5 KB', 'https://www.studocu.com/vn', NULL, 'de-cuong-chi-tiet-ke-toan-doanh-thu-chi-phi-va-xac-dinh-ket-qua-kinh-doanh', '2023-11-29 20:28:18', '2023-11-29 20:28:18', 1, NULL, 0),
(100, 'Đề kiểm tra môn giao thoa văn hóa', '82-e-kiem-tra-mon-giao-thoa-van-hoa', 'Đề kiểm tra môn giao thoa văn hóa', 48, 32, 0, 'pdf', '154.21 KB', 'https://www.studocu.com/vn', NULL, 'de-kiem-tra-mon-giao-thoa-van-hoa-1', '2023-11-29 20:28:50', '2023-11-29 20:28:50', 1, NULL, 0),
(101, 'Lấy ví dụ về quyết định hành chính cá biệt', '83-lay-vi-du-ve-quyet-inh-hanh-chinh-ca-biet', 'Lấy ví dụ về quyết định hành chính cá biệt', 48, 32, 0, 'pdf', '535.7 KB', 'https://www.studocu.com/vn', NULL, 'lay-vi-du-ve-quyet-dinh-hanh-chinh-ca-biet-nhom-1', '2023-11-29 20:29:27', '2023-11-29 20:29:27', 1, NULL, 0),
(102, 'Nhóm 2 Cesim báo cáo cuối kỳ', '84-nhom-2-cesim-bao-cao-cuoi-ky', 'Nhóm 2 Cesim báo cáo cuối kỳ', 48, 32, 0, 'pdf', '338.26 KB', 'https://www.studocu.com/vn', NULL, 'nhom-2-cesim-bao-cao-cuoi-ky', '2023-11-29 20:29:53', '2023-11-29 20:29:53', 1, NULL, 0),
(103, 'Sổ chi tiết các tài khoản', '85-so-chi-tiet-cac-tai-khoan', 'Sổ chi tiết các tài khoản', 48, 32, 0, 'pdf', '141.28 KB', 'https://www.studocu.com/vn', NULL, 'so-chi-tiet-cac-tai-khoan', '2023-11-29 20:30:25', '2023-11-29 20:30:25', 1, NULL, 0),
(104, 'Câu hỏi mẫu 60 CSDL Nâng cao GK', '86-cau-hoi-mau-60-csdl-nang-cao-gk', 'Các câu hỏi mẫu thi giữa kỳ môn cơ sở dữ liệu nâng cao', 8, 26, 2, 'docx', '20.53 KB', NULL, NULL, 'Cau hoi mau 60 csdl nang cao GK', '2023-12-14 06:37:59', '2023-12-14 06:37:59', 1, 60.00, 0),
(105, 'Slide báo cáo lập trình web bán quần áo', '87-slide-bao-cao-lap-trinh-web-ban-quan-ao', 'Slide báo cáo lập trình web bán quần áo bằng ASP NET CORE 6', 8, 26, 0, 'pptx', '7700.84 KB', NULL, NULL, 'Slide', '2023-12-15 02:19:39', '2023-12-15 02:19:39', 1, NULL, 0),
(106, 'Báo cáo đồ án lập trình web bán quần áo', '88-bao-cao-o-an-lap-trinh-web-ban-quan-ao', NULL, 8, 26, 0, 'docx', '10708.32 KB', NULL, NULL, 'Báo cáo', '2023-12-15 02:29:49', '2024-04-13 08:25:52', 1, 90.00, 4),
(107, 'Hướng dẫn viết báo cáo ĐACS', '89-huong-dan-viet-bao-cao-acs', 'Hướng dẫn viết báo cáo Đồ án cơ sở ngành', 8, 26, 0, 'docx', '34.73 KB', NULL, NULL, '4. Huong dan viet DACS nganh', '2023-12-15 02:43:30', '2023-12-15 02:43:30', 1, 100.00, 0),
(108, 'Câu hỏi ôn tập GK môn ATTT', '90-cau-hoi-on-tap-gk-mon-attt', 'Câu hỏi ôn tập GK môn An toàn thông tin', 8, 26, 0, 'docx', '74.6 KB', NULL, NULL, 'Cau hoi on tap GK', '2023-12-15 02:57:01', '2023-12-15 02:57:01', 1, NULL, 0),
(109, 'Ôn thi giữa kỳ môn Trí tuệ nhân tạo', '91-on-thi-giua-ky-mon-tri-tue-nhan-tao', 'Ôn thi giữa kỳ môn Trí tuệ nhân tạo', 8, 26, 0, 'docx', '16.98 KB', NULL, NULL, 'Ôn thi GK', '2023-12-15 02:58:40', '2023-12-15 02:58:40', 1, NULL, 0),
(110, 'Phần writing thi B1', '92-phan-writing-thi-b1', 'Tài liệu Writing thi B1', 8, 31, 0, 'docx', '34.85 KB', NULL, NULL, 'Writing', '2023-12-15 03:04:58', '2024-03-13 20:59:59', 1, NULL, 4),
(111, 'Slide Đếm số ngón tay Python', '93-slide-em-so-ngon-tay-python', 'Slide Đếm số ngón tay bằng Python OpenCV môn Xử lý ảnh', 8, 38, 3, 'pptx', '1782.01 KB', NULL, NULL, 'ĐẾM SNT', '2023-12-18 02:01:47', '2023-12-18 02:01:47', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document_interactions`
--

CREATE TABLE `document_interactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `document_id` bigint UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint UNSIGNED DEFAULT NULL,
  `comment_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `document_interactions`
--

INSERT INTO `document_interactions` (`id`, `user_id`, `document_id`, `action`, `rating`, `comment_id`, `created_at`, `updated_at`) VALUES
(1, 8, 107, 'favorite', NULL, NULL, '2024-04-08 08:45:40', '2024-04-08 08:45:40'),
(2, 8, 106, 'comment', NULL, 13, '2024-04-08 09:00:56', '2024-04-08 09:00:56'),
(3, 8, 105, 'download', NULL, NULL, '2024-04-08 09:02:27', '2024-04-08 09:02:27'),
(4, 8, 106, 'rate', 80, NULL, '2024-04-08 09:02:35', '2024-04-08 09:02:35'),
(5, 8, 104, 'favorite', NULL, NULL, '2024-04-08 09:38:51', '2024-04-08 09:38:51'),
(6, 8, 105, 'download', NULL, NULL, '2024-04-08 09:39:11', '2024-04-08 09:39:11'),
(7, 8, 106, 'comment', NULL, 14, '2024-04-08 09:39:29', '2024-04-08 09:39:29'),
(8, 8, 106, 'rate', 100, NULL, '2024-04-08 09:39:52', '2024-04-08 09:39:52'),
(9, 8, 20, 'download', NULL, NULL, '2024-04-12 09:44:08', '2024-04-12 09:44:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint UNSIGNED NOT NULL,
  `document_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `downloads`
--

INSERT INTO `downloads` (`id`, `document_id`, `created_at`, `updated_at`, `user_id`) VALUES
(6, 55, '2023-11-30 07:27:49', '2023-11-30 07:27:49', 48),
(7, 55, '2023-11-30 07:28:25', '2023-11-30 07:28:25', 8),
(8, 55, '2023-11-30 07:28:27', '2023-11-30 07:28:27', 8),
(9, 55, '2023-11-30 08:14:58', '2023-11-30 08:14:58', 8),
(10, 101, '2023-12-01 02:21:15', '2023-12-01 02:21:15', 48),
(11, 62, '2023-12-14 06:41:14', '2023-12-14 06:41:14', 8),
(12, 107, '2024-01-06 01:48:18', '2024-01-06 01:48:18', 8),
(13, 20, '2024-01-30 04:11:50', '2024-01-30 04:11:50', 8),
(14, 16, '2024-03-12 01:39:42', '2024-03-12 01:39:42', 8),
(15, 20, '2024-03-12 08:26:43', '2024-03-12 08:26:43', 8),
(16, 105, '2024-04-08 09:02:27', '2024-04-08 09:02:27', 8),
(17, 105, '2024-04-08 09:39:11', '2024-04-08 09:39:11', 8),
(18, 20, '2024-04-12 09:44:08', '2024-04-12 09:44:08', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `document_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `document_id`, `created_at`, `updated_at`) VALUES
(2, 8, 16, '2023-11-09 00:30:23', '2023-11-09 00:30:23'),
(3, 8, 17, '2023-11-09 00:58:58', '2023-11-09 00:58:58'),
(7, 48, 55, '2023-11-30 18:11:32', '2023-11-30 18:11:32'),
(9, 48, 101, '2023-12-06 02:13:27', '2023-12-06 02:13:27'),
(15, 8, 20, '2024-01-04 10:13:11', '2024-01-04 10:13:11'),
(17, 8, 43, '2024-01-30 04:13:06', '2024-01-30 04:13:06'),
(18, 8, 21, '2024-01-30 06:36:55', '2024-01-30 06:36:55'),
(23, 8, 27, '2024-04-08 08:30:51', '2024-04-08 08:30:51'),
(24, 8, 26, '2024-04-08 08:31:02', '2024-04-08 08:31:02'),
(26, 8, 31, '2024-04-08 08:32:09', '2024-04-08 08:32:09'),
(27, 8, 111, '2024-04-08 08:32:19', '2024-04-08 08:32:19'),
(30, 8, 110, '2024-04-08 08:34:06', '2024-04-08 08:34:06'),
(31, 8, 109, '2024-04-08 08:39:46', '2024-04-08 08:39:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contents` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `contents`, `created_at`, `updated_at`) VALUES
(1, 'dsfdsf', 'admin@gmail.com', 'fs', '2024-01-11 01:11:24', '2024-01-11 01:11:24'),
(2, 'dsfdsf', 'admin@gmail.com', 'fs', '2024-01-11 01:14:49', '2024-01-11 01:14:49'),
(3, 'haomrvuii@gmail.com', 'haomrvuii@gmail.com', '4353', '2024-01-11 11:49:00', '2024-01-11 11:49:00'),
(4, 'hào', 'maidg1302@gmail.com', '1234', '2024-01-15 18:50:55', '2024-01-15 18:50:55'),
(5, 'hào', 'maidg1302@gmail.com', '678', '2024-01-15 18:51:37', '2024-01-15 18:51:37'),
(6, 'hào', 'maidg1302@gmail.com', '142354567', '2024-01-15 18:51:59', '2024-01-15 18:51:59'),
(7, 'test', 'test@gmail.com', 'test', '2024-01-15 19:00:17', '2024-01-15 19:00:17'),
(8, 'dsfdsf', 'admin@gmail.com', 'fghjkl;', '2024-01-26 02:13:37', '2024-01-26 02:13:37'),
(9, 'test', 'test@gmail.com', 'test', '2024-01-30 04:17:22', '2024-01-30 04:17:22'),
(10, 'test', 'test@gmail.com', 'èghtdgj', '2024-01-30 06:37:52', '2024-01-30 06:37:52'),
(11, 'test', 'test@gmail.com', 'èghtdgj', '2024-01-30 06:37:54', '2024-01-30 06:37:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `files`
--

CREATE TABLE `files` (
  `id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `files`
--

INSERT INTO `files` (`id`, `file`, `size`, `document_id`, `created_at`, `updated_at`, `path`) VALUES
(1, 'ddddddddddddddddđ', '42.75 KB', NULL, '2023-11-08 20:26:02', '2023-11-08 20:40:09', 'D:\\laragon\\www\\DocumentManage\\public\\temp/files/ddddddddddddddddđ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` blob,
  `level` int DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `title`, `slug`, `desc`, `active`, `level`, `parent_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', 'trang-chu', 'Trang chủ', 0x31, 1, NULL, 1, '2023-10-19 02:46:56', '2023-10-19 02:46:56'),
(2, 'Tài liệu', 'tai-lieu', 'Tất cả tài liệu', 0x31, 1, NULL, 2, '2023-10-19 03:29:14', '2023-10-19 03:29:14'),
(3, 'Thành viên', 'thanh-vien', 'Danh sách các thành viên', 0x31, 1, NULL, 3, '2023-10-20 00:52:39', '2023-10-20 00:52:39'),
(4, 'Giới thiệu', 'gioi-thieu', 'Giới thiệu về trang web', 0x31, 1, NULL, 4, '2023-10-20 00:53:48', '2023-10-20 00:53:48'),
(5, 'Liên hệ', 'lien-he', 'Thông tin liên hệ về trang web', 0x31, 1, NULL, 5, '2023-10-20 00:54:06', '2023-10-20 00:54:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_27_021732_create_sessions_table', 1),
(7, '2023_09_27_030353_create_users_admins_table', 2),
(8, '2023_09_27_030600_update_user', 2),
(9, '2023_09_27_030818_update_user', 3),
(10, '2023_09_27_031919_update_user_admin', 4),
(11, '2023_09_27_032154_update_user', 5),
(12, '2023_09_27_041056_update_user', 6),
(13, '2023_09_27_041344_update_user', 7),
(14, '2023_09_28_163105_create_profiles_table', 8),
(15, '2023_09_29_155411_update_cates', 9),
(16, '2023_10_01_023047_update_cates', 10),
(17, '2023_10_01_085351_update_cates', 11),
(18, '2023_10_07_095244_update_user', 12),
(19, '2023_10_09_033226_create_statuses_table', 13),
(20, '2023_10_09_145856_update_document', 14),
(21, '2023_10_09_152916_update_document', 15),
(22, '2023_10_10_010445_update_document', 16),
(23, '2023_10_10_022337_update_document', 17),
(24, '2023_10_10_023642_update_document', 18),
(25, '2023_10_10_030625_update_document', 19),
(26, '2023_10_11_032540_create_tags_table', 20),
(27, '2023_10_18_025429_update_document', 21),
(28, '2023_10_18_042231_create_menus_table', 22),
(29, '2023_10_20_023508_update_document', 23),
(30, '2023_10_20_080549_create_files_table', 24),
(31, '2023_10_22_085448_update_document', 25),
(32, '2023_10_24_011804_create_comments_table', 26),
(33, '2023_10_24_024518_update_comment', 27),
(34, '2023_10_28_030326_update_file', 28),
(35, '2023_10_28_030910_update_document', 29),
(36, '2023_10_28_032336_create_favourites_table', 30),
(37, '2023_10_28_073612_create_rates_table', 31),
(38, '2023_10_29_033501_update_download', 32),
(39, '2023_10_30_172459_create_settings_table', 33),
(40, '2023_11_07_020918_create_views_table', 34),
(41, '2023_12_06_095715_update_user', 35),
(42, '2023_12_12_033234_create_slides_table', 36),
(43, '2023_12_12_035615_update_slide', 37),
(44, '2023_12_28_022955_update_tag', 38),
(45, '2024_01_05_155050_create_feedback_table', 39),
(46, '2024_02_21_160255_update_doc', 40),
(47, '2024_03_13_144000_update_doc', 41),
(48, '2024_03_14_041658_update_user', 42),
(49, '2024_03_14_044427_create_history_payment', 43),
(50, '2024_04_08_140634_create_doc_interactions_table', 44),
(51, '2024_03_14_143412_create_history_payment', 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('haomrvuii@gmail.com', '$2y$10$KpbqiA3yCbqJssDinsSri.qHGTxaWZTpSC.eN.C/02YpUZWA/YuK2', '2023-12-08 01:01:17'),
('hien60k2@gmail.com', '$2y$10$MwGsCMBqwikTgMTWw9k.d.LQ1CL6uNutvqb/y5aFBANptg6F307NG', '2023-10-02 18:35:24'),
('maidg1302@gmail.com', '$2y$10$gVyowMR/mBinsunacTEm2.8fVk5kuzw6E62CxTWIvXVaSuged0Lq.', '2023-09-29 02:09:04'),
('test@gmail.com', '$2y$10$G3c1OnHRPsGXmFtQWbkTKuyc8ZRWfoSy4CTvniiTwZ9vwqleqy56.', '2023-09-26 21:40:46'),
('tuankw160202@gmail.com', '$2y$10$QPGaBmGVOBXxjuL9OnzDIuqOdvaXvatf5waRrYI6uMsbkYDhQrgTa', '2023-09-29 02:07:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_histories`
--

CREATE TABLE `payment_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `amount_money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TransactionStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `BankCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TransactionNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0:chưa thanh toán, 1:đã thanh toán,  2:Hủy',
  `vnp_BankTranNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vnp_ResponseCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_histories`
--

INSERT INTO `payment_histories` (`id`, `order_code`, `user_id`, `amount_money`, `card_number`, `TransactionStatus`, `BankCode`, `TransactionNo`, `payment_status`, `vnp_BankTranNo`, `vnp_ResponseCode`, `created_at`, `updated_at`) VALUES
(1, 'HL6C5DUBVA', 8, '10000', NULL, '1', 'NCB', '14377535', NULL, 'VNP14377535', '00', '2024-04-13 14:55:39', '2024-04-13 08:04:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `document_id` bigint UNSIGNED DEFAULT NULL,
  `rates` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `document_id`, `rates`, `created_at`, `updated_at`) VALUES
(2, 8, 16, 40.00, '2023-11-08 21:03:06', '2023-11-08 21:03:06'),
(3, 8, 16, 40.00, '2023-11-08 21:03:31', '2023-11-08 21:03:31'),
(4, 8, 16, 40.00, '2023-11-08 21:04:07', '2023-11-08 21:04:07'),
(5, 8, 16, 40.00, '2023-11-08 21:04:44', '2023-11-08 21:04:44'),
(6, 8, 16, 40.00, '2023-11-08 21:04:53', '2023-11-08 21:04:53'),
(7, 8, 16, 80.00, '2023-11-08 21:05:31', '2023-11-08 21:05:31'),
(8, 8, 16, 40.00, '2023-11-08 21:06:14', '2023-11-08 21:06:14'),
(9, 8, 17, 60.00, '2023-11-09 01:23:09', '2023-11-09 01:23:09'),
(10, 8, 17, 100.00, '2023-11-09 01:26:13', '2023-11-09 01:26:13'),
(11, 8, 17, 100.00, '2023-11-09 01:27:41', '2023-11-09 01:27:41'),
(12, 8, 17, 60.00, '2023-11-09 02:35:28', '2023-11-09 02:35:28'),
(13, 8, 17, 40.00, '2023-11-09 02:50:17', '2023-11-09 02:50:17'),
(14, 8, 17, 100.00, '2023-11-09 03:08:15', '2023-11-09 03:08:15'),
(15, 8, 17, 40.00, '2023-11-09 03:13:03', '2023-11-09 03:13:03'),
(16, 8, 16, 0.00, '2023-11-09 03:18:39', '2023-11-09 03:18:39'),
(17, 8, 16, 40.00, '2023-11-10 02:05:39', '2023-11-10 02:05:39'),
(18, 8, 16, 40.00, '2023-11-10 02:06:04', '2023-11-10 02:06:04'),
(19, 8, 16, 40.00, '2023-11-10 10:21:56', '2023-11-10 10:21:56'),
(20, 8, 16, 40.00, '2023-11-10 10:24:00', '2023-11-10 10:24:00'),
(21, 8, 17, 71.00, '2023-11-10 10:25:19', '2023-11-10 10:25:19'),
(22, 8, 17, 71.00, '2023-11-10 10:25:27', '2023-11-10 10:25:27'),
(23, 8, 17, 71.00, '2023-11-10 10:25:34', '2023-11-10 10:25:34'),
(24, 8, 17, 100.00, '2023-11-10 10:28:27', '2023-11-10 10:28:27'),
(25, 8, 16, 100.00, '2023-11-10 10:28:39', '2023-11-10 10:28:39'),
(26, 8, 16, 100.00, '2023-11-10 18:15:04', '2023-11-10 18:15:04'),
(27, 8, 17, 100.00, '2023-11-10 19:27:35', '2023-11-10 19:27:35'),
(28, 48, 20, 80.00, '2023-12-04 20:49:49', '2023-12-04 20:49:49'),
(29, 48, 59, 100.00, '2023-12-04 21:17:53', '2023-12-04 21:17:53'),
(30, 48, 20, 80.00, '2023-12-04 21:24:03', '2023-12-04 21:24:03'),
(31, 48, 20, 20.00, '2023-12-04 21:24:10', '2023-12-04 21:24:10'),
(32, 48, 59, 60.00, '2023-12-04 21:25:13', '2023-12-04 21:25:13'),
(33, 8, 58, 60.00, '2023-12-13 21:12:04', '2023-12-13 21:12:04'),
(34, 8, 104, 60.00, '2023-12-14 08:11:04', '2023-12-14 08:11:04'),
(35, 8, 37, 80.00, '2023-12-15 05:44:40', '2023-12-15 05:44:40'),
(36, 8, 37, 80.00, '2023-12-15 05:44:42', '2023-12-15 05:44:42'),
(37, 8, 37, 80.00, '2023-12-15 05:44:42', '2023-12-15 05:44:42'),
(38, 8, 37, 80.00, '2023-12-15 05:44:42', '2023-12-15 05:44:42'),
(39, 8, 37, 80.00, '2023-12-15 05:44:53', '2023-12-15 05:44:53'),
(40, 8, 37, 100.00, '2023-12-15 05:45:00', '2023-12-15 05:45:00'),
(41, 8, 37, 0.00, '2023-12-15 05:45:02', '2023-12-15 05:45:02'),
(42, 8, 37, 0.00, '2023-12-15 05:45:02', '2023-12-15 05:45:02'),
(43, 8, 37, 0.00, '2023-12-15 05:45:02', '2023-12-15 05:45:02'),
(44, 8, 37, 0.00, '2023-12-15 05:45:02', '2023-12-15 05:45:02'),
(45, 8, 37, 0.00, '2023-12-15 05:45:03', '2023-12-15 05:45:03'),
(46, 8, 37, 0.00, '2023-12-15 05:45:03', '2023-12-15 05:45:03'),
(47, 8, 37, 0.00, '2023-12-15 05:45:03', '2023-12-15 05:45:03'),
(48, 8, 37, 0.00, '2023-12-15 05:45:03', '2023-12-15 05:45:03'),
(49, 8, 37, 0.00, '2023-12-15 05:45:03', '2023-12-15 05:45:03'),
(50, 8, 37, 0.00, '2023-12-15 05:45:03', '2023-12-15 05:45:03'),
(51, 8, 37, 0.00, '2023-12-15 05:45:04', '2023-12-15 05:45:04'),
(52, 8, 37, 0.00, '2023-12-15 05:45:04', '2023-12-15 05:45:04'),
(53, 8, 37, 100.00, '2024-01-06 01:32:20', '2024-01-06 01:32:20'),
(54, 8, 107, 100.00, '2024-01-06 01:53:23', '2024-01-06 01:53:23'),
(55, 8, 106, 80.00, '2024-04-08 09:02:35', '2024-04-08 09:02:35'),
(56, 8, 106, 100.00, '2024-04-08 09:39:52', '2024-04-08 09:39:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kBPW1zy60akpcQXBE5d8L81tky3CPvnXW4GDInyS', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36 Edg/123.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidjQxV3o4M3dqc2plZmQ5VW83N1RMc3BUTkJXdEpwdTc5em5JeFZwQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzE6Imh0dHA6Ly9kb2N1bWVudG1hbmFnZS50ZXN0L2NoaXRpZXQvMzktY2F1LWhvaS10cmFjLW5naGllbS1tYW5nLW1heS10aW5oIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODt9', 1713023295);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `score_register` int DEFAULT NULL,
  `score_doc_ok` int DEFAULT NULL,
  `docs_home` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `score_register`, `score_doc_ok`, `docs_home`, `created_at`, `updated_at`) VALUES
(1, 8, 3, 8, NULL, '2024-03-13 01:57:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `title`, `link`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Bí quyết tăng nhanh điểm kiểm tra lớp 10', 'https://topclass.hocmai.vn/topclass10-ph?utm_campaign=B.HT.HT10._WebsiteHocmai.BannerSlideTrangChu_Maintn3_Topclass10.Thang102023.0410_ContentHub.._All_._LDP366&utm_medium=Maintn3', 'bi-quyet-tang-nhanh-diem-kiem-tra-lop-10.jpg', 0x31, '2023-12-12 10:00:24', '2023-12-12 10:00:24'),
(2, 'Luyện thi đánh giá tư duy', 'https://gppat.hocmai.vn/hust-new?utm_campaign=B.LT.PATHUST._WebsiteHocmai.BannerSlideTrangChu_Phuongpa_PATHUST.0607_Phuongpa.._All_._LDP364&utm_medium=Phuongpa', 'luyen-thi-danh-gia-tu-duy.jpg', 0x31, '2023-12-12 10:03:26', '2023-12-12 10:03:26'),
(3, 'Thi thử đánh giá tư duy', 'https://luyenthihieuqua.hocmai.vn/thithudgtd2024-ott?utm_campaign=B.LT.THITHUDGTD._WebsiteHocmai.BannerSlideTrangChu_Dieuttm_ThithuHUSTt12.LT.THITHUDGTD.0812_Dieuttm.._._._LDP420&utm_medium=Dieuttm&utm_source=ThithuHUSTt12.LT.THITHUDGTD.0812', 'thi-thu-danh-gia-tu-duy.jpg', 0x31, '2023-12-12 10:15:16', '2023-12-12 10:15:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Đã duyệt', '2023-10-09 06:57:49', '2023-10-09 07:44:49'),
(2, 'Đang  chờ', '2023-10-09 07:34:03', '2023-10-09 07:34:03'),
(3, 'Không  được duyệt', '2023-10-09 07:34:17', '2023-10-09 07:34:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_id` int DEFAULT NULL,
  `cate_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `slug`, `document_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(1, 'Lập trình', '6-lap-trinh', 73, 26, '2023-11-10 19:29:14', '2024-01-03 19:30:47'),
(2, 'Kỹ thuật', '6-ky-thuat', 56, 26, '2023-12-14 06:58:20', '2024-01-03 19:31:41'),
(3, 'Bài tập lập trình', '6-bai-tap-lap-trinh', 73, 28, '2023-12-15 02:43:41', '2024-01-03 19:32:41'),
(4, 'trí tuệ nhân tạo', '6-tri-tue-nhan-tao', 56, 26, '2023-12-15 02:58:40', '2024-01-03 19:35:00'),
(5, 'Tiếng anh', '6-tieng-anh', 110, 31, '2023-12-15 03:04:58', '2024-01-03 19:38:55'),
(6, 'xử lý ảnh', '6-xu-ly-anh', 73, 26, '2023-12-18 02:01:47', '2024-01-03 19:38:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `level` int DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` int DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_money` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `date`, `level`, `avatar`, `sex`, `score`, `remember_token`, `created_at`, `updated_at`, `payment_money`) VALUES
(8, 'Phan Duy Hào1234dsfdsf', 'haomrvuii@gmail.com', NULL, '$2y$10$yBgPfB7z7LNBlDWI/bnhn.9GXuqZJQ4PD.zbPYXNe8j.bBzUy47sq', 'admin', NULL, NULL, 1, 'phan-duy-hao1234dsfdsf.jpg', NULL, 11, NULL, '2023-09-27 10:28:19', '2024-04-13 08:04:57', '0'),
(19, 'Tho Mai Huy', 'test@vinhuni.edu.vn', NULL, '$2y$10$M2WpUN7lwxyyB8b55bG1IuuH.OXgow6W.gfuS9K57iCI/j1z/g0xu', 'user', NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-10-02 19:06:39', '2023-10-02 19:06:39', '0'),
(48, 'Duy Hào123567', 'hao@gmail.com', NULL, '$2y$10$NAYieRu9VdcTt8YFet/va..CBm2nBSp6PdIzgS6skHKFG7.J/AIyy', 'admin', '0855840100', '2023-12-11', 1, 'duy-hao123567.jpg', 'Nam', 0, NULL, '2023-10-07 19:47:49', '2023-12-07 21:19:29', '0'),
(49, 'Tho Mai Huy', '19574802010116@vinhuni.edu.vn', NULL, '$2y$10$UZDupdWr2Z5Ph7DYwSfQnulOB0VN4F4fO7Kf5k4fkH1BkDmIqP/gC', 'admin', NULL, NULL, 1, 'tho-mai-huy.jpg', NULL, 0, NULL, '2023-10-07 20:19:47', '2023-10-07 20:19:47', '0'),
(51, 'test', 'nguyenbaolam122013@gmail.com', NULL, '$2y$10$.XDbO4srzNuHrENi7/weDul5G8opK0IbsCrdoTXimvVVIbLoCzpGq', 'user', NULL, NULL, 0, NULL, NULL, 0, NULL, '2023-10-30 19:33:05', '2023-10-30 19:33:05', '0'),
(52, 'test', 'test@gmail.com', NULL, '$2y$10$NLEFlyLzfyTN/CC7/Eslt.lV83UEQB5Sb.Fv3QfCzuuGnIpjdveU2', 'user', NULL, NULL, 0, NULL, NULL, 8, NULL, '2023-10-30 19:44:58', '2023-12-08 01:58:16', '0'),
(62, 'sdafdf', 'hgd@gmail.com', NULL, '$2y$10$sppxvJSTFG/CLNYq0DD8sO2WAYn7Nng/DA76Rrip6hlEIiV4srG9u', 'admin', NULL, NULL, 1, 'sdafdf.jpg', NULL, 0, NULL, '2023-11-08 11:24:19', '2023-12-08 02:26:44', '0'),
(63, 'sdf', 'sdfsd@gmail.com', NULL, '$2y$10$GtJEKXadpU9oLTfd816Co.goo1VP3SFw63xV/JEV1DtaoT5VmVaxu', 'admin', NULL, NULL, 1, 'sdf.jpg', NULL, 0, NULL, '2023-11-09 00:46:19', '2023-11-09 00:46:19', '0'),
(64, 'ghgfhgfh', 'fghfgh@gmail.com', NULL, '$2y$10$sOQv7ciDNDoDh8gMclgCcOMgyMqw51TZ8Sogu.3Xjv2Xd/cPDxxUC', 'admin', NULL, NULL, 1, 'ghgfhgfh.jpg', NULL, 0, NULL, '2023-12-02 09:46:22', '2023-12-02 09:46:22', '0'),
(65, 'ghgfhkjkjkjk', 'ghgfhkjkjkjk@gmail.com', NULL, '$2y$10$nxlnrncPFXPHyk1dRxjAquBUNcu3bhAd4TZ6R2OLPvHLXxw0RsSSG', 'admin', NULL, NULL, 1, 'ghgfhkjkjkjk.jpg', NULL, 0, NULL, '2023-12-02 20:27:39', '2023-12-02 20:27:39', '0'),
(66, 'qưe132', 'qưe132@gmail.com', NULL, '$2y$10$QvW3LBLV3GWc5XTNt8q4a.KRZdYcvJ3FjINYZviKvV6KH.RERbBPK', 'admin', NULL, NULL, 1, 'que132.jpg', NULL, 0, NULL, '2023-12-02 20:30:37', '2023-12-02 20:30:37', '0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`),
  ADD KEY `documents_cate_id_foreign` (`cate_id`),
  ADD KEY `documents_status_foreign` (`status`);

--
-- Chỉ mục cho bảng `document_interactions`
--
ALTER TABLE `document_interactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_interactions_user_id_foreign` (`user_id`),
  ADD KEY `document_interactions_document_id_foreign` (`document_id`),
  ADD KEY `document_interactions_comment_id_foreign` (`comment_id`);

--
-- Chỉ mục cho bảng `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloads_user_id_foreign` (`user_id`),
  ADD KEY `document_id` (`document_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`),
  ADD KEY `favourites_document_id_foreign` (`document_id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `payment_histories`
--
ALTER TABLE `payment_histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_histories_order_code_unique` (`order_code`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_user_id_foreign` (`user_id`),
  ADD KEY `rates_document_id_foreign` (`document_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `document_interactions`
--
ALTER TABLE `document_interactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `payment_histories`
--
ALTER TABLE `payment_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documents_status_foreign` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `document_interactions`
--
ALTER TABLE `document_interactions`
  ADD CONSTRAINT `document_interactions_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `document_interactions_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `document_interactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;