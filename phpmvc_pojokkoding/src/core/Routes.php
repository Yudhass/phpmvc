<?php 

class Routes
{
    public function run()
    {
        $router = new App();
        $router->setDefaultController('DefaultController');
        $router->setDefaultMethod('index');

        // penggunaan custom route
        $router->get('/barang',['BarangController','index']);
        $router->get('/barang/insert',['BarangController','insert']);
        $router->post('/barang/insert_barang',['BarangController','insert_barang']);
        
        $router->get('/barang/edit',['BarangController','edit']);
        $router->post('/barang/edit_barang',['BarangController','edit_barang']);

        $router->get('/kategori',['KategoriController','index']);



        $router->run();
    }
}

?>