<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Utility');
        $this->load->model('MenuModel');
        $this->midenpt = $this->db->get('midenpt')->row();
    }

    public function index()
    {

        $this->load->view('home/index');
    }
    public function liturgi()
    {
        // Get all liturgi data from the database
        $data['liturgi'] = $this->db->get('liturgi')->result_array();

        // Check if there are any liturgi records
        if (empty($data['liturgi'])) {
            $data['message'] = 'Tidak ada data liturgi yang tersedia saat ini.';
        }

        // Load the view and pass the data
        $this->load->view('home/liturgi', $data);

    }

}







