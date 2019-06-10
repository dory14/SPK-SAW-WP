<?
session_start();
include"conf/conf.php";
$a=mysql_query("delete from tbl_normalisasi where id_karyawan='$_GET[del]'");
if($a){
header("location:create-nilai.php");
}else{
header("location:create-nilai.php");
}
?>