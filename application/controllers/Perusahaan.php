<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['perusahaan_m','portal_m','desa_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$perusahaan = $this->perusahaan_m->get();

		$data = array(	'perusahaan'		=> $perusahaan
				);

		$this->template->load('template', 'tktr/perusahaan/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$desa = $this->desa_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'desa'		=>	$desa
					);
		$this->template->load('template', 'tktr/perusahaan/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							'desa_id'			=>	$i->post('desa_id'),
							'nama_perusahaan'	=>	$i->post('nama_perusahaan'),
							'alamat'			=>	$i->post('alamat'),
							'tanggal_berdiri'	=>	$i->post('tanggal_berdiri'),
							'kbli'				=>	$i->post('kbli'),
							'email'				=>	$i->post('email'),
							'phone'				=>	$i->post('phone'),
							'kepemilikan'		=>	$i->post('kepemilikan'),
							'capital_status'	=>	$i->post('capital_status')
						);

			$this->perusahaan_m->add($data);
			$this->session->set_flashdata('success', 'Data Perusahaan sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/perusahaan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($perusahaan_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$perusahaan_id = $this->uri->segment(5);
		$perusahaan = $this->perusahaan_m->detail($perusahaan_id);
		$desa = $this->desa_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'edit',
						'perusahaan'	=>	$perusahaan,
						'portal'		=>	$portal,
						'desa'			=>	$desa
					);
		$this->template->load('template', 'tktr/perusahaan/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'perusahaan_id'		=>	$perusahaan_id,
							'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							'desa_id'			=>	$i->post('desa_id'),
							'nama_perusahaan'	=>	$i->post('nama_perusahaan'),
							'alamat'			=>	$i->post('alamat'),
							'tanggal_berdiri'	=>	$i->post('tanggal_berdiri'),
							'kbli'				=>	$i->post('kbli'),
							'email'				=>	$i->post('email'),
							'phone'				=>	$i->post('phone'),
							'kepemilikan'		=>	$i->post('kepemilikan'),
							'capital_status'	=>	$i->post('capital_status')
						);

			$this->perusahaan_m->edit($data);
			$this->session->set_flashdata('success', 'Data Perusahaan Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/perusahaan'), 'refresh');
		// end masuk database
		}
	}

	public function del_perusahaan()
	{
		$perusahaan_id = $this->input->post('perusahaan_id');
		$this->perusahaan_m->del_perusahaan(['perusahaan_id' => $perusahaan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function view()
	{
		$data['perusahaan'] = $this->perusahaan_m->view();
		$this->template->load('template', 'tktr/perusahaan/view', $data);
	}

	public function form()
	{
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->perusahaan_m->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets/excel/perusahaan/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->template->load('template', 'tktr/perusahaan/formperusahaan', $data);
		//$this->load->view('admin/tki/formtki', $data);
	}
	
	public function import()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/excel/perusahaan/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
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
			'portal_id'			=> $row['A'], // Insert data dari Kolom A di Excel
			'user_id' 			=> $row['B'], // Insert data dari Kolom B di Excel
	      	'desa_id'      		=> $row['C'], // Insert data dari Kolom C di Excel
	      	'nama_perusahaan'   => $row['D'], // Insert data dari Kolom D di Excel
	      	'alamat'       		=> $row['E'], // Insert data dari Kolom E di Excel
	      	'tanggal_berdiri'   => $row['F'], // Insert data dari Kolom F di Excel
	      	'kbli'          	=> $row['G'], // Insert data dari Kolom G di Excel
	      	'email'     		=> $row['H'], // Insert data dari Kolom H di Excel
	      	'phone'         	=> $row['I'], // Insert data dari Kolom I di Excel
	      	'kepemilikan'       => $row['J'], // Insert data dari Kolom J di Excel
	      	'capital_status'    => $row['K'], // Insert data dari Kolom J di Excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->perusahaan_m->insert_multiple($data);
		
		redirect('portal/'.$this->uri->segment(2).'/perusahaan/view'); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */