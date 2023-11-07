<section class="content-header">
  <h1>Tenaga Kerja Asing
    <small>Tenaga Kerja Asing</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Tenaga Kerja Asing</li>
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
          <h1 class="box-title">Data Tenaga Kerja Asing</h1><hr>
            <div>
	             <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/tka/'.$this->uri->segment(4).'/form'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-cloud-upload"> Import Data</i>
               </a>
               <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/tka/'.$this->uri->segment(4).'/data_tka'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-undo"> Kembali ke Halaman Utama</i>
               </a>
            </div>
	<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
	<tr>
    <th>No</th>
    <th>Portal ID</th>
    <th>User ID</th>
    <th>Perusahaan ID</th>
		<th>Nama TKA</th>
    <th>Jenis Kelamin</th>
    <th>Kebangsaan</th>
    <th>Passport</th>
    <th>KITAS / KITAP</th>
    <th>Jabatan</th>
	</tr>

	<?php
  if( ! empty($tka)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    $no=1; foreach($tka as $data){ // Lakukan looping pada variabel siswa dari controller
      echo "<tr>";
      echo "<td>".$no++.".</td>";
      echo "<td>".$data->portal_id."</td>";
      echo "<td>".$data->user_id."</td>";
      echo "<td>".$data->perusahaan_id."</td>";
      echo "<td>".$data->nama_tka."</td>";
      echo "<td>".$data->jk."</td>";
      echo "<td>".$data->kebangsaan."</td>";
      echo "<td>".$data->passport."</td>";
      echo "<td>".$data->kitas."</td>";
      echo "<td>".$data->jabatan."</td>";
      echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</div>
  </div>
</div>
</section>