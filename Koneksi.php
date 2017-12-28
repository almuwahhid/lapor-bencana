<?php
class Koneksi{
  public $db = "lapor_bencana";
  private $con;

  public function connect(){
    return mysqli_connect('localhost', 'root', '', $this->db);
  }

  public function connectPDO(){
    return $conn = new PDO("mysql:host=localhost;dbname=$this->db", 'root', '');
  }
}
?>
