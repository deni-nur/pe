<section class="content-header">
  <h1>Perusahaan
    <small>Perusahaan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Perusahaan</li>
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
          <h1 class="box-title">Data Perusahaan</h1><hr>
            <div>
	             <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/perusahaan/form'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-cloud-upload"> Import Data</i>
               </a>
               <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/perusahaan'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-undo"> Kembali ke Halaman Utama</i>
               </a>
            </div>
	<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
	<tr>
    <th>No</th>
    <th>Portal ID</th>
    <th>User ID</th>
    <th>Desa ID</th>
		<th>Nama Perusahaan</th>
    <th>Alamat</th>
    <th>Tanggal Berdiri</th>
    <th>KBLI</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Kepemilikan</th>
    <th>Capital Status</th>
	</tr>

	<?php
  if( ! empty($perusahaan)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    $no=1; foreach($perusahaan as $data){ // Lakukan looping pada variabel siswa dari controller
      echo "<tr>";
      echo "<td>".$no++.".</td>";
      echo "<td>".$data->portal_id."</td>";
      echo "<td>".$data->user_id."</td>";
      echo "<td>".$data->desa_id."</td>";
      echo "<td>".$data->nama_perusahaan."</td>";
      echo "<td>".$data->alamat."</td>";
      echo "<td>".$data->tanggal_berdiri."</td>";
      echo "<td>".$data->kbli."</td>";
      echo "<td>".$data->email."</td>";
      echo "<td>".$data->phone."</td>";
      echo "<td>".$data->kepemilikan."</td>";
      echo "<td>".$data->capital_status."</td>";
      echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='12'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</div>
  </div>
</div>
</section>