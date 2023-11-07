<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pmi_kasus extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pmi_kasus_m','portal_m','desa_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$pmi_kasus = $this->pmi_kasus_m->get($portal_id);

		$data = array(	'pmi_kasus'		=> $pmi_kasus
				);

		$this->template->load('template', 'tktr/pmi_kasus/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$desa = $this->desa_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('nama_pmi', 'Nama PMI', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'desa'		=>	$desa
					);
		$this->template->load('template', 'tktr/pmi_kasus/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'desa_id'				=>	$i->post('desa_id'),
							'tanggal_laporan'		=>	$i->post('tanggal_laporan'),
							'nama_pmi'				=>	$i->post('nama_pmi'),
							'alamat'				=>	$i->post('alamat'),
							'nama_pengadu'			=>	$i->post('nama_pengadu'),
							'negara_penempatan'		=>	$i->post('negara_penempatan'),
							'permasalahan'			=>	$i->post('permasalahan'),
							'ket'					=>	$i->post('ket')
						);

			$this->pmi_kasus_m->add($data);
			$this->session->set_flashdata('success', 'Data PMI sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pmi_kasus'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pmi_kasus_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$pmi_kasus_id = $this->uri->segment(5);
		$pmi_kasus = $this->pmi_kasus_m->detail($pmi_kasus_id);
		$desa = $this->desa_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('nama_pmi', 'Nama PMI', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'edit',
						'pmi_kasus'		=>	$pmi_kasus,
						'portal'		=>	$portal,
						'desa'			=>	$desa
					);
		$this->template->load('template', 'tktr/pmi_kasus/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pmi_kasus_id'			=>	$pmi_kasus_id,
							'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'desa_id'				=>	$i->post('desa_id'),
							'tanggal_laporan'		=>	$i->post('tanggal_laporan'),
							'nama_pmi'				=>	$i->post('nama_pmi'),
							'alamat'				=>	$i->post('alamat'),
							'nama_pengadu'			=>	$i->post('nama_pengadu'),
							'negara_penempatan'		=>	$i->post('negara_penempatan'),
							'permasalahan'			=>	$i->post('permasalahan'),
							'ket'					=>	$i->post('ket')
						);

			$this->pmi_kasus_m->edit($data);
			$this->session->set_flashdata('success', 'Data PMI Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pmi_kasus'), 'refresh');
		// end masuk database
		}
	}

	public function del_pmi_kasus()
	{
		$pmi_kasus_id = $this->input->post('pmi_kasus_id');
		$this->pmi_kasus_m->del_pmi_kasus(['pmi_kasus_id' => $pmi_kasus_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function view()
	{
		$data['pmi_kasus'] = $this->pmi_kasus_m->view();
		$this->template->load('template', 'tktr/pmi_kasus/view', $data);
	}

	public function form()
	{
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->pmi_kasus_m->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets/excel/pmi_kasus/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->template->load('template', 'tktr/pmi_kasus/formpmikasus', $data);
		//$this->load->view('admin/tki/formtki', $data);
	}
	
	public function import()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/excel/pmi_kasus/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
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
			'portal_id'				=> $row['A'], // Insert data dari Kolom A di Excel
			'user_id' 				=> $row['B'], // Insert data dari Kolom B di Excel
	      	'desa_id'      			=> $row['C'], // Insert data dari Kolom C di Excel
	      	'tanggal_laporan'   	=> $row['D'], // Insert data dari Kolom D di Excel
	      	'nama_pmi'       		=> $row['E'], // Insert data dari Kolom E di Excel
	      	'alamat'        		=> $row['F'], // Insert data dari Kolom F di Excel
	      	'nama_pengadu'          => $row['G'], // Insert data dari Kolom G di Excel
	      	'negara_penempatan'     => $row['H'], // Insert data dari Kolom H di Excel
	      	'permasalahan'         	=> $row['I'], // Insert data dari Kolom I di Excel
	      	'ket'         			=> $row['J'], // Insert data dari Kolom J di Excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->pmi_kasus_m->insert_multiple($data);
		
		redirect('portal/'.$this->uri->segment(2).'/pmi_kasus/view'); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

}

/* End of file Pnp_pmi_kasus.php */
/* Location: ./application/controllers/Pnp_pmi_kasus.php */