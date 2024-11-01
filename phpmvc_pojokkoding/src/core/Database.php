<?php 

class Database
{
    private $conn;

    public function __construct() {
        $this->conn = $this->setConnection();
    }

    public function qry($query, $params = array())
    {
        $stsmt = $this->conn->prepare($query);
        $stsmt->execute($params);
        return $stsmt;
    }

    protected function setConnection(){
        try {
            $host = DB_HOST;
            $user = DB_USER;
            $pass = DB_PASS;
            $db = DB_NAME;
            $port = DB_PORT;

            $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (\Throwable $e) {
            die($e->getMessage());
        }
    }
}

?>