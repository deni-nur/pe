<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$site->namaweb ?> | <?=$site->tagline ?></title>
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
  <link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/'.$site->logo) ?>">

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
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <div class="hidden-sm hidden-xs" style="position:absolute;top: 10%;left:9%;">
        <img src="<?php echo base_url() ?>assets/images/logopemda.png" alt="home" class="dark-logo img-shadow" width="5%">
      </div>
          <a href="#" class="navbar-brand"><?=$site->namaweb ?> | <?=$site->tagline ?></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="<?=$site->facebook ?>" class="topbar-social-item">
                <i class="fa fa-facebook"></i>
              </a>
            
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="<?=$site->twitter ?>" class="topbar-social-item">
                <i class="fa fa-twitter"></i>
              </a>
              
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="<?=$site->instagram ?>" class="topbar-social-item">
                <i class="fa fa-instagram"></i>
              </a>
              
            </li>

            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="<?=$site->youtube ?>" class="topbar-social-item">
                <i class="fa fa-youtube"></i>
              </a>
              
            </li>

            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="<?=$site->website ?>" class="topbar-social-item">
                <i class="fa fa-globe"></i>
              </a>
              
            </li>

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="<?php echo base_url('auth/login') ?>" class="btn btn-success">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <i class="fa fa-unlock-alt"><b> Login</i>
              </a>
              
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 align="center">
          DATA CAPAIAN KINERJA KETENAGAKERJAAN DAN KETRANSMIGRASIAN
        </h1>
        <br>
      </section>

<!--<div class="col-md-6">-->
<!--<div class="box box-primary">-->
<!--<div class="box-header with-border">-->
<!--  <i class="fa fa-th"></i>-->
<!--<h3 class="box-title">Indeks Pembangunan Manusia (IPM)</h3>-->

<!--  <div class="box-tools pull-right">-->
<!--    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
<!--    </button>-->
<!--    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
<!--  </div>-->
<!--</div>-->
<!--<div class="box-body chart-responsive">-->
<!--  <div class="chart" id="realisasi_tujuan_rpjmd-chart" style="height: 300px;"></div>-->
<!--</div>-->
<!-- /.box-body -->
<!--</div>-->
<!-- /.box -->
<!--</div>-->

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-info">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Tingkat Pengangguran Terbuka (TPT)</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="realisasi_sasaran_rpjmd-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
  <div class="box box-danger">
    <div class="box-header with-border">
        <i class="fa fa-th"></i>
      <h3 class="box-title">Tingkat Partisipasi Angkatan Kerja (TPAK)</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body chart-responsive">
      <div class="chart" id="sales-chart" style="height: 300px;"></div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-default">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Persentase Jumlah Transmigran yang Terlatih</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="realisasi_sasaran_renstra2-chart" style="height: 285px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Persentase Kegiatan yang dilaksanakan yang mengacu ke rencana tenaga kerja</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="realisasi_program1-chart" style="height: 250px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Persentase Tenaga Kerja Bersertifikat Kompetensi</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="realisasi_program2-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Persentase Tenaga Kerja yang ditempatkan (dalam dan luar negeri) melalui mekanisme layanan
Antar Kerja dalam wilayah Kabupaten/Kota</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="realisasi_program3-chart" style="height: 250px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Persentase Perusahaan yang menerapkan tata kelola kerja yang layak (PP/PKB, LKS Bipartit, Struktur
Skala Upah, dan terdaftar peserta BPJS ketenagakerjaan)</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="realisasi_program4-chart" style="height: 235px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Persentase jumlah KK transmigran yang difasilitasi</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="realisasi_program5-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Persentase jumlah KK transmigran yang dilatih</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="realisasi_program6-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-success">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">PAD / IMTA</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="pad-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<!--<div class="col-md-6">-->
<!-- LINE CHART -->
<!--<div class="box box-success">-->
<!--  <div class="box-header with-border">-->
<!--    <i class="fa fa-th"></i>-->
<!--<h3 class="box-title">Pelatihan Kerja Berdasarkan Tahun</h3>-->

<!--    <div class="box-tools pull-right">-->
<!--      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
<!--      </button>-->
<!--      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="box-body chart-responsive">-->
<!--    <div class="chart" id="pelatihan-chart" style="height: 300px;"></div>-->
<!--  </div>-->
  <!-- /.box-body -->
<!--</div>-->
<!-- /.box -->
<!--</div>-->

<!--<div class="col-md-6">-->
<!-- LINE CHART -->
<!--<div class="box box-success">-->
<!--  <div class="box-header with-border">-->
<!--    <i class="fa fa-th"></i>-->
<!--<h3 class="box-title">Pelatihan Kerja Berdasarkan Kejuruan</h3>-->

<!--    <div class="box-tools pull-right">-->
<!--      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
<!--      </button>-->
<!--      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="box-body chart-responsive">-->
<!--    <div class="chart" id="pelatihan_kejuruan-chart" style="height: 300px;"></div>-->
<!--  </div>-->
  <!-- /.box-body -->
<!--</div>-->
<!-- /.box -->
<!--</div>-->

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-success">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Kelembagaan Swasta</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="lembaga-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-success">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Bursa Kerja Khusus (BKK)</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="bkk-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-success">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Padat Karya Infrastruktur Berdasarkan Tahun</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="padat_karya-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-success">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Padat Karya Infrastruktur Berdasarkan Desa</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="padat_karya_desa-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-warning">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Tenaga Kerja Mandiri Berdasarkan Tahun</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="tkm-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<div class="col-md-6">
<!-- LINE CHART -->
<div class="box box-warning">
  <div class="box-header with-border">
    <i class="fa fa-th"></i>
<h3 class="box-title">Tenaga Kerja Mandiri Berdasarkan Desa</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body chart-responsive">
    <div class="chart" id="tkm_desa-chart" style="height: 300px;"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

<!--<div class="col-md-6">-->
<!--    <div class="box box-primary">-->
<!--      <div class="box-header with-border">-->
<!--      <i class="fa fa-th"></i>-->
<!--      <h3 class="box-title">Penempatan PMI Berdasarkan Tahun</h3>-->
<!--      <div class="box-tools pull-right">-->
<!--        <button type="button" class="btn btn-sm" data-widget="collapse">-->
<!--          <i class="fa fa-minus"></i>-->
<!--        </button>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="box-body">-->
<!--      <div id="pmi_tahun-chart" class="graph" style="height: 300px;">-->
<!--      </div>-->
<!--    </div>-->
<!--    </div>-->
<!--  </div>-->

<!--<div class="col-md-6">-->
<!--    <div class="box box-primary">-->
<!--      <div class="box-header with-border">-->
<!--      <i class="fa fa-th"></i>-->
<!--      <h3 class="box-title">Penempatan PMI Berdasarkan Negara</h3>-->
<!--      <div class="box-tools pull-right">-->
<!--        <button type="button" class="btn btn-sm" data-widget="collapse">-->
<!--          <i class="fa fa-minus"></i>-->
<!--        </button>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="box-body">-->
<!--      <div id="ngr_tjuan-chart" class="graph" style="height: 300px;">-->
<!--      </div>-->
<!--    </div>-->
<!--    </div>-->
<!--  </div>-->

<!--<div class="col-md-6">-->
<!--    <div class="box box-primary">-->
<!--      <div class="box-header with-border">-->
<!--      <i class="fa fa-th"></i>-->
<!--      <h3 class="box-title">PMI Bermasalah Berdasarkan Tahun</h3>-->
<!--      <div class="box-tools pull-right">-->
<!--        <button type="button" class="btn btn-sm" data-widget="collapse">-->
<!--          <i class="fa fa-minus"></i>-->
<!--        </button>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="box-body">-->
<!--      <div id="pmi_kasus-chart" class="graph" style="height: 300px;">-->
<!--      </div>-->
<!--    </div>-->
<!--    </div>-->
<!--  </div>-->

<!--<div class="col-md-6">-->
<!--    <div class="box box-primary">-->
<!--      <div class="box-header with-border">-->
<!--      <i class="fa fa-th"></i>-->
<!--      <h3 class="box-title">Tenaga Kerja Asing (TKA) </h3>-->
<!--      <div class="box-tools pull-right">-->
<!--        <button type="button" class="btn btn-sm" data-widget="collapse">-->
<!--          <i class="fa fa-minus"></i>-->
<!--        </button>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="box-body">-->
<!--      <div id="tka-chart" class="graph" style="height: 300px;">-->
<!--      </div>-->
<!--    </div>-->
<!--    </div>-->
<!--  </div>-->

  <!--<div class="col-md-6">-->
  <!--  <div class="box box-primary">-->
  <!--    <div class="box-header with-border">-->
  <!--    <i class="fa fa-th"></i>-->
  <!--    <h3 class="box-title">Tenaga Kerja Asing (TKA) Berdasarkan Perusahaan</h3>-->
  <!--    <div class="box-tools pull-right">-->
  <!--      <button type="button" class="btn btn-sm" data-widget="collapse">-->
  <!--        <i class="fa fa-minus"></i>-->
  <!--      </button>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--  <div class="box-body">-->
  <!--    <div id="tka_perusahaan-chart" class="graph" style="height: 300px;">-->
  <!--    </div>-->
  <!--  </div>-->
  <!--  </div>-->
  <!--</div>-->

 <!--<div class="col-md-6">-->
 <!--   <div class="box box-primary">-->
 <!--     <div class="box-header with-border">-->
 <!--     <i class="fa fa-th"></i>-->
 <!--     <h3 class="box-title">Perusahaan di Kabupaten Sukabumi</h3>-->
 <!--     <div class="box-tools pull-right">-->
 <!--       <button type="button" class="btn btn-sm" data-widget="collapse">-->
 <!--         <i class="fa fa-minus"></i>-->
 <!--       </button>-->
 <!--     </div>-->
 <!--   </div>-->
 <!--   <div class="box-body">-->
 <!--     <div id="perusahaan-chart" class="graph" style="height: 300px;">-->
 <!--     </div>-->
 <!--   </div>-->
 <!--   </div>-->
 <!-- </div>-->

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
      <i class="fa fa-th"></i>
      <h3 class="box-title">Upah Minimum Kabupaten</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-sm" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <div id="umk" class="graph" style="height: 300px;">
      </div>
    </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-default">
      <div class="box-header with-border">
      <i class="fa fa-th"></i>
      <h3 class="box-title">Serika Pekerja / Serikat Buruh</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-sm" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <div id="spsb" class="graph" style="height: 300px;">
      </div>
    </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
      <i class="fa fa-th"></i>
      <h3 class="box-title">Penempatan Transmigrasi ke Luar Pulau Jawa</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-sm" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <div id="pnp_trans" class="graph" style="height: 300px;">
      </div>
    </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
      <i class="fa fa-th"></i>
      <h3 class="box-title">Transmigrasi Lokal</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-sm" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <div id="translok" class="graph" style="height: 300px;">
      </div>
    </div>
    </div>
  </div>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2019 </strong><?=$site->namaweb ?> | <?=$site->tagline ?>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>

<link rel="stylesheet" href="<?=base_url() ?>assets/admin/bower_components/morris.js/morris.css">
<script src="<?=base_url() ?>assets/admin/bower_components/raphael/raphael.min.js"></script>
<script src="<?=base_url() ?>assets/admin/bower_components/morris.js/morris.min.js"></script>
<script src="<?=base_url() ?>assets/admin/bower_components/chart.js/Chart.js"></script>
<script src="<?=base_url() ?>assets/admin/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->

<script>

// var area = new Morris.Line({
//       element: 'realisasi_tujuan_rpjmd-chart',
//       resize: true,
//       data: [
//       {y: '2021', realisasi: <?=$indikator_tujuan->r_awal ?>, target: <?=(real)$indikator_tujuan->awal ?>},
//         {y: '2022', realisasi: <?=$indikator_tujuan->r_satu ?>, target: <?=(real)$indikator_tujuan->satu ?>},
//         {y: '2023', realisasi: <?=$indikator_tujuan->r_dua ?>, target: <?=(real)$indikator_tujuan->dua ?>},
//         {y: '2024', realisasi: <?=$indikator_tujuan->r_tiga ?>, target: <?=(real)$indikator_tujuan->tiga ?>},
//         {y: '2025', realisasi: <?=$indikator_tujuan->r_empat ?>, target: <?=(real)$indikator_tujuan->empat ?>},
//         {y: '2026', realisasi: <?=$indikator_tujuan->r_lima ?>, target: <?=(real)$indikator_tujuan->lima ?>},
      
//     ],
//       xkey: 'y',
//       ykeys: ['target','realisasi'],
//       labels: ['Target','Realisasi'],
//       lineColors: ['#FF0000','#008000'],
//       hideHover: 'auto'
//     });

var line = new Morris.Line({
      element: 'realisasi_sasaran_rpjmd-chart',
      resize: true,
      data: [
        {y: '2021', realisasi: <?=$indikator_sasaran_rpjmd->r_awal ?>, target: <?=(real)$indikator_sasaran_rpjmd->awal ?>},
        {y: '2022', realisasi: <?=$indikator_sasaran_rpjmd->r_satu ?>, target: <?=(real)$indikator_sasaran_rpjmd->satu ?>},
        {y: '2023', realisasi: <?=$indikator_sasaran_rpjmd->r_dua ?>, target: <?=(real)$indikator_sasaran_rpjmd->dua ?>},
        {y: '2024', realisasi: <?=$indikator_sasaran_rpjmd->r_tiga ?>, target: <?=(real)$indikator_sasaran_rpjmd->tiga ?>},
        {y: '2025', realisasi: <?=$indikator_sasaran_rpjmd->r_empat ?>, target: <?=(real)$indikator_sasaran_rpjmd->empat ?>},
        {y: '2026', realisasi: <?=$indikator_sasaran_rpjmd->r_lima ?>, target: <?=(real)$indikator_sasaran_rpjmd->lima ?>},
      ],
      xkey: 'y',
      ykeys: ['target','realisasi'],
      labels: ['Target','Realisasi'],
      lineColors: ['#FF0000','#008000'],
      hideHover: 'auto'
    });

//DONUT CHART
    var area = new Morris.Line({
      element: 'sales-chart',
      resize: true,
      data: [
        {y: '2021', realisasi: <?=$indikator_sasaran_pd_1->r_awal ?>, target: <?=(real)$indikator_sasaran_pd_1->awal ?>},
        {y: '2022', realisasi: <?=$indikator_sasaran_pd_1->r_satu ?>, target: <?=(real)$indikator_sasaran_pd_1->satu ?>},
        {y: '2023', realisasi: <?=$indikator_sasaran_pd_1->r_dua ?>, target: <?=(real)$indikator_sasaran_pd_1->dua ?>},
        {y: '2024', realisasi: <?=$indikator_sasaran_pd_1->r_tiga ?>, target: <?=(real)$indikator_sasaran_pd_1->tiga ?>},
        {y: '2025', realisasi: <?=$indikator_sasaran_pd_1->r_empat ?>, target: <?=(real)$indikator_sasaran_pd_1->empat ?>},
        {y: '2026', realisasi: <?=$indikator_sasaran_pd_1->r_lima ?>, target: <?=(real)$indikator_sasaran_pd_1->lima ?>},
    ],
      xkey: 'y',
      ykeys: ['target','realisasi'],
      labels: ['Target','Realisasi'],
      lineColors: ['#FF0000','#008000'],
      hideHover: 'auto'
    });

    var line = new Morris.Line({
      element: 'realisasi_sasaran_renstra2-chart',
      resize: true,
      data: [
        {y: '2021', realisasi: <?=$indikator_sasaran_pd_2->r_awal ?>, target: <?=(real)$indikator_sasaran_pd_2->awal ?>},
        {y: '2022', realisasi: <?=$indikator_sasaran_pd_2->r_satu ?>, target: <?=(real)$indikator_sasaran_pd_2->satu ?>},
        {y: '2023', realisasi: <?=$indikator_sasaran_pd_2->r_dua ?>, target: <?=(real)$indikator_sasaran_pd_2->dua ?>},
        {y: '2024', realisasi: <?=$indikator_sasaran_pd_2->r_tiga ?>, target: <?=(real)$indikator_sasaran_pd_2->tiga ?>},
        {y: '2025', realisasi: <?=$indikator_sasaran_pd_2->r_empat ?>, target: <?=(real)$indikator_sasaran_pd_2->empat ?>},
        {y: '2026', realisasi: <?=$indikator_sasaran_pd_2->r_lima ?>, target: <?=(real)$indikator_sasaran_pd_2->lima ?>},
      ],
      xkey: 'y',
      ykeys: ['target','realisasi'],
      labels: ['Target','Realisasi'],
      lineColors: ['#FF0000','#008000'],
      hideHover: 'auto'
    });

   var line = new Morris.Line({
      element: 'realisasi_program1-chart',
      resize: true,
      data: [
        {y: '2021', realisasi: <?=$indikator_program1->r_awal ?>, target: <?=(real)$indikator_program1->awal ?>},
        {y: '2022', realisasi: <?=$indikator_program1->r_satu ?>, target: <?=(real)$indikator_program1->satu ?>},
        {y: '2023', realisasi: <?=$indikator_program1->r_dua ?>, target: <?=(real)$indikator_program1->dua ?>},
        {y: '2024', realisasi: <?=$indikator_program1->r_tiga ?>, target: <?=(real)$indikator_program1->tiga ?>},
        {y: '2025', realisasi: <?=$indikator_program1->r_empat ?>, target: <?=(real)$indikator_program1->empat ?>},
        {y: '2026', realisasi: <?=$indikator_program1->r_lima ?>, target: <?=(real)$indikator_program1->lima ?>},
      ],
      xkey: 'y',
      ykeys: ['target','realisasi'],
      labels: ['Target','Realisasi'],
      lineColors: ['#FF0000','#008000'],
      hideHover: 'auto'
    }); 

   var line = new Morris.Line({
      element: 'realisasi_program2-chart',
      resize: true,
      data: [
        {y: '2021', realisasi: <?=$indikator_program2->r_awal ?>, target: <?=(real)$indikator_program2->awal ?>},
        {y: '2022', realisasi: <?=$indikator_program2->r_satu ?>, target: <?=(real)$indikator_program2->satu ?>},
        {y: '2023', realisasi: <?=$indikator_program2->r_dua ?>, target: <?=(real)$indikator_program2->dua ?>},
        {y: '2024', realisasi: <?=$indikator_program2->r_tiga ?>, target: <?=(real)$indikator_program2->tiga ?>},
        {y: '2025', realisasi: <?=$indikator_program2->r_empat ?>, target: <?=(real)$indikator_program2->empat ?>},
        {y: '2026', realisasi: <?=$indikator_program2->r_lima ?>, target: <?=(real)$indikator_program2->lima ?>},
      ],
      xkey: 'y',
      ykeys: ['target','realisasi'],
      labels: ['Target','Realisasi'],
      lineColors: ['#FF0000','#008000'],
      hideHover: 'auto'
    });
    
    var line = new Morris.Line({
      element: 'realisasi_program3-chart',
      resize: true,
      data: [
        {y: '2021', realisasi: <?=$indikator_program3->r_awal ?>, target: <?=(real)$indikator_program3->awal ?>},
        {y: '2022', realisasi: <?=$indikator_program3->r_satu ?>, target: <?=(real)$indikator_program3->satu ?>},
        {y: '2023', realisasi: <?=$indikator_program3->r_dua ?>, target: <?=(real)$indikator_program3->dua ?>},
        {y: '2024', realisasi: <?=$indikator_program3->r_tiga ?>, target: <?=(real)$indikator_program3->tiga ?>},
        {y: '2025', realisasi: <?=$indikator_program3->r_empat ?>, target: <?=(real)$indikator_program3->empat ?>},
        {y: '2026', realisasi: <?=$indikator_program3->r_lima ?>, target: <?=(real)$indikator_program3->lima ?>},
      ],
      xkey: 'y',
      ykeys: ['target','realisasi'],
      labels: ['Target','Realisasi'],
      lineColors: ['#FF0000','#008000'],
      hideHover: 'auto'
    });
    
    var line = new Morris.Line({
      element: 'realisasi_program4-chart',
      resize: true,
      data: [
        {y: '2021', realisasi: <?=$indikator_program4->r_awal ?>, target: <?=(real)$indikator_program4->awal ?>},
        {y: '2022', realisasi: <?=$indikator_program4->r_satu ?>, target: <?=(real)$indikator_program4->satu ?>},
        {y: '2023', realisasi: <?=$indikator_program4->r_dua ?>, target: <?=(real)$indikator_program4->dua ?>},
        {y: '2024', realisasi: <?=$indikator_program4->r_tiga ?>, target: <?=(real)$indikator_program4->tiga ?>},
        {y: '2025', realisasi: <?=$indikator_program4->r_empat ?>, target: <?=(real)$indikator_program4->empat ?>},
        {y: '2026', realisasi: <?=$indikator_program4->r_lima ?>, target: <?=(real)$indikator_program4->lima ?>},
      ],
      xkey: 'y',
      ykeys: ['target','realisasi'],
      labels: ['Target','Realisasi'],
      lineColors: ['#FF0000','#008000'],
      hideHover: 'auto'
    });
    
    var line = new Morris.Line({
      element: 'realisasi_program5-chart',
      resize: true,
      data: [
        {y: '2021', realisasi: <?=$indikator_program5->r_awal ?>, target: <?=(real)$indikator_program5->awal ?>},
        {y: '2022', realisasi: <?=$indikator_program5->r_satu ?>, target: <?=(real)$indikator_program5->satu ?>},
        {y: '2023', realisasi: <?=$indikator_program5->r_dua ?>, target: <?=(real)$indikator_program5->dua ?>},
        {y: '2024', realisasi: <?=$indikator_program5->r_tiga ?>, target: <?=(real)$indikator_program5->tiga ?>},
        {y: '2025', realisasi: <?=$indikator_program5->r_empat ?>, target: <?=(real)$indikator_program5->empat ?>},
        {y: '2026', realisasi: <?=$indikator_program5->r_lima ?>, target: <?=(real)$indikator_program5->lima ?>},
      ],
      xkey: 'y',
      ykeys: ['target','realisasi'],
      labels: ['Target','Realisasi'],
      lineColors: ['#FF0000','#008000'],
      hideHover: 'auto'
    });
    
    var line = new Morris.Line({
      element: 'realisasi_program6-chart',
      resize: true,
      data: [
        {y: '2021', realisasi: <?=$indikator_program6->r_awal ?>, target: <?=(real)$indikator_program6->awal ?>},
        {y: '2022', realisasi: <?=$indikator_program6->r_satu ?>, target: <?=(real)$indikator_program6->satu ?>},
        {y: '2023', realisasi: <?=$indikator_program6->r_dua ?>, target: <?=(real)$indikator_program6->dua ?>},
        {y: '2024', realisasi: <?=$indikator_program6->r_tiga ?>, target: <?=(real)$indikator_program6->tiga ?>},
        {y: '2025', realisasi: <?=$indikator_program6->r_empat ?>, target: <?=(real)$indikator_program6->empat ?>},
        {y: '2026', realisasi: <?=$indikator_program6->r_lima ?>, target: <?=(real)$indikator_program6->lima ?>},
      ],
      xkey: 'y',
      ykeys: ['target','realisasi'],
      labels: ['Target','Realisasi'],
      lineColors: ['#FF0000','#008000'],
      hideHover: 'auto'
    });

    var line = new Morris.Bar({
      element: 'pad-chart',
      resize: true,
      data: [
        <?php foreach ($pad as $key =>$data) {
        echo "{y: '$data->tahun_perencanaan', realisasi: '".$data->realisasi."', target: '".$data->target."'},";

      } ?>
      ],
      xkey: 'y',
      ykeys: ['target','realisasi'],
      labels: ['Target','Realisasi'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });

// var line = new Morris.Bar({
//       element: 'pelatihan-chart',
//       resize: true,
//       data: [
//         <?php //foreach ($pelatihan as $key =>$data) {
//         echo "{y: '$data->tahun_perencanaan', APBD: '".$data->APBD."', APBN: '".$data->APBN."'},";

//       } ?>
//       ],
//       xkey: 'y',
//       ykeys: ['APBD','APBN'],
//       labels: ['APBD','APBN'],
//       lineColors: ['#f56954','#00a69a',],
//       hideHover: 'auto'
//     });

// var line = new Morris.Bar({
//       element: 'pelatihan_kejuruan-chart',
//       resize: true,
//       data: [
//         <?php //foreach ($pelatihan_kejuruan as $key =>$data) {
//         echo "{y: '$data->kejuruan', APBD: '".$data->APBD."', APBN: '".$data->APBN."'},";

//       } ?>
//       ],
//       xkey: 'y',
//       ykeys: ['APBD','APBN'],
//       labels: ['APBD','APBN'],
//       lineColors: ['#3c8dbc','#00a69a'],
//       hideHover: 'auto'
//     });

var line = new Morris.Bar({
      element: 'lembaga-chart',
      resize: true,
      data: [
        <?php foreach ($kelembagaan as $key =>$data) {
        echo "{y: '$data->lembaga', LPKSTERDAFTAR: '".$data->LPKSTERDAFTAR."', LPKSBELUMTERDAFTAR: '".$data->LPKSBELUMTERDAFTAR."', BLKKTERDAFTAR: '".$data->BLKKTERDAFTAR."', BLKKBELUMTERDAFTAR: '".$data->BLKKBELUMTERDAFTAR."'},";

      } ?>
      ],
      xkey: 'y',
      ykeys: ['LPKSTERDAFTAR','LPKSBELUMTERDAFTAR','BLKKTERDAFTAR','BLKKBELUMTERDAFTAR'],
      labels: ['LPKS TERDAFTAR','LPKS BELUM TERDAFTAR','BLKK TERDAFTAR','BLKK BELUM TERDAFTAR'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });

var line = new Morris.Bar({
      element: 'bkk-chart',
      resize: true,
      data: [
        <?php foreach ($bkk as $key =>$data) {
        echo "{y: 'Bursa Kerja Khusus (BKK)', nama_bkk: '".$data->nama_bkk."'},";

      } ?>
      ],
      xkey: 'y',
      ykeys: ['nama_bkk'],
      labels: ['Total BKK'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });

var line = new Morris.Bar({
      element: 'padat_karya-chart',
      resize: true,
      data: [
        <?php foreach ($padat_karya as $key =>$data) {
        echo "{y: '$data->tahun_perencanaan', PERKERASANJALAN: '".$data->PERKERASANJALAN."', RABATBETON: '".$data->RABATBETON."', PIPANISASI: '".$data->PIPANISASI."', TPT: '".$data->TPT."'},";

      } ?>
      ],
      xkey: 'y',
      ykeys: ['PERKERASANJALAN','RABATBETON','PIPANISASI','TPT'],
      labels: ['Perkerasan Jalan','Rabat Beton','Pipanisasi','Tembok Penahan Tanah'],
      lineColors: ['#f56954','#00a69a','#a0d0e0','#3c8dbc'],
      hideHover: 'auto'
    });

var line = new Morris.Bar({
      element: 'padat_karya_desa-chart',
      resize: true,
      data: [
        <?php foreach ($padat_karya_desa as $key =>$data) {
        echo "{y: '$data->name', PERKERASANJALAN: '".$data->PERKERASANJALAN."', RABATBETON: '".$data->RABATBETON."', PIPANISASI: '".$data->PIPANISASI."', TPT: '".$data->TPT."'},";

      } ?>
      ],
      xkey: 'y',
      ykeys: ['PERKERASANJALAN','RABATBETON','PIPANISASI','TPT'],
      labels: ['Perkerasan Jalan','Rabat Beton','Pipanisasi','Tembok Penahan Tanah'],
      lineColors: ['#f56954','#00a69a','#a0d0e0','#3c8dbc'],
      hideHover: 'auto'
    }); 

var line = new Morris.Bar({
      element: 'tkm-chart',
      resize: true,
      data: [
        <?php foreach ($tkm as $key =>$data) {
        echo "{y: '$data->tahun_perencanaan', BPD: '".$data->BPD."', BENGKELLAS: '".$data->BENGKELLAS."', MENJAHIT: '".$data->MENJAHIT."', PHP: '".$data->PHP."', SABLON: '".$data->SABLON."', BIK: '".$data->BIK."', BENGKELBUBUT: '".$data->BENGKELBUBUT."'},";

      } ?>
      ],
      xkey: 'y',
      ykeys: ['BPD','BENGKELLAS','MENJAHIT','PHP','SABLON','BIK','BENGKELBUBUT'],
      labels: ['Budidaya Perikanan Darat','Bengkel Las','Menjahit','Pengolahan Hasil Pertanian','Sablon','Budidaya Ikan Koi','Bengkel Bubut'],
      lineColors: ['#f56954','#00a69a','#a0d0e0','#3c8dbc'],
      hideHover: 'auto'
    });

var line = new Morris.Bar({
      element: 'tkm_desa-chart',
      resize: true,
      data: [
        <?php foreach ($tkm_desa as $key =>$data) {
        echo "{y: '$data->name', BPD: '".$data->BPD."', BENGKELLAS: '".$data->BENGKELLAS."', MENJAHIT: '".$data->MENJAHIT."', PHP: '".$data->PHP."', SABLON: '".$data->SABLON."', BIK: '".$data->BIK."', BENGKELBUBUT: '".$data->BENGKELBUBUT."'},";

      } ?>
      ],
      xkey: 'y',
      ykeys: ['BPD','BENGKELLAS','MENJAHIT','PHP','SABLON','BIK','BENGKELBUBUT'],
      labels: ['Budidaya Perikanan Darat','Bengkel Las','Menjahit','Pengolahan Hasil Pertanian','Sablon','Budidaya Ikan Koi','Bengkel Bubut'],
      lineColors: ['#f56954','#00a69a','#a0d0e0','#3c8dbc'],
      hideHover: 'auto'
    });

// var line = new Morris.Bar({
//       element: 'pmi_tahun-chart',
//       resize: true,
//       data: [
//         <?php //foreach ($pmi_tahun as $key =>$data) {
//         echo "{y: '$data->tahun_perencanaan', LFormal: '".$data->LFormal."', LInformal: '".$data->LInformal."', PFormal: '".$data->PFormal."', PInformal: '".$data->PInformal."'},";

//       } ?>
//       ],
//       xkey: 'y',
//       ykeys: ['LFormal','LInformal','PFormal','PInformal'],
//       labels: ['Laki-Laki Formal','Laki-Laki Informal','Perempuan Formal','Perempuan Informal'],
//       lineColors: ['#3c8dbc'],
//       hideHover: 'auto'
//     });

// var line = new Morris.Bar({
//       element: 'ngr_tjuan-chart',
//       resize: true,
//       data: [
//         <?php //foreach ($ngr_tjuan as $key =>$data) {
//         echo "{y: '$data->ngr_tjuan', LFormal: '".$data->LFormal."', LInformal: '".$data->LInformal."', PFormal: '".$data->PFormal."', PInformal: '".$data->PInformal."'},";

//       } ?>
//       ],
//       xkey: 'y',
//       ykeys: ['LFormal','LInformal','PFormal','PInformal'],
//       labels: ['Laki-Laki Formal','Laki-Laki Informal','Perempuan Formal','Perempuan Informal'],
//       lineColors: ['#3c8dbc'],
//       hideHover: 'auto'
//     });

// var line = new Morris.Bar({
//       element: 'pmi_kasus-chart',
//       resize: true,
//       data: [
//         <?php //foreach ($pmi_kasus as $key =>$data) {
//         echo "{y: '$data->tahun_perencanaan', ALJAZAIR: '".$data->ALJAZAIR."', BAHRAIN: '".$data->BAHRAIN."', BRUNAIDARUSALAM: '".$data->BRUNAIDARUSALAM."', HONGKONG: '".$data->HONGKONG."', MALAYSIA: '".$data->MALAYSIA."', OMAN: '".$data->OMAN."', QATAR: '".$data->QATAR."', SAUDIARABIA: '".$data->SAUDIARABIA."', SINGAPURA: '".$data->SINGAPURA."', TAIWAN: '".$data->TAIWAN."', UNIEMIRATESARAB: '".$data->UNIEMIRATESARAB."', JEPANG: '".$data->JEPANG."', KOREASELATAN: '".$data->KOREASELATAN."', NIGERIA: '".$data->NIGERIA."', KUWAIT: '".$data->KUWAIT."', VIETNAM: '".$data->VIETNAM."'},";

//       } ?>
//       ],
//       xkey: 'y',
//       ykeys: ['ALJAZAIR','BAHRAIN','BRUNAIDARUSALAM','HONGKONG','MALAYSIA','OMAN','QATAR','SAUDIARABIA','SINGAPURA','TAIWAN','UNIEMIRATESARAB','JEPANG','KOREASELATAN','NIGERIA','KUWAIT','VIETNAM'],
//       labels: ['ALJAZAIR','BAHRAIN','BRUNAI DARUSALAM','HONGKONG','MALAYSIA','OMAN','QATAR','SAUDI ARABIA','SINGAPURA','TAIWAN','UNI EMIRATES ARAB','JEPANG','KOREA SELATAN','NIGERIA','KUWAIT','VIETNAM'],
//       lineColors: ['#3c8dbc'],
//       hideHover: 'auto'
//     });

// var area = new Morris.Bar({
//       element: 'tka-chart',
//       resize: true,
//       data: [
//         <?php //foreach ($tka as $key =>$data) {
//         echo "{y: 'Tenaga Kerja Asing', nama_tka: '".$data->nama_tka."'},";

//       } ?>
//       ],
//       barColors: ['#00a69a'],
//       xkey: 'y',
//       ykeys: ['nama_tka'],
//       labels: ['Total TKA'],
//       hideHover: 'auto'
//     });

// var area = new Morris.Bar({
//       element: 'perusahaan-chart',
//       resize: true,
//       data: [
//         <?php //foreach ($perusahaan as $key =>$data) {
//         echo "{y: 'Perusahaan', nama_perusahaan: '".$data->nama_perusahaan."'},";

//       } ?>
//       ],
//       xkey: 'y',
//       ykeys: ['nama_perusahaan'],
//       labels: ['Total Perusahaan'],
//       lineColors: ['#3c8dbc'],
//       hideHover: 'auto'
//     });  

var area = new Morris.Bar({
      element: 'umk',
      resize: true,
      data: [
      <?php foreach ($umk as $key =>$data) {
        echo "{y: '".$data->tahun_perencanaan."', umk: ".$data->jml_umk."},";
      } ?>
      
    ],
      barColors: ['#f56954'],
      xkey: 'y',
      ykeys: ['umk'],
      labels: ['UMK'],
      hideHover: 'auto'
    });

var area = new Morris.Bar({
      element: 'spsb',
      resize: true,
      data: [
      <?php foreach ($spsb->result() as $key =>$data) {
        echo "{y: '$data->nama_spsb', anggota: '$data->jml_anggota'},";
      } ?>
      
    ],
      barColors: ['#00a69a','#f56954'],
      xkey: 'y',
      ykeys: ['anggota'],
      labels: ['anggota'],
      hideHover: 'auto'
    });

var area = new Morris.Bar({
      element: 'pnp_trans',
      resize: true,
      data: [
      <?php foreach ($pnp_trans as $key =>$data) {
        echo "{y: '".$data->tahun_perencanaan."', KK: ".$data->KK."},";
      } ?>
      
    ],
      barColors: ['#f56954'],
      xkey: 'y',
      ykeys: ['KK'],
      labels: ['KK'],
      hideHover: 'auto'
    });

var area = new Morris.Bar({
      element: 'translok',
      resize: true,
      data: [
      <?php foreach ($translok as $key =>$data) {
        echo "{y: '$data->upt', kk: '$data->kk', jiwa: '$data->jiwa'},";
      } ?>
      
    ],
      barColors: ['#f56954','#00a69a'],
      xkey: 'y',
      ykeys: ['kk','jiwa'],
      labels: ['KK','JIWA'],
      hideHover: 'auto'
    });

</script>

</body>
</html>