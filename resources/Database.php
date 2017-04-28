<?php
/**
 * Created by PhpStorm.
 * User: Fredrik Hietala
 * Date: 2017-04-28
 * Time: 14:17
 */
Class Database extends PDO {

    function __construct($config) {

        try {
            parent::__construct($config['db-type'] . ':host=' . $config['db-host'] . ':dbname=' . $config['db_name'], $config['db_user'], $config['db_password']);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}