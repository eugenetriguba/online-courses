<?php declare(strict_types=1);

class QueryBuilder
{
    protected $pdo;

    /**
     * QueryBuilder constructor.
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param String $table
     * @param array  $parameters
     */
    public function insert(String $table, array $parameters)
    {
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            var_dump($e);
            die('Whoops, something went wrong.');
        }
    }

    /**
     * Returns an assoc array of all items in $table
     *
     * @param String $table database table
     * @return array of all items in $table;
     *         false if preparing and executing the query failed
     */
    function selectAll(String $table): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
}