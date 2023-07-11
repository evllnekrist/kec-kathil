<!DOCTYPE html>
<html>
<head>
    <title>Rest Client dengan AJAX JQuery</title>
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

			<table class="table table-responsive">
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
          <th scope="col">CAPTION</th>
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
 
<form method="post" enctype="multipart/form-data" id="form-edit">
<div class="form-group">
    <label>ID BERITA</label>
    <input type="text" class="form-control" name="berita" id="id_berita"> 
  </div>
  <div class="form-group">
    <label>ID USER</label>
    <input type="text" class="form-control" name="user" id="id_user"> 
  </div>
  <div class="form-group">
    <label>ID KATEGORI</label>
    <input type="text" class="form-control" name="kategori" id="id_kategori">
  </div>
  <div class="form-group">
    <label>SLUG BERITA</label>
    <input type="text" class="form-control" id="slug_berita"> 
  </div>
  <div class="form-group">
    <label>JUDUL BERITA</label>
    <input type="text" class="form-control" id="judul_berita"> 
  </div>
  <div class="form-group">
    <label>ISI</label>
    <textarea class="form-control" id="isi"></textarea>
  </div>
  <div class="form-group">
    <label>STATUS BERITA</label> 
    <input type="text" class="form-control" id="status_berita"> 
   
  </div>
  <div class="form-group">
    <label>JENIS BERITA</label>
    <input type="text" class="form-control" id="jenis_berita"> 
  </div>
  <div class="form-group">
    <label>KEYWORDS</label>
    <input type="text" class="form-control" id="keywords"> 
  </div>
  <div class="form-group">
    <label>CAPTION</label>
    <input type="text" class="form-control" id="caption"> 
  </div>
  <div class="form-group">
    <label>ICON</label>
    <input type="text" class="form-control" id="icon"> 
  </div>
  <div class="form-group">
    <label>URUTAN</label>
    <input type="number" class="form-control" id="urutan"> 
  </div>
  <div class="form-group">
    <label>TANGGAL POST</label>
    <input type="datetime" class="form-control" id="tanggal_post"> 
  </div>
  <div class="form-group">
    <label>TANGGAL PUBLISH</label>
    <input type="datetime" class="form-control" id="tanggal_publish"> 
  </div>
  <div class="form-group">
    <label>TANGGAL</label>
    <input type="datetime" class="form-control" id="tanggal">  
  </div>
  <div class="form-group">
    <label>GAMBAR</label>
    <input type="file" class="form-control"  name="gambar" id="gambar"> 
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
  
<form enctype="multipart/form-data" id="form-edit">
  <div class="form-group">
    <label>ID BERITA</label>
    <input type="text" class="form-control" name="berita" id="id_beritaEdit"> 
  </div>
  <div class="form-group">
    <label>ID USER</label>
    <input type="text" class="form-control" name="user" id="id_userEdit"> 
  </div>
  <div class="form-group">
    <label>ID KATEGORI</label>
    <input type="text" class="form-control" name="kategori" id="id_kategoriEdit">
  </div>
  <div class="form-group">
    <label>SLUG BERITA</label>
    <input type="text" class="form-control" id="slug_beritaEdit"> 
  </div>
  <div class="form-group">
    <label>JUDUL BERITA</label>
    <input type="text" class="form-control" id="judul_beritaEdit"> 
  </div>
  <div class="form-group">
    <label>ISI</label>
    <textarea class="form-control" id="isiEdit"></textarea>
  </div>
  <div class="form-group">
    <label>STATUS BERITA</label> 
    <input type="text" class="form-control" id="status_beritaEdit"> 
   
  </div>
  <div class="form-group">
    <label>JENIS BERITA</label>
    <input type="text" class="form-control" id="jenis_beritaEdit"> 
  </div>
  <div class="form-group">
    <label>KEYWORDS</label>
    <input type="text" class="form-control" id="keywordsEdit"> 
  </div>
  <div class="form-group">
    <label>CAPTION</label>
    <input type="text" class="form-control" id="captionEdit"> 
  </div>
  <div class="form-group">
    <label>ICON</label>
    <input type="text" class="form-control" id="iconEdit"> 
  </div>
 
  <div class="form-group">
    <label>URUTAN</label>
    <input type="number" class="form-control" id="urutanEdit"> 
  </div>
  <div class="form-group">
    <label>TANGGAL POST</label>
    <input type="datetime" class="form-control" id="tanggal_postEdit"> 
  </div>
  <div class="form-group">
    <label>TANGGAL PUBLISH</label>
    <input type="datetime" class="form-control" id="tanggal_publishEdit"> 
  </div>
  <div class="form-group">
    <label>TANGGAL</label>
    <input type="datetime" class="form-control" id="tanggalEdit"> 
  </div>
  <div class="form-group">
    <label>GAMBAR</label>
    <input type="file" class="form-control"  name="gambar" id="gambarEdit"> 
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
</body>
</html>