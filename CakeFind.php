<?php
/*
 *
 * CakeFind - Class for help construct find joins
 * Version 2014-12-15
 * 
 * Author Victor Fedotov
 * 
 */
class CakeFind {
    /**
     * 
     * @param string $master
     * @param string $detail
     * @param type $table
     * @return type
     */
    static function join($master, $detail, $table = null) {

        if (strpos($master, '/') !== false && !$table) {
            list($master, $table) = explode('/', $master);
        }

        if (strpos($master, '.') === false)
            $master = $master . '.id';

        list($masterModel, $masterField) = explode('.', $master);

        if (strpos($detail, '.') === false)
            $detail = $detail . '.' . Inflector::underscore($masterModel) . '_id';

        if (!$table)
            $table = Inflector::tableize($masterModel);

        $type = 'LEFT';
        $alias = $masterModel;
        $conditions = implode('=', array($master, $detail));

        if (!$table)
            $table = Inflector::tableize($alias);
        
        return compact('table', 'alias', 'type', 'conditions');
    }

    /**
     * 
     * @param type $joins
     * @return type
     */
    static function joins($joins = array()) {

        $res = array();
        foreach ($joins as $master => $detail) 
            if (is_int($master))
                $res[] = $detail;
            else 
                $res[] = self::cake_join($master, $detail);        

        return $res;
    }
}
