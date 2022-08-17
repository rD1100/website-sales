<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Model_slct extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function pilih()
	{
	
		$data = $this->db->query("SELECT role FROM user_role WHERE role !='Admin' ");
		return $data->result();
	}
	public function find($id)
    {
		$result = $this->db->where('role_id', $id)
		->limit(1)
		->get('user');
	if ($result->num_rows() > 0) {
		return $result->row();
	} else {
		return array();
	}
	}
 
}