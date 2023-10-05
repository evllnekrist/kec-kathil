<?php
$site = $this->konfigurasi_model->listing();
?>
<style type="text/css" media="screen">
  .hoax {
    z-index: 9999;
    position: fixed;
    background-color: #FF0000;
    padding: 10px;
    bottom: 500px;
    right: 0px;
    font-weight: 700;
    font-size: 20px;
    color: white;
    text-align: center;
    /* border-top: solid 2px green;
    border-left: solid 2px green;
    border-right: solid 2px green; */
    min-width: 80px;
    border-radius: 25px 25px 25px 25px;
    animation: shake 1.0s;
    animation-iteration-count: infinite;
  }
  .news-box {
            padding: 5px;
            float: right;
            width: 20%;
            right: 3%;
            top: 12%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            position: absolute;
        }
       
.modal-dialogg {
    width: 600px;
    margin: 30px auto;
}

.modal-dialogg {
    position: relative;
    width: auto;
    margin: 10px;
}
.modal.in .modal-dialogg {
    position:fixed;
    bottom:0px;
    right:0px;
    margin:0px;
    padding-bottom: 20px;
}
@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
  
  .telepon {
    z-index: 9999;
    position: fixed;
    background-color: #008904;
    padding: 10px;
    bottom: 0;
    right: 200px;
    min-width: 80px;
    font-weight: 700;
    font-size: 40px;
    color: white;
    text-align: center;
    /* border-top: solid 2px #e93478;
    border-left: solid 2px #e93478;
    border-right: solid 2px #e93478; */
    border-radius: 25px 0 0 0;
  }
  .hoax a, .telepon a {
    color: white;
    font-size: 20px;
    font-weight: 700;
    text-align: center;
  }
  .hoax:hover, .telepon:hover {
    background-color: pink;

  }
</style>
<script>
$('.main-gallery').flickity({
  // options
  cellAlign: 'left',
  contain: true
});
var flkty = new Flickity( '.main-gallery', {
  // options
  cellAlign: 'left',
  contain: true
});
  </script>




<!-- <div class="telepon">
  <a href="tel:<?php echo $site->telepon ?>"><i class="fa fa-phone"></i></a>
</div> -->
<!-- <div class="hoax"> 
  <a href="#" class="topbar-social-item" data-toggle="modal" data-target=".bd-example-modal-lg"> ⓧ HOAX NEWS !
            </a>
</div> -->
<!-- END WA -->
<?php 
$site           = $this->konfigurasi_model->listing();
$nav_profil     = $this->nav_model->nav_profil();
$nav_topik     = $this->nav_model->nav_topik();
?>
<!-- Start Footer Section -->
<footer>
  
<div class="bg-footer-top">
<div class="container">
<div class="row">
    <div class="footer-top">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="footer-widgets">
                    <div class="widgets-title">
                        <h4 style="color:white;"><?php echo $site->namaweb ?></h4>
                    </div>
                
                    <!-- .widgets-content -->
                    <div class="address-box">
                        <ul class="address">
                            <li>
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span><?php echo nl2br($site->alamat) ?></span>
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span><?php echo $site->telepon ?></span>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <span><?php echo $site->email ?></span>

                            </li>
                        </ul>
                    </div>
                    <!-- .address -->
                </div>
                <!-- .footer-widgets -->
            </div>
            <!-- .col-md-4 -->
            <div class="col-md-6 col-sm-6">
                <div class="footer-widgets">
                    <div class="widgets-title">
                        <h3>Berita Terbaru</h3>
                    </div>
                    <!-- .widgets-title -->
                    <ul class="latest-news">
                        <?php foreach($nav_topik as $nav_topik) { ?>
                        <li>
                            <span class="thumbnail-img">
                            <?php if($nav_topik->gambar !="") { ?>
                                <img src="<?php echo base_url('assets/upload/image/'.$nav_topik->gambar) ?>" alt="<?php echo $nav_topik->judul_berita ?>" class="img-responsive" />
                            <?php }else{ ?>
                                <img src="<?php echo base_url('assets/upload/image/'.$site->icon) ?>" alt="<?php echo $nav_topik->judul_berita ?>" class="img-responsive" />
                            <?php } ?>
                        </span>
                            <div class="thumbnail-content">
                                <h5><a href="<?php echo base_url('berita/read/'.$nav_topik->slug_berita) ?>"><?php echo $nav_topik->judul_berita ?></a></h5>
                            </div>
                            <!-- .thumbnail-content -->
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- .footer-widgets -->
            </div>
            
            
        </div>
        <!-- .row -->
    </div>
    <!-- .footer-top -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .bg-footer-top -->

<div class="bg-footer-bottom">
<div class="container">
<div class="row">
    <div class="footer-bottom">
        <div class="copyright-txt">
            <p>Copyright &copy; <?php echo date('Y') ?>. <a href="" title="" style="color:black;">Katingan Hilir</a> All rights reserved.</p>
        </div>
        <!-- .copyright-txt -->
        <div class="social-box">
            <ul class="social-icon-rounded">
                <li><a href="<?php echo $site->facebook ?>"  style="color:black;"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo $site->instagram ?>" style="color:black;"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo $site->twitter ?>" style="color:black;"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <!-- .social-box -->

    </div>
    <!-- .footer-bottom -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .bg-footer-bottom -->

</footer>

<!-- End Footer Section -->


<!-- Start Scrolling -->

<div class="scroll-img"><i class="fa fa-angle-up" aria-hidden="true"></i></div>


<!-- End Scrolling -->


</div>
<!--<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>-->
<!--<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/fav5.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/lightcase.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.nstSlider.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/custom.map.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/plugins.isotope.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/custom.isotope.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/custom.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/popper.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/tema/assets/js/script.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.full.min.js"></script>
<!-- DataTables JS -->
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- <script src="https://dunggramer.github.io/disable-devtool/disable-devtool.min.js" defer></script>
<script src="https://cdn.staticaly.com/gh/DungGramer/disable-devtool/cbf447f/disable-devtool.min.js" defer></script>
<script src="https://gitcdn.xyz/repo/DungGramer/disable-devtool/master/disable-devtool.min.js" defer></script>
<script src="https://unpkg.com/flickity@2.3.0/dist/flickity.pkgd.min.js" defer></script> -->


<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script type="text/javascript">
    window.onload = function () {
        OpenBootstrapPopup();
    };
    function OpenBootstrapPopup() {
        $("#simpleModal").modal('show');
    };
</script>
<!-- <script type="text/javascript">
  $(window).load(function(){        
   $('#bd-example-modal-lg').modal('show');
    }); 
    
</script> -->
<script>
  $(function () {
     //Initialize Select2 Elements
    $('.select2').select2()
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('.editorku'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('#keterangan').wysihtml5({
      toolbar: { fa: true }
    })
  })
</script>
</html>
