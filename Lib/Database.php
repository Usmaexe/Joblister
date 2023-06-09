<?PHP
  namespace App\Lib;
  use PDO;
  use PDOException;

  class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;
    private $dbh;//database host
    private $error;
    private $stmt;
    
    public function __construct(){
      //set dsn which helps us connect to the database : 
      $dsn = 'mysql:host='.$this->host.';dbname='.$this->name;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
      
      try{
        $this->dbh = new PDO($dsn,$this->user,$this->pass,$options);
      }
      catch(PDOException $e){
        $this->error = $e->getMessage();
      }
    }

    public function query($query){ 
      $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param,$value,$type=null){//$type is null cause it's optional
      if(is_null($type)){
        switch(true){
          case is_int($value):
            $type = PDO::PARAM_INT;
          break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
          break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
          break;
          default:
            $type = PDO::PARAM_STR;
        }
      }
      $this->stmt->bindValue($param,$value,$type);
    }
    
    public function execute(){
      return $this->stmt->execute();
    }

    public function resultSet(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
  }
  

?>