<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/bidang/edit/'.$bidang->id_bidang));
?>

<div class="form-group">
<input type="text" name="nama_bidang" class="form-control" placeholder="Nama kategori" value="<?php echo $bidang->nama_bidang ?>" required>
</div>
<div class="form-group">
<label>Isi</label>
<textarea name="isi" id="isi" class="form-control konten" placeholder="Isi galeri"><?php echo $bidang->isi ?></textarea>
</div>
<div class="form-group">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $bidang->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

