<?php

class Buku {
    private $conn; // Koneksi database
    
    // Constructor untuk inisialisasi koneksi database
    public function __construct($db_conn) {
        $this->conn = $db_conn;
    }

// Tambah buku
function tambahBuku($id_buku, $judul, $penulis, $penerbit, $tahun_terbit, $isbn) {
    global $conn;

    $sql = "INSERT INTO buku (id, judul, penulis, penerbit, tahun_terbit, isbn)
            VALUES ('$id_buku', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$isbn')";

    if ($conn->query($sql) === TRUE) {
        echo "Buku berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Edit buku
function editBuku($id_buku, $judul, $penulis, $penerbit, $tahun_terbit, $isbn) {
    global $conn;

    $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', isbn='$isbn' 
            WHERE id_buku=$id_buku";

    if ($conn->query($sql) === TRUE) {
        echo "Buku berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mencari buku
function cariBuku($keyword) {
    global $conn;

    $sql = "SELECT * FROM buku WHERE judul LIKE '%$keyword%' OR penulis LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id_buku"] . " - Judul: " . $row["judul"] . " - Penulis: " . $row["penulis"] . "<br>";
        }
    } else {
        echo "Buku tidak berhasil ditemukan.";
    }
}

// Hapus buku
function hapusBuku($id_buku) {
    global $conn;

    $sql = "DELETE FROM buku WHERE id_buku=$id_buku";

    if ($conn->query($sql) === TRUE) {
        echo "Buku berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
?>
