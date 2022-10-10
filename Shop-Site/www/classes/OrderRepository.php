<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

include_once 'database/DataBaseQuery.php';
include_once 'Entity.php';


class OrderRepository implements Entity 
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
    public function findOneById($idOrder) {

        $table = 't_order';
        $columns = '*';
        $where = "idOrder = '$idOrder'";

        $request = new DataBaseQuery();

        return $request->select($table, $columns, $where);

    }

     /**
     * Find One entry
     *
     * @param $idOrder
     *
     * @return array
     */
    public function findOneByOrderNumber($orderNumber) {

        $table = 't_order';
        $columns = '*';
        $where = "ordNumber = '$orderNumber'";

        $request = new DataBaseQuery();

        return $request->select($table, $columns, $where);

    }

    /**
     * Insert
     *
     * @param $number
     * @param $totalPrice
     * @param $payed
     * @param $state
     * @param $gender
     * @param $clientName
     * @param $clientSurname
     * @param $clienStreet
     * @param $clientStreetNumber
     * @param $clientNPA
     * @param $clientLocality
     * @param $clientMailAdress
     * @param $clientPhone
     * @param $fkDelivery
     * @param $fkPayment
     *
     * @return bool|string
     */
    public function insert($number, $totalPrice, $subtotal,  $payed, $state, $gender, $clientName, $clientSurname, $clienStreet, $clientStreetNumber, $clientNPA, $clientLocality, $clientMailAdress, $clientPhone, $fkDelivery, $fkPayment) {

        $request = new DataBaseQuery();
        
        $table = 't_order';
        $columns = '(`idOrder`, `ordNumber`, `ordTotalPrice`, `ordSubtotal`, `ordPayed`, `ordState`, `ordGender`, `ordClientName`, `ordClientSurname`, `ordClientStreet`, `ordClientStreetNumber`, `ordClientNPA`, `ordClientLocality`, `ordClientMailAdress`, `ordClientPhone`, `fkDelivery`, `fkPayment`)';
        $values = "(NULL, '$number', '$totalPrice', '$subtotal', '$payed', '$state', '$gender', '$clientName', '$clientSurname', '$clienStreet', '$clientStreetNumber', '$clientNPA', '$clientLocality', '$clientMailAdress', '$clientPhone', '$fkDelivery', '$fkPayment')";

        return $request->insert($table, $columns, $values);
    }
}