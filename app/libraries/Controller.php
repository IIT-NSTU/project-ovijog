<?php

/**
 * Base controller define two method to load appropriate model and appropriate view as needed.
 */
class Controller {

    /**
     * Loads a model.
     *
     * @param $model model's name
     * @return mixed model instance
     */
    public function model($model) {
        require_once '../app/models/' . $model . '.php';

        return new $model();
    }

    /**
     * Loads a view.
     *
     * @param $view: view's name.
     * @param $data: data that needs to pass to the view.
     * @return void
     */
    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exist");
        }
    }

}