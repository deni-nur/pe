<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tkm extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['tkm_m','desa_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);
		$tkm = $this->tkm_m->get($portal_id);

		$data = array(	'tkm'	=>	$tkm,
					);
		$this->template->load('template', 'tktr/tkm/data', $data);
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
		$this->template->load('template', 'tktr/tkm/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),
							'desa_id'		=>	$i->post('desa_id'),
							'kelompok'		=>	$i->post('kelompok'),
							'nama'			=>	$i->post('nama'),
							'jk'			=>	$i->post('jk'),
							'alamat'		=>	$i->post('alamat'),
							'ket'			=>	$i->post('ket')
						);

			$this->tkm_m->add($data);
			$this->session->set_flashdata('success', 'Data Tenaga Kerja Mandiri sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/tkm'), 'refresh');
		// end masuk database
		}
	}

	public function edit($tkm_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$tkm_id = $this->uri->segment(5);
		$tkm = $this->tkm_m->detail($tkm_id);
		$desa = $this->desa_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'edit',
						'tkm'		=>	$tkm,
						'portal'	=>	$portal,
						'desa'		=>	$desa
					);
		$this->template->load('template', 'tktr/tkm/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'tkm_id'		=> 	$tkm_id,
							'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),
							'desa_id'		=>	$i->post('desa_id'),
							'kelompok'		=>	$i->post('kelompok'),
							'nama'			=>	$i->post('nama'),
							'jk'			=>	$i->post('jk'),
							'alamat'		=>	$i->post('alamat'),
							'ket'			=>	$i->post('ket')
						);

			$this->tkm_m->edit($data);
			$this->session->set_flashdata('success', 'Data Tenaga Kerja Mandiri Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/tkm'), 'refresh');
		// end masuk database
		}
	}

	public function del_tkm()
	{
		$tkm_id = $this->input->post('tkm_id');
		$this->tkm_m->del_tkm(['tkm_id' => $tkm_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function view()
	{
		$data['tkm'] = $this->tkm_m->view();
		$this->template->load('template', 'tktr/tkm/view', $data);
	}

	public function form()
	{
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->tkm_m->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets/excel/tkm/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->template->load('template', 'tktr/tkm/formtkm', $data);
		//$this->load->view('admin/tki/formtki', $data);
	}
	
	public function import()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/excel/tkm/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
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
	      	'desa_id'      	=> $row['C'], // Insert data dari Kolom C di Excel
	      	'kelompok'      => $row['D'], // Insert data dari Kolom D di Excel
	      	'nama'      	=> $row['E'], // Insert data dari Kolom E di Excel
	      	'jk'      		=> $row['F'], // Insert data dari Kolom E di Excel
	      	'alamat'      	=> $row['G'], // Insert data dari Kolom E di Excel
	      	'ket'      		=> $row['H'], // Insert data dari Kolom E di Excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->tkm_m->insert_multiple($data);
		
		redirect('portal/'.$this->uri->segment(2).'/tkm/view'); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

}

/* End of file Padat_karya.php */
/* Location: ./application/controllers/Padat_karya.php */