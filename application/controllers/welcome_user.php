<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_user extends CI_Controller {

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
            'slider'            => $this->main_model->GetSlider(),
            'slidermax'            => $this->main_model->GetSlider1(),
            'sliderhome'            => $this->main_model->GetMaxSlider(),
            'kontak'        => $this->main_model->GetTentangkami(),
            'data_jevi'      => $this->main_model->GetJenisvideo(),
            'kategori'      => $this->main_model->GetKategori(),
            'data_video'            => $this->main_model->GetVideo1("limit 3"),
            'random'            => $this->main_model->GetRandomVideo(),
            'random_active' => $this->main_model->GetRandomActiveVideo(),
            'data_artikel' => $this->main_model->GetArtikel("order by id_artikel desc"),
            'artikel' => $this->main_model->GetArtikel("order by id_artikel desc limit 2"),
            'kategori_id' => $this->main_model->GetVideo(),
            'data_kategori' => $this->main_model->GetKategori(),
            'data_komentar' => $this->main_model->GetKomentar("order by id_komentar desc limit 3")->result_array(),
            'content' =>   'frontend/home',
        );
        $this->load->view('frontend/site',$data);
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

	public function video() {
      $id_kategori= $this->uri->segment(3);

      $data = array(
        'kontak'        => $this->main_model->GetTentangkami(),
        'kategori'      => $this->main_model->GetKategori(),
        'data_video'         => $this->main_model->GetVideo(),
        'data_jevi' => $this->main_model->GetJenisvideo(),
        'nama_kategori' => $this->main_model->GetNamaKategoriId($id_kategori),
        'data_artikel' => $this->main_model->GetArtikel("order by id_artikel desc"),
        'artikel' => $this->main_model->GetArtikel("order by id_artikel desc limit 2"),
        // 'video_kategori' => $this->db->query("select a.*,b.* from tbl_video a join tbl_kategori b on a.kategori_id=b.id_kategori  where a.kategori_id='$id_kategori' order by a.id_video desc"),
        'data_komentar' => $this->main_model->GetKomentar("order by id_komentar desc limit 3")->result_array(),
        'content' => 'frontend/video/video',
      );
      $page=$this->uri->segment(4);
            $limit=6;
            if(!$page):
            $offset = 0;
            else:
            $offset = $page;
            endif;
            
            $data['tot'] = $offset;
            $tot_hal = $this->main_model->GetVideoKategori($id_kategori);
            $config['base_url'] = base_url() . 'Welcome_user/video/'.$id_kategori.'/';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $config['full_tag_open'] = '<ul class="pagination btn" style="margin-left:350px;">';
            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = 'Awal';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Akhir';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = 'Selanjutnya';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = 'Sebelumnya';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active" style="background:blue;"><a href="">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();
            
            $data['video_kategori'] = $this->db->query("select a.*,b.* from tbl_video a join tbl_kategori b on a.kategori_id=b.id_kategori  where a.kategori_id='$id_kategori' order by a.id_video desc 
            LIMIT ".$offset.",".$limit."");
      $this->load->view('frontend/site',$data);
    }

    public function jenisvideo() {
      $id_jevi= $this->uri->segment(3);

      $data = array(
        'kontak'        => $this->main_model->GetTentangkami(),
        'data_jevi' => $this->main_model->GetJenisvideo(),
        'kategori'      => $this->main_model->GetKategori(),
        'data_video'         => $this->main_model->GetVideo(),
        'data_artikel' => $this->main_model->GetArtikel("order by id_artikel desc"),
        'artikel' => $this->main_model->GetArtikel("order by id_artikel desc limit 2"),
        'jenis_video' => $this->db->query("select a.*,b.* from tbl_video a join tbl_jenisvideo b on a.jevi_id=b.id_jevi  where a.jevi_id='$id_jevi' order by a.id_video desc"),
        'data_komentar' => $this->main_model->GetKomentar("order by id_komentar desc limit 3")->result_array(),
        'content' => 'frontend/jenisvideo',
      );
      $page=$this->uri->segment(4);
            $limit=6;
            if(!$page):
            $offset = 0;
            else:
            $offset = $page;
            endif;
            
            $data['tot'] = $offset;
            $tot_hal = $this->main_model->GetJevi($id_jevi);
            $config['base_url'] = base_url() . 'Welcome_user/jenisvideo/'.$id_jevi.'/';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $config['full_tag_open'] = '<ul class="pagination btn" style="margin-left:350px;">';
            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = 'Awal';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Akhir';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = 'Selanjutnya';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = 'Sebelumnya';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active" style="background:blue;"><a href="">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();
            
            $data['jenis_video'] = $this->db->query("select a.*,b.* from tbl_video a join tbl_jenisvideo b on a.jevi_id=b.id_jevi  where a.jevi_id='$id_jevi' order by a.id_video desc 
            LIMIT ".$offset.",".$limit."");
      $this->load->view('frontend/site',$data);
    }

    public function video_play1() {
        $id_video = $this->uri->segment(3);
        $b = $this->db->get_where("tbl_video",array("id_video"=>$id_video))->row_array();
        $dilihat = $b['dilihat'];
        $this->main_model->update('tbl_video',array('dilihat'=>$dilihat + 1),array("id_video"=>$id_video));
        $query = $this->main_model->GetEditVideo($id_video);
        foreach ($query->result_array() as $tampil) {
            $data['id_video'] = $tampil['id_video'];
            $data['kode_video'] = $tampil['kode_video'];
            $data['kategori_id'] = $tampil['kategori_id'];
            $data['judul'] = $tampil['judul'];
            $data['video'] = $tampil['video'];
            $data['cover'] = $tampil['cover'];
            $data['kontak'] = $this->main_model->GetTentangkami();
            $data['kategori'] = $this->main_model->GetKategori();
            $data['keterangan'] = $tampil['keterangan'];
            $data['record']=  $this->main_model->get_two($id_video)->row_array();
            $data['data_video'] = $this->main_model->GetVideo();
            $data['record']=  $this->main_model->get_two($id_video)->row_array();
            $data['data_kategori'] = $this->main_model->GetKategori();
            $data['kode_video'] = $this->main_model->GetMaxKodeVideo();
            $data['data_jevi'] = $this->main_model->GetJenisvideo();
            $data['data_artikel'] = $this->main_model->GetArtikel("order by id_artikel desc");
            $data['artikel'] =  $this->main_model->GetArtikel("order by id_artikel desc limit 2");
            $data['data_komentar'] = $this->main_model->GetKomentar("order by id_komentar desc limit 3")->result_array();
            $data['content'] = 'frontend/video/video_play';
        }

        $this->load->view('frontend/site',$data);
    }

    public function artikel() {
      $id_artikel   = $this->uri->segment(3);

      $data = array(
        'kontak'        => $this->main_model->GetTentangkami(),
        'kategori'      => $this->main_model->GetKategori(),
        // 'data_artikel'      => $this->main_model->GetArtikel("order by id_artikel desc"),
        'data_jevi' => $this->main_model->GetJenisvideo(),
        'artikel' => $this->main_model->GetArtikel("order by id_artikel desc limit 2"),
        'data_video'         => $this->main_model->GetVideo(),
        // 'nama_kategori' => $this->main_model->GetNamaKategoriId($id_kategori),
        'data_komentar' => $this->main_model->GetKomentar("order by id_komentar desc limit 3")->result_array(),
        'content' => 'frontend/artikel/artikel',
      );
        $page=$this->uri->segment(4);
            $limit=6;
            if(!$page):
            $offset = 0;
            else:
            $offset = $page;
            endif;
            
            $data['tot'] = $offset;
            $tot_hal = $this->main_model->GetAr($id_artikel);
            $config['base_url'] = base_url() . 'Welcome_user/artikel/'.$id_artikel.'/';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $config['full_tag_open'] = '<ul class="pagination btn" style="margin-left:300px;">';
            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = 'Awal';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Akhir';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = 'Selanjutnya';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = 'Sebelumnya';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active" style="background:blue;"><a href="">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();
            
            $data['data_artikel'] = $this->db->query("select * from tbl_artikel order by id_artikel desc 
            LIMIT ".$offset.",".$limit."");
      $this->load->view('frontend/site',$data);
    }

    public function read_artikel() {
        $id_artikel = $this->uri->segment(3);

        $b = $this->db->get_where("tbl_artikel",array("id_artikel"=>$id_artikel))->row_array();
        $dibaca = $b['dibaca'];
        $this->main_model->update('tbl_artikel',array('dibaca'=>$dibaca + 1),array("id_artikel"=>$id_artikel));
        $query = $this->main_model->GetArtikelread($id_artikel);
        foreach ($query->result_array() as $tampil) {
            $data['judul'] = $tampil['judul'];
            $data['isi'] = $tampil['isi'];
            $data['gambar'] = $tampil['gambar'];
            $data['kontak'] = $this->main_model->GetTentangkami();
            $data['kategori'] = $this->main_model->GetKategori();
            $data['record']=  $this->main_model->get_three($id_artikel)->row_array();
            $data['data_artikel'] = $this->main_model->GetArtikel("order by id_artikel desc");
            $data['data_jevi'] = $this->main_model->GetJenisvideo();
            $data['artikel'] = $this->main_model->GetArtikel("order by id_artikel desc limit 2");
            $data['data_komentar'] = $this->main_model->GetKomentar("order by id_komentar desc limit 3")->result_array();
            $data['content'] = 'frontend/artikel/read_artikel';
        }
        $this->load->view('frontend/site',$data);
    }

    public function cari_video() {
        $cari = $this->input->post('cari');

        if ($cari=="") {

        }
        else {
            $data = array(
            'kontak'        => $this->main_model->GetTentangkami(),
            'kategori'      => $this->main_model->GetKategori(),
            'data_video'         => $this->main_model->GetVideo(),
            'data_jevi' => $this->main_model->GetJenisvideo(),
            'data_artikel' => $this->main_model->GetArtikel("order by id_artikel desc"),
            'artikel' => $this->main_model->GetArtikel("order by id_artikel desc limit 2"),
            'video_cari' => $this->main_model->GetVideoCari($cari),
            'data_komentar' => $this->main_model->GetKomentar("order by id_komentar desc limit 3")->result_array(),
            'content' => 'frontend/cari',
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
       redirect('welcome_user');
        }
    }
}