<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->midenpt = $this->db->get('midenpt')->row();
	}

	public function cek_login()
    {
        $remember_token = get_cookie('ci3_remember_token');
        if($remember_token){
            $this->db->where('usertoken',$remember_token);
            $cekuser = $this->db->get('muser')->row();
            // userdata
            $userdata = [
                'userid' => $cekuser->userid,
                'username' => $cekuser->username,
                'userpasw' => $cekuser->userpasw,
                'userstat' => $cekuser->userstat,
                'userimg' => $cekuser->userimg,
            ];
            $this->session->set_userdata($userdata);
        }
        if ($this->session->userdata('userid')) {
            redirect('Dashboard');
        } else {
            redirect('Auth');
        }
    }

	public function index()
    {
        foreach ($_SESSION as $key => $val) {
            if ($key !== "autherrormsg" && $key !== "authsuccessmsg" && $key !== "authinfomsg" && $key !== "__ci_vars") {
                unset($_SESSION[$key]);
            }
        }
		$data['midenpt'] = $this->midenpt;
        $this->load->view('layout/auth/header',$data);
        $this->load->view('auth/login');
        $this->load->view('layout/auth/footer');
    }

    public function login_post()
    {
        $post = $this->input->post();
        $this->db->where("userid", $post['userid']);
        $cekuser = $this->db->get('muser')->row();
        if ($cekuser) {
            if (strtolower($post['password']) == strtolower($cekuser->userpasw)) {
				// remember
				if($post['remember'])
				{
					$token = $cekuser->userid.bin2hex(random_bytes(50));
					$this->db->update("muser",['usertoken' => $token],['userid' => $cekuser->userid]);
					set_cookie('ci3_remember_token',$token,3600 * 24 * 30);
				}
				$userdata = [
					'userid' => $cekuser->userid,
					'username' => $cekuser->username,
					'userpasw' => $cekuser->userpasw,
					'userstat' => $cekuser->userstat,
					'userimg' => $cekuser->userimg,
					'successmsg' => 'Berhasil login.'
				];
				$this->session->set_userdata($userdata);
				redirect('Dashboard');
            } else {
                $this->session->set_userdata('autherrormsg', 'Password salah.');
                redirect('Auth');
            }
        } else {
            $this->session->set_userdata('autherrormsg', 'User tidak ditemukan.');
            redirect('Auth');
        }
    }

	public function logout()
    {
        delete_cookie('ci3_remember_token');
        $this->session->set_userdata('loginsuccessmsg', 'Berhasil logout.');
        redirect('Auth');
    }

}
