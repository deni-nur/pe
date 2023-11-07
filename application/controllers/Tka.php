<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tka extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['tka_m','portal_m','perusahaan_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$perusahaan = $this->perusahaan_m->get();

		$data = array(	'perusahaan'	=> $perusahaan
				);

		$this->template->load('template', 'tktr/tka/data', $data);
	}

	public function data_tka()
	{
		$perusahaan_id = $this->uri->segment(4);

		$tka = $this->tka_m->get($perusahaan_id);

		$data = array(	'tka'	=> $tka
				);

		$this->template->load('template', 'tktr/tka/data_tka', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$perusahaan_id = $this->uri->segment(4);

		$valid = $this->form_validation;

		$valid->set_rules('nama_tka', 'Nama Tka', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add'
					);
		$this->template->load('template', 'tktr/tka/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),
							'perusahaan_id'	=>	$perusahaan_id,
							'nama_tka'		=>	$i->post('nama_tka'),
							'jk'			=>	$i->post('jk'),
							'kebangsaan'	=>	$i->post('kebangsaan'),
							'passport'		=>	$i->post('passport'),
							'kitas'			=>	$i->post('kitas'),
							'jabatan'		=>	$i->post('jabatan')
						);

			$this->tka_m->add($data);
			$this->session->set_flashdata('success', 'Data Tka sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/tka/'.$this->uri->segment(4).'/data_tka'), 'refresh');
		// end masuk database
		}
	}

	public function edit($tka_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$perusahaan_id = $this->uri->segment(4);

		$tka_id = $this->uri->segment(6);
		$tka = $this->tka_m->detail($tka_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_tka', 'Nama Tka', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'edit',
						'tka'		=>	$tka,
						'portal'	=>	$portal
					);
		$this->template->load('template', 'tktr/tka/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'tka_id'		=>	$tka_id,
							'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),
							'perusahaan_id'	=>	$perusahaan_id,
							'nama_tka'		=>	$i->post('nama_tka'),
							'jk'			=>	$i->post('jk'),
							'kebangsaan'	=>	$i->post('kebangsaan'),
							'passport'		=>	$i->post('passport'),
							'kitas'			=>	$i->post('kitas'),
							'jabatan'		=>	$i->post('jabatan')
						);

			$this->tka_m->edit($data);
			$this->session->set_flashdata('success', 'Data Tka Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/tka/'.$this->uri->segment(4).'/data_tka'), 'refresh');
		// end masuk database
		}
	}

	public function del_tka()
	{
		$tka_id = $this->input->post('tka_id');
		$this->tka_m->del_tka(['tka_id' => $tka_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function view()
	{
		$data['tka'] = $this->tka_m->view();
		$this->template->load('template', 'tktr/tka/view', $data);
	}

	public function form()
	{
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->tka_m->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets/excel/tka/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->template->load('template', 'tktr/tka/formtka', $data);
		//$this->load->view('admin/tki/formtki', $data);
	}
	
	public function import()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/excel/tka/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
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
			'portal_id'		=> $row['A'], // Insert data dari Kolom A di Excel
			'user_id' 		=> $row['B'], // Insert data dari Kolom B di Excel
	      	'perusahaan_id' => $row['C'], // Insert data dari Kolom C di Excel
	      	'nama_tka'   	=> $row['D'], // Insert data dari Kolom D di Excel
	      	'jk'       		=> $row['E'], // Insert data dari Kolom E di Excel
	      	'kebangsaan'   	=> $row['F'], // Insert data dari Kolom F di Excel
	      	'passport'      => $row['G'], // Insert data dari Kolom G di Excel
	      	'kitas'     	=> $row['H'], // Insert data dari Kolom H di Excel
	      	'jabatan'       => $row['I'], // Insert data dari Kolom I di Excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->tka_m->insert_multiple($data);
		
		redirect('portal/'.$this->uri->segment(2).'/tka/'.$this->uri->segment(4).'/view'); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

}

/* End of file Tka.php */
/* Location: ./application/controllers/Tka.php */