<?php

require_once 'Middleware.php';
require_once 'models/Buku.php';
require_once 'models/Pengguna.php';
require_once 'models/peminjaman.php';

class AdminController extends Middleware {
    private $model = array();

    public function __construct(){
        parent::__construct();
        $this->authorize('admin');
        $this->model['buku'] = new Buku();
        $this->model['pengguna'] = new Pengguna();
        $this->model['peminjaman'] = new Peminjaman();
    }

    /**
      * Method untuk menampilkan buku yang paling banyak dipinjam,
      * untuk menampilkan buku yang terlambat dan
      * untuk menampilkan total peminjaman
    **/ 

    public function index() {
        include 'views/admin.php';
    }

    public function listbook(){ 
        $getBook = $this->model['buku']->ambilBuku();
        include 'views/ListBukuAdmin.php';
    }

    public function listuser(){ 
        $getPengguna = $this->model['pengguna']->ambilUser();
        include 'views/daftarlist.php';
    }

    public function listpeminjaman() {
        $palingBanyak = $this->model['peminjaman']->countPeminjaman();
        include 'views/listpeminjamanterbanyak.php';
    }

    public function listpengembalian() {
        $terlambat = $this->model['peminjaman']->getAllPeminjamanTerlambat();
        include 'views/listpengembalianterlambat.php';
    }

    public function listpeminjamansemua() {
        $peminjaman = $this->model['peminjaman']->getAllPeminjaman();
        include 'views/listpeminjamansemua.php';
    }
}