<?php

require_once 'Koneksi.php';

class Buku extends Koneksi {
    
    public function __construct() {
        parent::__construct();
    }

    public function ambilBuku() {
        $sql = "SELECT * FROM buku";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // Tambah buku
    function tambahBuku($conn, $id_buku, $judul, $penulis, $penerbit, $tahun_terbit, $isbn) {
        $sql = "INSERT INTO buku (id, judul, penulis, penerbit, tahun_terbit, isbn) 
                VALUES (:id_buku, :judul, :penulis, :penerbit, :tahun_terbit, :isbn)";
        
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_buku', $id_buku);
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':penulis', $penulis);
            $stmt->bindParam(':penerbit', $penerbit);
            $stmt->bindParam(':tahun_terbit', $tahun_terbit);
            $stmt->bindParam(':isbn', $isbn);
            $stmt->execute();
            echo "Buku berhasil ditambahkan.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Edit buku
    function editBuku($conn, $id_buku, $judul, $penulis, $penerbit, $tahun_terbit, $isbn) {
        $sql = "UPDATE buku SET judul=:judul, penulis=:penulis, penerbit=:penerbit, tahun_terbit=:tahun_terbit, isbn=:isbn 
                WHERE id=:id_buku";
        
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_buku', $id_buku);
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':penulis', $penulis);
            $stmt->bindParam(':penerbit', $penerbit);
            $stmt->bindParam(':tahun_terbit', $tahun_terbit);
            $stmt->bindParam(':isbn', $isbn);
            $stmt->execute();
            echo "Buku berhasil diperbarui.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Mencari buku
    function cariBuku($conn, $keyword) {
        $sql = "SELECT * FROM buku WHERE judul LIKE :keyword OR penulis LIKE :keyword";
        $keyword = "%$keyword%"; // Menambahkan wildcard untuk pencarian

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':keyword', $keyword);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                foreach ($result as $row) {
                    echo "ID: " . $row["id"] . " - Judul: " . $row["judul"] . " - Penulis: " . $row["penulis"] . "<br>";
                }
            } else {
                echo "Buku tidak berhasil ditemukan.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Hapus buku
    function hapusBuku($conn, $id_buku) {
        $sql = "DELETE FROM buku WHERE id=:id_buku";
        
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_buku', $id_buku);
            $stmt->execute();
            echo "Buku berhasil dihapus.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}