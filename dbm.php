<?php

if (!class_exists('DatabaseManager')) {
  class DatabaseManager
  {
    private $db_conn;
    private $database = 'h-school'; // Change the database name to "h-shcool"
    private $host = "localhost";  // Update the host if needed
    private $username = "root"; // Update the username if needed
    private $password = ""; // Update the password if needed

    // public function __construct()
    // {
    //   // $this->initDatabase();
    //   $this->connect();
    // }

    public function connect()
    {
      $this->db_conn = new mysqli($this->host, $this->username, $this->password, $this->database); // Add the database parameter
      if ($this->db_conn->connect_errno > 0) {
        die('Unable to connect to database [' . $this->db_conn->connect_error . ']');
      }
    }
    
    public function query($sql) // call this function to perform sql queries
    {
      try {
        $this->db_conn->begin_transaction();
        $result = $this->db_conn->query($sql);
        $this->db_conn->commit();
        return $result;
      } catch (PDOException $e) {
        $this->db_conn->rollback();
        die($this->db_conn->error);
      }
      
    }

    public function close()
    {
      $this->db_conn->close();
    }
  }
}

$db = new DatabaseManager();