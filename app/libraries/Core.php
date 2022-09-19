<?php

/**
 * App Core Class
 * Handles URL & loads core controller
 * URL format: /controller/method/params
 */
class Core {

    protected $currentController;
    protected $currentMethod;
    protected $params = [];

    /**
     * Handles the URL by loading appropriate handler.
     */
    public function __construct() {

        restoreSessionIfAvailable();

        //by default
        $this->currentController=ControllerFactory::getInstance("pages");
        $this->currentMethod="index";


        //not by default
        $url = $this->getUrl();

        if (isset($url[0])) {
            $this->currentController = ControllerFactory::getInstance($this->getUrl()[0]);
        }

        if (isset($url[1]) && method_exists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];
        }

        unset($url[0]);
        unset($url[1]);
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
    }

    /**
     * This method split the url into parts.
     *
     * @return string[]|void splitted url.
     */
    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }


}