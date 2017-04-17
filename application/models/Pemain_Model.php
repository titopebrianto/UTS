<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain_Model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function getDataPemain()
	{
		$this->db->select("id,nama,posisi,DATE_FORMAT(tanggal_lahir,'%d-%m-%Y') as tanggal_lahir");
		$query = $this->db->get('pemain');
		return $query->result();
	}
	public function getKategoriByBarang($value='')
	{
		# code...
	}
}

/* End of file Bidang_model.php */
/* Location: ./application/models/Bidang_model.php */

 ?>