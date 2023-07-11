
<section class="bg-sponsors-section">
            <div class="container">
                <div class="row">
                    <div class="sponsors-option">
                        <div class="section-header">
                            <h4>BERITA HOAX TERBARU</h4>
                            <p>Waspada ! Cegah Penyebaran Berita HOAX di Media Sosial.</p>
                        </div>
                        <?php 
                        $berita2    = $this->nav_model->nav_topik4();
                        ?>
                        <div class="sponsors-container">
                            <div class="swiper-wrapper">
                            <?php foreach($berita2 as $berita2) { ?>
                                <div class="swiper-slide">
                                    <div class="sopnsors-items">
                                    <center>   <a href="https://portal.katingankab.go.id/berita/kategori/hoax/<?php echo $berita2->slug_berita?>"><img src="https://portal.katingankab.go.id/assets/upload/image/<?php echo $berita2->gambar?>" style="width: 200px" alt="sponsors-img-1" class="img-responsive" /></a>
                                      
                                        <p><?php echo $berita2->judul_berita; ?><br><?=date('d F Y', strtotime($berita2->tanggal_publish))?><br><i class="fa fa-user"></i> <?php echo $berita2->nama; ?></p>   
                                        
                            
                                        <a href="https://portal.katingankab.go.id/berita/kategori/hoax/<?php echo $berita2->slug_berita?>" class="btn btn-default"><i class="fa fa-chevron-right"></i> Selengkapnya</a>                                
                                        </center>
                                    </div>
                                </div>
                                <?php } ?>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<!-- Start Upcoming Events Section -->


<section class="bg-upcoming-events">
<div class="container">
<div class="row">
<div class="upcoming-events">
<div class="section-header">
    <h2>Berita terbaru</h2>
</div>
<!-- .section-header -->
<div class="row">
    <?php foreach($berita as $berita) { ?>
    <div class="col-md-6">
        <div class="event-items">
            <div class="event-img">
                <a href="<?php echo base_url('berita/read/' . $berita->slug_berita); ?>"><img style="width:570px;height:300px;" src="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" alt="Berita Terbaru" class="img-responsive" /></a>
                <div class="date-box">
                    <h3><?php echo date('d', strtotime($berita->tanggal_publish)); ?></h3>
                    <h5><?php echo date('M', strtotime($berita->tanggal_publish)); ?></h5>
                </div>
                <!-- .date-box -->
            </div>
            <!-- .event-img -->
            <div class="events-content">
                <div style="min-height: 120px !important;">
                <h3><a href="<?php echo base_url('berita/read/' . $berita->slug_berita); ?>"><?php echo $berita->judul_berita; ?></a></h3>
                <ul class="meta-post">
                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('H:i', strtotime($berita->tanggal_publish)); ?></li>
                    <li><i class="fa fa-user"></i> <?php echo $berita->nama_user; ?></li>
                </ul>
                </div>
                <p class="text-justify"><?php echo character_limiter(strip_tags($berita->isi), 200); ?></p>
                <a href="<?php echo base_url('berita/read/' . $berita->slug_berita); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i> Selengkapnya</a>
            </div>
            <!-- .events-content -->
        </div>
        <!-- .events-items -->
    </div>
    <?php } ?>
    <!-- .col-md-6 -->
</div>
<!-- .row -->
</div>
<!-- .upcoming-events -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</section>
<section class="ftco-section ftco-speakers" id="speakers-section">
<div class="container">
<div class="row justify-content-center pb-5">
<div class="col-md-12 heading-section heading-section-white text-center ftco-animate">
<br>
<h2 class="mb-4">STRUKTUR ORGANISASI</h2>
</div>
</div>
<div class="row">
<div class="portfolio-items" style="position: relative; height: 810.39px; left: 400px;">
<?php foreach($staff2 as $s) { ?>
                            <div class="item cat-1" data-category="transition" style="position: relative; left: 32%; top: 0px;">
                                <div class="item-inner">
                                    <div class="portfolio-img">
                                        <div class="overlay-project"></div>
                                        <!-- .overlay-project -->
                                        <img width="200px" style="border-radius: 25px" src="<?php echo base_url('assets/upload/staff/'.$s->gambar) ?>" alt="Struktur Organisasi">
                                        <ul class="project-link-option">
                                            
                                            <li class="project-search"><a href="<?php echo base_url('assets/upload/staff/'.$s->gambar) ?>" data-rel="lightcase:myCollection"><i class="fa fa-search-plus" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
									<center>
                                        <h4>Nama : <a href="#"><?php echo $s->nama ?></a></h4>
										<p>NIP : <?php echo $s->nip ?></p>
                                        <p>Jabatan : <span><a href="#"><?php echo $s->jabatan ?></a></span></p>
                                    </center>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->

							<?php } ?>

                            <!-- .items -->
                        </div>
                        <div class="portfolio-items" style="position: relative; height: 810.39px; left: 800px;">
<?php foreach($staff3 as $s) { ?>
                            <div class="item cat-1" data-category="transition" style="position: relative; left: 32%; top: 0px;">
                                <div class="item-inner">
                                    <div class="portfolio-img">
                                        <div class="overlay-project"></div>
                                        <!-- .overlay-project -->
                                        <img width="200px" style="border-radius: 25px" src="<?php echo base_url('assets/upload/staff/'.$s->gambar) ?>" alt="Struktur Organisasi">
                                        <ul class="project-link-option">
                                            
                                            <li class="project-search"><a href="<?php echo base_url('assets/upload/staff/'.$s->gambar) ?>" data-rel="lightcase:myCollection"><i class="fa fa-search-plus" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
									<center>
                                        <h4>Nama : <a href="#"><?php echo $s->nama ?></a></h4>
										<p>NIP : <?php echo $s->nip ?></p>
                                        <p>Jabatan : <span><a href="#"><?php echo $s->jabatan ?></a></span></p>
                                    </center>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->

							<?php } ?>

                            <!-- .items -->
                        </div>
						<div class="portfolio-items" style="position: relative; height: 810.39px;">
<?php foreach($staff as $staff) { ?>
                            <div class="item cat-1" data-category="transition" style="position: relative; left: 32%; top: 0px;">
                                <div class="item-inner">
                                    <div class="portfolio-img">
                                        <div class="overlay-project"></div>
                                        <!-- .overlay-project -->
                                        <img width="200px" style="border-radius: 25px" src="<?php echo base_url('assets/upload/staff/'.$staff->gambar) ?>" alt="Struktur Organisasi">
                                        <ul class="project-link-option">
                                            
                                            <li class="project-search"><a href="<?php echo base_url('assets/upload/staff/'.$staff->gambar) ?>" data-rel="lightcase:myCollection"><i class="fa fa-search-plus" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
									<center>
                                        <h4>Nama : <a href="#"><?php echo $staff->nama ?></a></h4>
										<p>NIP : <?php echo $staff->nip ?></p>
                                        <p>Jabatan : <span><a href="#"><?php echo $staff->jabatan ?></a></span></p>
</center>
                                    </div>
                                    <!-- .latest-port-content -->
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->

							<?php } ?>

                            <!-- .items -->
                        </div>
                        <a href="<?php echo base_url('struktur'); ?>" class="btn btn-default btn pull-right"><i class="fa fa-chevron-right"></i> Lihat Selengkapnya</a>


</div>

</div>

</section>
<?php 
$nav_topik     = $this->nav_model->nav_topik2();
?>
<div id="simpleModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <?php foreach($nav_topik as $nav_topik) { ?>
                <center><h3 style="color:black;">BERITA TERBARU</h3></center>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h5 style="color:black;"><?php echo $nav_topik->judul_berita ?></h5><br>
            <img style="width:460;height:345;" src="<?php echo base_url('assets/upload/image/'.$nav_topik->gambar) ?>" alt="<?php echo $nav_topik->judul_berita ?>" class="img-responsive" />
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('berita/read/' . $nav_topik->slug_berita); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;Baca Selengkapnya</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php 
$berita4     = $this->nav_model->nav_topik3();
?>
<div class="modal fade" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialogg">
    <div class="modal-content">
    <div class="modal-header">
    <center><h3 style="color:black;">BERITA HOAX TERBARU</h3></center>
    
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <center><p>Waspada ! Cegah Penyebaran Berita HOAX di Media Sosial</p></center>
      <div class="modal-header">
                 <?php foreach($berita4 as $berita2) { ?>
                                <div class="swiper-slide">
                                    <div class="sopnsors-items">
                                    <center>   <a href="<?php echo base_url('berita/kategori/hoax/' . $berita2->slug_berita); ?>"><img src="<?php echo base_url('assets/upload/image/'.$berita2->gambar) ?>" style="width: 200px" alt="sponsors-img-1" class="img-responsive" /></a>
                                      
                                        <p><?php echo $berita2->judul_berita; ?><br><?=date('d F Y', strtotime($berita2->tanggal_publish))?><br><i class="fa fa-user"></i> <?php echo $berita2->nama; ?></p>   
                                        
                            
                                        <a href="<?php echo base_url('berita/kategori/hoax/' . $berita2->slug_berita); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i>Baca Selengkapnya</a>                                
                                        </center>
                                    </div>
                                    <!-- .sponsors-items -->
                                </div>
                                <?php } ?>
                              
</div>
    </div>
  </div>
</div>
<br>