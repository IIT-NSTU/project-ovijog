<?php

/**
 * Error controller that handle request's prefix with 'errors'.
 */
class ErrorsController extends Controller {


    /**
     * Default constructor.
     */
    public function __construct() {}

    /**
     * This method handle requests '/errors/index' and '/errors'.
     *
     * @return void
     */
    public function index() {

        $data = [
            'title' => SITENAME,
        ];

        $this->view('/errors/index', $data);
    }

}