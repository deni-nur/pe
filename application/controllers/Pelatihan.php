<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pelatihan_m','desa_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);
		$pelatihan = $this->pelatihan_m->get($portal_id);

		$data = array(	'pelatihan'	=>	$pelatihan,
					);
		$this->template->load('template', 'tktr/pelatihan/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->get();

		$desa = $this->desa_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'desa'		=>	$desa,
						'portal'	=>	$portal
					);
		$this->template->load('template', 'tktr/pelatihan/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							//'desa_id'			=>	$i->post('desa_id'),
							'sumber_dana'		=>	$i->post('sumber_dana'),
							'kejuruan'			=>	$i->post('kejuruan'),
							'nama'				=>	$i->post('nama'),
							'tempat'			=>	$i->post('tempat'),
							'tanggal_lahir'		=>	$i->post('tanggal_lahir'),
							'jk'				=>	$i->post('jk'),
							'pendidikan'		=>	$i->post('pendidikan'),
							'alamat'			=>	$i->post('alamat'),
							'no_hp'				=>	$i->post('no_hp')
						);

			$this->pelatihan_m->add($data);
			$this->session->set_flashdata('success', 'Data Pelatihan Kerja sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pelatihan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pelatihan_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$pelatihan_id = $this->uri->segment(5);
		$pelatihan = $this->pelatihan_m->detail($pelatihan_id);
		$desa = $this->desa_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'edit',
						'pelatihan'	=>	$pelatihan,
						'portal'	=>	$portal,
						'desa'		=>	$desa
					);
		$this->template->load('template', 'tktr/pelatihan/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pelatihan_id'		=> 	$pelatihan_id,
							'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							//'desa_id'			=>	$i->post('desa_id'),
							'sumber_dana'		=>	$i->post('sumber_dana'),
							'kejuruan'			=>	$i->post('kejuruan'),
							'nama'				=>	$i->post('nama'),
							'tempat'			=>	$i->post('tempat'),
							'tanggal_lahir'		=>	$i->post('tanggal_lahir'),
							'jk'				=>	$i->post('jk'),
							'pendidikan'		=>	$i->post('pendidikan'),
							'alamat'			=>	$i->post('alamat'),
							'no_hp'				=>	$i->post('no_hp')
						);

			$this->pelatihan_m->edit($data);
			$this->session->set_flashdata('success', 'Data Pelatihan Kerja Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pelatihan'), 'refresh');
		// end masuk database
		}
	}

	public function del_pelatihan()
	{
		$pelatihan_id = $this->input->post('pelatihan_id');
		$this->pelatihan_m->del_pelatihan(['pelatihan_id' => $pelatihan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function view()
	{
		$data['pelatihan'] = $this->pelatihan_m->view();
		$this->template->load('template', 'tktr/pelatihan/view', $data);
	}

	public function form()
	{
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->pelatihan_m->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets/excel/pelatihan/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->template->load('template', 'tktr/pelatihan/formpelatihan', $data);
		//$this->load->view('admin/tki/formtki', $data);
	}
	
	public function import()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/excel/pelatihan/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
			//'portal_id'			=> $row['A'], // Insert data dari Kolom A di Excel
			//'user_id' 			=> $row['B'], // Insert data dari Kolom B di Excel
	      	//'desa_id'      		=> $row['C'], // Insert data dari Kolom C di Excel
	      	'sumber_dana'      	=> $row['A'], // Insert data dari Kolom D di Excel
	      	'kejuruan'      	=> $row['B'], // Insert data dari Kolom E di Excel
	      	'nama'      		=> $row['C'], // Insert data dari Kolom E di Excel
	      	'tempat'      		=> $row['D'], // Insert data dari Kolom E di Excel
	      	'tanggal_lahir'     => $row['E'], // Insert data dari Kolom E di Excel
	      	'jk'      			=> $row['F'], // Insert data dari Kolom E di Excel
	      	'pendidikan'      	=> $row['G'], // Insert data dari Kolom E di Excel
	      	'alamat'      		=> $row['H'], // Insert data dari Kolom E di Excel
	      	'no_hp'      		=> $row['I'], // Insert data dari Kolom E di Excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->pelatihan_m->insert_multiple($data);
		
		redirect('portal/'.$this->uri->segment(2).'/pelatihan/view'); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

}

/* End of file Padat_karya.php */
/* Location: ./application/controllers/Padat_karya.php */