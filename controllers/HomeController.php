<?php

require_once 'Middleware.php';

class HomeController extends Middleware {

    public function __construct(){
        parent::__construct();
        $this->authorize('user');
    }

    public function index() {
        echo 'Home';
        echo '<br>';
        echo $_SESSION['role'];
    }
}