INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`) 
VALUES 
	(1, 'Danh mục sản phẩm', 'Danh mục sản phẩm', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '0'),
	(2, 'Xem danh mục', 'Xem danh sách danh mục sản phẩm', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '1'),
	(3, 'Thêm danh mục', 'Thêm mới danh mục sản phẩm', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '1'),
	(4, 'Sửa danh mục', 'Cập nhật danh mục sản phẩm', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '1'),
	(5, 'Xóa danh mục', 'Xóa danh mục sản phẩm', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '1');

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`) 
VALUES 
	(6, 'Menu', 'Menu', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '0'),
	(7, 'Xem menu', 'Xem danh sách menu', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '6'),
	(8, 'Thêm menu', 'Thêm mới menu', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '6'),
	(9, 'Sửa menu', 'Cập nhật menu', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '6'),
	(10, 'Xóa menu', 'Xóa menu', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '6');

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`) 
VALUES 
	(11, 'Sản phẩm', 'Sản phẩm', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '0'),
	(12, 'Xem sản phẩm', 'Xem danh sách sản phẩm', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '11'),
	(13, 'Thêm sản phẩm', 'Thêm mới sản phẩm', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '11'),
	(14, 'Sửa sản phẩm', 'Cập nhật sản phẩm', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '11'),
	(15, 'Xóa sản phẩm', 'Xóa sản phẩm', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '11');

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`) 
VALUES 
	(16, 'Slider', 'Slider', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '0'),
	(17, 'Xem slider', 'Xem danh sách slider', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '16'),
	(18, 'Thêm slider', 'Thêm mới slider', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '16'),
	(19, 'Sửa slider', 'Cập nhật slider', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '16'),
	(20, 'Xóa slider', 'Xóa slider', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '16');

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`) 
VALUES 
	(21, 'Cấu hình', 'Cấu hình', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '0'),
	(22, 'Xem cấu hình', 'Xem danh sách cấu hình', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '21'),
	(23, 'Thêm cấu hình', 'Thêm mới cấu hình', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '21'),
	(24, 'Sửa cấu hình', 'Cập nhật cấu hình', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '21'),
	(25, 'Xóa cấu hình', 'Xóa cấu hình', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '21');

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`) 
VALUES 
	(26, 'Tài khoản', 'Tài khoản', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '0'),
	(27, 'Xem tài khoản', 'Xem danh sách tài khoản', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '26'),
	(28, 'Thêm tài khoản', 'Thêm mới tài khoản', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '26'),
	(29, 'Sửa tài khoản', 'Cập nhật tài khoản', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '26'),
	(30, 'Xóa tài khoản', 'Xóa tài khoản', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '26');

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`) 
VALUES 
	(31, 'Tài khoản', 'Tài khoản', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '0'),
	(32, 'Xem nhóm tài khoản', 'Xem danh sách nhóm tài khoản', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '31'),
	(33, 'Thêm nhóm tài khoản', 'Thêm mới nhóm tài khoản', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '31'),
	(34, 'Sửa nhóm tài khoản', 'Cập nhật nhóm tài khoản', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '31'),
	(35, 'Xóa nhóm tài khoản', 'Xóa nhóm tài khoản', '2021-02-19 00:00:00', '2021-02-19 00:00:00', '31');



