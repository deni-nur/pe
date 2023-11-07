<section class="content-header">
  <h1>Padat Karya Infrastruktur
    <small>Padat Karya Infrastruktur</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li>Perluasan</li>
    <li class="active">Padat Karya Infrastruktur</li>
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
          <h1 class="box-title">Data Padat Karya Infrastruktur</h1><hr>
            <div>
	             <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/padat_karya/form'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-cloud-upload"> Import Data</i>
               </a>
               <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/padat_karya'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-undo"> Kembali ke Halaman Utama</i>
               </a>
            </div>
	<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
	<tr>
    <th>No</th>
    <th>Portal ID</th>
    <th>User ID</th>
    <th>Desa ID</th>
		<th>Jenis</th>
    <th>Nama</th>
	</tr>

	<?php
  if( ! empty($padat_karya)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    $no=1; foreach($padat_karya as $data){ // Lakukan looping pada variabel siswa dari controller
      echo "<tr>";
      echo "<td>".$no++.".</td>";
      echo "<td>".$data->portal_id."</td>";
      echo "<td>".$data->user_id."</td>";
      echo "<td>".$data->desa_id."</td>";
      echo "<td>".$data->jenis."</td>";
      echo "<td>".$data->nama."</td>";
      echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</div>
  </div>
</div>
</section>
