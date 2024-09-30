<?php

class Pengguna {
    private $conn; // Koneksi database
    
    // Constructor untuk inisialisasi koneksi database
    public function __construct($db_conn) {
        $this->conn = $db_conn;
    }

// Tambah pengguna
function tambahPengguna($id_pengguna, $nama, $email, $password, $role) {
    global $conn;

    $sql = "INSERT INTO pengguna (id_pengguna, nama, email, password, role) 
            VALUES ('$id_pengguna', '$nama', '$email', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Pengguna berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Edit pengguna
function editPengguna($id_pengguna, $nama, $email, $password, $role) {
    global $conn;

    $sql = "UPDATE pengguna SET nama='$nama', email='$email', password='$password', role='$role' 
            WHERE id_pengguna=$id_pengguna";

    if ($conn->query($sql) === TRUE) {
        echo "Data pengguna berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cari pengguna
function cariPengguna($keyword) {
    global $conn;

    $sql = "SELECT * FROM pengguna WHERE nama LIKE '%$keyword%' OR email LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id_pengguna"] . " - Nama: " . $row["nama"] . " - Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "Pengguna tidak berhasil ditemukan.";
    }
}

// Hapus pengguna
function hapusPengguna($id_pengguna) {
    global $conn;

    $sql = "DELETE FROM pengguna WHERE id_pengguna=$id_pengguna";

    if ($conn->query($sql) === TRUE) {
        echo "Data pengguna berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
?>