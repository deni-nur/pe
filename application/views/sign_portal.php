<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$konfigurasi->namaweb ?> | <?=$konfigurasi->tagline ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logopemda.png">

  <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/colors/green.css" id="theme" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/animate.css" id="theme" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue sidebar-mini">
    
    <div class="preloader">
      <div class="cssload-speeding-wheel"></div>
    </div>

    <section id="wrapper" class="login-register bg-portal bg-body">
      <div class="cloud"><img src="<?php echo base_url() ?>assets/images/awan.svg" width="10%"></div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <div class="col-md-8" align="center">
            <?php foreach ($portal->result() as $key => $data) { ?>
            <button type="" class="btn btn-danger" style="background-color: #FF0000; border: none; color: white; padding: 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; color: red; border-radius: 50%;"><a href="<?=site_url('portal/'.$data->portal_id.'/dashboard') ?>" title="Tahun Log In" style="color: white"><i class="fa fa-database"></i><b> <?=$data->tahun_perencanaan ?></a></button>
            <?php } ?>
          </div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          
      <div class="hidden-sm hidden-xs" style="position:absolute;top: 10%;left:8%;">
        <img src="<?php echo base_url() ?>assets/images/logopemda.png" alt="home" class="dark-logo img-shadow" width="13%">
      </div>
      <div class="hidden-sm hidden-xs" style="position:absolute;padding: 10px 0px;left: 16%;top:10%;text-align: right">
        <h2 class="text-white font-bold title">Sistem Informasi Perencanaan dan Evaluasi</h2>
        <h4 class="text-white text-right m-t-0 p-r-0">- <?=$konfigurasi->namaweb ?> Kabupaten Sukabumi -</h4>
        <div class="cloud"><img src="<?php echo base_url() ?>assets/images/awan.svg" width="25%"></div>
        <div class="cloud2"><img src="<?php echo base_url() ?>assets/images/awan2.svg" width="25%"></div>
      </div>
      

    </section>
    <style type="text/css">
      .title{
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        /*-webkit-transition: .1s all linear;*/
        text-decoration: none;
        display: inline-block;
        position: relative;
        -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.7) 30%, #000 50%, rgba(0,0,0,.7) 70%);
        -webkit-mask-size: 200%;
        animation: shine 2s linear infinite;
        }
        @keyframes    shine {
        from { -webkit-mask-position: 150%; }
        to { -webkit-mask-position: -50%; }
        }
      .signin-box{
        margin-bottom: 60%;
      }
      .car-wrapper{
        position:absolute;top: 70%;left:10%;display: flex;
      }
      .car{
        opacity: 1;        
        animation-duration: 2s;
        animation-timing-function: ease-in-out;
        background-color: #FFF;
        padding: 20px;
        border: 3px solid #247BA0;
        border-radius: 100px;
        margin-left: 30px;
      }

      .car img, .car2 img, .car3 img{
        width: 50px;
      }

/*      @keyframes  fade{
        0% { opacity: 0; }
        20% { opacity: 1; }
        40% { opacity: 1; }
        60% { opacity: 1; }
        80% { opacity: 1; }
        100% { opacity: 0; }
      }*/

      .cloud{
        position: relative;
        animation: myfirst 5s infinite;
        animation-direction: alternate;
        animation-timing-function: ease-in-out;
      }
      .cloud2{
        position: relative;
        animation: mysecond 5s infinite;
        animation-direction: alternate;
        animation-timing-function: ease-in-out;
      }
      @keyframes  mysecond {
        0%   {left: -350px; top: 20px;}
        50%   {left: -330px; top: 20px;}
        100%  {left: -350px; top: 20px;}
      }
      @keyframes  myfirst {
        0%   {left: 220px; top: 20px;}
        50%   {left: 200px; top: 20px;}
        100%  {left: 220px; top: 20px;}
      }

      .bg-body{
        background-color: #247BA0;
        background-size: 100%;
        background-position: bottom;
        background-repeat: no-repeat;
      }
      .HYPE_scene{
      }

      .button {
    background-color: #FF0000; /* Hijau */
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }
  .button1 {border-radius: 50%;}
    </style>
<!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/js/jquery-2.1.0.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <!-- Menu Plugin JavaScript -->
  <script src="<?php echo base_url() ?>assets/js/sidebar-nav.min.js"></script>
  <!--slimscroll JavaScript -->
  <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>
  <!--Wave Effects -->
  <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
  <!-- Sweet-Alert  -->
  <script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.blockUI.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>
</body>
</html>
