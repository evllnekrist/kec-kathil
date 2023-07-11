
<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Error upload
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Form open
echo form_open_multipart(base_url('admin/ipkd/edit/'.$ipkd->id_ipkd));
?>
<div class="row">
<div class="col-md-12">

<div class="form-group form-group-lg">
<label>Nama file/ipkd</label>
<input type="text" name="judul_ipkd" class="form-control" placeholder="Judul ipkd" value="<?php echo $ipkd->judul_ipkd ?>">
</div>

</div>

<div class="col-md-4">

<div class="form-group">
<label>Jenis/Posisi ipkd</label>
<select name="jenis_ipkd" class="form-control">
	<option value="ipkd">ipkd Biasa</option>
	<option value="Panduan" 
	<?php if($ipkd->jenis_ipkd=="Panduan") { echo "selected"; } ?>
	>Panduan Penelitian</option>
</select>

</div>
</div>

<div class="col-md-4">

<div class="form-group">
<label>Kategori ipkd</label>
<select name="id_kategori_ipkd" class="form-control">

	<?php foreach($kategori_ipkd as $kategori_ipkd) { ?>
	<option value="<?php echo $kategori_ipkd->id_kategori_ipkd ?>" 
	<?php if($ipkd->id_kategori_ipkd==$kategori_ipkd->id_kategori_ipkd) { echo "selected"; } ?>
	><?php echo $kategori_ipkd->nama_kategori_ipkd ?></option>
	<?php } ?>

</select>

</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Upload File</label>
<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
</div>
</div>
<div class="col-md-6">

<div class="form-group form-group-lg">

<div class="row">
  <div class="col-md-6">
    <label>Tanggal</label>
    <input type="text" name="tanggal" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal'])) { echo set_value('tanggal'); }else{ echo date('Y-m-d',strtotime($ipkd->tanggal)); } ?>" data-date-format="dd-mm-yyyy">
  </div>
  <div class="col-md-6">
  <label>Jam </label>
  <input type="text" name="jam" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam'])) { echo set_value('jam'); }else{ echo date('H:i:s',strtotime($ipkd->tanggal)); } ?>">
  </div>
</div>
</div>

</div>
<div class="col-md-12">

<div class="form-group">
<label>Isi/Keterangan</label>
<textarea name="isi" id="isi" class="form-control konten" placeholder="Isi ipkd"><?php echo $ipkd->isi ?></textarea>
</div>

<div class="form-group">
<label>Link/website terkait ipkd</label>
<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo $ipkd->website ?>">
</div>

<div class="form-group">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>

</div>
</div>
<?php
// Form close
echo form_close();
?>