<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibadah extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //load database
        $this->load->database();
        // cek login
        $this->load->model('Utility');
        $this->load->model('MenuModel');
        $this->Utility->isLogin();
        // get iden pt
        $this->midenpt = $this->db->get('midenpt')->row();
    }

    public function index()
    {
        $data['table'] = $this->db->get('liturgi')->result_array();
        $data['idtable'] = '';
        $data['indukmenu'] = 'A000000';
        $data['submenu'] = '';
        $data['mmenu'] = $this->MenuModel->listmenu('BA');
        $this->db->order_by('kodemodul', 'ASC');
        $data['mmodul'] = $this->db->get('mmodul')->result_array();
        $data['midenpt'] = $this->midenpt;
        $this->load->view('layout/home/header', $data);
        $this->load->view('layout/home/sidebar');
        $this->load->view('ibadah/index');
        $this->load->view('layout/home/footer');
    }

    public function form($method = 'tambah')
    {
        if ($method == 'edit') {
            $liturgiid = $this->input->get('liturgiid');
            $this->db->where('liturgiid', $liturgiid);
            $data['liturgi'] = $this->db->get('liturgi')->row();
        }
        $data['method'] = $method;
        $data['idtable'] = 'liturgi';
        $data['indukmenu'] = 'A000000';
        $data['submenu'] = '';
        $data['mmenu'] = $this->MenuModel->listmenu('BA');
        $data['mmodul'] = $this->db->get('mmodul')->result_array();
        $data['midenpt'] = $this->midenpt;
        $this->load->view('layout/home/header', $data);
        $this->load->view('layout/home/sidebar');
        $this->load->view('ibadah/tambah');
        $this->load->view('layout/home/footer');
    }

    public function simpan_liturgi($jenis)
    {
        $liturgifile = '';
        if (!empty($_FILES['liturgifile']['name'])) {
            $config['upload_path'] = $this->session->userdata('urlfile') . 'assets/pdf/';
            $config['allowed_types'] = 'png|jpg|jpeg|pdf';
            $config['encrypt_name'] = TRUE;
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('liturgifile')) {
                $this->session->set_userdata('errormsg', 'KESALAHAN PADA UPLOAD GAMBAR, FORMAT GAMBAR TIDAK SESUAI');
                redirect($_SERVER['HTTP_REFERER']);
            }
    
            $liturgifile = $this->upload->data("file_name");
        }
    
         // jika edit hapus dlu
         if ($jenis == 'edit') {
            $liturgiid = $this->input->post('liturgiid');
            $this->db->where('liturgiid', $liturgiid);
            $liturgi = $this->db->get('liturgi')->row();
            // jika ada foto baru, hapus foto lama
            if ($liturgifile) {
                $filefoto = $this->session->userdata('urlfile') . 'assets/pdf/' . $liturgi->liturgifile;
                unlink($filefoto);
            } else {
                // jika tidak ambil foto lama
                $liturgifile = $liturgi->liturgifile;
            }
            $this->db->delete('liturgi', ['liturgiid' => $liturgiid]);
        }
        
        $liturgijudul = $this->input->post('liturgijudul');
        $liturgitgl = $this->input->post('liturgitgl');
        if($jenis == 'tambah'){
            $galeri = [
                'liturgifile' => $liturgifile,
                'liturgijudul' => $liturgijudul,
                'liturgitgl' => $liturgitgl
            ];
        } elseif($jenis == 'edit'){
            $galeri = [
                'liturgiid' => $liturgiid,
                'liturgifile' => $liturgifile,
                'liturgitgl' => $liturgitgl,
                'liturgijudul' => $liturgijudul
            ];
        }
    
        $this->db->insert('liturgi', $galeri);
        if($jenis == 'tambah'){
            $this->session->set_userdata('successmsg', 'BERHASIL TAMBAH FOTO');
        } elseif($jenis == 'edit'){
            $this->session->set_userdata('successmsg', 'BERHASIL EDIT FOTO');
        }
        redirect('Ibadah');
    }
    public function hapus($liturgiId)
{
    if (!$liturgiId) {
        redirect('Ibadah');
    }
    $liturgi = $this->db->get_where('liturgi', ['liturgiid' => $liturgiId])->row();
    if (!$liturgi) {
        redirect('Ibadah');
    }
    $filefoto = $this->session->userdata('urlfile') . 'assets/pdf/' . $liturgi->liturgifile;
    unlink($filefoto);
    $this->db->delete('liturgi', ['liturgiid' => $liturgiId]);
    $this->session->set_userdata('successmsg', 'BERHASIL HAPUS FOTO');
    redirect('Ibadah');
}
}
