<?php
// Site
ini_set('display_errors','off');
$site_info = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<meta name="description" content="<?php echo strip_tags($site_info->tentang).', '.$title ?>">
<meta name="keywords" content="<?php echo $site_info->keywords.', '.$title  ?>">
<meta name="author" content="<?php echo $site_info->namaweb ?>">
<!-- icon -->
<link rel="shortcut-icon" href="<?php echo $this->website->icon(); ?>"> 
<!-- <link rel="icon"href="<?php echo base_url('/assets/upload/image/13022020054836_1_mini_katingan.png') ?>" />  -->
<link rel="icon"href="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" />

<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Plugin css -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/font-awesome.min.css" media="all" /> -->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/fav5.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/bootstrap.min.css?ver=<?php echo date('Y-m-d'); ?>" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/animate.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/swiper.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/lightcase.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/jquery.nstSlider.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/flexslider.css" media="all" />
<!-- own style css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/style.css?ver=<?php echo date('Y-m-d'); ?>" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/rtl.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/responsive.css" media="all" />
<!-- DataTables CSS -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.css">
<!-- Select2 -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/demo.css" media="all" /> -->
  <style type="text/css" media="screen">
  	p {
  		margin-bottom: 15px;
  	}

  </style>
  
  <noscript><style>
#content-wrapper, #footer-wrapper {display:none}
  body,html {overflow:hidden}
  /* Noscript Popup by igniel.com */
  #ignielNoscript {background:rgba(0,0,0,0.85);padding:0;position:fixed;bottom:0;left:0;top:-100px;right:0;z-index:1000;opacity:1;visibility:visible;height:auto;}
  #ignielNoscript svg {width:100px; height:100px}
  #ignielNoscript svg path {fill:#fff}
  #ignielNoscript .isiNoscript{background:#008c5f;color:#fff;position:absolute;text-align:center;padding:0 30px 30px 30px;margin:auto;top:30%;left:0;right:0;font-size:1.5rem;font-weight:400;line-height:1.5em;font-family:monospace;max-width:670px;box-shadow:0 20px 10px -10px rgba(0,0,0,0.15);border:15px solid rgba(0,0,0,.07); overflow:hidden; transition:all .6s cubic-bezier(.25,.8,.25,1); -webkit-transform:translateZ(0); transform:translateZ(0); backface-visibility:visible; transition:all .2s ease-in-out,visibility 0s; transform-origin:bottom center; pointer-events:auto; transform:rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale(1); opacity:1; animation:ignielWobble .5s; -moz-animation: ignielWobble .5s; -webkit-animation:ignielWobble .5s; -o-animation:ignielWobble .5s}
  #ignielNoscript .isiNoscript:hover{box-shadow:0 20px 10px -10px rgba(0,0,0,0.2);}
  #ignielNoscript .isiNoscript h4, #ignielNoscript .isiNoscript .judul{display:inline-block;background:rgba(0,0,0,.07);padding:5px 25px 15px 25px;font-size:2.2rem;font-weight:600;margin-bottom:20px}
</style></noscript>
</head>

<body>
<noscript>
  <div id='ignielNoscript'>
    <div class='isiNoscript'><span class='judul'>Aktifkan Javascript</span><br/><svg viewBox='0 0 24 24'><path d='M3,3H21V21H3V3M7.73,18.04C8.13,18.89 8.92,19.59 10.27,19.59C11.77,19.59 12.8,18.79 12.8,17.04V11.26H11.1V17C11.1,17.86 10.75,18.08 10.2,18.08C9.62,18.08 9.38,17.68 9.11,17.21L7.73,18.04M13.71,17.86C14.21,18.84 15.22,19.59 16.8,19.59C18.4,19.59 19.6,18.76 19.6,17.23C19.6,15.82 18.79,15.19 17.35,14.57L16.93,14.39C16.2,14.08 15.89,13.87 15.89,13.37C15.89,12.96 16.2,12.64 16.7,12.64C17.18,12.64 17.5,12.85 17.79,13.37L19.1,12.5C18.55,11.54 17.77,11.17 16.7,11.17C15.19,11.17 14.22,12.13 14.22,13.4C14.22,14.78 15.03,15.43 16.25,15.95L16.67,16.13C17.45,16.47 17.91,16.68 17.91,17.26C17.91,17.74 17.46,18.09 16.76,18.09C15.93,18.09 15.45,17.66 15.09,17.06L13.71,17.86Z'/></svg><br/>Untuk mengakses Portal Kabupaten Katingan, hidupkan Javascript di dalam pengaturan browser.</div>
  </div>
</noscript>
