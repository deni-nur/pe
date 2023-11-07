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
        	<div>
            <h3 class="box-title">Form Import Data Perusahaan</h3>
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
	<a href="<?php echo base_url("assets/excel/perusahaan/Format Import Data Perusahaan.xlsx"); ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"> Download Format</i></a>
	<br>
	<br>
	</div>
	
	<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
	<form method="post" action="<?= site_url('portal/'.$this->uri->segment(2).'/perusahaan/form') ?>" enctype="multipart/form-data">
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
		echo "<form method='post' action='".site_url('portal/'.$this->uri->segment(2).'/perusahaan/import')."'>";
		
		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";
		
		echo "<table border='1' cellpadding='8' width='100%'>
		<tr>
			<th colspan='11'>Preview Data</th>
		</tr>
		<tr>
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
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
			// Ambil data pada excel sesuai Kolom
		$portal_id			= $row['A']; // Ambil data
		$user_id 			= $row['B']; // Ambil data
      	$desa_id    		= $row['C']; // Ambil data 
      	$nama_perusahaan   	= $row['D']; // Ambil data
      	$alamat       		= $row['E']; // Ambil data
      	$tanggal_berdiri    = $row['F']; // Ambil data
      	$kbli     			= $row['G']; // Ambil data
      	$email  			= $row['H']; // Ambil data
      	$phone       		= $row['I']; // Ambil data
      	$kepemilikan    	= $row['J']; // Ambil data
      	$capital_status 	= $row['J']; // Ambil data
			
			// Cek jika semua data tidak diisi
if(empty($portal_id) && empty($user_id) && empty($desa_id) && empty($nama_perusahaan) && empty($alamat) && empty($tanggal_berdiri) && empty($kbli) && empty($email) && empty($phone) && empty($kepemilikan) && empty($capital_status))
  continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
		$portal_id_td 			= ( ! empty($portal_id))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
		$user_id_td 			= ( ! empty($user_id))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $desa_id_td 			= ( ! empty($desa_id))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $nama_perusahaan_td 	= ( ! empty($nama_perusahaan))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $alamat_td 				= ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $tanggal_berdiri_td 	= ( ! empty($tanggal_berdiri))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $kbli_td 				= ( ! empty($kbli))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $email_td 				= ( ! empty($email))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $phone_td 				= ( ! empty($phone))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $kepemilikan_td 		= ( ! empty($kepemilikan))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
        $capital_status_td 		= ( ! empty($capital_status))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
				
		// Jika salah satu data ada yang kosong
		if(empty($portal_id) or empty($user_id) or empty($desa_id) or empty($nama_perusahaan) or empty($alamat) or empty($tanggal_berdiri) or empty($kbli) or empty($email) or empty($phone) or empty($kepemilikan) or empty($capital_status)){
			$kosong++; // Tambah 1 variabel $kosong
		}
				
		echo "<tr>";
		echo "<td".$portal_id_td.">".$portal_id."</td>";
        echo "<td".$user_id_td.">".$user_id."</td>";
        echo "<td".$desa_id_td.">".$desa_id."</td>";
        echo "<td".$nama_perusahaan_td.">".$nama_perusahaan."</td>";
        echo "<td".$alamat_td.">".$alamat."</td>";
        echo "<td".$tanggal_berdiri_td.">".$tanggal_berdiri."</td>";
        echo "<td".$kbli_td.">".$kbli."</td>";
        echo "<td".$email_td.">".$email."</td>";
        echo "<td".$phone_td.">".$phone."</td>";
        echo "<td".$kepemilikan_td.">".$kepemilikan."</td>";
        echo "<td".$capital_status_td.">".$capital_status."</td>";
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
			echo "<button class='btn btn-toolbar'><a href='".site_url('portal/'.$this->uri->segment(2).'/perusahaan')."'><i class='fa fa-history'> Cancel</i></a></button>";
		}
		
		echo "</form>";
	}
	?>
	</div>
</div>
</section>
