<p>
  <?php include('tambah.php') ?>
</p>



<table class="table table-striped table-bordered table-hover" id="example1">
<thead>
<tr>
    <th>#</th>
    <th>Nama kategori ipkd</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_ipkd as $kategori_ipkd) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $kategori_ipkd->nama_kategori_ipkd ?></td>
    <td><?php echo $kategori_ipkd->slug_kategori_ipkd ?></td>
    <td><?php echo $kategori_ipkd->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/kategori_ipkd/edit/'.$kategori_ipkd->id_kategori_ipkd) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>