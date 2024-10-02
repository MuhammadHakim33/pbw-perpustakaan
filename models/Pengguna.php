<?php

require_once 'Koneksi.php';

class Pengguna extends Koneksi {
    
    public function __construct() {
        parent::__construct();
    }

    // Fungsi login admin
    public function login($email, $password) {
        $query = "SELECT * FROM pengguna WHERE email = :email LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row;
    }

    // Method untuk mengambil semua user
    public function ambilUser() {
        $sql = "SELECT * FROM pengguna WHERE role = 'user'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>