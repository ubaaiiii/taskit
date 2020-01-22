<?php
# Pengaturan koneksi
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "taskit";

# Konek ke Web Server Lokal
error_reporting(E_ALL ^ E_DEPRECATED); 
$koneksidb	= mysql_connect($myHost, $myUser, $myPass);
if (! $koneksidb) {
  echo "Tidak konek ke MySQL Server !";
}

# Memilih database pd MySQL Server
mysqli_select_db($myDbs, $koneksidb) or die ("Database <b>$myDbs</b> tidak terbaca !");
?>