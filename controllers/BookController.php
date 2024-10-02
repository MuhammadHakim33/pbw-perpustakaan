<?php

require_once 'Middleware.php';
require_once 'models/Buku.php';
require_once 'models/Peminjaman.php';

class BookController extends Middleware {
    private $model = array();

    public function __construct(){
        parent::__construct();
        $this->model['buku'] = new Buku();
        $this->model['peminjaman'] = new Peminjaman();
    }

    public function detail($id) {
        $this->authorize('user');
        
        $buku = $this->model['buku']->temukanBuku($id);

        include 'views/book.php';
    }

    // Method untuk menambahkan buku
    public function store() {
        $this->authorize('admin');

        // Mengecek apakah field terisi
        if (!$this->isFilled(['judul', 'penulis'])) {
            echo "ISI SEMUA FIELD!";
            die;
        }

        // Menangkap semua input lalu sanitasi
        $judul = htmlspecialchars($_POST['judul']);
        $penulis = htmlspecialchars($_POST['penulis']);

        $data = array(
            'judul' => $judul,
            'penulis' => $penulis,
        );

        var_dump($data);
    }

    // Method untuk mengubah buku
    public function update() {
        $this->authorize('admin');

        // Menangkap semua input lalu sanitasi
        $id = htmlspecialchars($_POST['id']);
        $judul = htmlspecialchars($_POST['judul']);
        $penulis = htmlspecialchars($_POST['penulis']);

        $data = array(
            'id' => $id,
            'judul' => $judul,
            'penulis' => $penulis,
        );

        var_dump($data);
    }

    // Method untuk menghapus buku
    public function delete($id) {
        $this->authorize('admin');

        $this->model['buku']->hapusBuku($id);

        header('Location: /admin/listbook');
    }

    // Method untuk meminjam buku
    public function borrow() {
        $this->authorize('user');

        // Mengecek apakah field terisi
        if (!$this->isFilled(['id_buku', 'id_pengguna', 'tgl_pinjam', 'tgl_kembali'])) {
            echo "ISI SEMUA FIELD!";
            die;
        }

        // Menangkap semua input lalu sanitasi
        $id_buku = htmlspecialchars($_POST['id_buku']);
        $id_pengguna = htmlspecialchars($_POST['id_pengguna']);
        $tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
        $tgl_kembali = htmlspecialchars($_POST['tgl_kembali']);

        $this->model['peminjaman']->tambahPeminjaman($id_pengguna, $id_buku, $tgl_pinjam, $tgl_kembali);

        header('Location:/home');
    }

    // Method mengembalikan buku
    public function return($id) {
        $this->authorize('user');

        $this->model['peminjaman']->pengembalianBuku($id);

        header('Location:/book/history');
    }

    // Method mengecek status buku
    public function status($id) {
        $this->authorize('user');

        $peminjaman = $this->model['peminjaman']->getPeminjamanUser($id);
        var_dump($peminjaman);
        die;

        // echo $id_peminjaman;
    }

    // Method untuk melihat history peminjaman buku user
    public function history() {
        $this->authorize('user');

        $id = $_SESSION['id'];
        $peminjaman = $this->model['peminjaman']->getAllPeminjamanUser($id);

        include 'views/riwayat.php';
    }

    // Method untuk mengecek apakah field terisi
    private function isFilled($fields) {
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                return false;
            }
        }
        return true;
    }

}