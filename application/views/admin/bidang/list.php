<p>
  <?php include('tambah.php') ?>
</p>



<table class="table table-bordered table-hover table-striped" id="example1">
<thead class="bordered-darkorange">
<tr>
    <th>#</th>
    <th>Nama Bidang</th>
    <th>Isi</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($bidang as $b) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $b->nama_bidang ?></td>
    <td><?php echo $b->isi ?></td>
    <td><?php echo $b->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/bidang/edit/'.$b->id_bidang) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <a href="<?php echo base_url('admin/bidang/delete/'.$b->id_bidang) ?>" 
      class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>