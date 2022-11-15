<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'database/DataBaseQuery.php';
include_once 'Entity.php';

class CategoryRepository implements Entity {

    /**
     * Find all entries
     *
     * @return array|resource
     */
    public function findAll() {

        $table = 't_category';
        $columns = '*';

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

}