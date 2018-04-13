/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : fourshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-14 07:19:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ablum
-- ----------------------------
DROP TABLE IF EXISTS `ablum`;
CREATE TABLE `ablum` (
  `ablum_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品图片id',
  `ablum_img` varchar(255) DEFAULT NULL COMMENT '商品图片',
  PRIMARY KEY (`ablum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='商品图片表';

-- ----------------------------
-- Records of ablum
-- ----------------------------

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '收货地址',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `accept_name` varchar(30) DEFAULT NULL COMMENT '收货人姓名',
  `tel` varchar(20) DEFAULT NULL COMMENT '收货人联系电话',
  `province` int(11) DEFAULT NULL COMMENT '省',
  `city` int(11) DEFAULT NULL COMMENT '市',
  `area` int(11) DEFAULT NULL COMMENT '区',
  `address_name` varchar(255) DEFAULT NULL COMMENT '收货地址',
  `is_default` tinyint(1) DEFAULT '0' COMMENT '是否默认 0非默认 1默认',
  PRIMARY KEY (`address_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='收货地址表';

-- ----------------------------
-- Records of address
-- ----------------------------

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `admin_name` varchar(33) DEFAULT NULL COMMENT '管理员名称',
  `admin_pwd` varchar(32) DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='管理员表';

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '金洪石', '123456');
INSERT INTO `admin` VALUES ('2', '高向颖', '123456');
INSERT INTO `admin` VALUES ('3', '景佳宽', '123456');
INSERT INTO `admin` VALUES ('4', '冯首瑜', '123456');
INSERT INTO `admin` VALUES ('5', '李迅达', '123456');
INSERT INTO `admin` VALUES ('6', '白露', '123456');

-- ----------------------------
-- Table structure for attribute
-- ----------------------------
DROP TABLE IF EXISTS `attribute`;
CREATE TABLE `attribute` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '属性id',
  `type_id` int(11) DEFAULT NULL COMMENT '类型id',
  `attribute_name` varchar(255) DEFAULT NULL COMMENT '属性名称',
  `attribute_type` tinyint(1) DEFAULT NULL COMMENT '0参数 1规格',
  PRIMARY KEY (`attribute_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='属性表';

-- ----------------------------
-- Records of attribute
-- ----------------------------

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '品牌id',
  `brand_name` varchar(50) DEFAULT NULL COMMENT '品牌名称',
  `brand_logo` varchar(255) DEFAULT NULL COMMENT '品牌logo',
  `description` text COMMENT '描述',
  `sort` tinyint(5) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='品牌表';

-- ----------------------------
-- Records of brand
-- ----------------------------

-- ----------------------------
-- Table structure for car
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `products_id` int(11) DEFAULT NULL COMMENT '货品id',
  `num` varchar(20) DEFAULT NULL COMMENT '数量',
  `products_no` varchar(20) DEFAULT NULL COMMENT '货品编号',
  PRIMARY KEY (`car_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='购物车表';

-- ----------------------------
-- Records of car
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `parent_id` int(11) DEFAULT NULL COMMENT '父级id',
  `sort` smallint(5) DEFAULT NULL COMMENT '分类排序',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否展示 1展示0不展示',
  `path` varchar(20) DEFAULT NULL COMMENT '路径',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COMMENT='商品分类表';

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '点心/蛋糕', '0', '0', '1', '0');
INSERT INTO `category` VALUES ('2', '饼干/膨化', '0', '0', '1', '0');
INSERT INTO `category` VALUES ('3', '熟食/肉类', '0', '0', '1', '0');
INSERT INTO `category` VALUES ('4', '素食/卤味', '0', '0', '1', '0');
INSERT INTO `category` VALUES ('5', '坚果/炒货', '0', '0', '1', '0');
INSERT INTO `category` VALUES ('6', '糖果/蜜饯', '0', '0', '1', '0');
INSERT INTO `category` VALUES ('7', '巧克力', '0', '0', '1', '0');
INSERT INTO `category` VALUES ('8', '海鲜/河虾', '0', '0', '1', '0');
INSERT INTO `category` VALUES ('9', '花茶/果茶', '0', '0', '1', '0');
INSERT INTO `category` VALUES ('10', '品牌/礼包', '0', '0', '1', '0');
INSERT INTO `category` VALUES ('11', '蛋糕', '1', '0', '1', '0-1');
INSERT INTO `category` VALUES ('12', '蒸蛋糕', '11', '0', '1', '0-1-11');
INSERT INTO `category` VALUES ('13', '脱水蛋糕', '11', '0', '1', '0-1-11');
INSERT INTO `category` VALUES ('14', '瑞士卷', '11', '0', '1', '0-1-11');
INSERT INTO `category` VALUES ('15', '软面包', '11', '0', '1', '0-1-11');
INSERT INTO `category` VALUES ('16', '千层饼', '11', '0', '1', '0-1-11');
INSERT INTO `category` VALUES ('17', '甜甜圈', '11', '0', '1', '0-1-11');
INSERT INTO `category` VALUES ('18', '饼干', '2', '0', '1', '0-2');
INSERT INTO `category` VALUES ('19', '苏打饼干', '18', '0', '1', '0-2-18');
INSERT INTO `category` VALUES ('20', '小熊饼干', '18', '0', '1', '0-2-18');
INSERT INTO `category` VALUES ('21', '巧克力饼干', '18', '0', '1', '0-2-18');
INSERT INTO `category` VALUES ('22', '奥利奥饼干', '18', '0', '1', '0-2-18');
INSERT INTO `category` VALUES ('23', '夹心饼干', '18', '0', '1', '0-2-18');
INSERT INTO `category` VALUES ('24', '薯片', '2', '0', '1', '0-2');
INSERT INTO `category` VALUES ('25', '可比克', '24', '0', '1', '0-2-24');
INSERT INTO `category` VALUES ('26', '上好佳', '24', '0', '1', '0-2-24');
INSERT INTO `category` VALUES ('27', '乐吧', '24', '0', '1', '0-2-24');
INSERT INTO `category` VALUES ('28', '乐事', '24', '0', '1', '0-2-24');
INSERT INTO `category` VALUES ('29', '百草味', '24', '0', '1', '0-2-24');
INSERT INTO `category` VALUES ('30', '猪肉脯', '3', '0', '1', '0-3');
INSERT INTO `category` VALUES ('31', '三只松鼠', '30', '0', '1', '0-3-30');
INSERT INTO `category` VALUES ('32', '百草味', '30', '0', '1', '0-3-30');
INSERT INTO `category` VALUES ('33', '香肠', '3', '0', '1', '0-3');
INSERT INTO `category` VALUES ('34', '金锣', '33', '0', '1', '0-3-33');
INSERT INTO `category` VALUES ('35', '王中王', '33', '0', '1', '0-3-33');
INSERT INTO `category` VALUES ('36', '豆干', '4', '0', '1', '0-4');
INSERT INTO `category` VALUES ('37', '劲仔', '36', '0', '1', '0-4-36');
INSERT INTO `category` VALUES ('38', '马大姐', '36', '0', '1', '0-4-36');
INSERT INTO `category` VALUES ('39', '鸭脖', '4', '0', '1', '0-4');
INSERT INTO `category` VALUES ('40', '良品铺子', '39', '0', '1', '0-4-39');
INSERT INTO `category` VALUES ('41', '周黑鸭', '39', '0', '1', '0-4-39');
INSERT INTO `category` VALUES ('42', '姚太太', '39', '0', '1', '0-4-39');
INSERT INTO `category` VALUES ('43', '坚果', '5', '0', '1', '0-5');
INSERT INTO `category` VALUES ('44', '夏威夷果', '43', '0', '1', '0-5-43');
INSERT INTO `category` VALUES ('45', '碧根果', '43', '0', '1', '0-5-43');
INSERT INTO `category` VALUES ('46', '锅巴', '5', '0', '1', '0-5');
INSERT INTO `category` VALUES ('47', '小锅巴', '46', '0', '1', '0-5-46');
INSERT INTO `category` VALUES ('48', '大锅巴', '46', '0', '1', '0-5-46');
INSERT INTO `category` VALUES ('49', '软糖', '6', '0', '1', '0-6');
INSERT INTO `category` VALUES ('50', '散装', '49', '0', '1', '0-6-49');
INSERT INTO `category` VALUES ('51', '罐装', '49', '0', '1', '0-6-49');
INSERT INTO `category` VALUES ('52', '德芙', '7', '0', '1', '0-7');
INSERT INTO `category` VALUES ('53', '花生巧克力', '52', '0', '1', '0-7-52');
INSERT INTO `category` VALUES ('54', '纯黑巧克力', '52', '0', '1', '0-7-52');
INSERT INTO `category` VALUES ('55', '费列罗', '7', '0', '1', '0-7');
INSERT INTO `category` VALUES ('56', '榛果', '55', '0', '1', '0-7-55');
INSERT INTO `category` VALUES ('57', '礼盒装', '55', '0', '1', '0-7-55');

-- ----------------------------
-- Table structure for favorite
-- ----------------------------
DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `favorite_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品id',
  `time` datetime DEFAULT NULL COMMENT '收藏时间',
  PRIMARY KEY (`favorite_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='收藏表';

-- ----------------------------
-- Records of favorite
-- ----------------------------

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `category_id` int(11) DEFAULT NULL COMMENT '分类id',
  `goods_name` varchar(50) DEFAULT NULL COMMENT '商品名称',
  `goods_no` varchar(20) DEFAULT NULL COMMENT '商品货号',
  `sell_price` decimal(10,0) DEFAULT NULL COMMENT '销售价格',
  `market_price` decimal(10,0) DEFAULT NULL COMMENT '市场价格',
  `cost_price` decimal(10,0) DEFAULT NULL COMMENT '成本价格',
  `up_time` datetime DEFAULT NULL COMMENT '上架时间',
  `down_time` datetime DEFAULT NULL COMMENT '下架时间',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `store_nums` int(11) DEFAULT '0' COMMENT '库存',
  `ablum_id` int(11) DEFAULT NULL COMMENT '商品图片id',
  `is_status` tinyint(1) DEFAULT '0' COMMENT '商品状态 0正常 1已删除 2下架 3申请上架',
  `content` text COMMENT '商品描述',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'SEO关键词',
  `brand_id` int(11) DEFAULT NULL COMMENT '品牌ID',
  `sale` int(11) DEFAULT NULL COMMENT '销量',
  `is_delivery_fee` tinyint(1) DEFAULT '0' COMMENT '免运费 0收运费 1免运费',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='商品表';

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for goods_attribute
-- ----------------------------
DROP TABLE IF EXISTS `goods_attribute`;
CREATE TABLE `goods_attribute` (
  `goods_attribute_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '属性值表',
  `attribute_id` int(11) DEFAULT NULL COMMENT '属性值',
  `attribute_values` varchar(255) DEFAULT NULL COMMENT '属性值',
  PRIMARY KEY (`goods_attribute_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='属性值表';

-- ----------------------------
-- Records of goods_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `order_no` varchar(20) DEFAULT NULL COMMENT '订单号',
  `pay_type` tinyint(1) DEFAULT NULL COMMENT '用户支付方式,当为0时表示货到付款',
  `status` tinyint(1) DEFAULT '1' COMMENT '1生成订单 2支付订单 3取消订单 4完成',
  `pay_status` tinyint(1) DEFAULT '0' COMMENT '支付状态 0：未支付; 1：已支付;',
  `accept_name` varchar(20) DEFAULT NULL COMMENT '收货人姓名',
  `telphone` varchar(20) DEFAULT NULL COMMENT '联系电话',
  `province` int(11) DEFAULT NULL COMMENT '省ID',
  `city` int(11) DEFAULT NULL COMMENT '市ID',
  `area` int(11) DEFAULT NULL COMMENT '区ID',
  `address` varchar(255) DEFAULT NULL COMMENT '收货地址',
  `payable_amount` decimal(15,2) DEFAULT NULL COMMENT '应付商品总金额',
  `payable_freight` decimal(15,2) DEFAULT NULL COMMENT '总运费金额',
  `pay_time` datetime DEFAULT NULL COMMENT '付款时间',
  `send_time` datetime DEFAULT NULL COMMENT '发货时间',
  `create_time` datetime DEFAULT NULL COMMENT '下单时间',
  `completion_time` datetime DEFAULT NULL COMMENT '订单完成时间',
  `accept_time` datetime DEFAULT NULL COMMENT '用户收货时间',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='订单表';

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for order_goods
-- ----------------------------
DROP TABLE IF EXISTS `order_goods`;
CREATE TABLE `order_goods` (
  `order_goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL COMMENT '订单id',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品id',
  `img` varchar(255) DEFAULT NULL COMMENT '商品图片',
  `product_id` int(11) DEFAULT NULL COMMENT '货品ID',
  `goods_price` decimal(15,2) DEFAULT NULL COMMENT '商品价格',
  `goods_nums` int(11) DEFAULT NULL COMMENT '商品数量',
  `is_send` tinyint(1) DEFAULT NULL COMMENT '是否已发货 0:未发货;1:已发货;2:已经退货',
  PRIMARY KEY (`order_goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='订单商品表';

-- ----------------------------
-- Records of order_goods
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '货品id',
  `products_no` varchar(20) DEFAULT NULL COMMENT '货品的货号',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品id',
  `spec_array` varchar(255) DEFAULT NULL COMMENT '此类规格数据',
  `store_nums` int(11) DEFAULT NULL COMMENT '库存',
  `sell_price` decimal(15,2) DEFAULT NULL COMMENT '销售价格',
  PRIMARY KEY (`products_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='货品表';

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类型id',
  `type_name` varchar(255) DEFAULT NULL COMMENT '类型名称',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='类型表';

-- ----------------------------
-- Records of type
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_name` varchar(20) DEFAULT NULL COMMENT '用户名',
  `user_pwd` varchar(32) DEFAULT NULL COMMENT '密码',
  `head_ico` varchar(255) DEFAULT NULL COMMENT '头像',
  `user_status` tinyint(1) DEFAULT '1' COMMENT '用户状态',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '丽丽', '123', null, '1');
INSERT INTO `user` VALUES ('2', '冯首瑜', '123456', null, '1');

-- ----------------------------
-- Table structure for userinfo
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `info_name` varchar(30) DEFAULT NULL COMMENT '姓名',
  `info_sex` tinyint(1) DEFAULT NULL COMMENT '性别',
  `info_year` varchar(20) DEFAULT NULL COMMENT '年',
  `info_month` varchar(20) DEFAULT NULL COMMENT '月',
  `info_day` varchar(20) DEFAULT NULL COMMENT '日',
  `info_tel` char(11) DEFAULT NULL COMMENT '手机号码',
  `info_email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='用户详情';

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO `userinfo` VALUES ('1', '校历', '1', '', null, null, '13246578960', '123465@qq.com');
INSERT INTO `userinfo` VALUES ('2', '冯首瑜', '1', null, null, null, '15010573686', '466748874@qq.com');
