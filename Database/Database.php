<?php
class Database
{
    //Static members
    private static $user = 'root';
    private static $password = '';
    private static $dbname = 'JobPortal';
    private static $dsn = 'mysql:host=localhost;dbname=JobPortal';
    private static $dbcon;

    /**
     * Database constructor.
     */
    private function __construct()
    {
    }

    public static function getDb()
    {
        try {
            if (!isset(self::$dbcon)) {
                self::$dbcon = new \PDO(self::$dsn, self::$user, self::$password);
            }
        } catch (\PDOException $e) {
            $msg = $e->getMessage();
            echo $msg;
            exit();
        }

        return self::$dbcon;
    }
}
