<a class="btn btn-primary" data-toggle="modal" data-target="#pesan<?php echo $berita->id_berita ?>" style="color:white;">
    <i class="fa fa-comments"></i> Kirim Pesan <br>
    Pesan yang sudah dikirim <?php 
    $db2 = $this->load->database('db2', TRUE);
    $w = $db2->query("SELECT * FROM log_pesan_berita WHERE id_berita='$berita->id_berita'")->num_rows(); ?>(<?=$w?>)
</a>
<div class="modal fade" id="pesan<?php echo $berita->id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Kirim Pesan</h4>
</div>
<div class="modal-body">
    

<table class="table table-bordered table-hover table-striped" id="example1">
<thead class="bordered-darkorange">
<tr>
    <th>#</th>
    <th>Tanggal & Waktu</th>
    <th>Pesan</th>
    <th>Oleh</th>
    <th>Status Pesan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; 
$db2 = $this->load->database('db2', TRUE);
$pesan2 = $db2->query("SELECT log_pesan_berita.id_log, log_pesan_berita.slug_berita, log_pesan_berita.pesan,log_pesan_berita.tanggal,log_pesan_berita.status, users.nama
FROM log_pesan_berita
LEFT JOIN berita ON log_pesan_berita.slug_berita = berita.slug_berita
LEFT JOIN users ON users.id_user = log_pesan_berita.id_user where berita.slug_berita ='$berita->slug_berita' ORDER BY slug_berita DESC")->result_array();      
foreach($pesan2 as $pesan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?=$pesan['tanggal']?></td>
    <td><?=$pesan['pesan']?></td>
    <td><?=$pesan['nama']?></td>
    <td><?php if($pesan['status']=="belum") { echo "Belum di perbaiki"; } ?><?php if($pesan['status']=="sudah") { echo "Sudah di perbaiki"; } ?></td>
    <td>
      
<!--       
      <a href="<?php echo base_url('admin/kategori/edit/'.$pesan->id_kategori) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> -->

      <a href="<?=base_url()?>admin/berita/delete_pesan/<?=$pesan['id_log']?>" class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>

<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/berita/tambah_pesan'));
?>

<div class="form-group">
<input type="hidden" name="id_berita" class="form-control" placeholder="id berita" value="<?php echo $berita->id_berita ?>" required>
</div>
Judul Berita : <b><?php echo $berita->judul_berita ?></b><br>
Oleh : <b><?php echo $this->session->userdata('nama'); ?></b>
<div class="form-group">
			<input type="hidden" name="user" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" required>
		</div>
<div class="form-group">
<label>Isi Pesan :</label>
<textarea name="pesan" class="form-control" required></textarea>
</div>



<div class="form-group text-center">
<input type="submit" name="submit"  class="btn btn-success btn-md" value="Kirim Pesan">
<!-- <a id="btnSubmit" class="btn btn-info">Submit</a> -->
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
    

</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
  $('#btnSubmit').click(function() {
    $('#myform').submit();
  });

});
   </script>
