<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model{

	  //Tabel User
    public function GetUser($where = ''){
        return $this->db->query('select * from tbl_user '.$where);
    }
    function GetEditUser($id_user) {
        return $this->db->query("select * from tbl_user where id_user='$id_user'");
    }
    public function Update($table,$data,$where){
        return $this->db->update($table,$data,$where);
    }
    public function Simpan($table, $data){
        return $this->db->insert($table, $data);
    }
    public function Hapus($table,$where){
        return $this->db->delete($table,$where);
     }
     //Akhir Tabel User

    //Tabel Slider
    function GetSlider(){
      return $this->db->query("select * from tbl_slider order by id_slider desc");
    }
    function GetSlider1(){
      return $this->db->query("select * from tbl_slider where status='1' order by id_slider desc");
    }
    function GetMaxSlider(){
      return $this->db->query("select max(id_slider) as terakhir from tbl_slider where status='1' ");
    }
    function GetEditSlider($id_slider) {
      return $this->db->query("select * from tbl_slider where id_slider='$id_slider'");
    }
    function get_four($id_slider){
        $param  =   array('id_slider'=>$id_slider);
        return $this->db->get_where('tbl_slider',$param);
    }
    function DeleteSlider($id_slider) {
        return $this->db->query("delete from tbl_slider where id_slider='$id_slider' ");
    }
    //Akhir Slider

    //Tabel Teka
    function GetTentangkami() {
        return $this->db->query("select * from tbl_tentangkami");
    }
    function GetEditTeka($id_teka) {
        return $this->db->query("select * from tbl_tentangkami where id_teka='$id_teka'");
    }
    function get_teka($id_teka){
        $param  =   array('id_teka'=>$id_teka);
        return $this->db->get_where('tbl_tentangkami',$param);
    }
    //Akhir Teka

    //Tabel Kategori
    public function GetKategori() {
    	return $this->db->query("select * from tbl_kategori order by id_kategori desc");
    }
    function CekKategori($nama_kategori) {
    	return $this->db->query("select * from tbl_kategori where binary(nama_kategori)='$nama_kategori' ");
    }
    function GetEditKategori($id_kategori) {
    	return $this->db->query("select * from tbl_kategori where id_kategori='$id_kategori'");
    }
    function kategoriupdate(){
        $data=array(
           'nama_kategori'=>  $this->input->post('nama_kategori')
        );
        $this->db->where('id_kategori',$this->input->post('id_kategori'));
        $this->db->update('tbl_kategori',$data);
    }
    function get_one($id_kategori){
        $param  =   array('id_kategori'=>$id_kategori);
        return $this->db->get_where('tbl_kategori',$param);
    }
    //Akhir Tabel Kategori

    //Tabel Jenis Video
    public function GetJenisvideo() {
        return $this->db->query("select * from tbl_jenisvideo order by id_jevi desc");
    }
    public function GetJevi($id_jevi) {
        return $this->db->query("select a.*,b.* from tbl_video a join tbl_jenisvideo b on a.jevi_id=b.id_jevi  where a.jevi_id='$id_jevi' order by a.id_video desc");
    }
    function CekJenisVideo($jenis_video) {
        return $this->db->query("select * from tbl_jenisvideo where binary(jenis_video)='$jenis_video' ");
    }
    function GetEditJevi($id_jevi) {
        return $this->db->query("select * from tbl_jenisvideo where id_jevi='$id_jevi'");
    }
    function jeviupdate(){
        $data=array(
           'jenis_video'=>  $this->input->post('jenis_video')
        );
        $this->db->where('id_jevi',$this->input->post('id_jevi'));
        $this->db->update('tbl_jenisvideo',$data);
    }
    function get_jevi($id_jevi){
        $param  =   array('id_jevi'=>$id_jevi);
        return $this->db->get_where('tbl_jenisvideo',$param);
    }
    //Akhir Tabel Jenis Video

    //Tabel Video
    function GetVideo() {
      return $this->db->query("select a.*,b.jenis_video,c.nama_kategori from tbl_video a join tbl_jenisvideo b on a.jevi_id=b.id_jevi join tbl_kategori c on a.kategori_id=c.id_kategori order by a.id_video desc");
    }
    public function GetVideo1($where = ''){
        return $this->db->query('select a.*,b.jenis_video,c.nama_kategori from tbl_video a join tbl_jenisvideo b on a.jevi_id=b.id_jevi join tbl_kategori c on a.kategori_id=c.id_kategori order by a.id_video desc '.$where);
    }
    function GetVideoKategori($id_kategori) {
        return $this->db->query("select a.*,b.* from tbl_video a join tbl_kategori b on a.kategori_id=b.id_kategori  where a.kategori_id='$id_kategori' order by a.id_video desc");
    }
    function GetMaxKodeVideo() {
      $query = $this->db->query("select MAX(RIGHT(kode_video,5)) as kode_video from tbl_video");
      $kode ="";
      if($query->num_rows()>0) {
        foreach ($query->result() as $tampil) {
          $kd = ((int)$tampil->kode_video)+1;
          $kode = sprintf("%05s",$kd);
        }
      }
      else {
        $kode="00001";
      }
      return "VID".$kode;
    }
    function CekVideo($judul) {
    	return $this->db->query("select * from tbl_video where binary(judul)='$judul' ");
    }
    function GetEditVideo($id_video) {
    	return $this->db->query("select * from tbl_video where id_video='$id_video'");
    }
    function get_two($id_video){
        $param  =   array('id_video'=>$id_video);
        return $this->db->get_where('tbl_video',$param);
    }
    function GetRandomVideo() {
      return $this->db->query("select a.*,b.* from tbl_video a join tbl_kategori b on a.kategori_id=b.id_kategori order by RAND('id_video') asc limit 0,3 ");
    }
    function GetRandomActiveVideo() {
      return $this->db->query("select a.*,b.* from tbl_video a join tbl_kategori b on a.kategori_id=b.id_kategori order by RAND('id_video') desc limit 0,3 ");
    }
    function GetNamaKategoriId($id_kategori) {
    return $this->db->query("select * from tbl_kategori where id_kategori='$id_kategori'");
    }
    function GetVideoCari($cari) {
    return $this->db->query("select a.*,b.* from tbl_video a join tbl_kategori b on a.kategori_id=b.id_kategori where a.judul like '%".$cari."%' or b.nama_kategori like '%".$cari."%' order by a.id_video desc"); 
    }
    //Akhir Tabel Video

    //Tabel Artikel
    public function GetArtikel($where = ''){
        return $this->db->query('select * from tbl_artikel '.$where);
    }
     public function GetAr($id_artikel) {
        return $this->db->query("select * from tbl_artikel order by id_artikel desc");
    }
    function get_three($id_artikel){
        $param  =   array('id_artikel'=>$id_artikel);
        return $this->db->get_where('tbl_artikel',$param);
    }
    function GetArtikelread($id_artikel) {
      return $this->db->query("select * from tbl_artikel where id_artikel='$id_artikel'");
    }
    //Akhir Artikel

    //Awal Tabel Komentar
    public function GetKomentar($where = ''){
        return $this->db->query('select * from tbl_komentar '.$where);
    }
    //Akhir Tabel Komentar
}
?>
