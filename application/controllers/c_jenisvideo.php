<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_jenisvideo extends CI_Controller {

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
            'data_jevi' => $this->main_model->GetJenisvideo(),
            'content' => 'backend/jenisvideo/jenisvideo-data',
        );
        $this->load->view('backend/site', $data);
    }

    public function jenisvideo_tambah() {
        $data = array(
                'content' => 'backend/jenisvideo/jenisvideo-tambah',
        );
        $this->load->view('backend/site',$data);
    }

    public function simpan_data() {
        $id_jevi = '';
        $jenis_video = $this->input->post('jenis_video');

        $cek = $this->main_model->CekJenisVideo($jenis_video);

        if ($cek->num_rows()>0) {
            $this->session->set_flashdata('warning','Jenis Video'.$jenis_video.'sudah ada');
            redirect('C_jenisvideo');
        }else{

            $data = array(
                'id_jevi' => $id_jevi,
                'jenis_video' => $jenis_video,
            );
            $result = $this->main_model->Simpan('tbl_jenisvideo',$data);
            if ($result == 1){
                $this->session->set_flashdata('sukses','Simpan data berhasil dilakukan');
                redirect('C_jenisvideo');
            }else{
                $this->session->set_flashdata('error', 'Simpan data gagal dilakukan');
                redirect('C_jenisvideo');
            }
        }
    }

    public function edit_data() {
        $id_jevi = $this->uri->segment(3);
        $query = $this->main_model->GetEditJevi($id_jevi);
        foreach ($query->result_array() as $tampil) {
            $data = array(
                'id_jevi' => $tampil['id_jevi'],
                'jenis_video' => $tampil['jenis_video'],
                'record'=> $this->main_model->get_jevi($id_jevi)->row_array(),
            );
        }

        $this->load->view('backend/jenisvideo/jenisvideo-edit',$data);
    }

    public function update_data() {
        $id_jevi = $this->input->post('id_jevi');
        $jenis_video = $this->input->post('jenis_video');

        $cek = $this->main_model->CekJenisVideo($jenis_video);

        if ($cek->num_rows()>0) {
            $this->session->set_flashdata('warning','Jenis Video' .$jenis_video. 'sudah ada');
            redirect('C_jenisvideo');
        }else {
            $this->session->set_flashdata('sukses','Jenis Video Berhasil Diupdate');
            $this->main_model->jeviupdate();
            redirect('C_jenisvideo');
        }
    }

    public function hapus_data($kode = 1){
        $data_jevi = $this->main_model->GetJenisvideo("where id_jevi = '$kode'")->result_array();
        $jenisvideo = $data_jevi[0]['jenisvideo'];
        $result = $this->main_model->Hapus('tbl_jenisvideo',array('id_jevi' => $kode));
        if ($result == 1){
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('C_jenisvideo');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('C_jenisvideo');
        }
    }
}
