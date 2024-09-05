<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapt extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
        // cek login
        $this->load->model('Utility');
        $this->load->model('MenuModel');
        $this->Utility->isLogin();
        // get iden pt
		$this->midenpt = $this->db->get('midenpt')->row();
	}

    public function index()
    {
        $data['indukmenu'] = 'BA010000';
        $data['submenu'] = '';
        $data['mmenu'] = $this->MenuModel->listmenu('BA');
        $data['midenpt'] = $this->midenpt;
        $this->load->view('layout/home/header',$data);
        $this->load->view('layout/home/sidebar');
        $this->load->view('datapt/index');
        $this->load->view('layout/home/footer');
    }

    public function simpan()
    {
        $post = $this->input->post();
		$ptlogo = $post['logolama'];
		// upload gambar
		if ($_FILES['ptlogo']['tmp_name']) {
            $config['upload_path'] = $this->pturl . 'assets/dist/img/';
            $config['allowed_types'] = 'png|jpg|jpeg';
			$config['max_size'] = '3000';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ptlogo')) {
                $this->session->set_userdata('errormsg', 'FOTO MAXIMAL 3MB');
                redirect($_SERVER['HTTP_REFERER']);
            }
            $ptlogo = $this->upload->data("file_name");
        }
        // update
        $update = [
            'ptnama'=>$post['ptnama'],
            'ptalamat'=>$post['ptalamat'],
            'ptlogo'=>$ptlogo,
        ];
		$this->db->update('midenpt',$update);
		$this->session->set_userdata('successmsg','Data berhasil disimpan');
        redirect('Datapt');
    }

}