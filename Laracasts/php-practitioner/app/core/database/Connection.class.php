<?php declare(strict_types=1);

class Connection
{
    /**
     * Established a connection to a database
     *
     * @param array $config a configuration file that includes
     *      $config['connection'] -- dsn
     *      $config['name'] -- database name
     *      $config['username'] -- username for database
     *      $config['password'] -- password for database
     *      $config['options'] -- any extra configuration
     *          options as specified by the PDO constructor
     * @return PDO a new PDO object that is constructed with
     *      given input
     */
    public static function make(array $config) : PDO
    {
        try
        {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
}