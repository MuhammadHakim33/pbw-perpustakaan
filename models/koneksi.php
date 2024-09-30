<?php

class Koneksi {

    protected $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root"; 
    private $dbname = "db_perpusteknik";

    // Constructor untuk inisialisasi koneksi database
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        } 
        catch(PDOException $e) {
            // Cek koneksi
            die("Koneksi gagal: " . $e->getMessage());
        }
    }
}