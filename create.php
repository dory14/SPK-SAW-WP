<?php
session_start();
include "conf/conf.php";
$a=mysql_query("insert into tbl_normalisasi(id_karyawan,nama_karyawan,nilai1,nilai2,nilai3,nilai4,nilai5) values ('$_POST[id]','$_POST[nama]','$_POST[k1]','$_POST[k2]','$_POST[k3]','$_POST[k4]','$_POST[k5]')");
if($a){
header("location:create-nilai.php");
}else{
header("location:create-nilai.php");
}
?>