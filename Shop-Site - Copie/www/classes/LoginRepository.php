<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'database/DataBaseQuery.php';
include_once 'Entity.php';


class LoginRepository implements Entity {

    /**
     * Find all entries
     *
     * @return array|resource
     */
    public function findAll() {

        $table = 't_user';
        $columns = 'useLogin';

        $request =  new DataBaseQuery();
        $query = $request->select($table, $columns);

        //Check if it could be an xss attack
        foreach($query as $keyNumber => $valueArray){
            foreach ($valueArray as $key => $value) {
                if (strpos($value, '<' || '>')) {
                    $query[$keyNumber][$key] = htmlspecialchars($value);
                }
            }
        }

        return $query;
    }

    /**
     * Find One entry
     *
     * @param $login
     *
     * @return array
     */
    public function findOne($login,$password) {
        $table = 't_user';
        $columns = '*';
        $where = "useLogin = :login AND usePassword = MD5(:password) LIMIT 1";

        $binds = array(array('login', $login, PDO::PARAM_STR), array('password', $password, PDO::PARAM_STR));
        
        $request =  new DataBaseQuery();
        $query = $request->select($table, $columns, $where, '', $binds);

        if(count($query) == 1){
            //Check if it could be an xss attack
            foreach($query as $keyNumber => $valueArray){
                foreach ($valueArray as $key => $value) {
                    if (strpos($value, '<' || '>')) {
                        $query[$keyNumber][$key] = htmlspecialchars($value);
                    }
                }
            }
        }

        return $query;
    }

    /**
     * Login
     *
     * @param $login
     * @param $password
     *
     * @return bool
     */
    public function login($login, $password) {
        $result = $this->findOne($login,$password);

        if(isset($result) && count($result)>0){
            $_SESSION['right'] = $result[0]['useRight'];
            $connect = true;
        } else {
            $_SESSION['right'] = null;
            $connect = false;
        }

        return $connect;
    }
}