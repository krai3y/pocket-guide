<?
class DB {
    private $servername = 'localhost';
    private $username = 'poputnpl_diplom';
    private $password = 'Diplom123';
    private $dbname = 'poputnpl_diplom';
    private $conn;
    public function __construct() {
        
        $this->connect();
    }
    private function connect() {
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname); 
        
        if ($this->conn->connect_error) {
            die("Ошибка подключения к базе данных: " . $this->conn->connect_error);
        }
    }
    public function query($sql) {
        $this->connect();
        $result = $this->conn->query($sql);
        
    
        if ($result === false) {
            die("Ошибка выполнения запроса: " . $this->conn->error);
        }   
        $this->close();
        return $result;
    }
    public function close() {
        
        $this->conn->close();
    }
}
?>