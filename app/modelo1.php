<?php
class DB
{
    function __construct()
    {
        $this->pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
            DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
    }

    // Método query
    function select($sql, $data = null)
    {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
        return $this->stmt->fetchAll();
    }

    // Método insert
    function insert($sql, $data = null)
    {
        $this->stmt = $this->pdo->prepare($sql);
        return $this->stmt->execute($data);
    }

    // Método update
    function update($sql, $data = null)
    {
        $this->stmt = $this->pdo->prepare($sql);
        return $this->stmt->execute($data);
    }

    // Método delete
    function delete($table, $condition, $data = null)
    {
        $sql = "DELETE FROM $table WHERE $condition";
        $this->stmt = $this->pdo->prepare($sql);
        return $this->stmt->execute($data);
    }
}


// Database settings
define("DB_HOST", "localhost");
define("DB_NAME", "test");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "");

$_DB = new DB();
?>
