<?php 

class KategoriController extends BaseController {

    public function index()
    {
        $data = [
            'title' => 'Kategori',
        ];
        $this->view('template/header', $data);
        $this->view('kategori/index');
        $this->view('template/footer');
    }

}

/* End of file KategoriController.php */
?>