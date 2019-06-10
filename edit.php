<?php
session_start();
include"conf/conf.php";
if(empty ($_SESSION['username']) and empty ($_SESSION['password'])){
echo"<script type=\"text/javascript\">alert(\"anda tidak bisa mengakses halaman ini\");window.location=\"index.php\"</script>";
}else{
?>
<?PHP
$a=mysql_query("select * from tbl_normalisasi where id_karyawan='$_GET[edit]'");
$data=mysql_fetch_array($a);
?>
<html>
<head><title>spk perbandingan metode saw dan wp</title>
</head>
<body>
<table align="center" cellspacing="1" cellpadding="1" width="100%" height="20%" bgcolor="blue" border="1">
<tr><td align="center"><font color="white" size="6"><b>SISTEM PENILAIAN KINERJA KARYAWAN METODE SAW DAN WP<b></font></TD></TR></TABLE><br>
<table align="left" width="100%" bgcolor="black">
<tr><td><font color="white"><b>
<a href="home.php">|HOME|</a>&nbsp;
<a href="create-nilai.php">|CREATE|</a>&nbsp;
<a href="saw.php">|Hasil Analisa SAW|</a>&nbsp;
<a href="wp.php">|Hasil Analisa WP|</a>&nbsp;
<a href="logout.php">|Logout|</a>
</b></font></td></tr></table><hr color="red"><p>
<form action="" method="post">
<table  cellspacing="1" align="center" cellpadding="1" width="70%" bgcolor="blue">
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td colspan="3" align="center"><font color="white" SIZE="4"><b>EDIT DATA KINERJA KARYAWAN</b></font></td></tr>
<tr><td colspan="3"><hr WIDTH="60%"></td></tr>
<tr><td align="right"><font color="white">ID Karyawan</font></td><td><font color="white">:</font></td><td><input type="text" name="id" size="10" maxlength="15" value="<? echo $data['id_karyawan'];?>"></td></td></tr>
<tr><td align="right"><font color="white">NAMA Karyawan</font></td><td><font color="white">:</font></td><td><input type="text" name="nama" size="50"  maxlength="15" value="<? echo $data['nama_karyawan'];?>"></td></tr>
<TR><TD COLSPAN="3"><BR></TD></TR>
<tr BGCOLOR="BLACK"><TD></TD><td colspan="2"><font color="white" size="3" face="algerian">masukan nilai <font color="red">(10 -> 100)</font> di tiap kriteria</FONT></td></tr>
<TR><TD></TD><TD COLSPAN="2"></TD></TR>
<TR><TD COLSPAN="3"></TD></TR>
<tr><td align="right"><font color="white">Absensi</font></td><td><font color="white">:</font></td><td><input type="text" name="k1" value="<? echo $data['nilai1'];?>"></td></tr>
<tr><td align="right"><font color="white">Loyalitas</font></td><td><font color="white">:</font></td><td><input type="text" name="k2" value="<? echo $data['nilai2'];?>"></td></tr>
<tr><td align="right"><font color="white">Kahlian</font></td><td><font color="white">:</font></td><td><input type="text" name="k3" value="<? echo $data['nilai3'];?>"></td></tr>
<tr><td align="right"><font color="white">Disiplin</font></td><td><font color="white">:</font></td><td><input type="text" name="k4" value="<? echo $data['nilai4'];?>"></td></tr>
<tr><td align="right"><font color="white">Prestasi</font></td><td><font color="white">:</font></td><td><input type="text" name="k5" value="<? echo $data['nilai5'];?>"></td></tr>
<tr><td></td></tr>
<tr><td></td><td></td><td><input type="submit" name="edit" value="UPDATE">&nbsp;&nbsp;<BUTTON ONCLICK="history.go(-1);">CANCEL</BUTTON></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
</form>
</table><p>
<?php
if(isset($_POST['edit'])){
$edit=mysql_query("update tbl_normalisasi set nama_karyawan='$_POST[nama]', nilai1='$_POST[k1]',nilai2='$_POST[k2]',nilai3='$_POST[k3]',nilai4='$_POST[k4]',nilai5='$_POST[k5]' where id_karyawan='$_POST[id]'");
header("location:create-nilai.php");
}
?>
<table align="center" cellspacing="1" cellpadding="1" width="100%" height="10%" bgcolor="blue" border="1" color="red">
<tr><td align="center"><font color="white" size="3"><b>Create By Tungau IT &#8482; 2016<b></font></TD></TR></TABLE><br>
</body>
</html>
<?php
}
?>