<?php 
class App{

    private $controller = 'Home';
    private $method = 'index';
    private $parameter = [];

    
    public function __construct()
    {
        $url = $this->parseUrl();

        //check controller
        if (file_exists('../app/controllers/'.$url[0].'.php') && !empty($url[0])) {
            // jika ada file nya dan tidak kosong url
            $this->controller = $url[0];
            unset($url[0]);
        }else if(!file_exists('../app/controllers/'.$url[0].'.php') && !empty($url[0])){
            // jika tidak ada file nya dan tidak kosong url
            echo "Error : Controller " .$url[0].'.php'. " Tidak ditemukan";
            die();
        }

        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        // check method
        if(isset($url[1])){
            if(!method_exists($this->controller,$url[1])){
                echo 'Error : Method ' . $url[1] . ' Tidak ditemukan';
                die();
            }else{
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // parameter
        if (!empty($url)) {
            $this->parameter = array_values($url);
        }

        call_user_func_array([$this->controller,$this->method],$this->parameter);

    }
    

    public function parseUrl()
    {
        $url = rtrim($_SERVER['QUERY_STRING'],'/');
        $url = filter_var($url,FILTER_SANITIZE_URL);
        $url = explode('/',$url);
        return $url;
    }
}
?>