<?php

class Siswa{
   private $_db;

   public function __construct()
   {
      $this->_db = Database::getInstance();
   }

   public function tambah_siswa($field = array())
   {
      if ($this->_db->insert('tabunganapp', 'siswa', $field)){
         header('Location: http://tabunganapp.io/tambah-siswa?sukses=Data Berhasil Di Tambahkan');
      }else{
         header('Location: http://tabunganapp.io/tambah-siswa?gagal=Gagal Menyimpan Data');
      }
   }

   public function data_siswa()
   {
      $rows = $this->_db->get_data('tabunganapp', 'siswa');
      return $rows;

   }

   public function data_tabungan()
   {
      $rows = $this->_db->get_tabungan('tabunganapp', 'siswa');
      return $rows;

   }

   public function hapus_siswa($row)
   {
      if ($rows = $this->_db->delete('tabunganapp', 'siswa', 'nis', $row)) {
         return true;
      }else{
         return false;
      }
   }

   public function login_user($nip, $password)
   {
      $data = $this->_db->get_info('tabunganapp','guru', 'nip' , $nip );
      print_r($data);
      if (password_verify($password, $data['password'])) {
         return true;
      }else{
         return false;
      }
   }
}