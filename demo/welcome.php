<?php
session_start();
$date=date('l, d-m-Y | H:i:s');
echo "<h1>Welcome $_SESSION[nama_id] </h1>";
echo "<p> Anda Berhasil Login [ $date ]</p>";
?>