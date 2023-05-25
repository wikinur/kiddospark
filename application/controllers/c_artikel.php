<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_artikel extends CI_Controller {

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
            'data_artikel' => $this->main_model->GetArtikel("order by id_artikel desc")->result_array(),
        );
        $this->load->view('backend/artikel/artikel-data', $data);
    }

    public function artikel_tambah(){
        $this->load->view('backend/artikel/artikel-tambah');
    }

    public function detail_data($kode = 0){
        $data_artikel = $this->main_model->GetArtikel("where id_artikel = '$kode'")->result_array();
        $data = array(
            'id_artikel' => $data_artikel[0]['id_artikel'],
            'judul' => $data_artikel[0]['judul'],
            'isi' => $data_artikel[0]['isi'],
            'gambar' => $data_artikel[0]['gambar'],
            'tanggal' => $data_artikel[0]['tanggal'],
            'penulis' => $data_artikel[0]['penulis'],
            'dibaca' => $data_artikel[0]['dibaca'],
        );
        $this->load->view('backend/artikel/artikel-detail', $data);
    }

    public function simpan_data(){
        $id_artikel = $this->input->post('id_artikel');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal		= date('d-F-Y, H:i');
		$penulis		= 'Admin';
		$dibaca		= '0';

        $cek_judul_artikel = $this->main_model->GetArtikel("where judul = '$judul'")->num_rows();
        $cek_id = $this->main_model->GetArtikel("where id_artikel = '$id_artikel'")->num_rows();
        if ($cek_id > 0){
            $this->session->set_flashdata('warning', 'Id artikel '.$id_artikel.' sudah ada');
            redirect('c_artikel');
        }
        elseif ($cek_judul_artikel > 0){
            $this->session->set_flashdata('warning', 'Judul '.$judul.' sudah ada');
            redirect('c_artikel');
        } else{
            $config = array(
                'upload_path' => './assets/upload/foto-artikel',
                'allowed_types' => '|pdf|png|jpg',
                'max_size' => '600000M',

            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $gambar = $this->upload->data();
            $data = array(
                'id_artikel' => $id_artikel,
                'judul' => $judul,
                'isi' => $isi,
                'gambar' => $gambar['file_name'],
                'tanggal' => $tanggal,
        		'penulis'		=> 'Admin',
        		'dibaca'	=> '0',
            );
            $result = $this->main_model->Simpan('tbl_artikel',$data, array('id_artikel' => $id_artikel));
            if ($result == 1){
                $this->session->set_flashdata('sukses','Simpan data berhasil dilakukan');
                redirect('c_artikel');
            }else{
                $this->session->set_flashdata('error', 'Simpan data gagal dilakukan');
                redirect('c_artikel');
            }
        }
    }

    public function edit_data($kode = 0){
        $data_artikel = $this->main_model->GetArtikel("where id_artikel = '$kode'")->result_array();
        $data = array(
            'id_artikel' => $data_artikel[0]['id_artikel'],
            'judul' => $data_artikel[0]['judul'],
            'isi' => $data_artikel[0]['isi'],
            'gambar' => $data_artikel[0]['gambar'],
            // 'content' => 'backend/artikel/artikel-edit',
        );
        $this->load->view('backend/artikel/artikel-edit',$data);
    }

    public function update_data(){
        $id_artikel = $this->input->post('id_artikel');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        if ($_FILES['gambar']['name'] == null){
            $gambar = $this->input->post('gambar');
        }else{
            $gambar = $_FILES['gambar']['name'];
        }
        $data = array(
            'judul' => $judul,
            'isi' => $isi,
            'gambar' => $gambar,
        );
        $result = $this->main_model->Update('tbl_artikel',$data,array('id_artikel' => $id_artikel));
        if ($result == 1){
            if ($_FILES['gambar']['name'] != null){
                unlink('./assets/upload/foto-artikel/'.$this->input->post('gambar'));
            }
            $config = array(
                'upload_path' => './assets/upload/foto-artikel',
                'allowed_types' => 'gif|jpg|JPG|png|JPEG|pdf',
                'max_size' => '2048',
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $this->session->set_flashdata('sukses','Update data berhasil dilakukan');
            redirect('c_artikel');
        }else{
            $this->session->set_flasdata('error','Update data gagal dilakukan');
            redirect('c_artikel/edit_data/'.$id_artikel);
        }
    }

    public function hapus_data($kode = 1){
    $data_artikel = $this->main_model->GetArtikel("where id_artikel = '$kode'")->result_array();
    $artikel = $data_artikel[0]['artikel'];
    $result = $this->main_model->Hapus('tbl_artikel',array('id_artikel' => $kode));
    if ($result == 1){
        unlink('./assets/upload/foto-artikel/'.$user);
        $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
        redirect('c_artikel');
    }else{
        $this->session->set_flashdata('error','Hapus data gagal dilakukan');
        redirect('c_artikel');
    }
}
}
