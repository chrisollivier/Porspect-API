<?php

use Dot\DotEnv;

include_once 'DotEnv.php';

class Dbh {

    protected function connect() {
        $dotEnv = new DotEnv(__DIR__ . './.env');
        $dotEnv->load();

        try {
            return $dbh = new PDO(getenv('DATABASE_DNS_REMOTE'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));


        }catch (PDOException $exception){
            return $dbh = new PDO(getenv('DATABASE_DNS_LOCAL'),getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));
            print 'Error :' . $exception->getMessage() .' <br>';
            die();
        }
    }
}