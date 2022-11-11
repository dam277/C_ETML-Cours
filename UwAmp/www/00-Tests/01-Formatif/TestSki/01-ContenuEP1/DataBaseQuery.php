<?php
/**
 * ETML
 * Date: 12.12.2018
 * Classe pour permettre la liaison avec la base de données
 */

include_once 'config.ini.php';

class DataBaseQuery
{

    /** @var \PDO $connection */
    private $connection;


    /**
     * Constructeur pour ouvrir la connexion
     */
    public function __construct() {

        $user   = $GLOBALS['MM_CONFIG']['database']['username'];
        $pass   = $GLOBALS['MM_CONFIG']['database']['password'];
        $dbname = $GLOBALS['MM_CONFIG']['database']['dbname'];
        $host   = $GLOBALS['MM_CONFIG']['database']['host'];
        $port   = $GLOBALS['MM_CONFIG']['database']['port'];
        $charset = $GLOBALS['MM_CONFIG']['database']['charset'];

        try
        {
            $this->connection = new \PDO(
                'mysql:host=' . $host .
                ';port=' . $port .
                ';dbname=' . $dbname .
                ";charset=". $charset, $user, $pass,array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Création du select
     *
     * @param string $table
     * @param string $columns
     * @return array
     */
    private function select($table, $columns, $where = '', $orderBy = '') {

        $query = 'SELECT ' . $columns . ' FROM ' . $table;

        if ($where !== '') {
            $query .= ' WHERE ' . $where;
        }

        if ($orderBy !== '') {
            $query .= ' ORDER BY ' . $orderBy;
        }

        return $this->rawQuery($query);

    }

    /**
     * Execution et retour du resulat en tableau associatif
     *
     * @param string $query
     * @return array
     */
    private function rawQuery($query,$mode=PDO::FETCH_ASSOC) {

        $req = $this->connection->prepare($query);
        $req->execute();
        return $req->fetchAll($mode);

    }
	

    /**
     * Retour tous les articles présent dans la DB
     *
     * @return array
     */
    public function allStations(){
        return $this->select("t_station", "*");
    }
}
