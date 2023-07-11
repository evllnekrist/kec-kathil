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

<!-- Start campaian video Section -->

<section class="bg-compaian-video">
    <div class="compaian-video-overlay">
        <div class="container">
            <div class="row">
                <div class="compaian-video">
                    <a href="https://www.youtube.com/embed/ONXGGh90eQc" data-rel="lightcase:myCollection"><img src="<?php echo base_url() ?>assets/tema/assets/images/home02/video-icon.png" alt="video-icon" /></a>
                    <h3>Pesona Kabupaten Katingan Provinsi Kalimantan Tengah</h3>
                </div>
                <!-- .compaian-video -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .compaian-video-overlay -->
</section>
<div class="section-header">
    <h2>Agenda terbaru</h2>
</div>
<!-- End campaian video Section -->
<div class="mb40"></div><!-- space -->

<div class="container">
<div class="row">

	  <?php foreach($agenda as $agenda) { ?>
	  <div class="col-md-4 rel text-center">
          <div class="agendaku">
            	<a href="<?php echo base_url('agenda/detail/'.sha1($agenda->id_agenda)) ?>">
				<div class="tanggal">
				<?php echo date('d',strtotime($agenda->mulai)) ?>
                </div>
                <div class="tahun">
                <?php echo date('M Y',strtotime($agenda->mulai)) ?>
                </div>
                </a>
            </div>
            
			<h4 class="title judul" data-appear-animation="bounceInLeft">
			<a href="<?php echo base_url('agenda/detail/'.sha1($agenda->id_agenda)) ?>">
			<?php echo $agenda->nama ?> <sup><i class="fa fa-eye"></i></sup></a></h4>
			<div class="text-small" data-appear-animation="bounceInLeft">
			  <?php echo character_limiter($agenda->isi,200) ?>
			  <div class="clearfix"></div><br>
			</div>
		</div>
		<?php } ?>
</div>

   
 
 </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb20"></div><!-- space -->

</div><!-- End #content -->

<!-- STart Maps Section -->
<style type="text/css" media="screen">
    iframe {
        width: 100%;
        height: 400px;
        min-height: 300px;
        border-radius: 15px;
    }
</style>
<div id="map"><?php echo $site->google_map; ?></div>
<!-- End Maps Section -->

<script src="<?php echo base_url() ?>assets/upload/gov/jquery-ui.min.js"></script>
<section class="property-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pd-details-text">
                    <div class="pd-details-tab" style="border: 1px solid #d7d7d7;">
                        <div class="tab-item">
                   
                            <!-- <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">SKPD</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">E-Goverment</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Kabupaten/Kota</a>
                                </li>
                            </ul> -->
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                               
							<div class="tab-pane fade-in active" id="tab-1" role="tabpanel" style="padding: 20px;">
                                    <div class="row">
                                                                                                            <div class="col-lg-3 col-sm-6 text-center form-group">
                                        <a href="https://bkppkatingankab.simpeg.id/v2/site/login" target="_blank">
                                            <img src="<?php echo base_url() ?>assets/upload/gov/12022020115846.png" style="max-width: 100%; height: 75px; background-color: black; border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="col-lg-3 col-sm-6 text-center form-group">
                                        <a href="https://www.lapor.go.id" target="_blank">
                                            <img src="<?php echo base_url() ?>assets/upload/gov/19032020105816.png" style="max-width: 100%; height: 75px; background-color: black; border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                                                                                                                                                                                                        <div class="col-lg-3 col-sm-6 text-center form-group">
                                        <a href="https://portal.katingankab.go.id/ipkd" target="_blank">
                                            <img src="<?php echo base_url() ?>assets/upload/gov/28072022015121.png" style="max-width: 100%; height: 75px; background-color: black; border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                                                                                                                                <div class="col-lg-3 col-sm-6 text-center form-group">
                                        <a href="http://jdih.katingankab.go.id/" target="_blank">
                                            <img src="<?php echo base_url() ?>assets/upload/gov/13022020120043.gif" style="max-width: 100%; height: 75px; background-color: black; border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="col-lg-3 col-sm-6 text-center form-group">
                                        <a href="http://ppid.katingankab.go.id" target="_blank">
                                            <img src="<?php echo base_url() ?>assets/upload/gov/19032020105955.png" style="max-width: 100%; height: 75px; background-color: black; border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                                                                                                                                                                                                                                                                                <div class="col-lg-3 col-sm-6 text-center form-group">
                                        <a href="https://sip-katingan.simda.net/login/" target="_blank">
                                            <img src="<?php echo base_url() ?>assets/upload/gov/13022020120446.png" style="max-width: 100%; height: 75px; background-color: black; border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                                                                                                                                <div class="col-lg-3 col-sm-6 text-center form-group">
                                        <a href="https://sirup.lkpp.go.id/sirup/ro/penyedia/kldi/D236" target="_blank">
                                            <img src="<?php echo base_url() ?>assets/upload/gov/13022020120332.png" style="max-width: 100%; height: 75px; background-color: black; border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                                                                                                                                <div class="col-lg-3 col-sm-6 text-center form-group">
                                        <a href="http://e-mail.katingankab.go.id/" target="_blank">
                                            <img src="<?php echo base_url() ?>assets/upload/gov/12022020115923.png" style="max-width: 100%; height: 75px; background-color: black; border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                                                        
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
