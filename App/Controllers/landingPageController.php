<?php

require_once './Pinkragon/ORM/db.php';
require_once './Pinkragon/kernel.php';


class LandingPage extends db {

    public function __construct() {
        $this->env();

    }

    public function index() {
        $data['version'] = getenv('VERSION');
        $data['kernelFile'] = file_exists('./Pinkragon/kernel.php') ? true : false;
        $this->view('landingPage.php', $data);
    }


}

