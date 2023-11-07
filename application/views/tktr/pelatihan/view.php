<section class="content-header">
  <h1>Pelatihan Kerja
    <small>Pelatihan Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Pelatihan Kerja</li>
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
          <h1 class="box-title">Data Pelatihan Kerja</h1><hr>
            <div>
	             <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/pelatihan/form'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-cloud-upload"> Import Data</i>
               </a>
               <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/pelatihan'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-undo"> Kembali ke Halaman Utama</i>
               </a>
            </div>
	<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
	<tr>
    <th>No</th>
    <!-- <th>Portal ID</th>
    <th>User ID</th>
    <th>Desa ID</th> -->
		<th>Sumber Dana</th>
    <th>Kejuruan</th>
    <th>Nama</th>
    <th>Tempat</th>
    <th>Tanggal Lahir</th>
    <th>Jenis Kelamin</th>
    <th>Pendidikan</th>
    <th>Alamat</th>
    <th>No HP</th>
	</tr>

	<?php
  if( ! empty($pelatihan)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    $no=1; foreach($pelatihan as $data){ // Lakukan looping pada variabel siswa dari controller
      echo "<tr>";
      echo "<td>".$no++.".</td>";
      //echo "<td>".$data->portal_id."</td>";
      //echo "<td>".$data->user_id."</td>";
      //echo "<td>".$data->desa_id."</td>";
      echo "<td>".$data->sumber_dana."</td>";
      echo "<td>".$data->kejuruan."</td>";
      echo "<td>".$data->nama."</td>";
      echo "<td>".$data->tempat."</td>";
      echo "<td>".$data->tanggal_lahir."</td>";
      echo "<td>".$data->jk."</td>";
      echo "<td>".$data->pendidikan."</td>";
      echo "<td>".$data->alamat."</td>";
      echo "<td>".$data->no_hp."</td>";
      echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='13'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</div>
  </div>
</div>
</section>