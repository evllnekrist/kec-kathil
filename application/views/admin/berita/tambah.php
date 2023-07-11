<?php if($this->session->userdata('akses_level')=="Admin"|| $this->session->userdata('akses_level')=='User'|| $this->session->userdata('akses_level')=='PKP') { ?>
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
//echo form_open_multipart(base_url('admin/berita/tambah'));
echo '<form id="my-form" method="POST">';

?>
  <?php } ?>

  <?php if($this->session->userdata('akses_level')=="Bidang") { ?>
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
echo form_open_multipart(base_url('admin/berita/tambah_data'));
?>
<?php } ?>
<div class="row">

<div class="col-md-8">

<div class="form-group form-group-lg">
<label>Judul berita/profil/layanan</label>
<input type="text" name="judul_berita" class="form-control" placeholder="Judul berita/profil/layanan" required="required" value="<?php echo set_value('judul_berita') ?>">
</div>

</div>

<div class="col-md-4">

<div class="form-group form-group-lg">
<label>Icon berita/profil/layanan</label>
<input type="text" name="icon" class="form-control" placeholder="Icon berita/profil/layanan" value="<?php echo set_value('icon') ?>">
</div>

</div>

<div class="col-md-6">

<div class="form-group form-group-lg">

<div class="row">
  <div class="col-md-6">
    <label>Tanggal Publish</label>
    <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo set_value('tanggal_publish'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy">
  </div>
  <div class="col-md-6">
  <label>Jam Publish</label>
  <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo set_value('jam_publish'); }else{ echo date('H:i:s'); } ?>">
  </div>
</div>
</div>

</div>

<div class="col-md-6">

<div class="form-group form-group-lg">
<label>Status Berita</label>
<select name="status_berita" class="form-control">
<?php if($this->session->userdata('akses_level')=="Admin"|| $this->session->userdata('akses_level')=='PKP'|| $this->session->userdata('akses_level')=='User') { ?>
	<option value="Publish">Publikasikan</option>
  <?php } ?>
	<option value="Draft">Simpan sebagai draft</option>
</select>

</div>
</div>
<?php if($this->session->userdata('akses_level')=="Bidang") { ?>
<div class="col-md-3">

<div class="form-group">
<label>Jenis Berita</label>
<select name="jenis_berita" class="form-control" readonly>
	<option value="Berita">Berita</option>
</select>

</div>
</div>
<?php } ?>
<?php if($this->session->userdata('akses_level')=="Admin"|| $this->session->userdata('akses_level')=='User'|| $this->session->userdata('akses_level')=='PKP') { ?>
<div class="col-md-3">

<div class="form-group">
<label>Jenis Berita</label>
<select name="jenis_berita" class="form-control">
	<option value="Berita">Berita</option>
	<option value="Profil">Profil</option>
  <!-- <option value="Layanan">Layanan</option> -->
</select>

</div>
</div>
<?php } ?>
<?php if($this->session->userdata('akses_level')=="Admin"|| $this->session->userdata('akses_level')=='User'|| $this->session->userdata('akses_level')=='PKP') { ?>
<div class="col-md-3">

<div class="form-group">
<label>Kategori Berita</label>
<select name="id_kategori" class="form-control" >

	<option value="8">Berita Kabupaten</option>
  <option value="4">Penelitian</option>
  <option value="5">Kegiatan</option>
  <option value="6">Informasi</option>
  <!-- <option value="7">Layanan</option> -->
	

</select>
	

</div>
</div>
<?php } ?>
<?php if($this->session->userdata('akses_level')=="Admin") { ?>
<div class="col-md-3">

<div class="form-group">
<label>Kategori Berita</label>
<select name="id_kategori" class="form-control">

	<?php foreach($kategori as $kategori) { ?>
	<option value="<?php echo $kategori->id_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
	<?php } ?>

</select>

</div>
</div>
<?php } ?>
<div class="col-md-3">
<div class="form-group">
<label>Upload gambar</label>
<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>Caption Gambar Judul</label>
<p>Note : Tambahkan Caption untuk gambar judul.</p>
<input type="text" name="caption" class="form-control" placeholder="Caption gambar">
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Urutan</label>
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="0" readonly>
</div>
</div>


<div class="col-md-12">


<div class="form-group">
<label>Keywords dan Ringkasan (untuk pencarian Google)</label>
<textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo set_value('keywords') ?></textarea>


</div>

<div class="form-group">
<label>Isi berita 
<!-- 
	<sup>
		<a data-toggle="modal" class="btn btn-info btn-xs" href="<?php echo base_url('admin/berita/files') ?>" data-target="#file"><i class="fa fa-download"></i> Attach File</a>

		<a data-toggle="modal" class="btn btn-info btn-xs" href="<?php echo base_url('admin/berita/gambar') ?>" data-target="#gambar"><i class="fa fa-download"></i> Attach Gambar</a>

	</sup> -->
</label>
<p>Note : untuk menambah caption pada gambar nyalakan captioned image pada insert gambar. <img src="<?php echo base_url() ?>assets/upload/image/captioned.JPG"></p>
<p>Pilih Penjajaran untuk letak gambar</p>

<textarea name="isi" class="form-control" id="isi" placeholder="Isi berita"><?php echo set_value('isi') ?></textarea>
</div>
<div class="form-group text-left">
<!-- <button type="submit" onclick="submitForm()">Submit</button> -->
  </div>
<div class="form-group text-right">

<p>Klik Submit 2 kali untuk mengirim data ke Portal Katingan</p>
<button type="submit" name="submit" id="submit-btn" onclick="buttonColor()" class="btn btn-success btn-lg" ><i class="fa fa-save"></i> Simpan Data</button>
<input type="hidden" id="myButton">
    <script>
      // get the button element
      const button = document.getElementById('myButton');

      // initialize a counter variable
      let clickCount = 0;

      // add a click event listener
      button.addEventListener('click', () => {
        // increment the click counter
        clickCount++;

        // check if the click count is equal to 2
        if (clickCount === 2) {
          // show an alert message
          alert('You clicked the button two times!');
          
          // reset the click counter
          clickCount = 0;
        }
      });
    </script>
<div id="loading" style="display: none;">Loading...</div>
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
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


<script>
  $('body').on('click', '[data-toggle="modal"]', function(){
        $($(this).data("target")+' .modal-body').load($(this).data("remote"));
    });  
</script>
<script>
    const sendData = e => {
      e.preventDefault();
      const formData = new FormData(document.getElementById("form"));

      fetch("<?php echo base_url() ?>admin/berita/tambah", { method: "POST", body: formData});
      fetch("<?php echo base_url() ?>admin/berita/tambah2", { method: "POST", body: formData});
      return false;
    };
  </script>
  <script>
  const form = document.getElementById('my-form');
  const submitBtn = document.getElementById('submit-btn');
  const loading = document.getElementById('loading');
  
  form.addEventListener('submit', async event => {
    event.preventDefault();
    submitBtn.disabled = true; // Menonaktifkan tombol submit
    loading.style.display = 'block'; // Menampilkan indikator loading
    const data = new FormData(form);
    try {
      await fetch('<?php echo base_url() ?>admin/berita/tambah', { method: 'POST', body: data });
       
      await fetch('<?php echo base_url() ?>admin/berita/tambah2', { method: 'POST', body: data });
      // Tambahkan URL lain untuk dikirimkan ke sini
      alert('Proses Kirim Data');
     
        // increment the click counter
        clickCount++;

        // check if the click count is equal to 2
        if (clickCount === 2) {
          // show an alert message
          alert('Kirim Data Ke Portal Katingan Berhasil');
          window.location.href = "<?php echo base_url() ?>admin/berita/";
          
          // reset the click counter
          clickCount = 0;
        }
      
    } catch (error) {
      alert('Terjadi kesalahan saat mengirim formulir!');
    } finally {
      submitBtn.disabled = false; // Mengaktifkan kembali tombol submit
      loading.style.display = 'none'; // Menyembunyikan indikator loading
    }
  });
</script>
<script>
function buttonColor() {
document.getElementById("submit-btn").style.backgroundColor= '#911';

}
</script>
<script>
  const btn = document.getElementById('submit-btn');

// ✅ Change button text on click
btn.addEventListener('click', function handleClick() {
  btn.textContent = 'Kirim Data Ke Portal';
});
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>

function myFunction() {
  window.location.href = '<?php echo base_url() ?>admin/berita/';
}
</script>