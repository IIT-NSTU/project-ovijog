<?php

class AdminsController extends Controller {


    public function __construct() {}


    public function index() {

        $data = [
            'title' => SITENAME,
        ];

        $this->view('/admins/index', $data);
    }

}