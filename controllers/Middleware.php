<?php

class Middleware {

    public function __construct(){
        session_start();
        $this->isLogged();
    }

    // Method untuk mengecek apakah sudah login
    private function isLogged() {
        if (empty($_SESSION['logged'])) {
            header("Location: /auth");
            die;
        }
    }

    // Method untuk mengecek apakah role diizinkan untuk mengakses halaman
    protected function authorize($role_allowed) {
        if ($_SESSION['role'] != $role_allowed) {
            echo "AKSES DILARANG!";
            die;
        }
    }
}