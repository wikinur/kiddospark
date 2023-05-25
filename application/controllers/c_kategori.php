<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kategori extends CI_Controller {

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
            'data_kategori' => $this->main_model->GetKategori(),
            'content' => 'backend/kategori/kategori-data',
        );
        $this->load->view('backend/site', $data);
    }

    public function kategori_tambah() {
        $data = array(
                'content' => 'backend/kategori/kategori-tambah',
        );
        $this->load->view('backend/site',$data);
    }

    public function simpan_data_kategori() {
        $id_kategori = '';
        $nama_kategori = $this->input->post('nama_kategori');

        $cek = $this->main_model->CekKategori($nama_kategori);

        if ($cek->num_rows()>0) {
            $this->session->set_flashdata('warning','nama kategori'.$nama_kategori.'sudah ada');
            redirect('c_kategori');
        }else{

            $data = array(
                'id_kategori' => $id_kategori,
                'nama_kategori' => $nama_kategori,
            );
            $result = $this->main_model->Simpan('tbl_kategori',$data);
            if ($result == 1){
                $this->session->set_flashdata('sukses','Simpan data berhasil dilakukan');
                redirect('c_kategori');
            }else{
                $this->session->set_flashdata('error', 'Simpan data gagal dilakukan');
                redirect('c_kategori');
            }
        }
    }

    public function edit_data_kategori() {
        $id_kategori = $this->uri->segment(3);
        $query = $this->main_model->GetEditKategori($id_kategori);
        foreach ($query->result_array() as $tampil) {
            $data = array(
                'id_kategori' => $tampil['id_kategori'],
                'nama_kategori' => $tampil['nama_kategori'],
                'record' => $this->main_model->get_one($id_kategori)->row_array(),
            );
        }

        $this->load->view('backend/kategori/kategori-edit',$data);
    }

    public function update_data_kategori() {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');

        $cek = $this->main_model->CekKategori($nama_kategori);

        if ($cek->num_rows()>0) {
            $this->session->set_flashdata('warning','kategori' .$nama_kategori. 'sudah ada');
            redirect('c_kategori');
        }else {
            $this->session->set_flashdata('sukses','Kategori Berhasil Diupdate');
            $this->main_model->kategoriupdate();
            redirect('c_kategori');
        }
    }

    public function hapus_data_kategori($kode = 1){
        $data_kategori = $this->main_model->GetKategori("where id_kategori = '$kode'")->result_array();
        $nama_kategori = $data_kategori[0]['nama_kategori'];
        $result = $this->main_model->Hapus('tbl_kategori',array('id_kategori' => $kode));
        if ($result == 1){
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('c_kategori');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('c_kategori');
        }
    }
}
