<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'database/DataBaseQuery.php';
include_once 'Entity.php';

class PaymentRepository implements Entity {

    /**
     * Find all entries
     *
     * @return array|resource
     */
    public function findAll() {

        $table = 't_payment';
        $columns = '*';

        $request = new DataBaseQuery();
        
        return $request->select($table, $columns);

    }

    /**
     * Find One entry
     *
     * @param $idPayment
     *
     * @return array
     */
    public function findOne($idPayment) {

        $table = 't_payment';
        $columns = '*';
        $where = "idPayment = '$idPayment'";

        $request = new DataBaseQuery();

        return $request->select($table, $columns, $where);

    }

}