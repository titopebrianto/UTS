<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klub extends CI_Controller {

	public function index()
	{
		$this->load->model('Klub_Model');
		$data["klub_list"] = $this->Klub_Model->getDataKlub();
		$this->load->view('klub_datatables',$data);	
	}

public function create()
	{
		// idPegawai = 1
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('Klub_Model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('tambah_kategori_view');
		}else{
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = 1000000000;
			$config['max_width']  = 10240;
			$config['max_height']  = 7680;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('userfile')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('tambah_kategori_view',$error);
			}
			else{
			$this->Klub_Model->insertKlub();
			$this->load->view('tambah_kategori_sukses');
		}
	}
}
	
	public function update($id)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_numeric_spaces');
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('Klub_Model');
		$data['klub_datatables']=$this->Klub_Model->getKlub($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view

			$this->load->view('edit_kategori_view',$data);

		}else{
			$this->Klub_Model->updateById($id);
			$data["klub_list"] = $this->Klub_Model->getDataKlub();
			$this->load->view('klub_datatables',$data);

		}
	}

		public function delete($id)
 	{ 
 	 	$this->load->model('Klub_Model');
  		$this->Klub_Model->deleteById($id);
 	 	redirect('klub');
	 }

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>