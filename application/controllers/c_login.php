<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('main_model');

    }

    public function index(){
        $this->session->unset_userdata('ses_id');
        $this->session->unset_userdata('ses_user');
        $this->session->unset_userdata('ses_nama');
        $this->session->unset_userdata('ses_level');
        // $data['kontak'] = $this->main_model->GetKontak();
        $this->load->view('login');
    }

    public function sign_in(){
		if (!$_POST['log']){
            $this->session->userdata('warning','Anda belum melakukan login');
            redirect('login');
        }
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $cek_login = $this->main_model->GetUser("where username = '$username' and password = '$password'")->num_rows();
        $tampil = $this->main_model->GetUser("where username = '$username' and password = '$password'")->row_array();
        if ($cek_login == 1){
            $this->session->set_userdata('ses_id',$tampil['id_user']);
            $this->session->set_userdata('ses_nama',$tampil['nama_user']);
            $this->session->set_userdata('ses_level',$tampil['level']);
            $this->session->set_userdata('ses_foto',$tampil['foto']);
            $pelogin = $this->db->get_where('tbl_user',array('username' => $username, 'password' => $password))->row();
            if ($pelogin->level == 'Admin') {
                redirect('welcome_admin');
            }elseif($pelogin->level == 'Pengunjung'){
                redirect('welcome_user');
            }
        }else{
            $this->session->set_flashdata('error','Maaf Username dan Password Salah');
            redirect('C_login');
        }
    }

    public function lupa_password(){
        if (!$_POST['ganti']){
            $this->session->set_flashdata('error','Anda belum melakukan lupa password');
            redirect('C_login');
        }
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password_asli = $this->input->post('ulangi_password');
        $data_user = $this->main_model->GetUser("where email = '$email' and username = '$username'")->row_array();
        $email_asli = $data_user['email'];
        $username_asli = $data_user['username'];
        if ($email == $email_asli and $username == $username_asli and $password == $password_asli){
            $data = array(
                'password' => md5($password_asli),
            );
            $result = $this->main_model->Update('tbl_user',$data,array('username'=>$username));
            if ($result == 1){
                $this->session->set_flashdata('sukses','Berhasil melakukan ganti password');
                redirect('C_login');
            }else{
                $this->session->set_flashdata('error','Gagal melakukan ganti password');
                redirect('C_login');
            }
        }else{
            $this->session->set_flashdata('error','Email, Username atau password tidak sesuai');
            redirect('C_login');
        }
    }

    public function daftar_data(){
        if (!$_POST['daftar']){
            $this->session->set_flashdata('warning','Anda belum melakukan daftar');
            redirect('c_login');
        }
        $username = $this->input->post('username');
        $cek_username = $this->main_model->GetUser("where username = '$username'")->num_rows();
        if ($cek_username > 0){
            $this->session->set_flashdata('warning','Username sudah ada');
            redirect('c_login');
        }else{
            $config = array(
                'upload_path' => './assets/upload/foto-user',
                'allowed_types' => 'gif|jpg|JPG|png|JPEG|pdf|doc',
                'max_size' => '2048',

            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_upload');
            $upload_data = $this->upload->data();
            $data = array(
                'id_user' => '',
                'nama_user' => $this->input->post('nama_user'),
                'level' => $this->input->post('level'),
                'email' => $this->input->post('email'),
                'username' => $username,
                'password' => md5($this->input->post('password')),
				#'ulangi_password' => md5($this->input->post('ulangi_password')),
                'foto' => $upload_data['file_name'],
				'jenkel' => $this->input->post('jenkel'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
            );
            $result = $this->main_model->Simpan('tbl_user',$data);
            if ($result == 1){
                $this->session->set_flashdata('sukses','Daftar berhasil dilakukan');
                redirect('c_login');
            }else{
                $this->session->set_flashdata('error', 'Daftar gagal dilakukan');
                redirect('c_login');
            }
        }
    }
}
