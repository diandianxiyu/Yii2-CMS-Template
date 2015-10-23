-- phpMyAdmin SQL Dump
-- version 4.5.0-rc1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-10-23 12:53:04
-- 服务器版本： 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2_admin`
--
CREATE DATABASE IF NOT EXISTS `yii2_admin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `yii2_admin`;

-- --------------------------------------------------------

--
-- 表的结构 `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `realname` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `edit_time` datetime NOT NULL COMMENT '修改时间',
  `sort` tinyint(1) NOT NULL DEFAULT '0' COMMENT '序号',
  `disabled` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `userhead` text NOT NULL COMMENT '用户头像'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `realname`, `add_time`, `edit_time`, `sort`, `disabled`, `userhead`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'admin', '2015-03-26 14:23:00', '2015-10-23 11:14:49', 0, 0, 'http://gomeng.oss-cn-qingdao.aliyuncs.com/1391f246f3c8d163cc37a32b2b2ba85c.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('supermanAdmin', '1', 1443172686);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('AdminuserCreate', 2, '', NULL, NULL, 1442822018, 1442822018),
('AdminuserDelete', 2, '', NULL, NULL, 1442822018, 1442822018),
('AdminuserDisabled', 2, '', NULL, NULL, 1442822018, 1442822018),
('AdminuserIndex', 2, '管理员首页', NULL, NULL, 1442822018, 1442822018),
('AdminUserParent', 2, '用户管理－菜单', NULL, NULL, 1428996402, 1428996402),
('AdminuserUpdate', 2, '', NULL, NULL, 1442822018, 1442822018),
('AdminuserUphead', 2, '', NULL, NULL, 1442822018, 1442822018),
('AdminuserView', 2, '', NULL, NULL, 1442822018, 1442822018),
('ArticleIndex', 2, '稿件列表', NULL, NULL, 1442568546, 1442568546),
('ArticleTrash', 2, '稿件 回收站列表', NULL, NULL, 1442571389, 1442571389),
('AssignmentCreate', 2, '', NULL, NULL, 1442822018, 1442822018),
('AssignmentIndex', 2, '', NULL, NULL, 1442822018, 1442822018),
('LoginLogin', 2, '', NULL, NULL, 1442822018, 1442822018),
('LoginLogout', 2, '', NULL, NULL, 1442822018, 1442822018),
('Menu2Tools', 2, '工具总菜单的管理', NULL, NULL, 1442544858, 1442544858),
('MenuCreate', 2, '', NULL, NULL, 1443171494, 1443171494),
('MenuDelete', 2, '', NULL, NULL, 1443171494, 1443171494),
('MenuIcon', 2, '', NULL, NULL, 1443171494, 1443171494),
('MenuIndex', 2, '', NULL, NULL, 1443171494, 1443171494),
('MenuParent', 2, '菜单管理', NULL, NULL, 1428994538, 1428994538),
('MenuUpdate', 2, '', NULL, NULL, 1443171494, 1443171494),
('MenuView', 2, '', NULL, NULL, 1443171494, 1443171494),
('MultifunctionsCreatefunc', 2, '', NULL, NULL, 1442822018, 1442822018),
('MultifunctionsDeletefunc', 2, '', NULL, NULL, 1442822018, 1442822018),
('MultifunctionsIndex', 2, '', NULL, NULL, 1442822018, 1442822018),
('MultifunctionsUpdatefunc', 2, '', NULL, NULL, 1442822018, 1442822018),
('PermissionParent', 2, '权限管理－菜单', NULL, NULL, 1428996377, 1428996377),
('RoleCreate', 2, '', NULL, NULL, 1442822018, 1442822018),
('RoleDelete', 2, '', NULL, NULL, 1442822018, 1442822018),
('RoleIndex', 2, '', NULL, NULL, 1442822018, 1442822018),
('RoleSharechild', 2, '', NULL, NULL, 1442822018, 1442822018),
('RoleUpdate', 2, '', NULL, NULL, 1442822018, 1442822018),
('RoleView', 2, '', NULL, NULL, 1442822018, 1442822018),
('RoleViewchild', 2, '', NULL, NULL, 1442822018, 1442822018),
('SiteError', 2, '', NULL, NULL, 1443172234, 1443172234),
('SiteIndex', 2, '', NULL, NULL, 1442822018, 1442822018),
('SiteLogin', 2, '', NULL, NULL, 1442822018, 1442822018),
('SiteLogout', 2, '', NULL, NULL, 1442822018, 1442822018),
('supermanAdmin', 1, '超级管理员', NULL, NULL, 1428650053, 1428686784),
('UserprofileOldpwd', 2, '', NULL, NULL, 1442822018, 1442822018),
('UserprofileUphead', 2, '', NULL, NULL, 1442822018, 1442822018),
('UserprofileUppwd', 2, '', NULL, NULL, 1442822018, 1442822018),
('UserprofileUprealname', 2, '', NULL, NULL, 1442822018, 1442822018),
('UserprofileUserinfo', 2, '', NULL, NULL, 1442822018, 1442822018),
('VersionupCreate', 2, '', NULL, NULL, 1442822018, 1442822018),
('VersionupDelete', 2, '', NULL, NULL, 1442822018, 1442822018),
('VersionupIndex', 2, '', NULL, NULL, 1442822018, 1442822018),
('VersionupJin', 2, '', NULL, NULL, 1442822018, 1442822018),
('VersionupQi', 2, '', NULL, NULL, 1442822018, 1442822018),
('VersionupUpdate', 2, '', NULL, NULL, 1442822018, 1442822018);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('supermanAdmin', 'AdminuserCreate'),
('supermanAdmin', 'AdminuserDelete'),
('supermanAdmin', 'AdminuserDisabled'),
('supermanAdmin', 'AdminuserIndex'),
('supermanAdmin', 'AdminUserParent'),
('supermanAdmin', 'AdminuserUpdate'),
('supermanAdmin', 'AdminuserUphead'),
('supermanAdmin', 'AdminuserView'),
('supermanAdmin', 'ArticleIndex'),
('supermanAdmin', 'ArticleTrash'),
('supermanAdmin', 'AssignmentCreate'),
('supermanAdmin', 'AssignmentIndex'),
('supermanAdmin', 'LoginLogin'),
('supermanAdmin', 'LoginLogout'),
('supermanAdmin', 'Menu2Tools'),
('supermanAdmin', 'MenuCreate'),
('supermanAdmin', 'MenuDelete'),
('supermanAdmin', 'MenuIcon'),
('supermanAdmin', 'MenuIndex'),
('supermanAdmin', 'MenuParent'),
('supermanAdmin', 'MenuUpdate'),
('supermanAdmin', 'MenuView'),
('supermanAdmin', 'MultifunctionsCreatefunc'),
('supermanAdmin', 'MultifunctionsDeletefunc'),
('supermanAdmin', 'MultifunctionsIndex'),
('supermanAdmin', 'MultifunctionsUpdatefunc'),
('supermanAdmin', 'PermissionParent'),
('supermanAdmin', 'RoleCreate'),
('supermanAdmin', 'RoleDelete'),
('supermanAdmin', 'RoleIndex'),
('supermanAdmin', 'RoleSharechild'),
('supermanAdmin', 'RoleUpdate'),
('supermanAdmin', 'RoleView'),
('supermanAdmin', 'RoleViewchild'),
('supermanAdmin', 'SiteError'),
('supermanAdmin', 'SiteIndex'),
('supermanAdmin', 'SiteLogin'),
('supermanAdmin', 'SiteLogout'),
('supermanAdmin', 'UserprofileOldpwd'),
('supermanAdmin', 'UserprofileUphead'),
('supermanAdmin', 'UserprofileUppwd'),
('supermanAdmin', 'UserprofileUprealname'),
('supermanAdmin', 'UserprofileUserinfo'),
('supermanAdmin', 'VersionupCreate'),
('supermanAdmin', 'VersionupDelete'),
('supermanAdmin', 'VersionupIndex'),
('supermanAdmin', 'VersionupJin'),
('supermanAdmin', 'VersionupQi'),
('supermanAdmin', 'VersionupUpdate');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '主键',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父节点',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '访问路径',
  `sort` tinyint(1) NOT NULL DEFAULT '0' COMMENT '排序',
  `auth_item` varchar(150) NOT NULL DEFAULT '' COMMENT '认证权限',
  `icon` varchar(100) DEFAULT NULL COMMENT '图标名称',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `controller_tag` varchar(255) DEFAULT NULL COMMENT '菜单选中标记',
  `action_tag` varchar(255) DEFAULT NULL COMMENT '菜单选中标记'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent_id`, `url`, `sort`, `auth_item`, `icon`, `create_at`, `update_at`, `controller_tag`, `action_tag`) VALUES
(1, 'Menu management', 0, '', 0, 'MenuParent', 'fa fa-navicon', NULL, NULL, 'menu', ''),
(2, 'Authority management', 0, '', 0, 'PermissionParent', 'fa  fa-cogs', NULL, NULL, 'permission,role', ''),
(3, 'User management', 0, '', 1, 'AdminUserParent', 'fa fa-group ', NULL, NULL, 'adminuser', ''),
(4, 'Menu list', 1, 'menu/index', 0, 'MenuIndex', 'fa  fa-navicon', NULL, NULL, '', 'menu/index,menu/create,menu/update,menu/view'),
(5, 'Permission list', 2, 'permission/index', 0, 'PermissionIndex', 'fa  fa-institution', NULL, NULL, '', 'permission/index,permission/create,permission/update,permission/view'),
(6, 'Role list', 2, 'role/index', 0, 'RoleIndex', 'fa fa-user', NULL, NULL, '', 'role/index,role/create,role/update,role/view'),
(7, 'User list', 3, 'adminuser/index', 0, 'AdminuserIndex', 'fa fa-male', NULL, NULL, '', 'adminuser/index,adminuser/create,adminuser/update,adminuser/view'),
(22, 'Released version management', 58, 'versionup/index', 0, 'VersionupIndex', 'fa fa-refresh', NULL, NULL, '', 'versionup/index,versionup/create,versionup/update'),
(48, 'Custom variable', 58, 'multifunctions/index', 0, 'MultifunctionsIndex', 'fa  fa-cube', NULL, NULL, 'Menu2Tools', 'multifunctions/index,multifunctions/createfunc,multifunctions/updatefunc'),
(58, 'App data management', 0, '', 0, 'Menu2Tools', 'fa fa-file-image-o', NULL, NULL, 'splash,multifunctions,versionup', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=59;
--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `yii2_app`
--
CREATE DATABASE IF NOT EXISTS `yii2_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `yii2_app`;

DELIMITER $$
--
-- 函数
--
CREATE DEFINER=`root`@`localhost` FUNCTION `GETDISTANCE` (`lng2` DOUBLE, `lat2` DOUBLE, `lng1` DOUBLE, `lat1` DOUBLE) RETURNS DOUBLE BEGIN
 
DECLARE RAD DOUBLE;
 
DECLARE EARTH_RADIUS DOUBLE DEFAULT 6378137;
 
DECLARE radLat1 DOUBLE;
 
DECLARE radLat2 DOUBLE;
 
DECLARE radLng1 DOUBLE;
 
DECLARE radLng2 DOUBLE;
 
DECLARE s DOUBLE;
 
SET RAD = PI() / 180.0;
 
SET radLat1 = lat1 * RAD;
 
SET radLat2 = lat2 * RAD;
 
SET radLng1 = lng1 * RAD;
 
SET radLng2 = lng2 * RAD;
 
SET s = ACOS(COS(radLat1)*COS(radLat2)*COS(radLng1-radLng2)+SIN(radLat1)*SIN(radLat2))*EARTH_RADIUS;
 
SET s = ROUND(s * 10000) / 10000;
 
RETURN s;
 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `app_defined`
--

CREATE TABLE `app_defined` (
  `id` int(11) NOT NULL COMMENT '主键',
  `function_id` varchar(96) COLLATE utf8mb4_bin NOT NULL COMMENT '功能id',
  `value` text COLLATE utf8mb4_bin NOT NULL COMMENT '功能值',
  `remark` varchar(96) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='自定义数值';

-- --------------------------------------------------------

--
-- 表的结构 `app_version`
--

CREATE TABLE `app_version` (
  `id` int(11) NOT NULL COMMENT '主键',
  `type` int(11) NOT NULL COMMENT '版本类型，安卓为1，iOS为2',
  `name` varchar(96) NOT NULL COMMENT '版本名称',
  `url` text NOT NULL COMMENT '下载地址，iOS为地址，安卓上传安装包',
  `describe` text COMMENT '版本描述',
  `status` int(11) NOT NULL COMMENT '是否强制更新',
  `ver` int(11) NOT NULL COMMENT '版本号',
  `manager` int(11) NOT NULL COMMENT '管理员id',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `disabled` int(11) NOT NULL DEFAULT '1' COMMENT '是否禁用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_defined`
--
ALTER TABLE `app_defined`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_version`
--
ALTER TABLE `app_version`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_defined`
--
ALTER TABLE `app_defined`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `app_version`
--
ALTER TABLE `app_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
