<?php

require_once 'Middleware.php';

class AdminController extends Middleware {

    public function __construct(){
        parent::__construct();
        $this->authorize('admin');
    }

    /**
     * Method untuk menampilkan buku yang paling banyak dipinjam,
     * untuk menampilkan buku yang terlambat dan
     * untuk menampilkan total peminjaman
     * */ 
    public function index() {
        echo 'Admin';
        echo '<br>';
        echo $_SESSION['role'];
    }
}