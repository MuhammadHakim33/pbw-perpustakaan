<?php

class AuthController {

    public function index() {
        echo 'Auth';
    }

    // Method untuk login
    public function authenticate() {
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

        // Mengecek apakah akun valid

        // Mengecek role akun
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
}