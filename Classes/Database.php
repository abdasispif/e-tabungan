<?php
   class Database{
      private static $INSTANCE = null;
      private  $mysqli,
               $HOST  = "localhost",
               $USER  = "root",
               $PASS  = "",
               $DBNAME   = "tabunganapp";
      public function __construct() {
         $this->mysqli = new mysqli($this->HOST,$this->USER,$this->PASS, $this->DBNAME);
         if (mysqli_connect_error()) {
            die("Gagal Mengkonesika Data");
         }
      }
      public static function getInstance(){
         if (!isset(self::$INSTANCE)) {
            self::$INSTANCE = new Database();
         }

         return self::$INSTANCE;
      }

      public function insert($dbname, $table, $field = array())
      {
         //fungsi mengambil kolom
         // $kolom = implode(",", array_keys($field)) ;
         


         $valuesArray =  array();
         $i = 0;
         foreach ($field as $key => $values) {
            if (is_int($values)) {
               $valuesArray[$i] = $values;
            }else{
               $valuesArray[$i] = "'".$values."'";
            }
            $i++;
         }

         $keyArray = array();
         foreach ($field as $key => $values) {
            $keyArray[$i] = "`" . $key . "`";
            $i++;
         }

         $key = implode(",", $keyArray);

         $values = implode(",", $valuesArray);
         $query = "INSERT INTO `$dbname` . `$table`  ($key) VALUES ($values)";
         // die($query);
         if ($this->mysqli->query($query)){
            return true;
         }else{
            return false;
         }

      }

      public function get_data($dbname, $table)
      {

         $query = "SELECT * FROM `$dbname` . `$table`";
         $hasil = $this->mysqli->query($query);
         return $hasil;
      }

      public function get_info($dbname, $table, $kolom, $values)
      {
         if (!is_int($values))
            $values = "'" . $values ."'";
            
         $query = " SELECT * FROM  $dbname . $table WHERE $kolom = $values ";
         $hasil = $this->mysqli->query($query);
         while ($baris = $hasil->fetch_assoc()) {
            return $baris;
         }
      }

      public function get_tabungan($dbname, $table)
      {

         $query = "SELECT * FROM `$dbname` . `$table` INNER JOIN tabungan ON siswa.nis =  tabungan.nis" ;
         $hasil = $this->mysqli->query($query);
         return $hasil;
      }

      public function delete($dbname, $table, $rows, $nilaiRows)
      {
         
         $query = "DELETE FROM  `$dbname` . `$table` WHERE $rows = $nilaiRows";
         if ($this->mysqli->query($query)){
            header('Location: http://tabunganapp.io/data-siswa.php?sukses=Data Berhasil di Hapus');
         }else{
            header('Location: http://tabunganapp.io/data-siswa.php?gagal=Gagal Menghapus Data');
         }

      }

      public function select($dbname, $table, $rows, $nilaiRows)
      {
         $query = "SELECT nis FROM  `$dbname` . `$table` WHERE $rows = '$nilaiRows'";
         $id_tabungan = $this->mysqli->query($query);
         return $id_tabungan; 
      }

      public function max_select($dbname, $table, $rows, $nilaiRows)
      {
         $query = "SELECT nis FROM  `$dbname` . `$table` WHERE $rows = '$nilaiRows'";
         $id_tabungan = $this->mysqli->query($query);
         return $id_tabungan; 
      }
   }
?>
