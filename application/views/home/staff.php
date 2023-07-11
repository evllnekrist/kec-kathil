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
                     



</div>
</div>
</section>