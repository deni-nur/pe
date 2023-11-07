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
        	<div>
            <h3 class="box-title">Form Import PMI</h3>
            </div>	
	<!-- Load File jquery.min.js yang ada difolder js -->
	<script src="<?php echo base_url('assets/js/jquery2.min.js'); ?>"></script>
	
	<script>
	$(document).ready(function(){
		// Sembunyikan alert validasi kosong
		$("#kosong").hide();
	});
	</script>
	<div>
	<a href="<?php echo base_url("assets/excel/pmi/Format Import Data PMI.xlsx"); ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"> Download Format</i></a>
	<br>
	<br>
	</div>
	
	<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
	<form method="post" action="<?= site_url('portal/'.$this->uri->segment(2).'/pmi/form') ?>" enctype="multipart/form-data">
		<!-- 
		-- Buat sebuah input type file
		-- class pull-left berfungsi agar file input berada di sebelah kiri
		-->
		<input type="file" name="file" class="btn btn-warning">
		
		<!--
		-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
		-->
		<br>
		<input type="submit" name="preview" value="Preview" class="btn btn-default">
	</form>
	
	<?php
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
		if(isset($upload_error)){ // Jika proses upload gagal
			echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
			die; // stop skrip
		}
		
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".site_url('portal/'.$this->uri->segment(2).'/pmi/import')."'>";
		
		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";
		
		echo "<table border='1' cellpadding='8'>
		<tr>
			<th colspan='15'>Preview Data</th>
		</tr>
		<tr>
			<th>Portal ID</th>
			<th>Tanggal Registrasi</th>
		    <th>ID Sistem</th>
		    <th>Nama PMI</th>
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
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
			// Ambil data pada excel sesuai Kolom
		$portal_id		= $row['A']; // Ambil data
		$tgl_registrasi = $row['B']; // Ambil data
      	$id_sistem      = $row['C']; // Ambil data 
      	$nama           = $row['D']; // Ambil data
      	$tmpt_lhr       = $row['E']; // Ambil data
      	$tgl_lhr        = $row['F']; // Ambil data
      	$jk             = $row['G']; // Ambil data
      	$alamat         = $row['H']; // Ambil data
      	$pptkis         = $row['I']; // Ambil data
      	$agensi         = $row['J']; // Ambil data
      	$ngr_tjuan      = $row['K']; // Ambil data
      	$pendidikan     = $row['L']; // Ambil data
      	$sktor_pkrjaan  = $row['M']; // Ambil data
      	$jbtn           = $row['N']; // Ambil data
      	$sttus          = $row['O']; // Ambil data
			
			// Cek jika semua data tidak diisi
if(empty($portal_id) && empty($tgl_registrasi) && empty($id_sistem) && empty($nama) && empty($tmpt_lhr) && empty($tgl_lhr) && empty($jk) && empty($alamat) && empty($pptkis) && empty($agensi) && empty($ngr_tjuan) && empty($pendidikan) && empty($sktor_pkrjaan) && empty($jbtn) && empty($sttus))
  continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
		$portal_id_td 		= ( ! empty($portal_id))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
		$tgl_registrasi_td 	= ( ! empty($tgl_registrasi))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $id_sistem_td 		= ( ! empty($id_sistem))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $nama_td 			= ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $tmpt_lhr_td 		= ( ! empty($tmpt_lhr))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $tgl_lhr_td 		= ( ! empty($tgl_lhr))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $jk_td 				= ( ! empty($jk))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $alamat_td 			= ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $pptkis_td 			= ( ! empty($pptkis))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $agensi_td 			= ( ! empty($agensi))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $ngr_tjuan_td 		= ( ! empty($ngr_tjuan))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $pendidikan_td 		= ( ! empty($pendidikan))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $sktor_pkrjaan_td 	= ( ! empty($sktor_pkrjaan))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $jbtn_td 			= ( ! empty($jbtn))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $sttus_td 			= ( ! empty($sttus))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
				
		// Jika salah satu data ada yang kosong
		if(empty($portal_id) or empty($tgl_registrasi) or empty($id_sistem) or empty($nama) or empty($tmpt_lhr) or empty($tgl_lhr) or empty($jk) or empty($alamat) or empty($pptkis) or empty($agensi) or empty($ngr_tjuan) or empty($pendidikan) or empty($sktor_pkrjaan) or empty($jbtn) or empty($sttus)){
			$kosong++; // Tambah 1 variabel $kosong
		}
				
		echo "<tr>";
		echo "<td".$portal_id_td.">".$portal_id."</td>";
        echo "<td".$tgl_registrasi_td.">".$tgl_registrasi."</td>";
        echo "<td".$id_sistem_td.">".$id_sistem."</td>";
        echo "<td".$nama_td.">".$nama."</td>";
        echo "<td".$tmpt_lhr_td.">".$tmpt_lhr."</td>";
        echo "<td".$tgl_lhr_td.">".$tgl_lhr."</td>";
        echo "<td".$jk_td.">".$jk."</td>";
        echo "<td".$alamat_td.">".$alamat."</td>";
        echo "<td".$pptkis_td.">".$pptkis."</td>";
        echo "<td".$agensi_td.">".$agensi."</td>";
        echo "<td".$ngr_tjuan_td.">".$ngr_tjuan."</td>";
        echo "<td".$pendidikan_td.">".$pendidikan."</td>";
        echo "<td".$sktor_pkrjaan_td.">".$sktor_pkrjaan."</td>";
        echo "<td".$jbtn_td.">".$jbtn."</td>";
        echo "<td".$sttus_td.">".$sttus."</td>";
        echo "</tr>";
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		echo "</table>";
		
		// Cek apakah variabel kosong lebih dari 0
		// Jika lebih dari 0, berarti ada data yang masih kosong
		if($kosong > 0){
		?>	
			<script>
			$(document).ready(function(){
				// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
				$("#jumlah_kosong").html('<?php echo $kosong; ?>');
				
				$("#kosong").show(); // Munculkan alert validasi kosong
			});
			</script>
		<?php
		}else{ // Jika semua data sudah diisi
			echo "<hr>";
			
			// Buat sebuah tombol untuk mengimport data ke database
			echo "<button type='submit' name='import' class='btn btn-success'><i class='fa fa-cloud-upload'> Import</i></button>";
			echo "<a href='".site_url('portal/'.$this->uri->segment(2).'/pmi')."'><i class='fa fa-history'> Cancel</i></a>";
		}
		
		echo "</form>";
	}
	?>
	</div>
</div>
</section>
