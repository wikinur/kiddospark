<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_page extends CI_Controller {

    public function index(){
        $this->session->unset_userdata('ses_id');
        $this->session->unset_userdata('ses_user');
        $this->session->unset_userdata('ses_nama');
        $this->session->unset_userdata('ses_level');
        $data = array(
            'data_komentar' => $this->main_model->GetKomentar("order by id_komentar desc limit 2")->result_array(),
            'slider'            => $this->main_model->GetSlider(),
            'slidermax'            => $this->main_model->GetSlider1(),
            'sliderhome'            => $this->main_model->GetMaxSlider(),
            'kategori'      => $this->main_model->GetKategori(),
            'data_video'            => $this->main_model->GetVideo1("limit 3"),
            'random'            => $this->main_model->GetRandomVideo(),
            'random_active' => $this->main_model->GetRandomActiveVideo(),
            'data_artikel' => $this->main_model->GetArtikel("order by id_artikel desc"),
            'data_jevi' => $this->main_model->GetJenisvideo(),
            'artikel' => $this->main_model->GetArtikel("order by id_artikel desc limit 2"),
            'data_kategori' => $this->main_model->GetKategori(),
        );
        $this->load->view('main',$data);
    }

    public function tentang_kami(){
        $data = array(
            'kontak'        => $this->main_model->GetTentangkami(),
            'data_komentar' => $this->main_model->GetKomentar("order by id_komentar desc limit 2")->result_array(),
            'kategori'      => $this->main_model->GetKategori(),
            'data_video'            => $this->main_model->GetVideo1("limit 3"),
            'data_teka'            => $this->main_model->GEtTentangkami(),
            'random'            => $this->main_model->GetRandomVideo(),
            'random_active' => $this->main_model->GetRandomActiveVideo(),
            'data_artikel' => $this->main_model->GetArtikel("order by id_artikel desc"),
            'data_jevi' => $this->main_model->GetJenisvideo(),
            'artikel' => $this->main_model->GetArtikel("order by id_artikel desc limit 2"),
        );
        $this->load->view('tentang_kami',$data);
    }

    public function cari () {
        $cari = $this->input->post('cari');

        if ($cari=="") {

        }
        else {
            $data = array(
            'kategori'      => $this->main_model->GetKategori(),
            'data_video'         => $this->main_model->GetVideo(),
            'data_artikel' => $this->main_model->GetArtikel("order by id_artikel desc"),
            'data_jevi' => $this->main_model->GetJenisvideo(),
            'artikel' => $this->main_model->GetArtikel("order by id_artikel desc limit 2"),
            'video_cari' => $this->main_model->GetVideoCari($cari),
            'content' => 'cari',
      );
      $this->load->view('frontend/site',$data);
        }
    }

    public function komentar(){
    if(isset($_POST['kirim'])) {
      $data = array(
        'nama'      => $this->input->post('nama'),
        'email'     => $this->input->post('email'),
        'komentar'  => $this->input->post('komentar'),
        );
       $this->db->insert('tbl_komentar',$data);
       redirect('main_page');
        }
    }
}