 <?php

/**
 * 
 * Classe de la base de données
 * Permet de se connecter à elle et d'y envoyer des requêtes
 * 
 * Auteur : Damien Loup
 * Date : 11.02.2022
 * Description : Base de donnée fil rouge
 */

 class Database 
 {
    // Variable de classe
    private $connector;         //Connector variable

    /**
     * créer un nouvel objet PDO et se connecter à la BD
     */
    public function __construct()
    {
        $serverInfo = file_get_contents("C:/Users/damis/Desktop/developpement/01-Github/Cours/www/src/php/info/config.json");
        $info = json_decode($serverInfo, true);

        $secretServerInfo = file_get_contents("C:/Users/damis/Desktop/developpement/01-Github/Cours/www/src/php/info/secret.json");
        $secretInfo = json_decode($secretServerInfo, true);

        $server = $info['hostname'];
        $username = $info['username'];
        $password = $secretInfo['password'];
        $db = $info['dbname'];


        // Se connecter via PDO et utilise la variable de classe $connector
        try
        {
            $this->connector = new PDO("mysql:host=$server;dbname=$db;charset=utf8", "$username", "$password");
        }
        catch (PDOException $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Execute une requête simple à la base de données
     */
    private function querySimpleExecute($query)
    {
        // permet de pr�parer et d�ex�cuter une requ�te de type simple (sans where)
        $req = $this->connector->query($query);
        return $req;
    }

    /**
     * Execute une requête préparée à la base de données
     */
    private function queryPrepareExecute($query, $binds)
    {
        // permet de pr�parer, de binder et d'exécuter une requête (select avec where ou insert, update et delete)
        $req = $this->connector->prepare($query);

        foreach ($binds as $key => $element) 
        {
            // echo "<pre>";
            // var_dump($element);
            // echo "</pre>";
            $req->bindValue($key, $element["value"], $element["type"]);
        }

        $req->execute();
        return $req;
    }

    /**
     * Renvoyer le résultat de la requête SQL en forme de tableau
     */
    private function formatData($req)
    {
        // traiter les données pour les retourner par exemple en tableau associatif (avec PDO::FETCH_ASSOC)
        $result = $req->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * vider le jeu d'enregistrement
     */
    private function unsetData($req)
    {
        // vider le jeu d'enregistrement
        $req->closeCursor();
    }

    /**
     * Obtenir la liste des enseignants 
     */
    public function getAllTeachers()
    {
        //  récupère la liste de tous les enseignants de la BD
        $req = "SELECT * FROM t_teacher";
        //  appeler la méthode pour executer la requête
        $result = $this->querySimpleExecute($req);
        //  appeler la méthode pour avoir le résultat sous forme de tableau
        $teachers = $this->formatData($result);
        //  retour tous les enseignants
        return $teachers;
    }

    /**
     * Aller chercher un enseignant dans la base de données
     */
    public function getOneTeacher($id)
    {
        //  avoir la requête sql pour 1 enseignant (utilisation de l'id)
        $req = "SELECT * FROM t_teacher WHERE idTeacher = :idTeacher";
        //  récupère la liste des informations pour 1 enseignant
        $binds = [];
        $binds["idTeacher"] = array("value" => $id, "type" => PDO::PARAM_INT);
        //  appeler la méthode pour executer la requête
        $result = $this->queryPrepareExecute($req, $binds);
        //  appeler la méthode pour avoir le résultat sous forme de tableau
        $teacher = $this->formatData($result);
        //  retour l'enseignant
        if(count($teacher) == 1)
        {
            return $teacher[0];
        }
        else
        {
            echo "aucun élément trouvé";
        }
    }

    /**
     * Ajouter un enseignant dans la base de données
     */
    public function addTeacher($teacher)
    {
        //avoir la requête sql pour 1 enseignant 
        $req = "INSERT INTO t_teacher (idTeacher, teaFirstname, teaName, teaGender, teaNickname, teaOrigine, fkSection) ";
        $req .= "VALUES (DEFAULT, :teaFirstname, :teaName, :teaGender, :teaNickname, :teaOrigine, :fkSection)";

        //  récupère la liste des informations pour 1 enseignant
        $binds["teaFirstname"] = array("value" => $teacher["teaFirstname"], "type" => PDO::PARAM_STR);
        $binds["teaName"] = array("value" => $teacher["teaName"], "type" => PDO::PARAM_STR);
        $binds["teaGender"] = array("value" => $teacher["teaGender"], "type" => PDO::PARAM_STR);
        $binds["teaNickname"] = array("value" => $teacher["teaNickname"], "type" => PDO::PARAM_STR);
        $binds["teaOrigine"] = array("value" => $teacher["teaOrigine"], "type" => PDO::PARAM_STR);
        $binds["fkSection"] = array("value" => $teacher["fkSection"], "type" => PDO::PARAM_INT);
        
        // appeler la méthode pour executer la requête
        $this->queryPrepareExecute($req, $binds);
    }

    /**
     * Supprime un enseignant de la base de données
     */
    public function deleteTeacher($id)
    {
        //  avoir la requête sql pour 1 enseignant (utilisation de l'id)
        $req = "DELETE FROM t_teacher WHERE idTeacher = :idTeacher";
        //  récupère la liste des informations pour 1 enseignant
        $binds = [];
        $binds["idTeacher"] = array("value" => $id, "type" => PDO::PARAM_INT);
        //  appeler la méthode pour executer la requête
        $result = $this->queryPrepareExecute($req, $binds);
    }
    
    /**
     * modifie un enseignant de la base de données
     */
    public function modifyTeacher($id, $teacher)
    {
        //avoir la requête sql pour 1 enseignant 
        $req = "UPDATE t_teacher SET teaFirstname = :teaFirstname, teaName = :teaName, teaGender = :teaGender, teaNickname = :teaNickname, teaOrigine = :teaOrigine, fkSection = :fkSection";
        $req .= " WHERE t_teacher.idTeacher = :idTeacher ";

        //  récupère la liste des informations pour 1 enseignant
        $binds["idTeacher"] = array("value" => $id, "type" => PDO::PARAM_INT);
        $binds["teaFirstname"] = array("value" => $teacher["teaFirstname"], "type" => PDO::PARAM_STR);
        $binds["teaName"] = array("value" => $teacher["teaName"], "type" => PDO::PARAM_STR);
        $binds["teaGender"] = array("value" => $teacher["teaGender"], "type" => PDO::PARAM_STR);
        $binds["teaNickname"] = array("value" => $teacher["teaNickname"], "type" => PDO::PARAM_STR);
        $binds["teaOrigine"] = array("value" => $teacher["teaOrigine"], "type" => PDO::PARAM_STR);
        $binds["fkSection"] = array("value" => $teacher["fkSection"], "type" => PDO::PARAM_INT);
        
        // appeler la méthode pour executer la requête
        $this->queryPrepareExecute($req, $binds);
    }

    /**
     *  Récupère toutes les sections de la base de données
     */
    public function getAllSection()
    {
        //  récupère la liste de tous les enseignants de la BD
        $req = "SELECT * FROM t_section";
        //  appeler la méthode pour executer la requête
        $result = $this->querySimpleExecute($req);
        //  appeler la méthode pour avoir le résultat sous forme de tableau
        $sections = $this->formatData($result);
        //  retour tous les enseignants
        return $sections;
    }

    /**
     *  Récupère une des sections de la base de données
     */
    public function getOneSection($fk)
    {
        //  avoir la requête sql pour 1 section (utilisation de la fk)
        $req = "SELECT * FROM t_section WHERE idSection = :fkSection";
        //  récupère la liste des informations pour 1 section
        $binds = [];
        $binds["fkSection"] = array("value" => $fk, "type" => PDO::PARAM_INT);
        // appeler la méthode pour executer la requête
        $result = $this->queryPrepareExecute($req, $binds);
        //  appeler la méthode pour avoir le résultat sous forme de tableau
        $section = $this->formatData($result);
        //  retour la section
        if(count($section) == 1)
        {
            return $section[0];
        }
        else
        {
            echo "aucun élément trouvé";
        }
    }

    /**
     *  Récupère un users de la base de donnée
     */
    public function GetUser($useLogin, $password)
    {
        //  avoir la requête sql pour 1 user
        $req = "SELECT * FROM t_user WHERE useLogin = :useLogin";
        //  récupère la liste des informations pour 1 section
        $binds = [];
        $binds["useLogin"] = array("value" => $useLogin, "type" => PDO::PARAM_STR);
        // appeler la méthode pour executer la requête
        $result = $this->queryPrepareExecute($req, $binds);
        //  appeler la méthode pour avoir le résultat sous forme de tableau
        $users = $this->formatData($result);

        //Retourner le user si le mot de passe est correct
        foreach($users as $key => $value)
        {
            if(password_verify($password, $value["usePassword"]))
            {
                return $users[$key];
            }
        }
    }

    /**
     *  Crée une session dans la base de données
     */
    public function CreateSession($idUser)
    {
         //  avoir la requête sql pour 1 session (utilisation de la fk)
        $req = "INSERT INTO t_session (idSession, fkUser) VALUES (DEFAULT, :fkUser)";

        //  récupère la liste des informations pour 1 enseignant
        $binds["fkUser"] = array("value" => $idUser, "type" => PDO::PARAM_INT);

        // appeler la méthode pour executer la requête
        $this->queryPrepareExecute($req, $binds);
        
        //Créer le cookie et connecter
        return $this->Connect($idUser);
    }

    /**
     *  Connecte à la session et récupère l'id de session
     */
    private function Connect($idUser)
    {
        //  avoir la requête sql pour 1 session
        $req = "SELECT idSession FROM t_session INNER JOIN t_user ON t_session.fkUser = t_user.idUser WHERE fkUser = :idUser";

        //  récupère la liste des informations pour 1 enseignant
        $binds["idUser"] = array("value" => $idUser, "type" => PDO::PARAM_INT);

        // appeler la méthode pour executer la requête
        $req = $this->queryPrepareExecute($req, $binds);

        //  appeler la méthode pour avoir le résultat sous forme de tableau
        $session = $this->formatData($req);

         //  Renvoyer les valeurs de la session
        foreach($session as $key => $value)
        {
            return $value["idSession"];
        }
    }

    /**
     *  Récupère l'utilisateur
     */
    public function IsConnect($idSession)
    {
        //  avoir la requête sql pour récupérer l'utilisateur
        $req = "SELECT * FROM t_user INNER JOIN t_session ON t_user.idUser = t_session.fkUser WHERE idSession = :idSession AND idUser = fkUser";
        
        //  récupère la liste des informations pour 1 enseignant
        $binds["idSession"] = array("value" => $idSession, "type" => PDO::PARAM_INT);

        // appeler la méthode pour executer la requête
        $req = $this->queryPrepareExecute($req, $binds);

        //  appeler la méthode pour avoir le résultat sous forme de tableau
        $session = $this->formatData($req);

        //  Renvoyer les valeurs de la session
        foreach($session as $key => $value)
        {
            return $value;
        }
    }

    /**
     *  Supprime une session
     */
    public function DeleteSession($idSession)
    {
        //  avoir la requête sql pour supprimer une session
        $req = "DELETE FROM t_session WHERE idSession = :idSession";

        //  récupère la liste des informations pour 1 enseignant
        $binds["idSession"] = array("value" => $idSession, "type" => PDO::PARAM_INT);
        
        // appeler la méthode pour executer la requête
        $this->queryPrepareExecute($req, $binds);
    }

 }
?>