  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/kategori_ipkd/edit/'.$kategori_ipkd->id_kategori_ipkd));
?>

<div class="form-group">
<input type="text" name="nama_kategori_ipkd" class="form-control" placeholder="Nama kategori ipkd" value="<?php echo $kategori_ipkd->nama_kategori_ipkd ?>" required>
</div>

<div class="form-group">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori_ipkd->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

