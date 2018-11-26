<?php 

class Tabungan{
   private $_db;

   public function __construct()
   {
      $this->_db = Database::getInstance();
   }
   public function catat_tabungan($field = array())
   {
      if($this->_db->insert('tabunganapp', 'tabungan', $field)){
         header('Location: http://tabunganapp.io/catat-tabungan?sukses=Data Berhasil Di Tambahkan');
      }else{
         header('Location: http://tabunganapp.io/catat-tabungan?gagal=Gagal Menambah Data');
      }
   }

   public function get_nis($nilaiRows)
   {
      $id_siswa = $this->_db->select('tabunganapp', 'siswa', 'nama', $nilaiRows);
      $nis = $id_siswa->fetch_assoc();
      return $nis['nis'];
   }
}