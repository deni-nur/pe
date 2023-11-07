<section class="content-header">
  <h1>PMI
    <small>PMI</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data TK Dan TR</li>
    <li class="active">PMI</li>
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
          <h1 class="box-title">Data TKI</h1><hr>
            <div>
	             <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/pmi/form'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-cloud-upload"> Import Data</i>
               </a>
               <a href="<?php echo site_url('portal/'.$this->uri->segment(2).'/pmi'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-undo"> Kembali ke Halaman Utama</i>
               </a>
            </div>
	<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
	<tr>
    <th>No</th>
    <th>Portal ID</th>
		<th>Tanggal Registrasi</th>
    <th>ID Sistem</th>
    <th>Nama</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>PPTKIS</th>
    <th>Agensi</th>
    <th>Negara Tujuan</th>
    <th>Pendidikan</th>
    <th>Sektor Pekerjaan</th>
    <th>Jabatan</th>
    <th>Status</th>
	</tr>

	<?php
  if( ! empty($pmi)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    $no=1; foreach($pmi as $data){ // Lakukan looping pada variabel siswa dari controller
      echo "<tr>";
      echo "<td>".$no++.".</td>";
      echo "<td>".$data->portal_id."</td>";
      echo "<td>".$data->tgl_registrasi."</td>";
      echo "<td>".$data->id_sistem."</td>";
      echo "<td>".$data->nama."</td>";
      echo "<td>".$data->tmpt_lhr."</td>";
      echo "<td>".$data->tgl_lhr."</td>";
      echo "<td>".$data->jk."</td>";
      echo "<td>".$data->alamat."</td>";
      echo "<td>".$data->pptkis."</td>";
      echo "<td>".$data->agensi."</td>";
      echo "<td>".$data->ngr_tjuan."</td>";
      echo "<td>".$data->pendidikan."</td>";
      echo "<td>".$data->sktor_pkrjaan."</td>";
      echo "<td>".$data->jbtn."</td>";
      echo "<td>".$data->sttus."</td>";
      echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='15'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</div>
  </div>
</div>
</section>
