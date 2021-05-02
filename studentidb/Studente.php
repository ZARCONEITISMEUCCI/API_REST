<?php
include("DBConnection.php");
class Studente 
{
  private $db;
  public $iden;
  public $nome;
  public $cognome;
  public $sidi;
  public $tax;

  public function __construct() {
    $this->db = new DBConnection();
    $this->db = $this->db->returnConnection();
  }

  public function find($id){
    $sql = "SELECT * FROM alunni WHERE id=$id";
    $stmt = $this->db->prepare($sql);
    $data = [
      'id' => $id
    ];
    $stmt->execute($data);
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $result;
  }
  
  public function all(){
    $sql = "SELECT * FROM alunni WHERE id < 80";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }
  
  public function find_max(){
	 $sql = "SELECT MAX(id) FROM alunni"; 
	 $stmt = $this->db->prepare($sql);
	 $stmt->execute();
	 while($row = $result->fetch(PDO::FETCH_OBJ))
	 {
		$num = $row->id;
	 }		 
	 return $num;
  }	  
  
  public function cancel($id){
	$sql = "DELETE FROM alunni WHERE id = $id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
  }
  
  public function create($nome, $cognome, $sidi, $tax){
	  $num = find_max();
	  $sql = "INSERT INTO alunni VALUES($num, '$nome', '$cognome', '$sidi', '$tax')";
	  $stmt = $this->db->prepare($sql);
	  $stmt->execute();
  }
}
?>
