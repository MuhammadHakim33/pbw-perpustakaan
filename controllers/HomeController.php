<?php

require_once 'Middleware.php';
require_once 'models/Buku.php';

class HomeController extends Middleware {
    private $model;

    public function __construct(){
        parent::__construct();
        $this->authorize('user');
        $this->model = new Buku();
    }

    public function index() {
        $buku = $this->model->ambilBuku();
        // var_dump($buku);
        // die;
        
        include 'views/index.php';
    }
}