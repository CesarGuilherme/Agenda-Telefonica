<?php

Class Database {
  //Conectar ao banco de dados
  public $isConn;
  protected $database;

  public function __construct($username = "root", $password = "mysql", $dbname = "agendaDB", $options = []){
    $this->isConn = TRUE;
    try {
      $this->database = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
      $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      throw new Exception($e->getMessage());
    }
  }
    // Preparar query
    public function query($query){
      $this->stmt = $this->database->prepare($query);
    }

    // Executar
    public function execute(){
      return $this->stmt->execute();
    }

    // Selecionar uma linha
    public function selectSingle(){
      $this->execute();
      return $this->stmt->fetch();
    }

    // Selecionar várias linhas
    public function selectMutiple(){
      $this->execute();
      return $this->stmt->fetchAll();
    }

    // Vincular
  	public function bind($param, $value, $type = null){
  		if (is_null($type)) {
  			switch (true) {
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
  		$this->stmt->bindValue($param, $value, $type);
  	}

    // Cria o hash da senha, usando MD5 e SHA-1
    public function make_hash($str)
    {
        return sha1(md5($str));
    }

    // Verifica se o usuário está logado
    public function isLoggedIn()
    {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
        {
            return false;
        }
        return true;
    }


}
?>
