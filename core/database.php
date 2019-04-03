<?php
class Database {
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'test';
    private $pass = 'test';
    private $name = 'dev';

    private function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->name}", $this->user,$this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function insert($table, $params = [])
    {
        $db = self::getConnection();
        $valueString = implode(',', array_fill(0, count($params), '?'));
        $columnString = implode(", ", array_keys($params));
        $stmt = $db->prepare("INSERT INTO {$table} ({$columnString}) VALUES ({$valueString})");
        $stmt->execute(array_values($params));
    }

    public function select($table, $whereClause, $params = [])
    {
        $db = self::getDB();
        $query = "SELECT * FROM {$table} WHERE $whereClause";
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        $returnArr = $stmt->fetchAll();
        return $returnArr;
    }

    public function query($query)
    {
        $db = self::getConnection();
        return $db->query($query)->fetchAll();
    }

    public function execute($query)
    {
        $db = self::getConnection();
        return $db->exec($query);
    }
}