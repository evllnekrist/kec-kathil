<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.notification {
  background-color: #eb6b6b;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>

<a class="notification" data-toggle="modal" data-target="#lihatpesan<?php echo $berita->slug_berita ?>">
    <i class="fa fa-comments"></i> Lihat Pesan
    <span class="badge"><?php 
    $db2 = $this->load->database('db2', TRUE);
    $w = $db2->query("SELECT * FROM log_pesan_berita WHERE slug_berita='$berita->slug_berita' AND status='belum'")->num_rows(); ?><?=$w?></span>
</a>

<div class="modal fade" id="lihatpesan<?php echo $berita->slug_berita ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Lihat Pesan</h4>
</div>
<div class="modal-body">
    
Judul Berita : <b><?php echo $berita->judul_berita ?></b><br>
Oleh : <b><?php echo $this->session->userdata('nama'); ?></b>
<table class="table table-bordered table-hover table-striped" id="example1">
<thead class="bordered-darkorange">
<tr>
    <th>#</th>
    <th>Tanggal & Waktu</th>
    <th>Pesan</th>
    <th>Oleh</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; 
$db2 = $this->load->database('db2', TRUE);
$pesan2 = $db2->query("SELECT log_pesan_berita.id_log, log_pesan_berita.slug_berita, log_pesan_berita.pesan,log_pesan_berita.tanggal, log_pesan_berita.status, users.nama
FROM log_pesan_berita
LEFT JOIN berita ON log_pesan_berita.slug_berita = berita.slug_berita
LEFT JOIN users ON users.id_user = log_pesan_berita.id_user where berita.slug_berita ='$berita->slug_berita' ORDER BY slug_berita DESC")->result_array();      
foreach($pesan2 as $pesan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?=$pesan['tanggal']?></td>
    <td><?=$pesan['pesan']?></td>
    <td><?=$pesan['nama']?></td>
    <td>
  <a href="<?=base_url()?>admin/berita/status_pesan/<?=$pesan['id_log']?>" onclick="return confirm('Apa kamu yakin sudah selesai di perbaiki?')" class="btn btn-success" <?php if($pesan['status']=="sudah") { echo "hidden=hidden"; } ?>><i class="fa fa-check" aria-hidden="true"></i> <?php if($pesan['status']=="belum") { echo "Sudah di perbaiki"; } ?></a>
    <b><?php if($pesan['status']=="sudah") { echo "Selesai di perbaiki"; } ?></b>
  
  </td>
 
</tr>

<?php $i++; } ?>

</tbody>
</table>

