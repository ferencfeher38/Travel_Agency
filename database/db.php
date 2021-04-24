<?php
class db{
    /**
     * Itt állítsátok át a saját adatbázisotokra.
     */
    private static $db_username = "DAVADKA";
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
    //Singleton -> egyszerre csak egy példány létezhet
    public static function get(){
        if(is_null(self::$instance)){
            self :: $instance = new db;
        }
        return self::$instance;
    }
    /**
     * Használat: $db = db::get();
     *  $db->query("SELECT * FROM 'USER'");
     */
    //Egy tömböt ad vissza, benne a találatokkal.
    public function query($queryString){
        $result = array();
        $qry = $this::$conn->prepare($queryString);
        if($qry->execute()){
            $result = $qry->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $this->error($queryString);
        }
        return $result;
    }
    //Elérhető sorok száma
    public function numrows($queryString){
        $result = $this->query($queryString);
        return count($result);
    }
    //ha egysoros SQL-t futtatunk.
    public function getRow($queryString){
        $result = array();
        $qry = $this::$conn->prepare($queryString);
        if($qry->execute()){
            $result = $qry->fetch(PDO::FETCH_ASSOC);
        }else{
            $this->error($queryString);
        }
        return $result;
    }
    //error msg-t ír ki.
    public function error($query){
        die("SQL err with the following query: ".$query);
    }
    //SQL injection ellen ezt lehet használni. Fontos, hogy változókra használjuk, ne query stringekre.
    public function escape($string){
        return $this::$conn->quote($string);
    }
    //INSERT és UPDATE SQL utasításohoz. Ha lefutott, akkor true, különben false
    public function executeQuery($queryString){
        $qry = $this::$conn->prepare($queryString);
        return $qry->execute();
    }
}