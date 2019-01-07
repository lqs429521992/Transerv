SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_tcp
-- ----------------------------
DROP TABLE IF EXISTS `tb_tcp`;
CREATE TABLE `tb_tcp`  (
  `user_id` varchar(17) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `net_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_ws
-- ----------------------------
DROP TABLE IF EXISTS `tb_ws`;
CREATE TABLE `tb_ws`  (
  `user_id` varchar(17) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `net_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
