<!DOCTYPE html>
<html>
<head>
    <title>Rest Client dengan AJAX JQuery</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets')?>/css/bootstrap.min.css">
</head>
<body>
<!-- navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="#">Rest Client</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    </ul>
  </div>
</nav>
<!-- navbar -->

<!-- isi -->
<div class="container" style="margin-top: 75px">
    <div class="row">
        <div class="col-lg">
            <h1>REST Client dengan AJAX</h1>
            <!-- tombol -->
            <p class="text-right">
			    <button class="btn btn-primary" data-toggle="modal" data-target="#Modaltambah">Tambah Data</button>
			</p>
            <!-- tombol -->

			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">ID BERITA</th>
			      <th scope="col">ID USER </th>
			      <th scope="col">ID KATEGORI</th>
			      <th scope="col">SLUG BERITA</th>
			      <th scope="col">JUDUL BERITA</th>
				  <th scope="col">ISI</th>
				  <th scope="col">STATUS BERITA</th>
				  <th scope="col">JENIS BERITA</th>
				  <th scope="col">KEYWORDS</th>
				  <th scope="col">ICON</th>
				  <th scope="col">URUTAN</th>
				  <th scope="col">TANGGAL POST</th>
				  <th scope="col">TANGGAL PUBLISH</th>
				  <th scope="col">TANGGAL</th>
				  <th scope="col">GAMBAR</th>
			      <th scope="col">AKSI</th>
			    </tr>
			  </thead>
			  <tbody id="tempat_data">
			    <tr>
			      <td>x</td>
			      <td>x</td>	
			      <td>x</td>
			      <td>x</td>
			      <td>x</td>
			      <td>x</td>
				  <td>x</td>
			      <td>x</td>	
			      <td>x</td>
			      <td>x</td>
				  <td>x</td>
				  <td>x</td>
			      <td>x</td>	
			      <td>x</td>
			      <td>x</td>
				  <td>x</td>
			    </tr>
			  </tbody>
			</table>
 
        </div>
    </div>
</div>
<!-- isi -->

<!-- modal tambah-->
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
<form>
  <div class="form-group">
    <label>ID</label>
    <input type="text" class="form-control" id="id">
  </div>
  <div class="form-group">
    <label>NAMA</label>
    <input type="text" class="form-control" id="nama">
  </div>
  <div class="form-group">
    <label>ALAMAT</label>
    <textarea class="form-control" id="alamat"></textarea>
  </div>
  <div class="form-group">
    <label>GENDER</label>
    <select class="form-control" id="gender">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>
  </div>
  <div class="form-group">
    <label>GAJI</label>
    <input type="number" class="form-control" id="gaji">
  </div>
</form>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- modal tambah-->

<!-- modal edit -->
<div class="modal fade" id="Modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
<form>
  <div class="form-group">
    <label>ID</label>
    <input type="text" class="form-control" id="idEdit">
  </div>
  <div class="form-group">
    <label>NAMA</label>
    <input type="text" class="form-control" id="namaEdit">
  </div>
  <div class="form-group">
    <label>ALAMAT</label>
    <textarea class="form-control" id="alamatEdit"></textarea>
  </div>
  <div class="form-group">
    <label>GENDER</label>
    <select class="form-control" id="genderEdit">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>
  </div>
  <div class="form-group">
    <label>GAJI</label>
    <input type="number" class="form-control" id="gajiEdit">
  </div>
</form>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update" data-dismiss="modal">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- modal edit -->
 
<!-- JS Bootstrap -->
<script src="<?= base_url('assets')?>/js/jquery.min.js"></script>
<script src="<?= base_url('assets')?>/js/popper.min.js"></script>
<script src="<?= base_url('assets')?>/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script type="text/javascript" src="<?= base_url('assets')?>/js/script.js"></script>
</body>
</html>