create database myproducts;

use mycrud;

CREATE TABLE `tbl_products` (
  `id` int(100) NOT NULL auto_increment,
  `productname` varchar(100) NOT NULL,
  `price` FLOAT NOT NULL,
  `stocks` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);