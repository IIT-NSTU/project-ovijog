<?php

class ErrorsController extends Controller {


    public function __construct() {}

    public function index() {

        $data = [
            'title' => SITENAME,
        ];

        $this->view('/errors/index', $data);
    }

}