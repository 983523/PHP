<?php
header("Content-type: text/html; charset=utf-8"); 
include "inc/mysql.inc.php";
$aa=new mysql;
$bb=new mysql;
$aa->link("mysql");
$query="CREATE DATABASE `course`";
if($aa->excu($query)){
  echo "创建数据库成功<br>";
}
$bb->link("course");
//创建表manage_infor//
$query="CREATE TABLE `manage_info` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` char(16) NOT NULL,
  `user_pw` char(32) NOT NULL,
  `user_tag` char(1) NOT NULL,
  `time` datetime NOT NULL,
  `times` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
)";
$bb->excu($query);
echo "数据库表manage_info创建成功<br>";
//创建表lesson_info//
$query="CREATE TABLE `lesson_info` (
  `id` int(11) NOT NULL auto_increment,
  `lesson_bh` char(2) NOT NULL,
  `lesson_name` char(20) NOT NULL,
  `lesson_pre` int NOT NULL,
  `lesson_aft` int NOT NULL,
  `lesson_teachar` char(8) NOT NULL,
  `lesson_cont` text NOT NULL,
  `add_user` char(16) NOT NULL,
  `add_time` datetime NOT NULL,
  UNIQUE KEY `id` (`id`)
)";

$bb->excu($query);
echo "数据表lesson_info 创建成功<br>";
//创建表stu_info//
$query="CREATE TABLE `stu_info` (
  `id` int(11) NOT NULL auto_increment,
  `stu_xh` char(20) NOT NULL,
  `stu_name` char(8) NOT NULL,
  `class_name` char(10) NOT NULL,
  `stu_xb` char(4) NOT NULL,
  `stu_pw` char(32) NOT NULL,
  UNIQUE KEY `id` (`id`)
)";
$bb->excu($query);
echo "数据表stu_info 创建成功<br>";
//创建数据表xk_info//
$query="CREATE TABLE `xk_info` (
  `id` int(11) NOT NULL auto_increment,
  `stu_xh` char(20) NOT NULL,
  `lesson_bh` char(2) NOT NULL,
  `lesson_mark` char(2) default '0',
  `lesson_bz` char(32) default '0',
  UNIQUE KEY `id` (`id`)
)";
$bb->excu($query);
echo "数据表xk_info 创建成功<br>";
//初始化管理员密码//
$query="INSERT INTO `manage_info` VALUES(1,'root','root',1,'0000-00-00 00:00:00',0)";
if($bb->excu($query)){
  echo "管理员账号、密码为root,root<br>";
}
echo "OK!";
?>