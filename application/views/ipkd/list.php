
<style>
.agendaku {
	margin: 10px;
	border: solid thin #EEE;
	border-radius: 5px;
}
.agendaku:hover, .agendaku .tanggal:hover {
	background-color: #ffc;
}
.agendaku .tanggal {
	background-color: #FFF;
	padding: 30px 20px;
	font-weight: bold;
	border-bottom: solid thin #EEE;
	border-radius: 5px 5px 0 0;
	font-size: 40px;
	min-height: 60px;
}
.agendaku .tahun {
	background-color: #F60;
	color: #FFF;
	padding: 10px 20px;
	border-radius: 0 0 5px 5px;
	font-weight: bold;
	border: solid thin #EEE;
}
h4.judul {
	font-size: 14px;
	margin: 0;
	text-align: center;
	text-transform: uppercase;
}
</style>
<div id="content" role="main">
<div class="page-header dark larger larger-desc">
<div class="container">
<div class="row">
    <div class="col-md-12">
    <h2><?php //echo $title ?> DATA IPKD</h2>
    </div><!-- End .col-md-6 -->
</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .page-header -->

<div class="mb40"></div><!-- space -->

<div class="container">
<div class="row">

<?php foreach($ipkd as $ipkd) { ?>
	  <div class="col-md-4 rel text-center">
          <div class="agendaku">
            	<a href="<?php echo base_url('ipkd/unduh/'.$ipkd->id_ipkd) ?>">
				<div class="tanggal">
				<?php echo date('d',strtotime($ipkd->tanggal)) ?>
                </div>
                <div class="tahun">
                <?php echo date('M Y',strtotime($ipkd->tanggal)) ?>
                </div>
                </a>
            </div>
            
			<h4 class="title judul" data-appear-animation="bounceInLeft">
			<a href="<?php echo base_url('ipkd/unduh/'.$ipkd->id_ipkd) ?>">
			<?php echo $ipkd->judul_ipkd ?> <sup><i class="fa fa-eye"></i></sup></a></h4>
			<div class="text-small" data-appear-animation="bounceInLeft">
			  <?php echo character_limiter($ipkd->isi,200) ?>
			  <div class="clearfix"></div><br>
			</div>
		</div>
		<?php } ?>
</div>

    <div class="clearfix"></div>
        <div class="col-md-12 text-center pagination pagin">
        <div class="clearfix"></div>
        <?php if(isset($pagin)) { echo $pagin; }  ?>
        <div class="clearfix"></div>
        </div>
 
 </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb20"></div><!-- space -->

</div><!-- End #content -->

<!-- 


<section class="bg-servicesstyle2-section">
  <div class="container">
    <div class="row">
      <div class="our-services-option">
        <div class="section-header">
          <h2><?php //echo $title ?> ipkd</h2>
        </div>
        <div class="row">

          <style type="text/css" media="screen">
          th, td {
            text-align: left !important;
            vertical-align: top  !important;
            padding: 6px 12px !important;
            color: #000 !important;
          }
        </style>

        <div class="col-md-12">
          <?php if($this->uri->segment(3) == "") { ?>
            <p class="alert alert-success">Berikut data file yang dapat Anda unduh</p>

          <?php }else{ ?>
            <p class="alert alert-success">Berikut data file dengan kategori <strong><?php echo $kategori_ipkd->nama_kategori_ipkd ?></strong> yang dapat Anda unduh</p>
          <?php } ?>
          <div class="table-responsive mailbox-messages">
          <table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
             <tr>
               <th width="5%">No</th>
               <th>Judul</th>
               <th>Keterangan</th>
               <th>Tanggal Terbit</th>
               <th width="5%"></th>
             </tr>
           </thead>
           <tbody>
            <?php $i=1; foreach($ipkd as $ipkd) { ?>
             <tr>
               <td><?php echo $i ?></td>
               <td><?php echo $ipkd->judul_ipkd ?></td>
               <td><?php echo $ipkd->isi ?></td>
               <td><?php echo date('d M Y H:i: s',strtotime($ipkd->tanggal)) ?></td>
               <td>
                 <a href="<?php echo base_url('ipkd/unduh/'.$ipkd->id_ipkd) ?>" class="btn btn-primary btn-xs" target="_blank">
                   <i class="fa fa-ipkd"></i> Unduh</a>
                 </td>
               </tr>
               <?php $i++; } ?>
             </tbody>
           </table>
         </div>
         </div>
       </div>
       </div>
     </div>
   </div>
 </section> -->