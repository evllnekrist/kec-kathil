

<a class="btn btn-info btn-xs" data-toggle="modal" data-target="#portal<?php echo $berita->id_berita ?>" ><i class="fa fa-paper-plane-o"></i> Kirim Ke Portal </a>

<?php ini_set('display_errors','Off'); $db2 = $this->load->database('db2', TRUE); $w = $db2->query("SELECT * FROM berita WHERE slug_berita='$berita->slug_berita'")->result_array(); 
foreach($w as $x) { ?>
<p><?php if($x['slug_berita']=="$x[slug_berita]") { echo " Sudah Dikirim Ke Portal"; } ?></p>
<?php } ?>
<div class="modal fade" id="portal<?php echo $berita->id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <a class="btn btn-warning" onclick="printDiv('printMe<?php echo $berita->id_berita ?>','Title')" ><i class="fa fa-print"></i> Print</a>
    -->
    <h4 class="modal-title" id="myModalLabel">KIRIM DATA KE PORTAL KATINGAN ?</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
</div>
<div class="modal-body" >
<div >
<?php
echo form_open_multipart(base_url('admin/berita/tambah2'));
?>
<div class="row">
<div class="col-md-8">

<div class="form-group form-group-lg">
<input type="hidden" name="judul_berita" class="form-control" placeholder="Judul berita/profil/layanan" required="required" value="<?php echo $berita->judul_berita ?>">
</div>

</div>

<div class="col-md-4">

<div class="form-group form-group-lg">
<input type="hidden" name="icon" class="form-control" placeholder="Icon berita/profil/layanan" value="<?php echo $berita->icon ?>">
</div>

</div>

<div class="col-md-6">

<div class="form-group form-group-lg">

<div class="row">
  <div class="col-md-6">
    <input type="hidden" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo set_value('tanggal_publish'); }else{ echo date('Y-m-d',strtotime($berita->tanggal_publish)); } ?>" data-date-format="dd-mm-yyyy">
  </div>
  <div class="col-md-6">
  <input type="hidden" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo set_value('jam_publish'); }else{ echo date('H:i:s',strtotime($berita->tanggal_publish)); } ?>">
  </div>
</div>
</div>

</div>

<div class="col-md-6">

<div class="form-group form-group-lg">
<select name="status_berita" class="form-control" hidden> 
<?php if($this->session->userdata('akses_level')=="Admin"|| $this->session->userdata('akses_level')=='PKP') { ?>
	<option value="Publish">Publikasikan</option>
  <?php } ?>
	<option value="Draft" <?php if($berita->status_berita=="Draft") { echo "selected"; } ?>>Simpan sebagai draft</option>
</select>

</div>
</div>


<?php if($this->session->userdata('akses_level')=="Admin"|| $this->session->userdata('akses_level')=='User'|| $this->session->userdata('akses_level')=='PKP') { ?>
<div class="col-md-3">

<div class="form-group">
<select name="jenis_berita" class="form-control" hidden>
	<option value="Berita">Berita</option>
	<option value="Profil"  <?php if($berita->jenis_berita=="Profil") { echo "selected"; } ?>>Profil</option>
  <option value="Layanan"  <?php if($berita->jenis_berita=="Layanan") { echo "selected"; } ?>>Layanan</option>
</select>

</div>
</div>
<?php } ?>

<?php if($this->session->userdata('akses_level')=="Bidang") { ?>
<div class="col-md-3">

<div class="form-group">
<label>Kategori Berita</label>
<select name="id_kategori" class="form-control" readonly>

	<option value="8">Berita Kabupaten</option>
	

</select>
	

</div>
</div>
<?php } ?>
<?php if($this->session->userdata('akses_level')=="Admin"|| $this->session->userdata('akses_level')=='User'|| $this->session->userdata('akses_level')=='PKP') { ?>
<div class="col-md-3">

<div class="form-group">
<select name="id_kategori" class="form-control" hidden>

	<?php foreach($kategori as $kategori) { ?>
	<option value="<?php echo $kategori->id_kategori ?>"  <?php if($berita->id_kategori==$kategori->id_kategori) { echo "selected"; } ?>>
	<?php echo $kategori->nama_kategori ?></option>
	<?php } ?>

</select>

</div>
</div>
<?php } ?>
<div class="col-md-12">
<div class="form-group">
<label>Upload Gambar Utama Ulang untuk di tampilkan ke Portal Katingan</label>
<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<input type="hidden" name="caption" class="form-control" placeholder="Caption gambar" value="<?php echo $berita->caption ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<input type="hidden" name="urutan" class="form-control" placeholder="Urutan" value="0" readonly>
</div>
</div>

<div class="col-md-12">

<div class="form-group">
<textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)" style="display:none;"><?php echo $berita->keywords ?></textarea>
</div>

<div class="form-group" hidden>
<input type="hidden" name="isi" class="form-control" placeholder="Urutan" value='<?php echo $berita->isi ?>'>
</div>

<div class="form-group text-right">
<button type="submit" name="submit" class="btn btn-success btn-lg" ><i class="fa fa-save"></i> Kirim Data</button>

<div id="loading" style="display: none;">Loading...</div>
</div>

</div>

<?php
// Form close
echo form_close();
?>

            <!-- Modal -->
<div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div><!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

   <!-- Modal -->
<div class="modal fade" id="gambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div><!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

</div>

