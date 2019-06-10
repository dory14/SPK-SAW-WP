<?PHP
session_start();
include"conf/conf.php";
$a=mysql_query("select * from tbl_user where username='$_POST[username]' and password='$_POST[password]'");
$baca=mysql_fetch_array($a);
$read=mysql_num_rows($a);
if($read==1){
$_SESSION['username']=$baca['username'];
$_SESSION['password']=$baca['password'];
HEADER("LOCATION:HOME.PHP");
}else{
echo"anda gagal login";
}
?>