<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_video extends CI_Controller {

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
            'data_video' => $this->main_model->GetVideo(),
        );
        $this->load->view('backend/video/video-data', $data);
    }

    public function video_tambah(){
      $data = array(
        'data_jevi' => $this->main_model->GetJenisvideo(),
        'data_kategori' => $this->main_model->GetKategori(),
        'kode_video' => $this->main_model->GetMaxKodeVideo(),
      );
        $this->load->view('backend/video/video-tambah', $data);
    }

    public function simpan_data_video(){
        $id_video = $this->input->post('id_video');
        $kode_video = $this->input->post('kode_video');
        $kategori_id = $this->input->post('kategori_id');
        $jevi_id = $this->input->post('jevi_id');
        $judul = $this->input->post('judul');
        $video = $this->input->post('video');
        $cover = $this->input->post('cover');
        $keterangan = $this->input->post('keterangan');
        $dilihat     = '0';

        $cek = $this->main_model->CekVideo($judul);

        if ($cek->num_rows()>0) {
            $this->session->set_flashdata('warning','Judul Video'.$judul.'sudah ada');
            redirect('c_video');
        } else{
            $config = array(
                'upload_path' => './assets/upload/video-user',
                'allowed_types' => 'avi|mp4|png|jpg',
                'max_size' => '600000M',

            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_upload');
            $upload_data = $this->upload->data();
            $this->load->library('upload', $config);
            $this->upload->do_upload('cover');
            $cover = $this->upload->data();
            $data = array(
                'id_video' => $id_video,
                'kode_video' => $kode_video,
                'kategori_id' => $kategori_id,
                'jevi_id' => $jevi_id,
                'judul' => $judul,
                'video' => $upload_data['file_name'],
                'cover' => $cover['file_name'],
                'keterangan' => $keterangan,
                'dilihat' => '0',
            );
            $result = $this->main_model->Simpan('tbl_video',$data);
            if ($result == 1){
                $this->session->set_flashdata('sukses','Simpan data berhasil dilakukan');
                redirect('c_video');
            }else{
                $this->session->set_flashdata('error', 'Simpan data gagal dilakukan');
                redirect('c_video');
            }
        }
    }

    public function detail_data_video() {
        $id_video = $this->uri->segment(3);
        $query = $this->main_model->GetEditVideo($id_video);
        foreach ($query->result_array() as $tampil) {
            $data = array(
                'id_video' => $tampil['id_video'],
                'kode_video' => $tampil['kode_video'],
                'kategori_id' =>$tampil['kategori_id'] ,
                'jevi_id' =>$tampil['jevi_id'] ,
                'judul' =>$tampil['judul'] ,
                'video' =>$tampil['video'] ,
                'cover' =>$tampil['cover'] ,
                'keterangan' =>$tampil['keterangan'] ,
                'dilihat' =>$tampil['dilihat'] ,
                'record' =>$this->main_model->get_two($id_video)->row_array(),
                'data_kategori' =>$this->main_model->GetKategori(),
                'data_jevi' =>$this->main_model->GetJenisvideo(),
                'kode_video' =>$this->main_model->GetMaxKodeVideo(),
            );
        }

        $this->load->view('backend/video/video-detail',$data);
    }

    public function edit_data_video() {
        $id_video = $this->uri->segment(3);
        $query = $this->main_model->GetEditVideo($id_video);
        foreach ($query->result_array() as $tampil) {
            $data = array(
                'id_video' => $tampil['id_video'],
                'kode_video' => $tampil['kode_video'],
                'kategori_id' =>$tampil['kategori_id'] ,
                'jevi_id' =>$tampil['jevi_id'] ,
                'judul' =>$tampil['judul'] ,
                'video' =>$tampil['video'] ,
                'cover' =>$tampil['cover'] ,
                'keterangan' =>$tampil['keterangan'] ,
                'record' =>$this->main_model->get_two($id_video)->row_array(),
                'data_kategori' =>$this->main_model->GetKategori(),
                'data_jevi' =>$this->main_model->GetJenisvideo(),
                'kode_video' =>$this->main_model->GetMaxKodeVideo(),
            );
        }

        $this->load->view('backend/video/video-edit',$data);
    }

    public function update_data_video(){
        $id_video = $this->input->post('id_video');
        $kategori_id = $this->input->post('kategori_id');
        $jevi_id = $this->input->post('jevi_id');
        $judul = $this->input->post('judul');
        if ($_FILES['video']['name'] == null){
            $video = $this->input->post('video');
        }else{
            $video = $_FILES['video']['name'];
        }
        if($_FILES['cover']['name'] == null){
            $cover = $this->input->post('cover');
        }else{
            $cover = $_FILES['cover']['name'];
        }
        $keterangan = $this->input->post('keterangan');
            $data = array(
                'id_video' => $id_video,
                'kategori_id' => $kategori_id,
                'jevi_id' => $jevi_id,
                'judul' => $judul,
                'video' => $video, //$upload_data['file_name'],
                'keterangan' => $keterangan,
                'cover' => $cover,
            );
            $result = $this->main_model->Update('tbl_video',$data,array('id_video' => $id_video));
            if ($result == 1){
            if ($_FILES['video']['name'] != null){
                unlink('./assets/upload/video-user/'.$this->input->post('video'));
            }
            $config = array(
                'upload_path' => './assets/upload/video-user',
                'allowed_types' => 'mp4|avi|png|jpg',
                'max_size' => '600000M',
            );
            if ($_FILES['cover']['name'] != null){
                unlink('./assets/upload/video-user/'.$this->input->post('cover'));
            }
            $this->load->library('upload', $config);
            $this->upload->do_upload('video');
            $this->load->library('upload', $config);
            $this->upload->do_upload('cover');
            $this->session->set_flashdata('sukses','Update data berhasil dilakukan');
            redirect('c_video');
            }else{
                $this->session->set_flasdata('error','Update data gagal dilakukan');
            redirect('c_video/edit_data_video/'.$id_video);
            }
    }

    public function hapus_data_video($kode = 1){
        $data_video = $this->main_model->GetVideo("where id_video = '$kode'")->result_array();
        $video = $data_video[0]['video'];
        $cover = $data_video[0]['cover'];
        $result = $this->main_model->Hapus('tbl_video',array('id_video' => $kode));
        if ($result == 1){
            unlink('./assets/upload/video-user/'.$video);
            unlink('./assets/upload/video-user/'.$cover);
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('c_video');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('c_video');
        }
    }
}
