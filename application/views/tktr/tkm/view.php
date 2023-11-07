<section class="content-header">
  <h1>Tenaga Kerja Mandiri
    <small>Tenaga Kerja Mandiri</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li>Perluasan</li>
    <li class="active">Tenaga Kerja Mandiri</li>
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
          <h1 class="box-title">Data Tenaga Kerja Mandiri</h1><hr>
            <div>
	             <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/tkm/form'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-cloud-upload"> Import Data</i>
               </a>
               <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/tkm'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-undo"> Kembali ke Halaman Utama</i>
               </a>
            </div>
	<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
	<tr>
    <th>No</th>
    <th>Portal ID</th>
    <th>User ID</th>
    <th>Desa ID</th>
		<th>Kelompok</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>Keterangan</th>
	</tr>

	<?php
  if( ! empty($tkm)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    $no=1; foreach($tkm as $data){ // Lakukan looping pada variabel siswa dari controller
      echo "<tr>";
      echo "<td>".$no++.".</td>";
      echo "<td>".$data->portal_id."</td>";
      echo "<td>".$data->user_id."</td>";
      echo "<td>".$data->desa_id."</td>";
      echo "<td>".$data->kelompok."</td>";
      echo "<td>".$data->nama."</td>";
      echo "<td>".$data->jk."</td>";
      echo "<td>".$data->alamat."</td>";
      echo "<td>".$data->ket."</td>";
      echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='8'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</div>
  </div>
</div>
</section>