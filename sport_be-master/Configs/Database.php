<?php
namespace Configs;

class Database {
    const DATABASE = "c01";
    const HOST = "127.0.0.1";
    const PORT = "3306";
    const TYPE = "mysql";
    const USERNAME = "c01";
    const PASSWORD = "pwd";
            
    const CONNECT = self::TYPE.":dbname=".self::DATABASE.";host=".self::HOST.";port=".self::PORT;
}

// Configs\Database::CONNECT;
// Database::CONNECT;