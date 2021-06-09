<div class="col-sm-8">
<div class="panel panel-primary">
<div class="panel-heading"><b>Daftar Siswa Baru MDTA Sahara Padang</b></div>
<div class="panel-body">
<form action="daftar_act.php" method="post" class="form-horizontal">
<div class="form-group">
<label class="col-sm-2 control-label">NIS</label>
<div class="col-sm-4">
<input type="number" name="NIS" class="form-control" placeholder="Masukkan NIS">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Nama Siswa</label>
<div class="col-sm-4">
<input type="text" name="NamaSiswa" class="form-control" placeholder="Masukkan Nama Siswa" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Jekel</label>
<div class="col-sm-4">
<select name="JenisKelamin" class="form-control">
<option selected="selected">Jenis Kelamin</option>
<option value="Laki-Laki">Laki-Laki</option>
<option value="Perempuan">Perempuan</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">TGL Lahir</label>
<div class="col-sm-10">
<input class="col-sm-4 control-label" type="date" name="TanggalLahir" id="tgllahir" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Tempat Lahir</label>
<div class="col-sm-10">
<textarea class="form-control" id="texteditor" name="TempatLahir" rows=6></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Pilih Agama</label>
<div class="col-sm-4">
<select name="Agama" class="form-control">
<option value="" selected="selected">Agama</option>
<option value="Islam">Islam</option>
<option value="Katolik">Katolik</option>
<option value="Protestan">Protestan</option>
<option value="Hindu">Hindu</option>
<option value="Buddha">Buddha</option>  
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Alamat</label>
<div class="col-sm-10">
<textarea class="form-control" id="alamat" name="AlamatSiswa" rows=6></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Nama Ortu</label>
<div class="col-sm-4">
<input type="text" name="NamaOrtu" class="form-control" placeholder="Nama ortu/wali Siswa" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">HP Ortu</label>
<div class="col-sm-4">
<input type="text" name="NoHpOrtu" class="form-control" placeholder="No Hp Ortu" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label"></label>
<div class="col-sm-5">
<input type="reset" class="btn btn-default" value="Batal"/>
<input type="submit" class="btn btn-warning" value="Daftar"/>
</div>
</div>
</form>
<hr>
</div>
</div>
<?php
require_once("koneksi.php");

$hp = "SELECT COUNT(NIS) as jumlah FROM tb_siswabaru WHERE proses='N'";
$jp = mysqli_query($conn,$hp);
$vjp = mysqli_fetch_array($jp);?>


<div class="panel panel-primary">   
<div class="panel-heading">
<button type="button" class="btn btn-primary">Siswa Baru <span class="badge"><?php echo $vjp['jumlah']; ?></span> Orang</button>
<span class="badge"><b>Menunggu Validasi</span>

</b></div>
<div class="panel-body">
<div class="col-sm-12">
<div class="table-responsive">
<?php
require_once("koneksi.php"); ?>
<table class="table table-condensed table-bordered">
<thead>
<tr>
<th width='5'>No.</th>
<th>idPendaftaran</th>
<th>Nama Siswa</th>
<th>Jenis Kelamin</th>
<th>Alamat</th>
</tr>
</thead>
<tbody>
<?php
require_once("koneksi.php");
$sql = "SELECT * FROM tb_siswabaru where proses='N' order by idpendaftaran desc";
$result = mysqli_query($conn, $sql);
$i = 1;
$rows = mysqli_num_rows($result);
if ($rows == 0) {
echo "<td colspan='11'><div class=alert alert-success role=alert>
<a class=alert-link>Belum Ada Data Pendaftaran yang diproses!</a></div></td>";
} else {
$No = 1;
while ($data = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $No; ?></td>
<td><?php echo $data['idpendaftaran']; ?></td>
<td><?php echo $data['NamaSiswa']; ?></td>
<td><?php echo $data['JenisKelamin']; ?></td>
<td><?php echo $data['AlamatSiswa']; ?></td>
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
</div>
</div>

