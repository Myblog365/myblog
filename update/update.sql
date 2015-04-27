ALTER TABLE `zswin_file` ADD COLUMN `download`  int(10) NOT NULL DEFAULT '0' COMMENT '更新时间' AFTER `size`;
DELETE FROM `zswin_config` WHERE `id` = 48;
DELETE FROM `zswin_config` WHERE `id` = 25;
DELETE FROM `zswin_config` WHERE `id` = 32;
DELETE FROM `zswin_config` WHERE `id` = 33;
DELETE FROM `zswin_config` WHERE `id` = 34;
DELETE FROM `zswin_config` WHERE `id` = 54;
DELETE FROM `zswin_config` WHERE `id` = 57;

INSERT INTO `zswin_config` VALUES
(24, 'NICK_NAME_BAOLIU', 1, '', 3, '', '', 1388845937, 1388845937, 1, '', 0),
(48, 'VERIFY_OPEN', 1, '', 4, '', '', 1388500332, 1388500800, 1, '1,2,3', 0);