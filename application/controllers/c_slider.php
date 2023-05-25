<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_slider extends CI_Controller {

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
            'data_slider' => $this->main_model->GetSlider(),
        );
        $this->load->view('backend/slider/slider-data', $data);
    }

    public function slider_tambah(){
        $this->load->view('backend/slider/slider-tambah');
    }

    public function simpan_data(){
        $id_slider = '';
        $tittle = $this->input->post('tittle');
        $description = $this->input->post('description');
        $status = $this->input->post('status');

            $config = array(
                'upload_path' => './assets/upload/slider',
                'allowed_types' => 'gif|jpg|JPG|png|JPEG|',
                'max_size' => '4000',
            );
            $this->load->library('upload', $config);

                    if ($this->upload->do_upload("gambar")) {
                        $upload_data       = $this->upload->data();

                        /* PATH */
                        $source             = "./assets/upload/slider/".$upload_data['file_name'] ;
                        $destination_thumb  = "./images/slider/thumb/" ;
                        $destination_medium = "./images/slider/medium/" ;
                        // Permission Configuration
                        chmod($source, 0777) ;

                        /* Resizing Processing */
                        // Configuration Of Image Manipulation :: Static
                        $this->load->library('image_lib') ;
                        $img['image_library'] = 'GD2';
                        $img['create_thumb']  = TRUE;
                        $img['maintain_ratio']= TRUE;

                        /// Limit Width Resize
                        $limit_medium   = 481 ;
                        $limit_thumb    = 441 ;

                        // Size Image Limit was using (LIMIT TOP)
                        $limit_use  = $upload_data['image_width'] > $upload_data['image_height'] ? $upload_data['image_width'] : $upload_data['image_height'] ;

                        // Percentase Resize
                        if ($limit_use > $limit_thumb) {
                            $percent_medium = $limit_medium/$limit_use ;
                            $percent_thumb  = $limit_thumb/$limit_use ;
                        }

                        //// Making THUMBNAIL ///////
                        $img['width']  = $limit_use > $limit_thumb ?  $upload_data['image_width'] * $percent_thumb : $upload_data['image_width'] ;
                        $img['height'] = $limit_use > $limit_thumb ?  $upload_data['image_height'] * $percent_thumb : $upload_data['image_height'] ;

                        // Configuration Of Image Manipulation :: Dynamic
                        $img['thumb_marker'] = '';
                        $img['quality']      = '100%' ;
                        $img['source_image'] = $source ;
                        $img['new_image']    = $destination_thumb ;

                        // Do Resizing
                        $this->image_lib->initialize($img);
                        $this->image_lib->resize();
                        $this->image_lib->clear() ;
            $data = array(
                'id_slider' => $id_slider,
                'tittle' => $tittle,
                'description' => $description,
                'gambar' => $upload_data['file_name'],
                'status' => $status,
            );
            $this->main_model->Simpan('tbl_slider',$data);
                $this->session->set_flashdata('sukses','Simpan data berhasil dilakukan');
                redirect('c_slider');
            }else{
                $this->session->set_flashdata('error', 'Simpan data gagal dilakukan');
                redirect('c_slider');
            }
    }

    public function edit_data() {
        $id_slider = $this->uri->segment(3);
        $query = $this->main_model->GetEditSlider($id_slider);
        foreach ($query->result_array() as $tampil) {
            $data = array(
                'id_slider' => $tampil['id_slider'],
                'tittle' => $tampil['tittle'],
                'description' => $tampil['description'],
                'status' => $tampil['status'],
                'gambar' => $tampil['gambar'],
                'slider' => $this->main_model->get_four($id_slider)->row_array(),
            );
        }

        $this->load->view('backend/slider/slider-edit',$data);
    }

   public function update_data(){
        $id_slider = $this->input->post('id_slider');
        $tittle = $this->input->post('tittle');
        $description = $this->input->post('description');
        $status = $this->input->post('status');
        if ($_FILES['gambar']['name'] == null){
            $gambar = $this->input->post('gambar');
        }else{
            $gambar = $_FILES['gambar']['name'];
        }
        $data = array(
            'id_slider' => $id_slider,
            'tittle' => $tittle,
            'description' => $description,
            'gambar' => $gambar,
            'status' => $status,
        );
        $result = $this->main_model->Update('tbl_slider',$data,array('id_slider' => $id_slider));
        if ($result == 1){
            if ($_FILES['gambar']['name'] != null){
                unlink('./assets/upload/slider/'.$this->input->post('gambar'));
            }
            $config = array(
                'upload_path' => './assets/upload/slider',
                'allowed_types' => 'gif|jpg|JPG|png|JPEG|pdf',
                'max_size' => '2048',
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $this->session->set_flashdata('sukses','Update data berhasil dilakukan');
            redirect('c_slider');
        }else{
            $this->session->set_flashdata('error','Update data gagal dilakukan');
            redirect('c_slider/edit_data/'.$id_slider);
        }
    }

    public function hapus_data($kode = 1){
    $this->main_model->GetSlider("where id_slider = '$kode'")->result_array();
    $result = $this->main_model->Hapus('tbl_slider',array('id_slider' => $kode));
    if ($result == 1){
        unlink('./assets/upload/slider/'.$gambar);
        $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
        redirect('c_slider');
    }else{
        $this->session->set_flashdata('error','Hapus data gagal dilakukan');
        redirect('c_slider');
    }
}
}
