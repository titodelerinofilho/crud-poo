<?php

namespace App\Model;

class Conexao
{

    private static $instance;

    public static function getConn()
    {
        if (!isset(self::$instance)) {
            self::$instance = new \PDO("mysql:host=192.168.2.9;dbname=dts_teste;charset=utf8", "dtsort", "8y17tzps@DTS");
        }

        return self::$instance;
    }
}
