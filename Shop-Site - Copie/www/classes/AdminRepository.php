<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'database/DataBaseQuery.php';
include_once 'Entity.php';

class AdminRepository implements Entity {

    /**
     * Find all entries
     *
     * @return array|resource
     */
    public function findAll() {

        $table = 't_product as p, t_category as c';
        $columns = '*';
        $where =  'p.fkCategory = c.idCategory';

        $request =  new DataBaseQuery();
        $query = $request->select($table, $columns, $where);

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
     * Raw sql
     *
     * @return array|resource
     */
    public function rawQuery($query,$mode) {
        $request =  new DataBaseQuery();

        return $request->rawQuerySelectBind($query,$mode);
    }

    /**
     * Delete
     *
     * @param int $id
     * @return bool
     */
    public function removeOne($id) {

        $request = new DataBaseQuery();
        $table = 't_product';
        
        $where =  'idProduct = :id';

        $binds = array(array('id', $id, PDO::PARAM_INT));

        $query = $request->delete($table, $where, $binds);

        return $query;
    }

    /**
     * Insert
     *
     * @param $name
     * @param $description
     * @param $price
     * @param $quantity
     * @param $file
     * @param $idCategory
     *
     * @return bool|string
     */
    public function insert($name, $description, $price, $quantity, $file, $idCategory) {

        $request = new DataBaseQuery();

        $table = 't_product';
        $columns = '(idProduct, proName, proDescription, proPrice, proQuantity, proImage, fkCategory)';
        $values = "(NULL, :name, :description, :price, :quantity, :file, :idCategory)";

        $binds = array(array('name', $name, PDO::PARAM_STR), array('description', $description, PDO::PARAM_STR), array('price', $price, PDO::PARAM_INT), array('quantity', $quantity, PDO::PARAM_INT), array('file', $file, PDO::PARAM_STR), array('idCategory', $name, PDO::PARAM_INT));

        return $request->insert($table, $columns, $values, $binds);
    }

    /**
     * Update
     *
     * @param $name
     * @param $description
     * @param $price
     * @param $quantity
     * @param $file
     * @param $idCategory
     * @param $idProduct
     *
     * @return bool
     */
    public function update($name, $description, $price, $quantity, $file, $idCategory, $idProduct) {

        $request = new DataBaseQuery();

        $table = 't_product';
        $columns = "proName = :name, proDescription = :description, proPrice = ;price, proQuantity = :quantity, proImage = :file, fkCategory = :idCategory";
        $where = "idProduct = :idProduct";

        $binds = array(array('name', $name, PDO::PARAM_STR), array('description', $description, PDO::PARAM_STR), array('price', $price, PDO::PARAM_INT), array('quantity', $quantity, PDO::PARAM_INT), array('file', $file, PDO::PARAM_STR), array('idCategory', $idCategory, PDO::PARAM_INT), array('idProduct', $idProduct, PDO::PARAM_INT));

        return $request->update($table, $columns, $where, $binds);
    }
    
}