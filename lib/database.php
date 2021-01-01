<?php 

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;   // database handler for calling PDO   $dbh = $pdo from internet sources Refers to PDO class.
    private $error;
    private $stmt;  // statement

    public function __construct(){
        // SET DSN
        $options = array(                   // PDO's Options ( extra )
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        //PDO Instance
        try{
            $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname;  // $dsn = 'mysql:host=host_name;dbname="db_name"; host nae db name htae ya tar.
            
            $this->dbh = new PDO($dsn,$this->user,$this->pass,$options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();    // whatever error msgs will be put inside
        }
    }

    public function query($query){              // job.php mar SQL query tone pee Data get yin tone ya tar. 
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param,$value,$type=null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type=PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type=PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type=PDO::PARAM_NULL;
                    break;
                default:
                    $type=PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }
    public function execute(){
        return $this->stmt->execute();
    }
    public function resultSet(){            //fetching a set of results
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function single(){               // fetching a single result
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}