<?
session_start();
include"conf/conf.php";
session_destroy();
header("location:index.php");
exit();
?>