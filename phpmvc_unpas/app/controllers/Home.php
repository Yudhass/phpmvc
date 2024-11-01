<?php 

class Home extends Controller{

    private $ModelUser;
    
    public function __construct()
    {
    }
    
    public function index()
    {
        $data = [
            'title' => 'Home',
            'judul' => 'Ini Home'
        ];
        $this->loadView('templates/header',$data);
        $this->loadView('templates/navbar');
        $this->loadView('home/index',$data);
        $this->loadView('templates/footer');
    }
}
?>