<?php

use PgSql\Connection as PgSqlConnection;

class Connection
{
    public $host = 'localhost';
    public $dbname = 'HOTELMO';
    public $port = '5432';
    public $user = 'postgres';
    public $password = 'Ahsy1zhdg123';
    public $driver = 'pgsql';
    public $connect;

    public static function get_Connection()
    {
        try{
            $connection = new Connection();
            $connection->connect = new PDO("{$connection->driver}:host={$connection->host};port={$connection->port};dbname={$connection->dbname}", $connection->user, $connection->password);
            $connection->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection->connect;
            //echo "Connection succes";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

Connection::get_Connection();

?>