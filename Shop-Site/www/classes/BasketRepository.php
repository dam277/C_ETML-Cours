<?php
class BasketRepository implements Entity {

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

        return $request->select($table, $columns, $where);

    }
}
?>