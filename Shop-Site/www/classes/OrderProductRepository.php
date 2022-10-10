<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'database/DataBaseQuery.php';
include_once 'Entity.php';


class OrderProductRepository implements Entity 
{
    /**
     * Find all entries
     *
     * @return array|resource
     */
    public function findAll() {

        $table = 't_order';
        $columns = '*';

        $request = new DataBaseQuery();
        
        return $request->select($table, $columns);

    }

    /**
     * Find One entry
     *
     * @param $idOrder
     *
     * @return array
     */
    public function findOne($idOrder) {

        $table = 't_order';
        $columns = '*';
        $where = "idOrder = '$idOrder'";

        $request = new DataBaseQuery();

        return $request->select($table, $columns, $where);
    }

    /**
     * Insert
     *
     * @param $number
     * @param $totalPrice
     *
     * @return bool|string
     */
    public function insert($fkOrder, $fkProduct, $quantity) {

        $request = new DataBaseQuery();
        
        $table = 't_productorder';
        $columns = '(`fkOrder`, `fkProduct`, `quantity`)';
        $values = "('$fkOrder', '$fkProduct', '$quantity')";

        return $request->insert($table, $columns, $values);
    }

}