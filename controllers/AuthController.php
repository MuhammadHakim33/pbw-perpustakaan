<?php

require_once 'models/Pengguna.php';

class AuthController {
    private $model;

    public function __construct(){
        session_start();
        $this->model = new Pengguna();
    }

    public function index() {
        $this->notLogged();

        include 'views/login.php';
    }

    // Method untuk login
    public function authenticate() {
        $this->notLogged();

        // Mengecek apakah field terisi
        if (!$this->isFilled(['email', 'password'])) {
            echo "ISI SEMUA FIELD!";
            die;
        }

        // Menangkap semua input lalu sanitasi
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Mengecek apakah email valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "EMAIL TIDAK VALID!";
            die;
        }

        // Menghubungkan ke model untuk menemukan akun di db
        $account = $this->model->login($email, $password);

        // Mengecek apakah akun ada
        if (!$account) {
            echo "EMAIL TIDAK DITEMUKAN!";
            die;
        }

        // Mengecek apakah email benar
        if (!password_verify($password, $account['password'])) {
            echo "PASSWORD SALAH!";
            die;
        }

        // Set session
        $_SESSION['logged'] = true;
        $_SESSION['id'] = $account['id'];
        $_SESSION['email'] = $account['email'];
        $_SESSION['role'] = $account['role'];

        // Mengecek role akun
        if ($_SESSION['role'] == 'admin') {
            header("Location: /admin");
            die;
        }
        else {
            header("Location: /home");
            die;
        }
    }

    // Method untuk logout
    public function logout() {
        // Reset session
        session_start();
        session_unset();
        session_destroy();
        header("Location: /auth");
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

    // Method untuk mengecek apakah belum login
    private function notLogged() {
        if (isset($_SESSION['logged'])) {
            if ($_SESSION['role'] == 'user') {
                header("Location: /home");
                die;
            }
            header("Location: /admin");
            die;
        }
    }
}