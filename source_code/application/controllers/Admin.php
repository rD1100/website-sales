<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function index()
	{
		$data['tittle'] = 'TOKO ONLINE';
		$data['aktif'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();
		$data['barang'] = $this->model_barang->tampil_data()->result();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates_admin/footer');
	}
	public function myProfile()
    {
        $data['tittle'] = 'CV.SATRIA MARTIAL ARTS';
        $data['aktif'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/myProfile', $data);
		$this->load->view('templates_admin/footer');
    }

    public function editprofile()
    {
        $data['tittle'] = 'CV.SATRIA MARTIAL ARTS';
        $data['aktif'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar', $data);
			$this->load->view('templates_admin/topbar', $data);
            $this->load->view('admin/editProfile', $data);
			$this->load->view('templates_admin/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $unggah_image = $_FILES['image'];


            if ($unggah_image) {
                $config['upload_path'] = 'assets/img/profile';
                $config['allowed_types'] = 'jpeg|gif|jpg|png';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {

                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil di ubah!!!</div>');
            redirect('user/myProfile');
        }
    }
	public function data_barang()
	{
		$data['tittle'] = 'TOKO ONLINE';
		$data['aktif'] = 'Data Barang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$data['barang'] = $this->model_barang->tampil_data()->result();
		$nama_barang = $this->input->post('nama_barang');
		// $kategori_user = $this->input->post('kriteria');
		$kategori = $this->input->post('kategori');
		$keterangan = $this->input->post('keterangan');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$gambar = $_FILES['gambar'];
		$user = $this->db->get_where('user', ['id_user' ])->row_array();
		if ($gambar) {
			$config = array(
				'upload_path' => "uploads",
				'allowed_types' => "jpg|jpeg|png|gif",
				'max_size' => "5048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "3000",
				'max_width' => "3000"
			);
			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$gambar_upload = $this->upload->data('file_name');
				
				$data = array(

					'nama_barang' => $nama_barang,
					'keterangan'  => $keterangan,
					// 'kriteria'    =>$kategori_user ,
					'kategori'    => $kategori,
					'harga'       => $harga,
					'stok'        => $stok,
					'gambar'      => $gambar_upload,
					//'id_user'	=> $user
				);

				$this->db->insert('tb_barang', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Barang berhasil di tambahkan!</div>');
				redirect('admin/data_barang');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Barang gagal di tambahkan!</div>');
				redirect('admin/data_barang');
			}
		}
	}

	public function edit($id)
	{
		$data['tittle'] = 'TOKO ONLINE';
		$data['aktif'] = '';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$where = array('id_barang' => $id);
		$data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
	}
	public function update()
	{
		$id = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$data = array(

			'nama_barang' => $nama_barang,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'harga' => $harga,
			'stok' => $stok
		);
		$where = array(
			'id_barang' => $id
		);
		$this->model_barang->update_data($where, $data, 'tb_barang');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di ubah!</div>');
		redirect('admin/data_barang');
	}
	public function hapus($id)
	{
		$where = array('id_barang' => $id);
		$this->model_barang->hapus_data($where, 'tb_barang');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di dihapus!</div>');
		redirect('admin/data_barang');
	}
	public function invoice()
	{

		$data['tittle'] = 'CV.MARTIAL ARTS';
		$data['aktif'] = 'Invoice';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->model_invoice->tampil_data();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('admin/invoice', $data);
		$this->load->view('templates_admin/footer');
	}
	public function detail($id_invoice)
	{
		$data['tittle'] = 'TOKO ONLINE';
		$data['aktif'] = 'Detail Invoice';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('admin/detail_invoice', $data);
		$this->load->view('templates_admin/footer');
	}
}
