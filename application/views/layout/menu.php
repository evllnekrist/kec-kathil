<?php 
$site                       = $this->konfigurasi_model->listing(); 
$site_nav                   = $this->konfigurasi_model->listing();
$nav_profil                 = $this->nav_model->nav_profil();
$nav_bidang                 = $this->nav_model->nav_bidangg();
$nav_download               = $this->nav_model->nav_download();
$nav_berita                 = $this->nav_model->nav_berita();
$nav_agenda                 = $this->nav_model->nav_agenda();
$nav_layanan                = $this->nav_model->nav_layanan();
?>
<!-- Start Menu -->
<div class="bg-main-menu menu-scroll">
<div class="container">
<div class="row">
<div class="main-menu">
<a class="show-res-logo" href="<?php echo base_url() ?>"><img src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive" style="max-height: 76px; width: auto;" /></a>
<nav class="navbar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
        <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo $this->website->logo() ?>" alt="logo" class="img-responsive" style="max-height: 56px; width: auto;" /></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <!-- home -->
            <li><a href="<?php echo base_url() ?>" class="active">BERANDA</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PROFIL <span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                  
                    <li class="sub-active"><a href="<?php echo base_url('berita/read/profil-tsg') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>TENTANG KECAMATAN</a></li>
                 
                  
                    <li class="sub-active"><a href="<?php echo base_url('struktur') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> STRUKTUR ORGANISASI</a></li>                   
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BIDANG <span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                <?php foreach($nav_bidang as $nav_bidang) { ?>
                    <li class="sub-active"><a href="<?php echo base_url('bidang/read/'.$nav_bidang->slug_bidang) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_bidang->nama_bidang ?></a></li>
                  
                    <?php } ?> 
                </ul>
            </li>
            <!-- <li><a href="<?php echo base_url('bidang') ?>" >BIDANG</a></li> -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BERITA <span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    <!-- <?php foreach($nav_berita as $nav_berita) { ?>
                    <li class="sub-active"><a href="<?php echo base_url('berita/kategori/'.$nav_berita->slug_kategori) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_berita->nama_kategori ?></a></li>
                    <?php } ?> -->
                  
                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Semua Berita</a></li>                   
                </ul>
            </li>
            <li><a href="<?php echo base_url('agenda') ?>" >AGENDA</a></li>
            <!-- berita -->
           

            <!-- LAYANAN -->
            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LAYANAN<span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    <?php foreach($nav_layanan as $nav_layanan) { ?>
                    <li class="sub-active"><a href="<?php echo base_url('berita/read/'.$nav_layanan->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_layanan->judul_berita ?></a></li>
                    <?php } ?> 
                </ul> 
            </li> -->
           
            
            <!-- PROFIL -->
            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PROFIL<span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    <?php foreach($nav_profil as $nav_profil) { ?>
                    <li class="sub-active"><a href="<?php echo base_url('berita/read/'.$nav_profil->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_profil->judul_berita ?></a></li>
                    <?php } ?> 
                </ul>
            </li> -->

            <!-- galeri -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">GALERI <span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    
                    <li class="sub-active"><a href="<?php echo base_url('galeri'); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Galeri Foto</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('video'); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Galeri Video</a></li>                   
                </ul>
            </li>
            

            <!-- DOWNLOAD -->
            <li><a href="<?php echo base_url('download') ?>">UNDUHAN</a></li>
            
            <!-- kontak  -->
            <li><a href="<?php echo base_url('kontak') ?>">KONTAK</a></li>
            <!-- <li><a href="<?php echo base_url('ipkd') ?>">IPKD</a></li> -->
        </ul>
        <div class="menu-right-option pull-right">
            

           <div class="search-box">
               <i class="fa fa-search first_click" aria-hidden="true" style="display: block;"></i>
               <i class="fa fa-times second_click" aria-hidden="true" style="display: none;"></i>
           </div>
           <div class="search-box-text">
           <?php echo form_open('C_search/cari');?>
                    <input type="text" name="key" id="all-search" placeholder="Search Here">
                <?php echo form_close();?>
           </div>
        
           
        </div>
        <!-- .header-search-box -->
    </div>
    <!-- .navbar-collapse -->
</nav>
</div>
<!-- .main-menu -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .bg-main-menu -->
</header>

