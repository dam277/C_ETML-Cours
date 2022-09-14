<?php
class Database 
{
    /** @var \PDO $connection */
    private $connection;

    private string $db = "db_blog";
    private string $username = "root";
    private string $password = "root";
    private string $host = "localhost";
    private string $port = "3306";
    private string $charset = "utf8";


    public function __construct()
    {
        try
        {
            $this->connection = new \PDO(
                'mysql:host=' . $this->host .
                ';port=' . $this->port .
                ';dbname=' . $this->db .
                ";charset=". $this->charset, $this->username, $this->password,array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function GetData()
    {
        $query = 'SELECT * FROM t_message';
        return $this->rawQuery($query);
    }

    /**
     * Select request
     *
     * @param string $query
     * @return array
     */
    public function rawQuery($query,$mode=PDO::FETCH_ASSOC) {

        $req = $this->connection->prepare($query);
        $req->execute();
        return $req->fetchAll($mode);

    }

    /**
     * Method for insert a new record
     *
     * @param string $table
     * @param array $requestInfos (array with column, marker, value and flag)
     * @param bool|false $lastID
     * @return bool|string
     */
    public function insert($text) {

        $query = "INSERT INTO t_message (idMessage, mesText) VALUES (NULL, '$text')" ;

        $req = $this->connection->prepare($query);

        return $req->execute();
    }
}

?>