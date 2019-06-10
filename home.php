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
<table align="center" cellspacing="1" cellpadding="1" width="80%" bgcolor="blue" color="red">
<tr><td><font color="white" size="6" face="tahoma"><b>&nbsp;Welcome</font></b></td></tr>
<tr><td><font color="yellow" face="tahoma">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anda berhasil Login :</font> <font color="white" size="4" face="tahoma">[<?php echo date("d-m-y");?>]</font></td></tr>
<tr><td><hr color="black"></td></tr>
<tr><td align="center"><font type="times new roman" size="5" color="white">SISTEM PENUNJANG KEPUTUSAN (SPK) </font></td></tr>
<tr><td align="center"><hr color="white" width="50%"></td></tr>
<tr><td><hr color="black"></td></tr></table><p>
<table align="center" cellspacing="1" cellpadding="1" width="100%" height="10%" bgcolor="blue" border="1" color="red">
<tr><td align="center"><font color="white" size="3"><b>Create By Tungau IT &#8482;<b></font></TD></TR></TABLE><br>
</body>
</html>
<?php
}
?>