<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pmi extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pmi_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$pmi = $this->pmi_m->get($portal_id);

		$data = array(	'pmi'		=> $pmi
				);

		$this->template->load('template', 'tktr/pmi/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$valid = $this->form_validation;

		$valid->set_rules('ngr_tjuan', 'Negara Tujuan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
					);
		$this->template->load('template', 'tktr/pmi/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'			=>	$portal_id,
							'tgl_registrasi'	=>	$i->post('tgl_registrasi'),
							'id_sistem'			=>	$i->post('id_sistem'),
							'nama'				=>	$i->post('nama'),
							'tmpt_lhr'			=>	$i->post('tmpt_lhr'),
							'tgl_lhr'			=>	$i->post('tgl_lhr'),
							'jk'				=>	$i->post('jk'),
							'alamat'			=>	$i->post('alamat'),
							'pptkis'			=>	$i->post('pptkis'),
							'agensi'			=>	$i->post('agensi'),
							'ngr_tjuan'			=>	$i->post('ngr_tjuan'),
							'pendidikan'		=>	$i->post('pendidikan'),
							'sktor_pkrjaan'		=>	$i->post('sktor_pkrjaan'),
							'jbtn'				=>	$i->post('jbtn'),
							'sttus'				=>	$i->post('sttus')
						);

			$this->pmi_m->add($data);
			$this->session->set_flashdata('success', 'Data PMI sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pmi'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pmi_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$pmi_id = $this->uri->segment(5);
		$pmi = $this->pmi_m->detail($pmi_id);

		$valid = $this->form_validation;

		$valid->set_rules('ngr_tjuan', 'Negara Tujuan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'pmi'		=> $pmi,
						'portal'	=> $portal
					);
		$this->template->load('template', 'tktr/pmi/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pmi_id'			=>	$pmi_id,
							'portal_id'			=>	$portal_id,
							'tgl_registrasi'	=>	$i->post('tgl_registrasi'),
							'id_sistem'			=>	$i->post('id_sistem'),
							'nama'				=>	$i->post('nama'),
							'tmpt_lhr'			=>	$i->post('tmpt_lhr'),
							'tgl_lhr'			=>	$i->post('tgl_lhr'),
							'jk'				=>	$i->post('jk'),
							'alamat'			=>	$i->post('alamat'),
							'pptkis'			=>	$i->post('pptkis'),
							'agensi'			=>	$i->post('agensi'),
							'ngr_tjuan'			=>	$i->post('ngr_tjuan'),
							'pendidikan'		=>	$i->post('pendidikan'),
							'sktor_pkrjaan'		=>	$i->post('sktor_pkrjaan'),
							'jbtn'				=>	$i->post('jbtn'),
							'sttus'				=>	$i->post('sttus')
						);

			$this->pmi_m->edit($data);
			$this->session->set_flashdata('success', 'Data PMI Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pmi'), 'refresh');
		// end masuk database
		}
	}

	public function del_pmi()
	{
		$pmi_id = $this->input->post('pmi_id');
		$this->pmi_m->del_pmi(['pmi_id' => $pmi_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function view()
	{
		$data['pmi'] = $this->pmi_m->view();
		$this->template->load('template', 'tktr/pmi/view', $data);
	}

	public function form()
	{
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->pmi_m->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('assets/excel/pmi/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->template->load('template', 'tktr/pmi/formtki', $data);
		//$this->load->view('admin/tki/formtki', $data);
	}
	
	public function import()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('assets/excel/pmi/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
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
			'tgl_registrasi' 	=> $row['B'], // Insert data dari Kolom B di Excel
	      	'id_sistem'      	=> $row['C'], // Insert data dari Kolom C di Excel
	      	'nama'           	=> $row['D'], // Insert data dari Kolom D di Excel
	      	'tmpt_lhr'       	=> $row['E'], // Insert data dari Kolom E di Excel
	      	'tgl_lhr'        	=> $row['F'], // Insert data dari Kolom F di Excel
	      	'jk'             	=> $row['G'], // Insert data dari Kolom G di Excel
	      	'alamat'         	=> $row['H'], // Insert data dari Kolom H di Excel
	      	'pptkis'         	=> $row['I'], // Insert data dari Kolom I di Excel
	      	'agensi'         	=> $row['J'], // Insert data dari Kolom J di Excel
	      	'ngr_tjuan'      	=> $row['K'], // Insert data dari Kolom K di Excel
	      	'pendidikan'     	=> $row['L'], // Insert data dari Kolom L di Excel
	      	'sktor_pkrjaan'  	=> $row['M'], // Insert data dari Kolom M di Excel
	      	'jbtn'           	=> $row['N'], // Insert data dari Kolom N di Excel
	      	'sttus'          	=> $row['O'], // Insert data dari Kolom O di Excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->pmi_m->insert_multiple($data);
		
		redirect('portal/'.$this->uri->segment(2).'/pmi/view'); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

}

/* End of file Pnp_pmi.php */
/* Location: ./application/controllers/Pnp_pmi.php */