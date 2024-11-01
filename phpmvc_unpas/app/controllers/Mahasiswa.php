<?php 

class Mahasiswa extends Controller{
    private $ModelMahasiswa;
    private $flash;

    
    public function __construct()
    {
        $this->ModelMahasiswa = $this->loadModel('ModelMahasiswa');
        $this->flash = new Flasher();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Data Mahasiswa',
            'data_mahasiswa' => $this->ModelMahasiswa->getAll(),
        ];
        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('mahasiswa/index', $data);
        $this->loadView('templates/footer');
    }
    
    public function detail($id)
    {
        $check_data = $this->ModelMahasiswa->getOne($id);
        if(!$check_data){
            $this->flash->setFlash('warning', 'Data mahasiswa tidak ditemukan');
            // Flasher::setFlash('warning', 'Data mahasiswa tidak ditemukan');
            header('Location: ' . BASEURL . 'mahasiswa');
        }
        $data = [
            'title' => 'Detail Data Mahasiswa',
            'data_mahasiswa' => $this->ModelMahasiswa->getOne($id),
        ];
        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('mahasiswa/detail', $data);
        $this->loadView('templates/footer');
    }

    public function edit($id)
    {
        $check_data = $this->ModelMahasiswa->getOne($id);
        if(!$check_data){
            $this->flash->setFlash('warning', 'Data mahasiswa tidak ditemukan');
            // Flasher::setFlash('warning', 'Data mahasiswa tidak ditemukan');
            header('Location: ' . BASEURL . 'mahasiswa');
        }
        $data = [
            'title' => 'Update Data Mahasiswa',
            'data_mahasiswa' => $this->ModelMahasiswa->getOne($id),
        ];
        $this->loadView('templates/header', $data);
        $this->loadView('templates/navbar');
        $this->loadView('mahasiswa/edit', $data);
        $this->loadView('templates/footer');
    }

    public function tambah_data()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            Flasher::setFlash('danger', 'Error: Method tidak diizinkan. Hanya POST request yang diizinkan.');
            header('Location: ' . BASEURL . 'mahasiswa');
        }

        $data = [
            'nim' => $_POST['nim'],
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'jurusan' => $_POST['jurusan'],
        ];

        $proc = $this->ModelMahasiswa->createOne($data);

        if ($proc) {
            Flasher::setFlash('primary', 'Data mahasiswa berhasil ditambahkan');
            header('Location: ' . BASEURL . 'mahasiswa');
        }else{
            Flasher::setFlash('warning', 'Data mahasiswa gagal ditambahkan');
            header('Location: ' . BASEURL . 'mahasiswa');
        }
    }

    public function update_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            Flasher::setFlash('danger', 'Error: Method tidak diizinkan. Hanya POST request yang diizinkan.');
            header('Location: ' . BASEURL . 'mahasiswa');
        }

        $check_data = $this->ModelMahasiswa->getOne($id);
        if(!$check_data){
            Flasher::setFlash('warning', 'Data mahasiswa tidak ditemukan');
            header('Location: ' . BASEURL . 'mahasiswa');
        }

        $data = [
            'id' => $check_data->id,
            'nim' => $_POST['nim'],
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'jurusan' => $_POST['jurusan'],
        ];

        $proc = $this->ModelMahasiswa->updateOne($data);

        if ($proc) {
            Flasher::setFlash('primary', 'Data mahasiswa berhasil diubah');
            header('Location: ' . BASEURL . 'mahasiswa');
        }else{
            Flasher::setFlash('warning', 'Data mahasiswa gagal diubah');
            header('Location: ' . BASEURL . 'mahasiswa');
        }
    }

    public function delete($id)
    {
        $check_data = $this->ModelMahasiswa->getOne($id);
        if(!$check_data){
            Flasher::setFlash('warning', 'Data mahasiswa tidak ditemukan');
            header('Location: ' . BASEURL . 'mahasiswa');
        }

        $proc = $this->ModelMahasiswa->deleteOne($id);

        if ($proc) {
            Flasher::setFlash('primary', 'Data mahasiswa berhasil dihapus');
            header('Location: ' . BASEURL . 'mahasiswa');
        }else{
            Flasher::setFlash('warning', 'Data mahasiswa gagal dihapus');
            header('Location: ' . BASEURL . 'mahasiswa');
        }
    }

}
?>