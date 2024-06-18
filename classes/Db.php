<?php
    abstract class Db{
        private static $conn;

        public static function getConnection(){
            if(self::$conn == null){
                /*self::$conn = new PDO("mysql:host=localhost;dbname=lab2", "root", "root");*/
                self::$conn = new PDO("mysql:host=ID435480_Lab2.db.webhosting.be;dbname=ID435480_Lab2", "ID435480_Lab2", "Lab2Seda03Helia04");
                return self::$conn;
            }else{
                return self::$conn;
            }
        }
    }