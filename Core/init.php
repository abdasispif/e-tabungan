<?php

session_start();

   spl_autoload_register(function($class){
      require_once 'Classes/' . $class . '.php' ;
   });

   $siswa = new Siswa();
   $total_siswa = new Siswa();
   $hapus_siswa = new Siswa();
   $tabungan = new Tabungan();

?>