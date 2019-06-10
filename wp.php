<?
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
<table align="center" cellspacing="1" cellpadding="1" width="80%" bgcolor="blue" >
<tr ALIGN="CENTER"><td colspan="10"><FONT SIZE="6" COLOR="WHITE"><B>PERHITUNGAN METODE WP</B></FONT></td></TR>
<tr><td colspan="10"><hr width="50%" color="white"></td></TR></table>
<table align="center" cellspacing="1" cellpadding="1" width="80%" bgcolor="white" border="2">
<TR><td colspan="10" bgcolor="blue"><font color="white" size="3" face="algerian"><b>bobot awal</b></font></td></tr>
<tr>
<?
$c= array (4,5,4,5,3);
$jum = array_sum($c);
list($bobo1,$bobo2,$bobo3,$bobo4,$bobo5)=$c;
echo
"<td>".$bobo1."</td><td>".$bobo2."</td><td>".$bobo3."</td><td>".$bobo4."</td><td colspan='5'>".$bobo5."</td>"
?>
</tr>
<TR><td colspan="10" bgcolor="blue"><font color="white" size="3" face="algerian"><b>bobot baru</b></font></td></tr>
<?
//bobot baru
echo"<tr>
<td>".round($bobo1/$jum,2)."</td><td>".round($bobo2/$jum,2)."</td><td>".round($bobo3/$jum,2)."</td><td>".round($bobo4/$jum,2)."</td><td colspan='5'>".round($bobo5/$jum,2)."</td>
</tr>";
//matrik awal
$kri=mysql_query("select *from tbl_kriteria order by id_kriteria");
?>
<TR><td colspan="10" bgcolor="blue"><font color="white" size="3" face="algerian"><b>Matrik awal</b></font></td></tr>
<tr bgcolor="black"><td><font color="white" size="3" face="algerian">No</font></td>
<td><font color="white" size="3" face="algerian">ID Karyawan</font></td>
<td><font color="white" size="3" face="algerian">Nama Karyawan</font></td>
<td><font color="white" size="3" face="algerian">Absensi</font></td>
<td><font color="white" size="3" face="algerian">Loyalitas</font></td>
<td><font color="white" size="3" face="algerian">Keahlian</font></td>
<td><font color="white" size="3" face="algerian">Disiplin</font></td>
<td colspan="2"><font color="white" size="3" face="algerian">Prestasi</font></td>
</tr>
<tr>
<?$no=1;
$nr=mysql_query("select* from tbl_normalisasi");
while($nor=mysql_fetch_array($nr)){
echo"<td>".$no."</td><td>".$nor['id_karyawan']."</td><td>".$nor['nama_karyawan']."</td><td>".$nor['nilai1']."</td><td>".$nor['nilai2']."</td><td>".$nor['nilai3']."</td><td>".$nor['nilai4']."</td><td colspan='2'>".$nor['nilai5']."</td></tr>";
$no++;
}
//cari max dari nilai kriteria
$Nmax=mysql_query("select max(nilai1) as max1,
							max(nilai2) as max2,
							max(nilai3) as max3,
							max(nilai4) as max4,
							max(nilai5) as max5 from tbl_normalisasi");
$max=mysql_fetch_array($Nmax);
//normalisasi
?>
<TR><td colspan="10" bgcolor="blue"><font color="white" size="3" face="algerian"><b>Normalisasi</b></font></td></tr>
<tr bgcolor="black"><td><font color="white" size="3" face="algerian">No</font></td>
<td><font color="white" size="3" face="algerian">ID Karyawan</font></td>
<td><font color="white" size="3" face="algerian">Nama Karyawan</font></td>
<td><font color="white" size="3" face="algerian">Absensi</font></td>
<td><font color="white" size="3" face="algerian">Loyalitas</font></td>
<td><font color="white" size="3" face="algerian">Keahlian</font></td>
<td><font color="white" size="3" face="algerian">Disiplin</font></td>
<td><font color="white" size="3" face="algerian">Prestasi</font></td>
<td><font color="white" size="3" face="algerian">Hasil</font></td>
</tr>
<?
$bobot1=$bobo1/$jum;
$bobot2=$bobo2/$jum;
$bobot3=$bobo3/$jum;
$bobot4=$bobo4/$jum;
$bobot5=$bobo5/$jum;
$no=1;
$nr=mysql_query("select* from tbl_normalisasi");
while($nor=mysql_fetch_array($nr)){
$norm1= pow ($nor['nilai1'],$bobot1);
$norm2= pow ($nor['nilai2'],$bobot2);
$norm3= pow ($nor['nilai3'],$bobot3);
$norm4= pow ($nor['nilai4'],$bobot4);
$norm5= pow ($nor['nilai5'],$bobot5);

$hnorm1=$norm1*$norm2*$norm3*$norm4*$norm5;

echo"<td>".$no."</td><td>".$nor['id_karyawan']."</td><td>".$nor['nama_karyawan']."</td><td>".round($norm1,2)."</td><td>".round($norm2,2)."</td><td>".round($norm3,2)."</td><td>".round($norm4,2)."</td><td>".round($norm5,2)."</td>.<td>".round($hnorm1,2)."</td></tr>";
$no++;
}
//perangkingan
?>
<TR><td colspan="10" bgcolor="blue"><font color="white" size="3" face="algerian"><b>perangkingan</b></font></td></tr>
<tr bgcolor="black"><td><font color="white" size="3" face="algerian">NO</font></td>
<td><font color="white" size="3" face="algerian">ID Karyawan</font></td>
<td><font color="white" size="3" face="algerian">Nama Karyawan</font></td>
<td colspan="6"><font color="white" size="3" face="algerian">perangkingan</font></td>
</tr>
<tr>
<?$no=1;
$nr=mysql_query("select* from tbl_normalisasi");
$sql3 = mysql_query("SELECT id_karyawan,nama_karyawan,
POWER(nilai1, $bobot1) AS nilai1,
POWER(nilai2, $bobot2) AS nilai1,
POWER(nilai3, $bobot3) AS nilai1,
POWER(nilai4, $bobot4) AS nilai1,
POWER(nilai5, $bobot5) AS nilai1,
(
POWER(nilai1, $bobot1) *
POWER(nilai2, $bobot2) *
POWER(nilai3, $bobot3) *
POWER(nilai4, $bobot4) *
POWER(nilai5, $bobot5) 
) AS TOTAL,
SUM(
POWER(nilai1, $bobot1) *
POWER(nilai2, $bobot2) *
POWER(nilai3, $bobot3) *
POWER(nilai4, $bobot4) *
POWER(nilai5, $bobot5) 
)AS GRANDTOTAL
FROM tbl_normalisasi");
$q = mysql_fetch_array($sql3);
while($nor=mysql_fetch_array($nr)){


echo"<td>".$no."</td><td>".$nor['id_karyawan']."</td><td>".$nor['nama_karyawan']."</td><td colspan='6'>"
.round(((pow($nor['nilai1'],$bobot1))*
(pow($nor['nilai2'],$bobot2))*
(pow($nor['nilai3'],$bobot3))*
(pow($nor['nilai4'],$bobot4))*
(pow($nor['nilai5'],$bobot5)/$q['GRANDTOTAL'])
),2)
."</td></tr>";
$no++;
}
?>
</table><p>
<table align="center" cellspacing="1" cellpadding="1" width="100%" height="10%" bgcolor="blue" border="1" color="red">
<tr><td align="center"><font color="white" size="3"><b>Create By Tungau IT &#8482; 2016<b></font></TD></TR></TABLE><br>
<?
}
?>
</body>
</html>