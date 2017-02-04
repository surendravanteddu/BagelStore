<?php

/*
 * 
 * Database Connection : Mysqli Connection
 */
class Database {
    
    private $_connection;
    private static $_instance;
    
    /**
     * Get an instance of the database.
     * @return Database
     */
    public static function getInstance() {
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function __construct() {
        $this->_connection = new mysqli('localhost', 'root', '', 'bakery');
        if(mysqli_connect_error()) {
            trigger_error('Failed to connect to the database : '.mysqli_connect_error(), E_USER_ERROR);
        }       
    }
    
    /**
     * Empty clone method to prevent duplication
     */
    public function __clone() {
    }
    /**
     * Get the mysqli connection
     * @return Connection
     */
    public function getConnection() {
        return $this->_connection;
    }
    
    /**
     * Kill the mysqli connection when destructor is called
     */
    public function __destruct() {
        $thread = mysqli_thread_id($this->_connection);
        mysqli_kill($this->_connection, $thread);
        mysqli_close($this->_connection);
    }
}
?>