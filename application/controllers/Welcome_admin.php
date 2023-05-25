<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('main_model');
        $this->cek_login();
    }

    private function cek_login(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
            redirect('c_login');
        }
    }

	public function index(){
		$data = array(
            'total_user' => $this->main_model->GetUser()->num_rows(),
            'total_video' => $this->main_model->GetVideo()->num_rows(),
            'total_artikel' => $this->main_model->GetArtikel()->num_rows(),
            'total_komentar' => $this->main_model->GetKomentar()->num_rows(),
			'content' => 'backend/home',
		);
		$this->load->view('backend/site',$data);
	}

	public function sign_out(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error','Anda belum melakukan login');
            redirect('C_login');
        }
        $id_user = $this->session->userdata('ses_id');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-F-Y, H:i:s');
        $data = array(
            'last_login' => $tanggal,
        );
        $this->main_model->Update('tbl_user', $data, array('id_user' => $id_user));
        $this->session->unset_userdata('ses_user');
        $this->session->unset_userdata('ses_nama');
        $this->session->unset_userdata('ses_level');
        $this->session->unset_userdata('ses_foto');
        $this->session->set_flashdata('sukses', 'Terimakasih Telah Mengunjungi website ini');
        redirect('main_page');
   }

   public function data_user() {
        $data = array(
            'data_user' => $this->main_model->GetUser("order by id_user asc")->result_array(),
        // 'content' => 'backend/user/user-data',
        );
        $this->load->view('backend/user/user-data',$data);
    }

    public function user_tambah() {
        $this->load->view('backend/user/user-tambah');
    }

    public function simpan_data_user(){
        $id_user = '';
        $nama_user = $this->input->post('nama_user');
        $level = $this->input->post('level');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $last_login = '';
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenkel = $this->input->post('jenkel');

        $cek_nama_user = $this->main_model->GetUser("where nama_user = '$nama_user'")->num_rows();
        $cek_username = $this->main_model->GetUser("where username = '$username'")->num_rows();
        if ($cek_nama_user > 0){
            $this->session->set_flashdata('warning', 'Nama user '.$nama_user.' sudah ada');
            redirect('welcome_admin/data_user');
        }elseif ($cek_username > 0){
            $this->session->set_flashdata('warning', 'Username sudah ada');
            redirect('welcome_admin/data_user');
        } else{
            $config = array(
                'upload_path' => './assets/upload/foto-user',
                'allowed_types' => 'gif|jpg|JPG|png|JPEG|pdf|doc',
                'max_size' => '2048',

            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_upload');
            $upload_data = $this->upload->data();
            $data = array(
                'id_user' => $id_user,
                'nama_user' => $nama_user,
                'level' => $level,
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'foto' => $upload_data['file_name'],
                'last_login' => $last_login,
                'tgl_lahir' => $tgl_lahir,
                'jenkel' => $jenkel,
            );
            $result = $this->main_model->Simpan('tbl_user',$data);
            if ($result == 1){
                $this->session->set_flashdata('sukses','Simpan data berhasil dilakukan');
                redirect('welcome_admin/data_user');
            }else{
                $this->session->set_flashdata('error', 'Simpan data gagal dilakukan');
                redirect('welcome_admin/data_user');
            }
        }
    }

    public function detail_data_user($kode = 0){
        $data_user = $this->main_model->GetUser("where id_user = '$kode'")->result_array();
        $data = array(
            // 'id_user' => $data_user[0]['id_user'],
            'nama_user' => $data_user[0]['nama_user'],
            'level' => $data_user[0]['level'],
            'email' => $data_user[0]['email'],
            'username' => $data_user[0]['username'],
            'password' => $data_user[0]['password'],
            'foto' => $data_user[0]['foto'],
            'last_login' => $data_user[0]['last_login'],
            'tgl_lahir' => $data_user[0]['tgl_lahir'],
            'jenkel' => $data_user[0]['jenkel'],
            'content' => 'backend/user/user-detail',
        );
        $this->load->view('backend/site', $data);
    }

    public function edit_data_user($kode = 0){
        $data_user = $this->main_model->GetUser("where id_user = '$kode'")->result_array();
        $data = array(
            'id_user' => $data_user[0]['id_user'],
            'nama_user' => $data_user[0]['nama_user'],
            'level' => $data_user[0]['level'],
            'email' => $data_user[0]['email'],
            'foto' => $data_user[0]['foto'],
            'last_login' => $data_user[0]['last_login'],
            'tgl_lahir' => $data_user[0]['tgl_lahir'],
            'jenkel' => $data_user[0]['jenkel'],
            // 'content' => 'backend/user/user-edit',
        );
        $this->load->view('backend/user/user-edit',$data);
    }

    public function update_data_user(){
        $id_user = $this->input->post('id_user');
        $nama_user = $this->input->post('nama_user');
        $level = $this->input->post('level');
        $email = $this->input->post('email');
        $last_login = $this->input->post('last_login');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenkel = $this->input->post('jenkel');
        if ($_FILES['file_upload']['name'] == null){
            $foto = $this->input->post('foto');
        }else{
            $foto = $_FILES['file_upload']['name'];
        }
        $data = array(
            'nama_user' => $nama_user,
            'level' => $level,
            'email' => $email,
            'foto' => $foto,
            'last_login' => $last_login,
            'tgl_lahir' => $tgl_lahir,
            'jenkel' => $jenkel,
        );
        $result = $this->main_model->Update('tbl_user',$data,array('id_user' => $id_user));
        if ($result == 1){
            if ($_FILES['file_upload']['name'] != null){
                unlink('./assets/upload/foto-user/'.$this->input->post('foto'));
            }
            $config = array(
                'upload_path' => './assets/upload/foto-user',
                'allowed_types' => 'gif|jpg|JPG|png|JPEG|pdf',
                'max_size' => '2048',
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_upload');
            $this->session->set_flashdata('sukses','Update data berhasil dilakukan');
            redirect('welcome_admin/data_user');
        }else{
            $this->session->set_flasdata('error','Update data gagal dilakukan');
            redirect('welcome_admin/edit_data_user/'.$id_user);
        }
    }

    public function hapus_data_user($kode = 1){
        $data_user = $this->main_model->GetUser("where id_user = '$kode'")->result_array();
        $user = $data_user[0]['user'];
        $result = $this->main_model->Hapus('tbl_user',array('id_user' => $kode));
        if ($result == 1){
            unlink('./assets/upload/foto-user/'.$user);
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('welcome_admin/data_user');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('welcome_admin/data_user');
        }
    }

    public function ganti_password($kode = 0){
        $data_user = $this->main_model->GetUser("where id_user = '$kode'")->row_array();
        $data = array(
            'content' => 'backend/user/ganti-pass',
            'password' => $data_user['password'],
            'id_user' => $data_user['id_user'],
        );
        $this->load->view('backend/site', $data);
    }

    public function ubah_password(){
        $id_user = $this->input->post('id_user');
        $password = $this->input->post('password');
        $password_lama = md5($this->input->post('password_lama'));
        $password_baru = $this->input->post('password_baru');
        $ulangi_password_baru = $this->input->post('ulangi_password_baru');
        if ($password == $password_lama and $password_baru == $ulangi_password_baru){
            $data = array('password' => md5($ulangi_password_baru));
            $this->main_model->Update('tbl_user',$data,array('id_user' => $id_user,));
            $this->session->set_flashdata('sukses','Ganti password berhasil dilakukan');
            redirect('welcome_admin/data_user');
        }else{
            $this->session->set_flashdata('error','Ganti password gagal dilakukan');
            redirect('welcome_admin/data_user');
        }
    }

    public function data_teka() {
        $data = array(
            'data_teka' => $this->main_model->GetTentangkami(),
        // 'content' => 'backend/user/user-data',
        );
        $this->load->view('backend/tentangkami/teka-data',$data);
    }

    public function edit_teka() {
        $id_teka = $this->uri->segment(3);
        $query = $this->main_model->GetEditTeka($id_teka);
        foreach ($query->result_array() as $tampil) {        
            $data = array(
            'id_teka' => $tampil['id_teka'],
            'judul' => $tampil['judul'],
            'deskripsi' => $tampil['deskripsi'],
            'alamat' => $tampil['alamat'],
            'email' => $tampil['email'],
            'phone' => $tampil['phone'],
            'record' => $this->main_model->get_teka($id_teka)->row_array(),
            );
        }
        $this->load->view('backend/tentangkami/teka-edit',$data);
    }

    public function update_teka(){
        $id_teka = $this->input->post('id_teka');
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $data = array(
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'alamat' => $alamat,
            'email' => $email,
            'phone' => $phone,
        );
        $result = $this->main_model->Update('tbl_tentangkami',$data,array('id_teka' => $id_teka));
        if ($result == 1){
            $this->session->set_flashdata('sukses','Update data berhasil dilakukan');
            redirect('welcome_admin/data_teka');
        }else{
            $this->session->set_flasdata('error','Update data gagal dilakukan');
            redirect('welcome_admin/edit_teka/'.$id_teka);
        }
    }
}