<?php
class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $username, $password, $dbname) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        // Kết nối đến CSDL
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Lỗi kết nối: " . $e->getMessage();
        }
    }

    public function getData() {
        $stmt = $this->conn->prepare("SELECT fullName, userName, Email, Address, phoneNumber, Password FROM user");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function closeConnection() {
        $this->conn = null;
    }
}
// Khởi tạo kết nối CSDL

    $database = new Database("localhost", "root", "", "register");
    $data = $database->getData();

?>