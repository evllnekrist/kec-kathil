
<a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail<?php echo $berita->id_berita ?>"><i class="fa fa-search-plus"></i></a>
<div class="modal fade" id="detail<?php echo $berita->id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<a class="btn btn-warning" onclick="printDiv('printMe<?php echo $berita->id_berita ?>','Title')" ><i class="fa fa-print"></i> Print</a>
   
    <h4 class="modal-title" id="myModalLabel">DETAIL DATA</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
</div>
<div class="modal-body" >
<div id="printMe<?php echo $berita->id_berita ?>">

<div class="form-group">
<h4><?php echo $berita->judul_berita ?></h4>
</div>
<div class="form-group">
<img src="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" width="50%">
</div>
<div class="form-group">
<br>Kategori : <?php echo $berita->nama_kategori ?>   
<br>Jenis Berita : <?php echo $berita->jenis_berita ?>  
<br>Posted : <?php echo date('d M Y H:i: s',strtotime($berita->tanggal_post)) ?>
<br>Published : <?php echo date('d M Y H:i: s',strtotime($berita->tanggal_publish)) ?>
</div>
<div class="form-group">
<br>Status Berita : <b><?php echo $berita->status_berita ?></b>
<br>Author : <b><?php echo $berita->nama_user ?></b>
</div>

<div class="clearfix"></div>
</div>

</div>
</div>
</div>
</div>
</div>
<script src="<?php echo base_url() ?>assets/admin/dist/js/jspdf.js"></script> 
<script type="text/javascript">
   var doc = new jsPDF();

function saveDiv(divId, title) {
doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
doc.save('Berita <?php echo $berita->judul_berita ?>.pdf');
}

function printDiv(divId,
 title) {

 let mywindow = window.open('', 'PRINT');

 mywindow.document.write(`<html><head><title>${title}</title>`);
 mywindow.document.write('</head><body >');
 mywindow.document.write(document.getElementById(divId).innerHTML);
 mywindow.document.write('</body></html>');

 mywindow.document.close(); // necessary for IE >= 10
 mywindow.focus(); // necessary for IE >= 10*/

 mywindow.print();
 mywindow.close();

 return true;
}
</script>
<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
