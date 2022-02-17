<?php

class Application
{

    private $url_controller = 'admin';
    private $url_action = 'login';
    private $url_params = array();

    private $path;

    public function __construct()
    {
        $this->path = $this->request_path();
        $this->splitUrl();
        // check controller
        if (!$this->url_controller) {

            require APP . 'controller/Admin.php';
            $page = new Admin();
            $page->index();
        } elseif (file_exists(APP . 'controller/' . $this->url_controller . '.php')) {
            require APP . 'controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();

            // check action
            if (method_exists($this->url_controller, $this->url_action)) {
                if (!empty($this->url_params)) {
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                if (strlen($this->url_action) == 0) {
                    $this->url_controller->index();
                }
                else{
                    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
                    die();
                }
            }
        }
    }
    private function request_path()
    {
        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
        $parts = array_diff_assoc($request_uri, $script_name);
        if (empty($parts) && empty($parts[0])) {
            return '/';
        }
        $path = implode('/', $parts);
        if (($position = strpos($path, '?')) !== FALSE) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }

    private function splitUrl()
    {

//       var_dump($_SERVER['REQUEST_URI']);exit;

        $url = trim($this->path, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        $this->url_controller = isset($url[0]) ? $url[0] : null;
        $this->url_action = isset($url[1]) ? $url[1] : null;
        unset($url[0], $url[1]);
        // Rebase array keys and store the URL params
        $this->url_params = array_values($url);

//        echo 'Controller: ' . $this->url_controller . '<br>';
//        echo 'Action: ' . $this->url_action . '<br>';
//        echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';
    }

}
