<?php
echo form_open(base_url('admin/ipkd/proses'));
?>
<p class="btn-group">
  <a href="<?php echo base_url('admin/ipkd/tambah') ?>" class="btn btn-success btn-lg">
  <i class="fa fa-plus"></i> Tambah File</a>

  <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fa fa-trash-o"></i> Hapus
    </button> 

</p>


<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
<tr class="bg-info">
    <th width="5%">
        <div class="mailbox-controls">
            <!-- Check all button -->
            <button type="button" class="btn btn-default btn-xs checkbox-toggle"><i class="fa fa-square-o"></i>
            </button>
        </div>
    </th>
    <th width="10%">UNDUH</th>
    <th width="25%">JUDUL</th>
    <th width="20%">KATEGORI - POSISI</th>
    <th>AUTHOR</th>
    <th width="15%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($ipkd as $ipkd) { ?>

<tr>
    <td>
      <div class="mailbox-star text-center"><div class="text-center">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_ipkd[]" value="<?php echo $ipkd->id_ipkd ?>">
        <span class="checkmark"></span>
      </div>
    </td>
    <td>
      <a href="<?php echo base_url('admin/ipkd/unduh/'.$ipkd->id_ipkd) ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-ipkd"></i> ipkd</a>
    </td>
    <td><?php echo $ipkd->judul_ipkd ?>
      
      <br><small>
      Link:<br> 
      <textarea name="aa"><?php echo base_url('ipkd/unduh/'.$ipkd->id_ipkd) ?></textarea>
      </small>

    </td>
    <td><?php echo $ipkd->nama_kategori_ipkd ?> - <?php echo $ipkd->jenis_ipkd ?></td>
    <td><?php echo $ipkd->nama ?></td>
    <td>
      <div class="btn-group">
     
      <a href="<?php echo base_url('admin/ipkd/edit/'.$ipkd->id_ipkd) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <a href="<?php echo base_url('admin/ipkd/delete/'.$ipkd->id_ipkd) ?>" 
      class="btn btn-danger btn-xs" onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
    </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
<?php echo form_close(); ?>