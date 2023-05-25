<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_komentar extends CI_Controller {

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
            'ses_level' => $this->session->userdata('ses_level'),
            'data_komentar' => $this->main_model->GetKomentar("order by id_komentar desc")->result_array(),
        );
        $this->load->view('backend/komentar/komentar-data', $data);
    }

    public function komentar_tambah(){
        $this->load->view('backend/komentar/komentar-tambah');
    }

    public function simpan_data_komentar() {
        $id_komentar = '';
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $komentar = $this->input->post('komentar');

        $data = array(
            'id_komentar' => $id_komentar,
            'nama' => $nama,
            'email' => $email,
            'komentar' => $komentar,
        );
        $result = $this->main_model->Simpan('tbl_komentar',$data);
        if ($result == 1){
        $this->session->set_flashdata('sukses','Simpan data berhasil dilakukan');
        redirect('c_komentar');
        }else{
        $this->session->set_flashdata('error', 'Simpan data gagal dilakukan');
        redirect('c_komentar');
        }
    }

    public function detail_data($kode = 0){
        $data_komentar = $this->main_model->GetKomentar("where id_komentar = '$kode'")->result_array();
        $data = array(
            'id_komentar' => $data_komentar[0]['id_komentar'],
            'nama' => $data_komentar[0]['nama'],
            'email' => $data_komentar[0]['email'],
            'komentar' => $data_komentar[0]['komentar'],
            'tanggal' => $data_komentar[0]['tanggal'],

        );
        $this->load->view('backend/komentar/komentar-detail', $data);
    }

    public function hapus_data($kode = 1){
    $data_komentar = $this->main_model->GetKomentar("where id_komentar = '$kode'")->result_array();
    $komentar = $data_komentar[0]['komentar'];
    $result = $this->main_model->Hapus('tbl_komentar',array('id_komentar' => $kode));
    if ($result == 1){
        $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
        redirect('c_komentar');
    }else{
        $this->session->set_flashdata('error','Hapus data gagal dilakukan');
        redirect('c_komentar');
    }
  }

  public function komentar(){
  $data['data_komentar'] = $this->db->get('komentar');
  $this->template->load('back-end/komentar/komentar-data',$data);
}
}
