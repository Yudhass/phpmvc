<?php 

class BarangModel extends Database{

    private $table_name = 'barang';

    
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = "SELECT * from ". $this->table_name;
        return $this->qry($query)->fetchAll();
    }
    
}

/* End of file BarangModel.php */
?>