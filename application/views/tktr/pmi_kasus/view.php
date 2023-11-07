<section class="content-header">
  <h1>PMI Bermasalah
    <small>PMI Bermasalah</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">PMI Bermasalah</li>
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
          <h1 class="box-title">Data PMI Bermasalah</h1><hr>
            <div>
	             <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/pmi_kasus/form'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-cloud-upload"> Import Data</i>
               </a>
               <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/pmi_kasus'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-undo"> Kembali ke Halaman Utama</i>
               </a>
            </div>
	<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
	<tr>
    <th>No</th>
    <th>Portal ID</th>
    <th>User ID</th>
    <th>Desa ID</th>
		<th>Tanggal Laporan</th>
    <th>Nama PMI</th>
    <th>Alamat</th>
    <th>Nama Pengadu</th>
    <th>Negara Penempatan</th>
    <th>Permasalahan</th>
    <th>Keterangan</th>
	</tr>

	<?php
  if( ! empty($pmi_kasus)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    $no=1; foreach($pmi_kasus as $data){ // Lakukan looping pada variabel siswa dari controller
      echo "<tr>";
      echo "<td>".$no++.".</td>";
      echo "<td>".$data->portal_id."</td>";
      echo "<td>".$data->user_id."</td>";
      echo "<td>".$data->desa_id."</td>";
      echo "<td>".$data->tanggal_laporan."</td>";
      echo "<td>".$data->nama_pmi."</td>";
      echo "<td>".$data->alamat."</td>";
      echo "<td>".$data->nama_pengadu."</td>";
      echo "<td>".$data->negara_penempatan."</td>";
      echo "<td>".$data->permasalahan."</td>";
      echo "<td>".$data->ket."</td>";
      echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='11'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</div>
  </div>
</div>
</section>