DROP TABLE IF EXISTS `t_gift`;
CREATE TABLE `t_gift`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `number` int(10) NOT NULL DEFAULT 0,
  `desciption` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;


INSERT INTO `t_gift` VALUES (1, '礼品1', 220, '', '');

DROP TABLE IF EXISTS `t_member`;
CREATE TABLE `t_member`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '姓名',
  `phone_number` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '地址',
  `gift_id` int(10) NOT NULL DEFAULT 0 COMMENT '礼品ID',
  `get_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '获取方式',
  `create_time` datetime(0) NULL DEFAULT '1001-01-01 00:00:00' COMMENT '领取时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `phone`(`phone_number`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

INSERT INTO `t_member` VALUES (1, 'ceshi', '13333333333', '北京市徜徉去1', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (2, 'ceshi', '13311111111', '北京市徜徉去2', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (3, 'ceshi', '13333332222', '北京市徜徉去3', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (4, 'ceshi', '13331111434', '北京市徜徉去4', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (5, 'ceshi', '13333337899', '北京市徜徉去5', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (6, 'ceshi', '13333331245', '北京市徜徉去6', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (7, 'ceshi', '13333846363', '北京市徜徉去7', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (8, 'ceshi', '13333335235', '北京市徜徉去8', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (9, 'ceshi', '13333342677', '北京市徜徉去9', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (10, 'ceshi', '13330898577', '北京市徜徉去10', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (11, 'ceshi', '13333756334', '北京市徜徉去11', 1, '自取', '2019-12-06 14:29:59');
INSERT INTO `t_member` VALUES (13, 'ceshi', '18223333333', '北京市徜徉去', 1, '自取', '2019-12-07 17:54:42');
INSERT INTO `t_member` VALUES (14, 'ceshi', '18223333331', '北京市徜徉去', 1, '自取', '2019-12-07 17:54:52');