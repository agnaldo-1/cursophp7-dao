<?php 

    class usuario{

    	private $idusuario;
    	private $deslogin;
    	private $dessenha;
    	private $dtusuario;
  public function getIdusuario(){

  	return $this->idusuario;
  }
  public function setIdusuario($value){

  	$this->idUsuarioo = $value;
  }
  public function getDeslogin(){

  	return $this->deslogin;
  }
  public function setDeslogin($value){

  	$this->deslogin = $value;
  }
  public function getDessenha(){

  	return $this->dessenha;
  }
  public function setDessenha($value){

  	$this->dessenha = $value;
  }
  public function getDtusuario(){

  	return $this->dtusuario;
  }
  public function setDtusuario($value){

  	$this->dtusuario = $value;
  }
  public function loadById($id){
  	$sql = new sql();

  	$results = $sql->select("SELECT * FROM usuarios WHERE idusuario = :ID", array(
         ":ID"=>$id
  		));
  	if (count($results) > 0){
  		$row = $results[0];

  	   $this->setIdusuario($row['idusuario']);	
  	   $this->setDeslogin($row['deslogin']);	
  	   $this->setDessenha($row['dessenha']);	
  	   $this->setDtusuario($row['dtusuario']);	
  	}
  }
  public static function getList(){

    $sql = new sql();
    return $sql->select("SELECT * FROM usuarios ORDER BY deslogin;");
  }
  public static function search($login){

    $sql = new sql();
    return $sql->select("SELECT * FROM usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(

       ':SEARCH'=>"%".$login."%"
    ));
  }
  public function login($login, $password){
  
  $sql = new sql();

    $results = $sql->select("SELECT * FROM usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
         ":LOGIN"=>$login,
         ":PASSWORD"=>$password
      ));
    if (count($results) > 0){
      $row = $results[0];

       $this->setIdusuario($row['idusuario']);  
       $this->setDeslogin($row['deslogin']);  
       $this->setDessenha($row['dessenha']);  
       $this->setDtusuario($row['dtusuario']);  
    }else{

      throw new Exception("Login e/ou Senha invalidos.");
      
    }
  
  }
  public function __toString(){

  	return json_encode(array(

"idusuario"=>$this->getIdusuario(),
"deslogin"=>$this->getDeslogin(),
"dessenha"=>$this->getDessenha(),
"dtusuario"=>$this->getDtusuario()
  		));
  }
    }
 ?>