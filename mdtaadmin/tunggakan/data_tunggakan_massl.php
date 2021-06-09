<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
<link href="../assets/css/bootstrap.css" rel="stylesheet">
<link href="../assets/css/navbar-static-top.css" rel="stylesheet">
</head>
<body> 
<?php
include "../menu.php";
?>
<div class="container">
<div class="row">

<div class="table-responsive table-striped ">
<table class="table table-bordered table-striped table-hover table-condensed">
<thead>
<tr>
<th>No.</th>
<th>BP</th>
<th>Nama Siswa</th>
<th>January</th>
<th>February</th>
<th>Maret</th>
<th>April</th>
<th>Mey</th>
<th>Juni</th>
<th>Juli</th>
<th>Agustus</th>
<th>September</th>
<th>Oktober</th>
<th>November</th>
<th>Desember</th>
<th>Proses</th>
</tr>
</thead>
<tbody>

<?php
include '../lib/koneksi.php';

$siswasql="SELECT * FROM tb_siswa";
$result = mysqli_query($conn, $siswasql);
$i = 1;
$siswa = mysqli_num_rows($result);
if ($siswa == 0) {
echo "<td colspan='5'>Data kosong. Silakan tambah data!</td>";
} else {
$No = 1;
while ($datas = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $No; ?></td>
<td><?php echo $datas['NIS']; ?></td>
<td><?php echo $datas['NamaSiswa'];
?></td>
<?php
$caridata="SELECT * FROM tb_tunggakan_siswa where nis=$datas[NIS]";
$hcari = mysqli_query($conn, $caridata);
$datac = mysqli_fetch_array($hcari)

?>
<td>
<?php
$jan = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='January' AND tahun='2020' AND statust='Y'";
$hjan = mysqli_query($conn, $jan);
$dajan=mysqli_fetch_array($hjan);
$jjan = mysqli_affected_rows($conn);
if($jjan>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$dajan[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=01'>Bayar</a>";
}?>
</td>
<td>
<?php
$feb = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='February' AND tahun='2020' AND statust='Y'";
$hfeb = mysqli_query($conn, $feb);
$dafeb=mysqli_fetch_array($hfeb);
$jfeb = mysqli_affected_rows($conn);
if($jfeb>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$dafeb[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=02'>Bayar</a>";
}?>
</td>
<td>
<?php
$mar = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='Maret' AND tahun='2020' AND statust='Y'";
$hmar = mysqli_query($conn, $mar);
$damar=mysqli_fetch_array($hmar);
$jmar = mysqli_affected_rows($conn);
if($jmar>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$damar[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=03'>Bayar</a>";
}?>
</td>
<td>
<?php
$apr = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='April' AND tahun='2020' AND statust='Y'";
$hapr = mysqli_query($conn, $apr);
$daapr=mysqli_fetch_array($hapr);
$japr = mysqli_affected_rows($conn);
if($japr>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$daapr[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=04'>Bayar</a>";
}?>
</td>
<td>
<?php
$mey = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='Mey' AND tahun='2020' AND statust='Y'";
$hmey = mysqli_query($conn, $mey);
$damey=mysqli_fetch_array($hmey);
$jmey = mysqli_affected_rows($conn);
if($jmey>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$damey[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=05'>Bayar</a>";
}?>
</td>
<td>
<?php
$jun = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='Juni' AND tahun='2020' AND statust='Y'";
$hjun = mysqli_query($conn, $jun);
$dajun=mysqli_fetch_array($hjun);
$jjun = mysqli_affected_rows($conn);
if($jjun>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$dajun[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=06'>Bayar</a>";
}?>
</td>
<td>
<?php
$jul = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='Juli' AND tahun='2020' AND statust='Y'";
$hjul = mysqli_query($conn, $jul);
$dajul=mysqli_fetch_array($hjul);
$jjul = mysqli_affected_rows($conn);
if($jjul>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$dajul[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=07'>Bayar</a>";
}?>
</td>
<td>
<?php
$agu = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='Agustus' AND tahun='2020' AND statust='Y'";
$hagu = mysqli_query($conn, $agu);
$dagu=mysqli_fetch_array($hagu);
$jagu = mysqli_affected_rows($conn);
if($jagu>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$dagu[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=08'>Bayar</a>";
}?>
</td>
<td>
<?php
$sep = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='September' AND tahun='2020' AND statust='Y'";
$hsep = mysqli_query($conn, $sep);
$dsep=mysqli_fetch_array($hsep);
$jsep = mysqli_affected_rows($conn);
if($jsep>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$dsep[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=09'>Bayar</a>";
}?>
</td>
<td>
<?php
$okt = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='Oktober' AND tahun='2020' AND statust='Y'";
$hokt = mysqli_query($conn, $okt);
$dokt=mysqli_fetch_array($hokt);
$jokt = mysqli_affected_rows($conn);
if($jokt>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$dokt[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=10'>Bayar</a>";
}?>
</td>
<td>
<?php
$nov = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='November' AND tahun='2020' AND statust='Y'";
$hnov = mysqli_query($conn, $nov);
$dnov=mysqli_fetch_array($hnov);
$jnov = mysqli_affected_rows($conn);
if($jnov>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$dnov[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=11'>Bayar</a>";
}?>
</td>
<td>
<?php
$des = "SELECT idtunggakan,bulan FROM tb_tunggakan_siswa WHERE NIS='$datas[NIS]' AND bulan='Desember' AND tahun='2020' AND statust='Y'";
$hdes = mysqli_query($conn, $des);
$ddes=mysqli_fetch_array($hdes);
$jdes = mysqli_affected_rows($conn);
if($jdes>0){
echo "Lunas";
echo " ";
echo "<a href='hapus_spp.php?idtunggakan=$ddes[idtunggakan]'><span class='glyphicon glyphicon-trash'></span></a>";
} else{
echo "<a style=color:red; href='simpan_spp.php?NIS=$datas[NIS]&&bln=12'>Bayar</a>";
}?>
</td>
<td>

<button class="btn btn-warning">
<a href="hasil_tunggakan_nis.php?NIS=<?php echo $datas['NIS'];?>">Cetak
</button>
</td>
</tr>
<?php  
$No++;
}
}
?>
</tbody>
</table>
</div>
</div>
</div>

<?php
include '../footer.php';
?>

<script src="../assets/js/jquery.js"></script>  
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
