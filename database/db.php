<?php
class db{
    /**
     * Define static variable
     */
    private static $db_username = "DAVADK";
    private static $db_password = "asdasd";
    private static $instance = null;
    private static $conn = "";
    /**
     * Constructor
     */
    public function __construct(){
        $tns = "
            (DESCRIPTION =
                (ADDRESS_LIST =
                  (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
                )
                (CONNECT_DATA =
                  (SERVICE_NAME = XE)
                )
            )
        ";
        $db = "oci:dbname=".$tns;
        try{
            $this::$conn = new PDO($db,self::$db_username, self::$db_password);
        }catch(PDOException $e){
            echo ("Sikertelen csatlakozás az adatbázishoz: ".$e->getMessage());
        }
    }
    /** Singleton -> egyszerre csak egy példány létezhet */
    public static function get(){
        if(is_null(self::$instance)){
            self :: $instance = new db;
        }
        return self::$instance;
    }
    /**
     * Usage $db = db::get();
     *  $db->query("SELECT * FROM 'USER'");
     * Művelet végrehajtása -> INSERT | UPDATE | DELETE
     */
    public function query($queryString){
        $qry = $this::$conn->prepare($queryString);
        $qry->execute();
        $result = $qry->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
            $this->error($queryString);
        }
        return $result;
    }
    /* Elérhető sorok száma */
    public function numrows($queryString){
        $result = $this->query($queryString);
        return count($result);
    }
    public function getRow($queryString){
        $qry = $this::$conn->prepare($queryString);
        $qry->execute();
        $result = $qry->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            $this->error($queryString);
        }
        return $result;
    }
    public function error($query){
        die("SQL err with the following query: ".$query);
    }
    public function escape($string){
        return $this::$conn->quote($string);
    }
    public function executeQuery($queryString){
        $qry = $this::conn->prepare($queryString);
        return $this::conn->execute();
    }
}