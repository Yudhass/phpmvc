<?php 

class DefaultController extends BaseController{

    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        $this->view('template/header', $data);
        $this->view('home/index');
        $this->view('template/footer');
    }

}

/* End of file DefaultController.php */
?>