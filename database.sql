-- create database test;

-- use test;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `nim` int(8) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);