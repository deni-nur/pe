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
        	<div>
            <h3 class="box-title">Form Import Data Pelatihan Kerja</h3>
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
	<a href="<?php echo base_url("assets/excel/pelatihan/Format Import Data Pelatihan Kerja.xlsx"); ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"> Download Format</i></a>
	<br>
	<br>
	</div>
	
	<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
	<form method="post" action="<?= site_url('portal/'.$this->uri->segment(2).'/pelatihan/form') ?>" enctype="multipart/form-data">
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
		echo "<form method='post' action='".site_url('portal/'.$this->uri->segment(2).'/pelatihan/import')."'>";
		
		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";
		
		echo "<table border='1' cellpadding='8' width='100%'>
		<tr>
			<th colspan='12'>Preview Data</th>
		</tr>
		<tr>
		    <th>Sumber Dana</th>
		    <th>Kejuruan</th>
		    <th>Nama</th>
		    <th>Tempat</th>
		    <th>Tanggal Lahir</th>
		    <th>Jenis Kelamin</th>
		    <th>Pendidikan</th>
		    <th>Alamat</th>
		    <th>No HP</th>
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
			// Ambil data pada excel sesuai Kolom
		//$portal_id		= $row['A']; // Ambil data
		//$user_id 		= $row['B']; // Ambil data
      	//$desa_id    	= $row['C']; // Ambil data 
      	$sumber_dana   	= $row['A']; // Ambil data
      	$kejuruan       = $row['B']; // Ambil data
      	$nama       	= $row['C']; // Ambil data
      	$tempat     	= $row['D']; // Ambil data
      	$tanggal_lahir  = $row['E']; // Ambil data
      	$jk       		= $row['F']; // Ambil data
      	$pendidikan     = $row['G']; // Ambil data
      	$alamat       	= $row['H']; // Ambil data
      	$no_hp       	= $row['I']; // Ambil data
			
			// Cek jika semua data tidak diisi
if(empty($sumber_dana) && empty($kejuruan) && empty($nama) && empty($tempat) && empty($tanggal_lahir) && empty($jk) && empty($pendidikan) && empty($alamat) && empty($no_hp))
  continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
		//$portal_id_td 		= ( ! empty($portal_id))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
		//$user_id_td 		= ( ! empty($user_id))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        //$desa_id_td 		= ( ! empty($desa_id))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $sumber_dana_td 	= ( ! empty($sumber_dana))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $kejuruan_td 		= ( ! empty($kejuruan))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $nama_td 			= ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $tempat_td 			= ( ! empty($tempat))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $tanggal_lahir_td 	= ( ! empty($tanggal_lahir))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $jk_td 				= ( ! empty($jk))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $pendidikan_td 		= ( ! empty($pendidikan))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $alamat_td 			= ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $no_hp_td 			= ( ! empty($no_hp))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
				
		// Jika salah satu data ada yang kosong
		if(empty($sumber_dana) or empty($kejuruan) or empty($nama) or empty($tempat) or empty($tanggal_lahir) or empty($jk) or empty($pendidikan) or empty($alamat) or empty($no_hp)){
			$kosong++; // Tambah 1 variabel $kosong
		}
				
		echo "<tr>";
		//echo "<td".$portal_id_td.">".$portal_id."</td>";
        //echo "<td".$user_id_td.">".$user_id."</td>";
        //echo "<td".$desa_id_td.">".$desa_id."</td>";
        echo "<td".$sumber_dana_td.">".$sumber_dana."</td>";
        echo "<td".$kejuruan_td.">".$kejuruan."</td>";
        echo "<td".$nama_td.">".$nama."</td>";
        echo "<td".$tempat_td.">".$tempat."</td>";
        echo "<td".$tanggal_lahir_td.">".$tanggal_lahir."</td>";
        echo "<td".$jk_td.">".$jk."</td>";
        echo "<td".$pendidikan_td.">".$pendidikan."</td>";
        echo "<td".$alamat_td.">".$alamat."</td>";
        echo "<td".$no_hp_td.">".$no_hp."</td>";
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
			echo "<button class='btn btn-toolbar'><a href='".site_url('portal/'.$this->uri->segment(2).'/pelatihan')."'><i class='fa fa-history'> Cancel</i></a></button>";
		}
		
		echo "</form>";
	}
	?>
	</div>
</div>
</section>
