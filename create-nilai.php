<?php
session_start();
include"conf/conf.php";
if(empty ($_SESSION['username']) and empty ($_SESSION['password'])){
echo"<script type=\"text/javascript\">alert(\"anda tidak bisa mengakses halaman ini\");window.location=\"index.php\"</script>";
}else{
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
<form action="create.php" method="post">
<table  cellspacing="1" align="center" cellpadding="1" width="70%" bgcolor="blue">
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td colspan="3" align="center"><font color="white" SIZE="4"><b>CREATE DATA KINERJA KARYAWAN</b></font></td></tr>
<tr><td colspan="3"><hr WIDTH="60%"></td></tr>
<tr><td align="right"><font color="white">ID Karyawan</font></td><td><font color="white">:</font></td><td><input type="text" name="id" size="10" maxlength="15"></td></td></tr>
<tr><td align="right"><font color="white">NAMA Karyawan</font></td><td><font color="white">:</font></td><td><input type="text" name="nama" size="50"  maxlength="15"></td></tr>
<TR><TD COLSPAN="3"><BR></TD></TR>
<tr BGCOLOR="BLACK"><TD></TD><td colspan="2"><font color="white" size="3" face="algerian">masukan nilai <font color="red">(10 -> 100)</font> di tiap kriteria</FONT></td></tr>
<TR><TD></TD><TD COLSPAN="2"></TD></TR>
<TR><TD COLSPAN="3"></TD></TR>
<tr><td align="right"><font color="white">Absensi</font></td><td><font color="white">:</font></td><td><input type="text" name="k1"></td></tr>
<tr><td align="right"><font color="white">Loyalitas</font></td><td><font color="white">:</font></td><td><input type="text" name="k2"></td></tr>
<tr><td align="right"><font color="white">Kahlian</font></td><td><font color="white">:</font></td><td><input type="text" name="k3"></td></tr>
<tr><td align="right"><font color="white">Disiplin</font></td><td><font color="white">:</font></td><td><input type="text" name="k4"></td></tr>
<tr><td align="right"><font color="white">Prestasi</font></td><td><font color="white">:</font></td><td><input type="text" name="k5"></td></tr>
<tr><td></td></tr>
<tr><td></td><td></td><td><input type="submit" name="kirim" value="SIMPAN">&nbsp;&nbsp;<input type="RESET" name="RESET" value="RESET"></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
</form>
</table><p>
<table border="1" align="center" cellspacing="1" cellpadding="1" width="90%" height="20%">
<tr bgcolor="blue"><td align="center" colspan="10"><font face="algerian" size="3" color="white"><b>Table Penilaian<b></font></TD></TR>
<tr>
<tr bgcolor="black"><td><font color="white" size="3" face="algerian">no</font></td>
<td><font color="white" size="3" face="algerian">ID Karyawan</font></td>
<td><font color="white" size="3" face="algerian">Nama Karyawan</font></td>
<td><font color="white" size="3" face="algerian">Absensi</font></td>
<td><font color="white" size="3" face="algerian">Loyalitas</font></td>
<td><font color="white" size="3" face="algerian">Keahlian</font></td>
<td><font color="white" size="3" face="algerian">Disiplin</font></td>
<td><font color="white" size="3" face="algerian">Prestasi</font></td>
<td colspan="2" align="center"><font color="white" size="3" face="algerian">AKsi</font></td>
</tr>
<?php 
$no=1;
$a=mysql_query("select * from tbl_normalisasi order by nama_karyawan");
while($data=mysql_fetch_array($a)){
?>
<td><?php echo $no;?></td>
<td><?php echo $data['id_karyawan'];?></td><td><?php echo $data['nama_karyawan'];?></td><td><?php echo $data['nilai1'];?></td><td><?php echo $data['nilai2'];?></td><td> <?php echo $data['nilai3'];?></td><td><?php echo $data['nilai4'];?></td><td><?php echo $data['nilai5'];?></td>
<td><a href="edit.php?edit=<?php echo $data['id_karyawan'];?>"><img src="image/edit.png" width="20" height="20"></td>
<td><a href="del.php?del=<?php echo $data['id_karyawan'];?>"><img src="image/del.png" width="20" height="20"></a></td></tr>
<?php
$no++;
}
?>
</table><p>
<table align="center" cellspacing="1" cellpadding="1" width="100%" height="10%" bgcolor="blue" border="1" color="red">
<tr><td align="center"><font color="white" size="3"><b>Create By Tungau IT &#8482; 2016<b></font></TD></TR></TABLE><br>
</body>
</html>
<?php
}
?>