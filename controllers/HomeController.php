<?php

require_once 'Middleware.php';

class HomeController extends Middleware {

    public function __construct(){
        parent::__construct();
        $this->authorize('user');
    }

    public function index() {
        include 'views/index.php';
    }
}